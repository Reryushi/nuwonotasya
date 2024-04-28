<?php

namespace App\Http\Controllers\Front;

use App\Algo\Booking;
use App\Model\RoomBooking;
use App\Model\Room;
use App\Model\RoomType;
use App\Rules\RoomAvailableRule;
use App\Model\Rekap;


use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEventRequest;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Mail;
use App\Mail\RoomBooked;
use App\Services\EventService;



class RoomBookingController extends FrontController
{
    public function book(Request $request, $room_type_id)
    {
        //check here if the user is authenticated
        if (!Auth::check()) {
            return Redirect::to("/login");
        }

        $rules = [
            'start_time' => 'required|date|date_format:Y/m/d|after_or_equal:today',
            'end_time' => 'required|date|date_format:Y/m/d|after:'.$request->input('start_time'),
        ];

        $room_type = RoomType::findOrFail($room_type_id);
        $new_start_time = $request->input('start_time');
        $new_end_time = $request->input('end_time'); 
        $new_extra_bed = $request->input('extra_bed');
        $rules['booking_validation'] = [new RoomAvailableRule($room_type, $new_start_time, $new_end_time)];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return redirect()->back()
                ->withInput($request->all())
                ->withErrors($validator);
        }

        $room_booking = new RoomBooking();
        $user = Auth::user();

        $room_booking->start_time = $request->input('start_time');
        $room_booking->end_time = $request->input('end_time');
        $room_booking->extra_bed = $request->input('extra_bed');
        /**
         * Find total cost by counting number of days and multiplying it with cost of rooms.
         */
        $startTime = Carbon::parse($room_booking->start_time);
        $finishTime = Carbon::parse($room_booking->end_time);
        $no_of_days = $finishTime->diffInDays($startTime) ? $finishTime->diffInDays($startTime) : 1;
        if ($new_extra_bed == '2'){
            $extra_cost = '100000';
        }
        elseif ($new_extra_bed == '1'){
            $extra_cost ='50000';
        }
        else {
            $extra_cost ='0';
        };
        $room_booking->room_cost = $no_of_days * $room_type->finalPrice + $extra_cost;
        $room_booking->user_id = $user->id;
        /**
         * Select random room for booking of given room type
         */

        $booking = new Booking($room_type, $new_start_time, $new_end_time);
        //dd($booking->available_room_number());
        $room_booking->room_id = $booking->available_room_number();
        $room_booking->user_id = $user->id;
        $room_booking->title = $room_type->name;
        $room_booking->save();

        // $this->send_email(Auth::user()->email);
        

        Session::flash('flash_title', "Success");
        Session::flash('flash_message', "Upload Bukti Pembayaran maksimal 2 jam setelah waktu booking. Jika tidak pesanan akan dicancel otomatis.");
        return redirect('/dashboard/room/booking');

    }

    private function send_email($email){
        if(empty($email)){
            $email = Auth::user()->email;
        }
        Mail::to($email)->send(new RoomBooked());
    }
    // public function jumlah_kamar(){
    //     $avail_all = Room::where('available',1)->count();
    //     $avail_vip = Room::where('available',1)->where('room_type_id','1')->count();
    //     $avail_dlx = Room::where('available',1)->where('room_type_id','2')->count();
    //     $avail_std = Room::where('available',1)->where('room_type_id','3')->count();
    //     $not_avail = Room::where('available',0)->count();
    //     // return json_encode($room);
    //     return  "Available : ".$avail_all.
    //             "<br>Not Available : ".$not_avail.
    //             "<br>VIP Available : ".$avail_vip.
    //             "<br>Deluxe Available : ".$avail_dlx.
    //             "<br>Standar Available : ".$avail_std;}

    // public function rekap_kamar(){
    //     $rekaptipe = Rekap::where('room_type_id')->get();
    //     $rekapjumlah = Rekap::select('jumlah')->get();
    //     // return json_encode($rekap);
    //     return  "Tipe Kamar : ".$rekaptipe.
    //             "<br>Jumlah : ".$rekapjumlah;
    // }
}
