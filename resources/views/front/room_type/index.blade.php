@extends('layouts.front')

@section('content')

    <div class="inn-body-section pad-bot-55 ">
        <div class="container">
            <div class="row">
                <div class="page-head">
                <br><br>
                    <h2>Tipe Kamar</h2>
                    <div class="head-title">
                        <div class="hl-1"></div>
                        <div class="hl-2"></div>
                        <div class="hl-3"></div>
                    </div>
                    <p>Semua yang ada dibawah, Tersedia.</p>
                </div>

            @forelse($room_types as $room_type)
                <!--ROOM SECTION-->
                <div class="room">
                    @if($room_type->cost_per_day !== $room_type->discountedPrice)
                    <div class="ribbon ribbon-top-left"><span>Discount</span>
                    </div>
                    @endif
                    <!--ROOM IMAGE-->
                    <div class="r1 r-com"><img src="{{'/front/images/room/'.$room_type->images->first()->name}}" alt="" />
                    </div>
                    <!--ROOM RATING-->
                    <div class="r2 r-com">
                        <h4>{{ $room_type->name }}</h4>

                        <div class="r2-ratt">
                            @if($room_type->getAggregatedRating() > 0)
                            <i class="fa fa-star"></i>
                            @endif
                            @if($room_type->getAggregatedRating() > 1)
                            <i class="fa fa-star"></i>
                            @endif
                            @if($room_type->getAggregatedRating() > 2)
                            <i class="fa fa-star"></i>
                            @endif
                            @if($room_type->getAggregatedRating() > 3)
                            <i class="fa fa-star"></i>
                            @endif
                            @if($room_type->getAggregatedRating() > 4)
                            <i class="fa fa-star"></i>
                            @endif
                            <p>
                                @if($room_type->getAggregatedRating() == 0)
                                    No Ratings Yet
                                @elseif($room_type->getAggregatedRating() <= 2)
                                Below Average
                                @elseif($room_type->getAggregatedRating() <= 3)
                                    Satisfactory
                                @elseif($room_type->getAggregatedRating() <= 4)
                                    Good
                                @elseif($room_type->getAggregatedRating() <= 5)
                                    Excellent
                                @endif
                                {{$room_type->getAggregatedRating()}} / 5
                            </p>
                        </div>
                        <ul>
                        
                            <li>Extra Bed : {{ $room_type->extra_bed }}</li>
                            <li>1 Extra Bed = Rp. 50.000</li>
                            <li></li>
                            <li></li>
                        </ul>
                    </div>
                    <!--ROOM FACILITY-->
                    <div class="r3 r-com">
                        <ul>
                            @foreach($room_type->facilities as $facility)
                                <li>{{ $facility->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <!--ROOM PRICE-->
                    <div class="r4 r-com">
                        <p>Harga per malam.</p>

                        <p>
                            <span class="room-price-1">{{ config('app.currency').$room_type->discountedPrice}}</span>
                            @if($room_type->cost_per_day !== $room_type->discountedPrice)
                            <span class="room-price">{{ config('app.currency').$room_type->cost_per_day }}</span>
                            @endif
                        </p>
                        <p>Non Refundable</p>
                    </div>
                    <!--ROOM BOOKING BUTTON-->
                    <div class="r5 r-com"> <a href="{{url('/room_type/'.$room_type->id)}}" class="inn-room-book">PESAN</a> </div>
                </div>
                <!--END ROOM SECTION-->
                @empty
                @endforelse
            </div>
        </div>
@endsection
