@extends('layouts.search')
@section('content')
<div class="inn-body-section pad-bot-55 custom-bg-login" >
    <div class="container"> 
        <div class="page-head" style="padding-top: 40px">
            <h2 style="color:#cbcbcb">Cari Kamar</h2>
            <div class="head-title">
                <div class="hl-1"></div>
                <div class="hl-2"></div>
                <div class="hl-3"></div>
            </div>
        </div>
        <div class="custom-bg-card" style="padding: 30px 10px 0px 10px"> 
            <div class="card-body">
                <form>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <input class="form-control datetime" type="text" name="start_time" id="start_time" value="{{ request()->input('start_time') }}" placeholder="Check in" required>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <input class="form-control datetime" type="text" name="end_time" id="end_time" value="{{ request()->input('end_time') }}" placeholder="Check out" required>
                            </div>
                        </div>
                        <div class="col-md-0">
                            <button class="btn btn-success">
                                Search
                            </button>
                        </div>
                    </div>
                </form>
                <div class="db-cent-2">
                    <div class="db-2-main-1" >
                        <div class="db-2-main-2"> <img src="{{ asset("front/images/icon/vip.png") }}" alt=""> <span style="color:#cbcbcb"> VIP</span>
                            <p>Kamar Tersedia :</p>
                            <h2>{{$rooms_vip}}</h2> 
                        </div>
                    </div>
                    <div class="db-2-main-1" >
                        <div class="db-2-main-2"> <img src="{{ asset("front/images/icon/deluxe.png") }}" alt=""> <span style="color:#cbcbcb"> DELUXE</span>
                            <p>Kamar Tersedia :</p>
                            <h2>{{$rooms_dlx}}</h2> 
                        </div>
                    </div>
                    <div class="db-2-main-1" >
                        <div class="db-2-main-2"> <img src="{{ asset("front/images/icon/standar.png") }}" alt=""> <span style="color:#cbcbcb"> STANDAR</span>
                            <p>Kamar Tersedia : </p>
                            <h2>{{$rooms_std}}</h2> 
                        </div>
                    </div>
                </div>   
            </div>
        </div>
    </div>
</div>       
 
@endsection



