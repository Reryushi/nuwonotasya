<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Room;
use App\Model\User;
use App\Model\RoomBooking;


use Carbon\Carbon;
use Illuminate\Http\Request;

class SystemCalendarController extends AdminController
{
    public $sources = [
        [
            'model'      => '\\App\\Model\\RoomBooking',
            'date_field' => 'start_time',
            'field'      => 'title',
            'prefix'     => '',
            'suffix'     => '',
            'route'      => 'admin.room_booking.edit',
        ],
    ];

    public function index(Request $request)
    {
        $events = [];
        $rooms = Room::all()->pluck('room_number', 'id')->prepend(trans('global.pleaseSelect'), '');
        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $room_bookings = RoomBooking::all()->pluck('start_time', 'id')->prepend(trans('global.pleaseSelect'), '');

        foreach ($this->sources as $source) {
            $models = $source['model']::when($request->input('room_id'), function ($query) use ($request) {
                    $query->where('room_id', $request->input('room_id'));
                })
            // $models = $source['model']::when($request->input('start_time'), function ($query) use ($request) {
            //     $query->where('start_time', $request->input('start_time'));
            //     })
                ->when($request->input('user_id'), function ($query) use ($request) {
                    $query->where('user_id', $request->input('user_id'));
                })
                ->get();
            foreach ($models as $model) {
                $crudFieldValue = $model->getOriginal($source['date_field']);

                if (!$crudFieldValue) {
                    continue;
                }

                $events[] = [
                    'title' => trim($source['prefix'] . "" . $model->{$source['field']}
                        . " " . $source['suffix']),
                    'start' => $crudFieldValue,
                    'url'   => route($source['route'], $model->id),
                ];
            }

        }

        return view('admin.calendar.calendar', compact('events', 'rooms', 'users', 'room_bookings'));

    }

}
