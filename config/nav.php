<?php

return [

    /*
    |--------------------------------------------------------------------------
    | View Storage Paths
    |--------------------------------------------------------------------------
    |
    | Most templating systems load templates from disk. Here you may specify
    | an array of paths that should be checked for your views. Of course
    | the usual Laravel view path has already been registered for you.
    |
    */

    'admin' => [
        'booking' => [
            'name' =>  'Pesanan',
            'actions' => [
                'room_booking' => 'admin/room_booking',
                'event_booking' =>  'admin/event_booking'
            ],
            'icon' => 'ti-control-forward'
        ],
        'system_calendar' => [
            'name' => 'Kalender',
            'actions' => [
                'view' => 'admin/system-calendar',
            ],
            'icon' => 'ti-notepad'
        ],
        'search_room' => [
            'name' => 'Cari Kamar',
            'actions' => [
                'view' => 'admin/search-room',
            ],
            'icon' => 'ti-search'
        ],
        // 'Event' => [
        //     'name' => 'Acara',
        //     'actions' => [
        //         'view' => 'admin/event',
        //     ],
        //     'icon' => 'ti-ticket'
        // ],
        'room_type' => [
            'name' => 'Tipe Kamar',
            'actions' => [
                'view' => 'admin/room_type',
            ],
            'icon' => 'ti-home'
        ],
        'user' => [
            'name' => 'Member',
            'actions' => [
                'view' => 'admin/user',
            ],
            'icon' => 'ti-user'
        ],
        'Review' => [
            'name' => 'Review',
            'actions' => [
                'view' => 'admin/review',
            ],
            'icon' => 'ti-star'
        ],
        'slider' => [
            'name' => 'Slider',
            'actions' => [
                'view' => 'admin/slider',
            ],
            'icon' => 'ti-layout-grid2'
        ],  
        'food' => [
            'name' => 'Menu Makanan',
            'actions' => [
                'view' => 'admin/food',
            ],
            'icon' => 'ti-pencil-alt'
        ],
        'facility' => [
            'name' => 'Fasilitas',
            'actions' => [
                'view' => 'admin/facility',
            ],
            'icon' => 'ti-crown'
        ],
       
        // 'Page' => [
        //     'name' => 'Page',
        //     'actions' => [
        //         'view' => 'admin/page',
        //     ],
        //     'icon' => 'ti-star'
        // ],
    ],

];
