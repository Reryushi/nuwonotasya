@extends('layouts.front')

@section('content')
    <!--TOP BANNER-->
    <div class="inn-banner">
        <div class="container">
            <div class="row">
                <h4>Our Menu</h4>
                <p>View all Menu here
                <p>
            </div>
        </div>
    </div>
    @if(count($foods) > 0)
    <!--TOP SECTION-->
    <div class="inn-body-section pad-bot-65">
        <div class="container">
            <div class="row inn-page-com">
                <div class="page-head">
                    <h2>Makanan Utama</h2>
                    <div class="head-title">
                        <div class="hl-1"></div>
                        <div class="hl-2"></div>
                        <div class="hl-3"></div>
                    </div>
                    <p>-</p>
                </div>
                <!--SERVICES SECTION-->
                <div class="col-md-12">
                    <div class="row">
                        @foreach($foods as $food)
                            @continue($food->type !== "Utama")
                        <div class="res-menu"> <img src="{{ ('front/images/menu/'.$food->image) }}" alt="" />
                            <h3>{{ $food->name }} <span>Rp. {{ $food->price }}</span></h3> <span class="menu-item">{{ $food->description }}</span>
                        </div>
                            @endforeach
                    </div>
                </div>
            </div>
            <div class="row inn-page-com">
                <div class="page-head">
                    <h2>Snack</h2>
                    <div class="head-title">
                        <div class="hl-1"></div>
                        <div class="hl-2"></div>
                        <div class="hl-3"></div>
                    </div>
                    <p>-</p>
                </div>
                <!--SERVICES SECTION-->
                <div class="col-md-12">
                    <div class="row">
                        @foreach($foods as $food)
                            @continue($food->type !== "Snack")
                        <div class="res-menu"> <img src="{{ ('front/images/menu/'.$food->image) }}" alt="" />
                            <h3>{{ $food->name }} <span>Rp. {{ $food->price }}</span></h3> <span class="menu-item">{{ $food->description }}</span>
                        </div>
                            @endforeach
                    </div>
                </div>
            </div>
            <div class="row inn-page-com">
                <div class="page-head">
                    <h2>Minuman</h2>
                    <div class="head-title">
                        <div class="hl-1"></div>
                        <div class="hl-2"></div>
                        <div class="hl-3"></div>
                    </div>
                    <p>-</p>
                </div>
                <!--SERVICES SECTION-->
                <div class="col-md-12">
                    <div class="row">
                        @foreach($foods as $food)
                            @continue($food->type !== "Minuman")
                        <div class="res-menu"> <img src="{{ ('front/images/menu/'.$food->image) }}" alt="" />
                            <h3>{{ $food->name }} <span>Rp. {{ $food->price }}</span></h3> <span class="menu-item">{{ $food->description }}</span>
                        </div>
                            @endforeach
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    <!--TOP SECTION-->
    @else
        No Foods Available
    @endif
@endsection
