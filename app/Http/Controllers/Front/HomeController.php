<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Front\FrontController;
use App\Model\Event;
use App\Model\Food;
use App\Model\Review;
use Illuminate\Http\Request;
use App\Model\Slider;
use App\Model\Image;
use App\Model\RoomType;
use App\Model\Room;
use App\Model\RoomBooking;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEventRequest;
use Carbon\Carbon;

class HomeController extends FrontController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        RoomBooking::where('payment', '0')
                        ->where('created_at', '<=', Carbon::now()->subMinutes(120)->toDateTimeString())->delete();
        
        RoomBooking::where('status', 'cancelled')->delete();
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // Card Ketersediaan room
        $times = [
            $startTime  = Carbon::now(),
            $finishTime = Carbon::tomorrow(),
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

        $slider_images = Slider::get();
        $photo = Image::get();
        $room_types = RoomType::whereHas('images', function ($query){
           $query->where('is_primary', true);
        })->with([
            'images' => function($query){
            $query->where('is_primary', true);
        }])
            
            ->orderBy('id', 'asc')
            ->get();

        $events = Event::where('status', 1)
            ->orderBy('date', 'desc')
            // ->limit('4')
            ->get();

        $foods = Food::get();
        
        
        $reviews = Review::where('approval_status', "approved")
            ->orderBy('updated_at', 'desc')
            ->limit('4')
            ->get();
        // $slider_images = Slider::where('status', 1)->get();
        // $photo = Image::where('status', 1)->get();
        // $room_types = RoomType::whereHas('images', function ($query){
        //    $query->where('is_primary', true);
        // })->with([
        //     'images' => function($query){
        //     $query->where('is_primary', true)->where('status', true);
        // },
        //     'rooms' => function($query){
        //         $query->where('status', true);
        //     }])
        //     ->where('status', 1)
        //     ->orderBy('id', 'asc')
        //     ->get();

        // $events = Event::where('status', 1)
        //     ->orderBy('date', 'desc')
        //     ->limit('4')
        //     ->get();

        // $foods = Food::where('status', 1)->get();
        
        
        // $reviews = Review::where('approval_status', "approved")
        //     ->orderBy('updated_at', 'desc')
        //     ->limit('4')
        //     ->get();

        
        return view('front.home')->with([
            
            'rooms_vip' => $rooms_vip,
            'rooms_dlx' => $rooms_dlx,
            'rooms_std' => $rooms_std,
            'slider_images' => $slider_images,
            'photo' => $photo,
            'room_types' => $room_types,
            'events' => $events,
            'foods' => $foods,
            'reviews' => $reviews,
        ]);
    }

}
