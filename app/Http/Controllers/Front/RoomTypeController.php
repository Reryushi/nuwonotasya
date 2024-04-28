<?php

namespace App\Http\Controllers\Front;

use App\Model\RoomType;
use App\Model\Room;
use App\Model\RoomBooking;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEventRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


class RoomTypeController extends FrontController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::all();
        // $room_types = RoomType::whereHas('images', function ($query){
        //     $query->where('is_primary', true);
        // })->with([
        //     'images' => function($query){
        //     $query->where('is_primary', true)->where('status', true);
        // },
        //     'facilities' => function($query){
        //         $query->where('status', true);
        // }
        // ])
        //     ->where('status', 1)
        //     ->orderBy('id', 'asc')
        //     ->get();
        $room_types = RoomType::whereHas('facilities', function ($query){
            $query->where('status', true);
        })
        ->where('status', 1)
        ->orderBy('id', 'asc')
            ->get();
        //dd($room_types);

        return view('front.room_type.index')->with([
            'room_types' => $room_types,
            'rooms' => $rooms
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $room_type = RoomType::with([
            'images' => function($clientQuery) {
                $clientQuery->where('status', true);
        },
            'rooms.reviews' => function($clientQuery) {
                $clientQuery->where('approval_status', 'approved');
            }
        ])
            ->where('status', true)
            ->findOrFail($id);


        //dd($room_type->getAggregatedRating());
        return view('front.room_type.profile')
            ->with([
                'room_type' => $room_type,
            ]);
    }

    public function view_searchRoom()
    {
        return view('front.bookings.search2');
    }

    public function searchRoom2(Request $request)
    {
        $rooms = null;
        if($request->filled(['start_time', 'end_time',])) {
            $times = [
               $startTime  = Carbon::parse($request->input('start_time')),
               $finishTime = Carbon::parse($request->input('end_time')),
            ];
         
        $rooms_vip = Room::where('capacity', 'VIP')
             ->whereDoesntHave('room_bookings', function ($query) use ($times) {
                 $query->whereBetween('start_time', $times)
                     ->orWhereBetween('end_time', $times)
                     ->orWhere(function ($query) use ($times) {
                         $query->where('start_time', '<', $times[0])
                             ->where('end_time', '>', $times[1]);
                     });
             })
             ->count();

        $rooms_dlx = Room::where('capacity', 'DELUXE')
             ->whereDoesntHave('room_bookings', function ($query) use ($times) {
                 $query->whereBetween('start_time', $times)
                     ->orWhereBetween('end_time', $times)
                     ->orWhere(function ($query) use ($times) {
                         $query->where('start_time', '<', $times[0])
                             ->where('end_time', '>', $times[1]);
                     });
             })
             ->count();

        $rooms_std = Room::where('capacity', 'STANDAR')
             ->whereDoesntHave('room_bookings', function ($query) use ($times) {
                 $query->whereBetween('start_time', $times)
                     ->orWhereBetween('end_time', $times)
                     ->orWhere(function ($query) use ($times) {
                         $query->where('start_time', '<', $times[0])
                             ->where('end_time', '>', $times[1]);
                     });
             })
             ->count();
            
            }
        // return  "Available : ".$rooms;
        return view('front.bookings.search')->with([
            
            'rooms_vip' => $rooms_vip,
            'rooms_dlx' => $rooms_dlx,
            'rooms_std' => $rooms_std,
            
        ]);
    }
}
