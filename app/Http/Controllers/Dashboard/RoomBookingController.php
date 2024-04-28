<?php

namespace App\Http\Controllers\Dashboard;

use App\Model\RoomBooking;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RoomBookingController extends DashboardController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $room_bookings = RoomBooking::with('room')
            ->where('user_id', Auth::user()->id)
            ->paginate(10);

        return view('dashboard.booking.room_booking')->with([
            'room_bookings' => $room_bookings
        ]);
    }

    public function invoice($id)
    {
        $room_booking = RoomBooking::find($id);
        return view('dashboard.booking.invoice')
            ->with('room_booking', $room_booking);
    }

    public function update($room_booking_id, Request $request)
    {
        
        if ($request->hasFile('bukti')) {
            $rules['bukti'] = 'mimes:jpeg,jpg,png';
        }
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withInput($request->all)
                ->withErrors($validator);
        } else {

            
            $room_booking = RoomBooking::find($room_booking_id);
            if ($request->has('bukti')) {
                $file = $request->file('bukti');
                $fileName = $file->getClientOriginalName();
                $file->move('front/images/pembayaran/', $fileName);
                $room_booking->bukti = $fileName;
                $room_booking->payment ='2';
            }
            
            $room_booking->save();

            Session::flash('flash_title', "Success");
            Session::flash('flash_message', "Pembayaran berhasil di upload. Silahkan tunggu verifikasi dari admin, atau langsung datang ke penginapan terimakasih.");

            return redirect('/dashboard/room/booking');
        }
    }

    public function edit($id)
    {
        $room_booking = RoomBooking::find($id);
        return view('dashboard.booking.edit')->with('room_booking', $room_booking);
    }

    public function cancel($id)
    {
        $room_booking = RoomBooking::findOrFail($id);


        // If the payment is already made
        if($room_booking->payment == true){
            return back()->withErrors('Sorry, you cannot cancel booking which has been already paid. Please, contact hotel staff.');
        }

        // If the user is already checked_in
        if($room_booking->status == "checked_in"){
            return back()->withErrors('Sorry, you cannot cancel booking which is already checked in without staff permission. Please, contact hotel staff.');
        }
        if($room_booking->status == "checked_out"){
            return back()->withErrors('Sorry, you cannot cancel booking which is already checked out without staff permission. Please, contact hotel staff.');
        }
        if($room_booking->status == "cancelled"){
            return back()->withErrors('Sorry, you cannot cancel booking which is already cancelled. Please, contact hotel staff.');
        }

        $room_booking->status = "cancelled";
        $room_booking->save();

        Session::flash('flash_title', 'Success');
        Session::flash('flash_message', 'The room booking has been cancelled successfully.');
        return redirect('dashboard/room/booking');
    }

}
