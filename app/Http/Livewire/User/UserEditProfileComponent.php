<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Livewire\WithFileUploads;

class UserEditProfileComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $email;
    public $mobile;
    public $image;
    public $line1;
    public $line2;
    public $city;
    public $country;
    public $newimage;

    public function mount()
    {
        $user=User::find(Auth::user()->id);
        $this->name=$user->name;
        $this->email=$user->email;
        $this->mobile=$user->profile->mobile;
        $this->image=$user->profile->image;
        $this->line1=$user->profile->line1;
        $this->line2=$user->profile->line2;
        $this->city=$user->profile->city;
        $this->country=$user->profile->country;
       
    }
    public function updateProfile()
    {
        $user=User::find(Auth::user()->id);
        $user->name=$this->name;
        $user->save();

        $user->profile->mobile=$this->mobile;
        if($this->newimage)
        {
            if($this->image)
            {
                unlink('assets/images/profile'.'/' .$this->image);
            }
            $imageName=Carbon::now()->timestamp . '.' .$this->newimage->extension();
            $this->newimage->storeAs('profile',$imageName);
            $user->profile->image=$imageName;
        }
        $user->profile->line1=$this->line1;
        $user->profile->line2=$this->line2; 
        $user->profile->city=$this->city;    
        $user->profile->country=$this->country;
        $user->profile->save();
        //session()->flash('message','profile has been updated successfully');
        $this->reset();  
        return redirect()->route('user.profile')->with('message','profile has been updated successfully');   
    }
    public function render()
    {
        return view('livewire.user.user-edit-profile-component')->layout('layouts.base');
    }
}
