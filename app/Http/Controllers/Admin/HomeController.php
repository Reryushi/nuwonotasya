<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Model\RoomBooking;

class HomeController extends AdminController
{
    //
    public function __construct()
    {
        parent::__construct();
        RoomBooking::where('payment', '0')
                        ->where('created_at', '<=', Carbon::now()->subMinutes(120   )->toDateTimeString())->delete();
                    RoomBooking::where('status', 'pending')
                        ->where('payment', '2')
                        ->where('created_at', '<=', Carbon::now()->subMinutes(240)->toDateTimeString())->delete();
                        RoomBooking::where('status', 'cancelled')->delete();
        
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $monthly_report_cost = RoomBooking::where('payment', 1)->where('status', '!=', 'pending')->where('status', '!=', 'cancelled')->whereMonth('start_time', date('m'))->sum('room_cost');
        $monthly_report_room = RoomBooking::where('payment', 1)->where('status', '!=', 'pending')->where('status', '!=', 'cancelled')->whereMonth('start_time', date('m'))->count();
        
        $result = '-1';
        $result_cost = '-1';
        
        $result_day = "-1";
        $result_cost_day = '-1';
        return view('admin.home')
        ->with('monthly_report_cost', $monthly_report_cost)
        ->with('monthly_report_room', $monthly_report_room)
        ->with('result', $result)
        ->with('result_cost', $result_cost)
        ->with('result_day', $result_day)
        ->with('result_cost_day', $result_cost_day);
        
    }

    public function result(Request $request)
    {
        
        $monthly_report_cost = RoomBooking::where('payment', 1)->where('status', '!=', 'pending')->where('status', '!=', 'cancelled')->whereMonth('start_time', date('m'))->sum('room_cost');
        $monthly_report_room = RoomBooking::where('payment', 1)->where('status', '!=', 'pending')->where('status', '!=', 'cancelled')->whereMonth('start_time', date('m'))->count();
        $dates =  $request->input('pesanan');
        $name_of_date = Carbon::parse($dates)->format('F');

        $date_day =  $request->input('pesan');
        $name_of_day = Carbon::parse($date_day)->format('d');

        //Filter dengan bulan
        if ($request->has('pesanan')) {
            $result = RoomBooking::where('payment', 1)->where('status', '!=', 'pending')->where('status', '!=', 'cancelled')->whereMonth('start_time', Carbon::parse($dates)->format('m'))->count();
         }
        else {
            $result = '-1';
        }

        if ($request->has('pesanan')) {        
            $result_cost = RoomBooking::where('payment', 1)->where('status', '!=', 'pending')->where('status', '!=', 'cancelled')->whereMonth('start_time', Carbon::parse($dates)->format('m'))->sum('room_cost');
        }
        else {
            $result_cost = '-1';
        }

        //Filter dengan hari
        if ($request->has('pesan')) {
            $result_day = RoomBooking::where('payment', 1)->where('status', '!=', 'pending')->where('status', '!=', 'cancelled')->whereDay('start_time', Carbon::parse($date_day)->format('d'))->count();
         }
        else {
            $result_day = '-1';
        }

        if ($request->has('pesan')) {        
            $result_cost_day = RoomBooking::where('payment', 1)->where('status', '!=', 'pending')->where('status', '!=', 'cancelled')->whereDay('start_time', Carbon::parse($date_day)->format('d'))->sum('room_cost');
        }
        else {
            $result_cost_day = '-1';
        }

        return view('admin.home')
        ->with('monthly_report_cost', $monthly_report_cost)
        ->with('monthly_report_room', $monthly_report_room)
        ->with('result', $result)
        ->with('result_cost', $result_cost)
        ->with('name_of_date', $name_of_date)
        ->with('name_of_day', $name_of_day)
        ->with('result_day', $result_day)
        ->with('result_cost_day', $result_cost_day);
        
    }

    public function login()
{
    return view('admin.login');
}
}
