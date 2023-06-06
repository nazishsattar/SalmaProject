<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Shipping;
use App\Models\Transaction;
use App\Mail\OrderMail;



class CheckoutComponent extends Component
{
    public $ship_to_different;
    public $firstname;
    public $lastname;
    public $email;
    public $mobile;
    public $line1;
    public $line2;
    public $city;
    public $area;
    public $note;
   
    public $s_firstname;
    public $s_lastname;
    public $s_email;
    public $s_mobile;
    public $s_line1;
    public $s_line2;
    public $s_city;
    public $s_area;
    public $s_note;
    public $paymentmode;
    public $thankyou;
   
    public function updated($fields)
    {
        if($this->ship_to_different==0)
        { 
        $this->validateOnly($fields,[
            'firstname'=>'required',
            'lastname'=>'required',
            'email'=>'required|email',
            'mobile'=> 'required|numeric|digits:11',
            'line1'=>'required',
            'city'=>'required',
            'area'=>'required',
            'paymentmode'=>'required'
        ]);
    }
        if($this->ship_to_different==1)
        {       $this->validateOnly($fields,[
                'firstname'=>'required',
                'lastname'=>'required',
                'email'=>'required|email',
                'mobile'=> 'required|numeric|digits:11',
                'line1'=>'required',
                'city'=>'required',
                'area'=>'required',
                'paymentmode'=>'required',
                's_firstname'=>'required',
                's_lastname'=>'required',
                's_email'=>'required|email',
                's_mobile'=> 'required|numeric|digits:11',
                's_line1'=>'required',
                's_city'=>'required',
                's_area'=>'required',
                
            ]);
        }
    }

    public function placeorder()
    {
        if($this->ship_to_different==0)
        { 
        $this->validate([
             'firstname'=>'required',
             'lastname'=>'required',
             'email'=>'required|email',
             'mobile'=>'required|numeric|digits:11',
             'line1'=>'required',
             'city'=>'required',
             'area'=>'required',
             'paymentmode'=>'required'
        ]);
            $order=new Order();
            $order->user_id=Auth::user()->id;
            $order->subtotal=session()->get('checkout')['subtotal'];
            $order->total=session()->get('checkout')['total'];
            $order->firstname=$this->firstname;
            $order->lastname=$this->lastname;
            $order->email=$this->email;
            $order->mobile=$this->mobile;
            $order->line1=$this->line1;
            $order->line2=$this->line2;
            $order->city=$this->city;
            $order->area=$this->area;
            $order->note=$this->note;
            $order->status='ordered';
            $order->is_shipping_address=$this->ship_to_different ? 1:0;
            $order->save();
         foreach(Cart::instance('cart')->content() as $item)
         {
         
            $orderItem=new OrderItem();
            $orderItem->product_id=$item->id;
            $orderItem->order_id=$order->id;
            $orderItem->price=$item->price;
            $orderItem->quantity=$item->qty;
            $orderItem->save();
         }
        }
         if($this->ship_to_different==1)
         {
            $this->validate([
                'firstname'=>'required',
                'lastname'=>'required',
                'email'=>'required|email',
                'mobile'=> 'required|numeric|digits:11',
                'line1'=>'required',
                'city'=>'required',
                'area'=>'required',
                'paymentmode'=>'required',
                's_firstname'=>'required',
                's_lastname'=>'required',
                's_email'=>'required|email',
                's_mobile'=> 'required|numeric|digits:11',
                's_line1'=>'required',
                's_city'=>'required',
                's_area'=>'required',
           ]);
           $order=new Order();
           $order->user_id=Auth::user()->id;
           $order->subtotal=session()->get('checkout')['subtotal'];
           $order->total=session()->get('checkout')['total'];
           $order->firstname=$this->firstname;
           $order->lastname=$this->lastname;
           $order->email=$this->email;
           $order->mobile=$this->mobile;
           $order->line1=$this->line1;
           $order->line2=$this->line2;
           $order->city=$this->city;
           $order->area=$this->area;
           $order->note=$this->note;
           $order->status='ordered';
           $order->is_shipping_address=$this->ship_to_different ? 1:0;
           $order->save();
        foreach(Cart::instance('cart')->content() as $item)
        {
        
           $orderItem=new OrderItem();
           $orderItem->product_id=$item->id;
           $orderItem->order_id=$order->id;
           $orderItem->price=$item->price;
           $orderItem->quantity=$item->qty;
           $orderItem->save();
        }
           $shipping=new Shipping();
           $shipping->order_id=$order->id;
           $shipping->firstname=$this->s_firstname;
           $shipping->lastname=$this->s_lastname;
           $shipping->email=$this->s_email;
           $shipping->mobile=$this->s_mobile;
           $shipping->line1=$this->s_line1;
           $shipping->line2=$this->s_line2;
           $shipping->city=$this->s_city;
           $shipping->area=$this->s_area;
           $shipping->note=$this->s_note;
           $shipping->save();

         }
       if($this->paymentmode =='cod')
       {
        $transaction=new Transaction();
        $transaction->user_id=Auth::user()->id;
        $transaction->order_id=$order->id;
        $transaction->mode='cod';
        $transaction->status='pending';
        $transaction->save();
       }
       else if($this->paymentmode =='card')
       {
        $transaction=new Transaction();
        $transaction->user_id=Auth::user()->id;
        $transaction->order_id=$order->id;
        $transaction->mode='card';
        $transaction->status='pending';
        $transaction->save();
       }
       $this->thankyou=1;
       Cart::instance('cart')->destroy();
       session()->forget('checkout');
       $this->sendOrderConfirmationMail($order);
    }

    public function verifyforCheckout()
    {
        if(!Auth::check())
        {
        return redirect()->route('login');
        }
        else if($this->thankyou)
        {
            return redirect()->route('thankyou');
        }
        else if(!session()->get('checkout'))
        {
            return redirect()->route('product.cart');
        }

    }
    public function sendOrderConfirmationMail($order)
    {
        Mail::to($order->email)->send(new OrderMail($order));

    }
    public function render()
    {
        $this->verifyforCheckout();
        return view('livewire.checkout-component')->layout("layouts.base");;
    }
}
