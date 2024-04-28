@extends('layouts.front')

@section('content')

    <div class="inn-banner custom-bg-card">
        <div class="container">
            <div class="row">
                <h4>Tentang</h4>
                <p> </p>
                <ul>
                    <li><a href="{{ url('/') }}">Home</a>
                    </li>
                    <li><a href="{{ url($page->url_title) }}">Tentang</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="inn-body-section custom-bg-login">
        <div class="container">
            <div class="row">
                <div class="page-head">
                    <h2>Tentang</h2>
                    <div class="head-title">
                        <div class="hl-1"></div>
                        <div class="hl-2"></div>
                        <div class="hl-3"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="head-typo typo-com collap-expand inn-com-form2 custom-bg-card">
                    
                            <h4 style="color:white; text-align:center">Nuwono Tasya Guesthouse merupakan sebuah tempat penginapan<br>
                            dengan mengedepankan budaya adat lampung<br>
                            yang menjadikannya daya tarik tersendiri.<br><br>
                            Lokasi dari Nuwono Tasya Guesthouse sendiri juga dapat dibilang cukup strategis<br> 
                            Sistem kepegawaian di Nuwono Tasya juga bersifat half-family<br> 
                            dimana semua pegawai atau karyawan disini dianggap keluarga<br> 
                            tetapi masih dengan profesionalitas kerja masing masing
                            </h4>
                    
                </div>
            </div>
        </div>
    </div>
@endsection
