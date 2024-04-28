@extends('layouts.front')

@section('content')

<style>
    .map-responsive{
        overflow:hidden;
        padding-bottom:56.25%;
        position:relative;
        height:0;
    }

    .map-responsive iframe{
        left:0;
        top:0;
        height:100%;
        width:100%;
        position:absolute;
    }
</style>
    <div class="inn-banner custom-bg-card">
        <div class="container">
            <div class="row">
                <h4>Kontak</h4>
                <p>Dapat dihubungi melalui beberapa media dibawah.</p>
                <p> </p>
                <ul>
                    <li><a href="/">Home</a>
                    </li>
                    <li><a href="/contact">Kontak</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="inn-body-section">
        <div class="container">
            <div class="row">
                <div class="page-head">
                    <h2>Kontak</h2>
                    <div class="head-title">
                        <div class="hl-1"></div>
                        <div class="hl-2"></div>
                        <div class="hl-3"></div>
                    </div>
                    <p>Hubungi kami jika ada pertanyaan atau bantuan mengenai penginapan dan website ini.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12 new-con">
                    <h2 style="color:black">{{ config('app.name') }}</h2>
                    <p>Web ini menampilkan info kamar, pemesanan, ratings, dan fasilitas yang tersedia pada Nuwono Tasya Guesthouse.</p>
                    
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 new-con"> <img src="{{ asset("front/images/icon/20.png") }}" alt="">
                    <h4>Address</h4>
                    <p>{{ config('app.address') }}</p>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 new-con"> <img src="{{ asset("front/images/icon/22.png") }}" alt="">
                    <h4>CONTACT INFO:</h4>
                    <p> <a href="tel://0099999999" class="contact-icon">Phone : {{ config('app.phone_number') }}</a>
                        <br> <a href="mailto:mytestmail@gmail.com" class="contact-icon">Email : #</a> </p>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 new-con"> <img src="{{ asset("front/images/icon/21.png") }}" alt="">
                    <h4>Website</h4>
                    <p> <a href="{{ config('app.website') }}">
                            <b>Website :</b> Nuwono-tasya.com</a>
                        <br> <a href="{{ config('app.facebook') }}">
                            <b>Facebook :</b> Nuwono Tasya</a>
                        <br> <a href="{{ config('app.twitter') }}">
                            <b>Twitter :</b> Nuwono Tasya Guesthouse</a> </p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
    <div class="row">
        <div class="map-responsive">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3972.3452503322897!2d105.23534491435277!3d-5.364191855176491!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e40c54b85c844cf%3A0xb6d99ba2c8179977!2sNuwono%20Tasya%20Guesthouse!5e0!3m2!1sen!2sid!4v1617537012856!5m2!1sen!2sid" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
    </div>
@endsection
