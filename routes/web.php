<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::get('/test','Front\RoomBookingController@rekap_kamar');
// Authentication Routes
Auth::routes();

// Route::post('book-room', 'admin\BookingsController@bookRoom')->name('admin.bookRoom');
Route::get('search-room', 'front\RoomTypeController@searchRoom2')->name('search-room2');
// Route::get('search-room2', 'admin\BookingsController@searchRoom2')->name('admin.searchRoom');
// Social Logins
Route::get('/', 'Front\HomeController@index')->name('home');

// Routes for Front
Route::get('/', 'Front\HomeController@index')->name('home');
Route::get('/contact', 'Front\PageController@contact');
Route::get('/about', 'Front\PageController@about');
Route::post('/subscribe', 'Front\SubscriberController@store');
Route::get('/room_type', 'Front\RoomTypeController@index');
Route::get('/room_type/{id}', 'Front\RoomTypeController@show');
Route::get('/food', 'Front\FoodController@index');
Route::get('/food/{id}', 'Front\FoodController@show');
Route::get('/event', 'Front\EventController@index');
Route::get('/event/{id}', 'Front\EventController@show');
Route::post('/room_type/{id}/book', 'Front\RoomBookingController@book');
Route::post('/event/{id}/book', 'Front\EventBookingController@book');



Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
// Routes for Dashboard
Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function () {
    Route::get('/', 'Dashboard\HomeController@index');
    Route::get('/room/booking', 'Dashboard\RoomBookingController@index');
   
    Route::get('/room/booking/{id}/invoice', 'Dashboard\RoomBookingController@invoice');
    Route::get('/event/booking', 'Dashboard\EventBookingController@index');
    Route::get('room/booking/{id}/cancel', 'Dashboard\RoomBookingController@cancel');
    Route::get('/room/booking/{id}/edit', 'Dashboard\RoomBookingController@edit');
    Route::put('/room/booking/{id}/edit', 'Dashboard\RoomBookingController@update');
    Route::get('event/booking/{id}/cancel', 'Dashboard\EventBookingController@cancel');

    Route::get('profile', 'Dashboard\UserController@edit_profile');
    Route::put('profile', 'Dashboard\UserController@update_profile');

    Route::get('setting', 'Dashboard\UserController@setting');
    Route::put('setting', 'Dashboard\UserController@update_setting');

    Route::get('room/booking/{id}/review', 'Dashboard\ReviewController@create');
    Route::post('room/booking/{id}/review', 'Dashboard\ReviewController@store');
});


// Routes for Admin
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {

    // Route::post('/', "Admin\HomeController@get_tot")->name('get_total');
    Route::post('/', "Admin\HomeController@result")->name('get_result');
    // Route::post('/result', "Admin\HomeController@get_tot")->name('result');

    Route::get('/', 'Admin\HomeController@index');
    Route::resource('slider', 'Admin\SliderController');
    Route::post('/slider/hapus/{id}', 'Admin\SliderController@destroy');
    Route::resource('facility', 'Admin\FacilityController');
    Route::post('/facility/hapus/{id}', 'Admin\FacilityController@destroy');
    Route::resource('event', 'Admin\EventController');
    Route::post('/event/hapus/{id}', 'Admin\EventController@destroy');
    Route::resource('food', 'Admin\FoodController');
    Route::post('/food/hapus/{id}', 'Admin\FoodController@destroy');
    Route::post('/user/hapus/{id}', 'Admin\UserController@destroy');
    Route::get('page', 'Admin\PageController@index');
    Route::get('page/{id}/edit', 'Admin\PageController@edit');
    Route::put('page/{id}', 'Admin\PageController@update');


    // User Routes
    Route::resource('user', 'Admin\UserController');
    Route::get('user/{id}/profile', 'Admin\UserController@profile');
    Route::put('user/{id}/profile', 'Admin\UserController@update_profile');
    Route::get('user/{id}/setting', 'Admin\UserController@setting');
    Route::put('user/{id}/setting', 'Admin\UserController@update_setting');
    Route::post('/user/hapus/{id}', 'Admin\UserController@destroy');


    //Routes for RoomBookings
    Route::delete('room_booking/destroy', 'Admin\RoomBookingController@massDestroy')->name('admin.room_booking.massDestroy');

    Route::get('/room_booking', 'Admin\RoomBookingController@index');
    Route::get('/room_booking/{id}/invoice', 'Admin\RoomBookingController@invoice');
    Route::get('/room_booking/{id}/edit', 'Admin\RoomBookingController@edit')->name('admin.room_booking.edit');
    Route::put('/room_booking/{id}/edit', 'Admin\RoomBookingController@update');
    Route::post('/room_booking/hapus/{id}', 'Admin\RoomBookingController@destroy');

    Route::get('/system-calendar', 'admin\SystemCalendarController@index')->name('systemCalendar');
    Route::get('/search-room', 'front\RoomTypeController@view_searchRoom')->name('admin.searchRoom');


    //Routes for EventBookings
    Route::get('/event_booking', 'Admin\EventBookingController@index');
    Route::get('/event_booking/{id}/edit', 'Admin\EventBookingController@edit');
    Route::put('/event_booking/{id}/edit', 'Admin\EventBookingController@update');


    Route::get('/review', 'Admin\ReviewController@index');
    Route::get('/review/{id}/approve', 'Admin\ReviewController@approve');
    Route::get('/review/{id}/reject', 'Admin\ReviewController@reject');

    Route::resource('room_type', 'Admin\RoomTypeController');
    // Route for room types
    Route::group(['prefix' => 'room_type', 'middleware' => 'auth'], function(){
        // Rutes for Room Type Images
        Route::post('/hapus/{id}', 'Admin\RoomTypeController@destroy');
        Route::get('/{id}/image', 'Admin\ImageController@index');
        Route::get('/{id}/image/create', 'Admin\ImageController@create');
        Route::post('/{id}/image', 'Admin\ImageController@store');
        Route::get('/{id}/image/{image_id}/edit', 'Admin\ImageController@edit');
        Route::put('/{id}/image/{image_id}/edit', 'Admin\ImageController@update');
        Route::get('/{id}/image/create_multiple', 'Admin\ImageController@create_multiple');
        Route::post('/{id}/image/create_multiple', 'Admin\ImageController@store_multiple');
        Route::post('/{id}/image/hapus/{image_id}', 'Admin\ImageController@destroy');

        // Routes for Rooms
        Route::post('/{id}/room/{room_id}/hapus', 'Admin\RoomController@destroy');
        Route::get('/{id}/room', 'Admin\RoomController@index');
        Route::get('/{id}/room/create', 'Admin\RoomController@create');
        Route::post('/{id}/room', 'Admin\RoomController@store');
        Route::get('/{id}/room/{room_id}/edit', 'Admin\RoomController@edit');
        Route::put('/{id}/room/{room_id}/edit', 'Admin\RoomController@update');
        Route::delete('/{id}/room/{image_id}', 'Admin\RoomController@destroy');

    });
});



