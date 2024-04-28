@extends('layouts.dashboard')

@section('content')

    <div class="db-cent-3" >
        <div class="db-cent-table db-com-table" style="padding-bottom:20px">
            <div class="db-title">
                <h3><img src="{{ asset("front/images/icon/dbc5.png") }}" alt=""/> My Room Bookings</h3>
                <p>View all of your hotel room bookings here.</p>
                <p>Lakukan pembayaran maksimal 2 jam setelah waktu booking terimakasih.</p>
            </div>
            <div class="db-title">
                @foreach ($errors->all() as $error)
                    <p style="color:red">{{ $error }}</p>
                @endforeach

                    @if(Session::has('flash_message'))
                        <p style="color:forestgreen">{{ Session::get('flash_title') }}, {{ Session::get('flash_message') }}</p>
                    @endif
            </div>
            <table class="bordered responsive-table" >
                <thead >
                <tr>
                    <th><br>Waktu Booking</th>
                    <th><br>Tipe</th>
                    <th><br>Check in</th>
                    <th><br>Check out</th>
                    <th><br>Total Harga</th>
                    <th><br>Status</th>
                    <th><br>Pembayaran</th>
                    <th style="text-align:center"><br>Aksi</th>
                </tr>
                </thead>
                <tbody >
                @forelse($room_bookings as $index => $room_booking)
                <tr style=>
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
                        @if($room_booking->payment == 2)
                            <span class="db-success">Uploaded</span>
                        @elseif($room_booking->payment == 1)
                        <a rel="tooltip" title="Invoice"
                        class=" db-success " style="background-color:#C5C20B"
                        href="{{url('dashboard/room/booking/'.$room_booking->id.'/invoice')}}">
                         Invoice</a>
                            <span class="db-success">Paid</span>
                        @else
                            <span class="db-not-success">Not Paid</span>
                        @endif

                    </td>
                    <td>@if($room_booking->status !== "pending")
                        <a href="{{url('dashboard/room/booking/'.$room_booking->id.'/review')}}"><span class="label label-primary">Review</span></a>
                        @endif
                        @if($room_booking->status !== "cancelled")
                        
                                                        <a rel="tooltip" title="Edit"
                                                           class="label label-primary"
                                                           href="{{url('dashboard/room/booking/'.$room_booking->id.'/edit')}}">
                                                            <i>Upload</i>
                                                        </a>
                            <a href="{{url('dashboard/room/booking/'.$room_booking->id.'/cancel')}}" onclick="return confirm('Are you sure?')"><span class="label label-danger">Cancel</span></a>
                        @endif
                    </td>

                </tr>
                    @empty
                    <tr>
                        <td>Sorry, no bookings found.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        {{ $room_bookings->links() }}
    </div>
@endsection
