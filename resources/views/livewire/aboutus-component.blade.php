<style>
    .breadcrumb {
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    background: none;
    margin: 0px
}

.breadcrumb .active {
    color: var(--gray-chalk)
}

.breadcrumb-item {
    font-size: 18px;
    padding: 0px !important;
    text-transform: capitalize
}
p {
    display: block;
    margin-block-start: 1em;
    margin-block-end: 1em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
    line-height: 25px;
    font-size: 14px;
}
</style>
<section class="inner-section single-banner" style="background: url('{{ asset('assets/images/single-banner.jpg')}}') no-repeat center;">
    <div class="container">
        <h2><b>about our company</b></h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">about</li>
        </ol>
    </div>
</section>
<section class="inner-section about-company">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="about-content">
                    <h1><b>Our Motive Is To Provide Best For Those Who Deserve</b></h1><br>
                    <p>Founded in 2018, initially selling quality ready made garments at affordable prices under one roof, we have always focused on maximizing customer convenience. We firmly believe that fashion & style is achievable for all even when inexpensive. Today. Salma is one of the largest departmental stores of Karachi . Salma offers a complete shopping experience with everything under one roof from Grocery to Garments to Crockery and much more. We are also offering Grocery delivery services now we will be offering a wide range of quality garments & accessories for Ladies. Gems & Kids with contemporary styles and value for money from Salina Su perMarket</p>
                </div>
                <ul class="about-list">
                    <li>
                        <h3><b>34785</b></h3>
                        <h6>registered users</h6>
                    </li>
                    <li>
                        <h3><b>2623</b></h3>
                        <h6>per day visitors</h6>
                    </li>
                    <li>
                        <h3><b>189</b></h3>
                        <h6>total products</h6>
                    </li>
                </ul>
            </div>
            <div class="col-lg-6">
                <div class="about-img"><img src="{{asset('assets/images/ab.jpg')}}" alt="about"><img src="{{asset('assets/images/ab1.jpg')}}"
                        alt="about"><img src="{{asset('assets/images/ab.jpg')}}" alt="about"><img src="{{asset('assets/images/ab1.jpg')}}"
                        alt="about"></div>
            </div>
        </div>
    </div>
</section>



