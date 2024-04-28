<?php

namespace App\Http\Controllers\Admin;

use App\Model\RoomBooking;

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RoomBookingController extends AdminController
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $room_bookings = RoomBooking::all();
        return view('admin.room_booking.view')
            ->with('room_bookings', $room_bookings);
    }

    public function invoice($id)
    {
        $room_booking = RoomBooking::find($id);
        return view('admin.room_booking.invoice')
            ->with('room_booking', $room_booking);
    }

    public function edit($id)
    {
        $room_booking = RoomBooking::find($id);
        return view('admin.room_booking.edit')->with('room_booking', $room_booking);
    }

    public function update(Request $request, $id)
    {
        $room_booking = RoomBooking::findOrFail($id);

        $rules = [
            'status' => 'in:pending,checked_in,checked_out,cancelled',
            'payment' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return redirect()->back()
                ->withInput($request->all())
                ->withErrors($validator);
        }

        $room_booking->status = $request->input('status');
        $room_booking->payment = $request->input('payment');
        $room_booking->room_cost = $request->input('room_cost');
        $room_booking->update();

        Session::flash('flash_title', 'Success');
        Session::flash('flash_message', 'The Room Booking has been updated successfully.');
        return redirect('/admin/room_booking');
    }

    public function destroy($id)
    {
        $room_booking = RoomBooking::findOrFail($id);
        $room_booking->delete();

        Session::flash('flash_title', 'Success');
        Session::flash('flash_message', 'Pemesanan Kamar berhasil di hapus.');
        return redirect('admin/room_booking');

    }

    public function massDestroy(Request $request)
    {
        RoomBooking::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }

}
