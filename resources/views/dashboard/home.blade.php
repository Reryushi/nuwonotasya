@extends('layouts.dashboard')

@section('content')
    <div class="db-cent-2 container">
        <div class="db-2-main-1" >
            <div class="db-2-main-2"> <img src="{{ asset("front/images/icon/dbc5.png") }}" alt=""> <span> Room Bookings</span>
                <p></p>
                <h2>{{ $total_room_bookings }}</h2> </div>
        </div>
        <!-- <div class="db-2-main-1">
            <div class="db-2-main-2"> <img src="{{ asset("front/images/icon/dbc6.png") }}" alt=""> <span> Event Bookings</span>
                <p></p>
                <h2> total_event_bookings </h2> </div>
        </div> -->
        <div class="db-2-main-1">
            <div class="db-2-main-2"> <img src="{{ asset("front/images/icon/dbc3.png") }}" alt=""> <span> Pembayaran</span>
                <p></p>
                <h2>{{ $total_pending_payments }}</h2> </div>
        </div>
    </div>
    <div class="db-cent-3">
        <div class="db-cent-table db-com-table">
            <div class="db-title">
                <h3><img src="{{ asset("front/images/icon/dbc5.png") }}" alt=""/> Room Bookings</h3>
                <p>View your upcoming hotel bookings here</p>
                <p>Lakukan pembayaran maksimal 2 jam setelah waktu booking terimakasih.</p>
            </div>
            <table class="bordered responsive-table">
                <thead>
                <tr>
                    <th><br>Waktu Booking</th>
                    <th><br>Tipe</th>
                    <th><br>Check in</th>
                    <th><br>Check out</th>
                    <th><br>Total Pembayaran</th>
                    <th><br>Status</th>
                    <th><br>Pembayaran</th>
                </tr>
                </thead>
                <tbody>
                @forelse($room_bookings as $index => $room_booking)
                    <tr>
                        <td>{{ $room_booking->created_at->format('H:i:s')}}</td>
                        <td>{{ $room_booking->room->room_type->name}}</td>
                        <td>{{ $room_booking->start_time }}</td>
                        <td>{{ $room_booking->end_time }}</td>
                        <td>Rp. {{ $room_booking->room_cost }}</td>
                        <td>
                            @if($room_booking->status == "pending")
                                <span class="label label-default">Pending</span>
                            @elseif($room_booking->status == "checked_in")
                                <span class="label label-primary">Checked In</span>
                            @elseif($room_booking->status == "checked_out")
                                <span class="label label-success">Checked Out</span>
                            @else
                                <span class="label label-danger">Cancelled</span>
                            @endif
                        </td>
                        <td>
                            @if($room_booking->payment == 1)
                                <span class="db-success">Paid</span>
                            @elseif($room_booking->payment == 2)
                                <span class="db-not-success">Uploaded</span>
                            @else
                                <span class="db-not-success">Not Paid</span>
                            @endif
                        </td>

                    </tr>
                @empty
                    <tr>
                        <td>Maaf, Nomor Room Booking tidak ditemukan.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
    
    <div class="db-cent-3">
        <div class="db-cent-acti">
            <div class="db-title">
                <h3><img src="{{ asset("front/images/icon/review.png") }}" alt=""/> Review Saya</h3>
                <p>Latest reviews submitted by me.</p>
            </div>
            <ul>
                @forelse($room_booking_with_reviews as $room_booking)
                <li>
                    <div class="db-cent-wr-img"> <img src="{{ asset("front/images/users/alt_profile.png") }}" alt=""> </div>
                    <div class="db-cent-wr-con">
                        <h6>Hotel Booking
                            @if($room_booking->status == "cancelled")
                                <span class="label label-danger">Cancelled</span>
                            @elseif($room_booking->status == "checked_in")
                                <span class="label label-primary">Checked In</span>
                            @elseif($room_booking->status == "checked_out")
                                <span class="label label-success">Checked Out</span>
                            @endif
                        </h6>
                        <span class="lr-revi-date">Review Date: {{ \Carbon\Carbon::parse($room_booking->review->updated_at)->format('Y-m-d') }}</span>
                        <br>
                        <span class="lr-revi-date">Rating: {{ $room_booking->review->rating }}/5</span>

                        <p>
                            {{ $room_booking->review->review }}
                        </p>
                        <a href="{{ url('dashboard/room/booking/'.$room_booking->review->id.'/review') }}" class="btn btn-danger btn-sm">Update Review</a>

                    </div>
                </li>
                    @empty
                    Sorry, you have not submitted any reviews yet.
                    @endforelse
            </ul>
        </div>
    </div>
@endsection
