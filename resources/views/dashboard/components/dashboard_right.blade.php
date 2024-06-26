@section('dashboard_right')
    <div class="db-righ" >
        <h4>Upcoming Bookings</h4>
        <ul>
            @foreach(\App\Model\RoomBooking::where('user_id', Auth::user()->id)->orderBy('start_time', 'desc')->limit('5')->get() as $room_booking)
            <li>
                <a href="{{ url('dashboard/room/booking') }}"> <img src="{{'/front/images/room/'.$room_booking->room->room_type->images->first()->name}}" alt="">
                    <h5>{{ $room_booking->room->room_type->name }}, {{ $room_booking->room->room_number }} </h5>
                    <p>Status: {{ studly_case($room_booking->status) }}
                    </p>
                    <span>{{ \Carbon\Carbon::parse($room_booking->start_time)->diffForHumans() }}</span> </a>
            </li>
            @endforeach
        </ul>
    </div>

    @show