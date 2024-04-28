<?php

namespace App\Algo;

use Carbon\Carbon;

class Booking
{
    protected $room_type;
    protected $new_start_time;
    protected $new_end_time;
    protected $message;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($room_type, $new_start_time, $new_end_time)
    {
        $this->room_type = $room_type;
        $this->new_start_time = $new_start_time;
        $this->new_end_time = $new_end_time;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string $attribute
     * @param  mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return $this->room_available();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Sorry, no rooms are available in the given dates. Please try another date.';
    }

    public function room_available()
    {
        $this->rooms_exist();
        foreach ($this->room_type->rooms as $room) {

            if ($this->room_bookings_exist($room)) {
                if($this->room_bookings_check($room->room_bookings) == false)
                    continue;
            }

            return true;
        }
    }

    public function available_room_number()
    {
        $this->rooms_exist();
        foreach ($this->room_type->rooms as $room) {

            if ($this->room_bookings_exist($room)) {
                if($this->room_bookings_check($room->room_bookings) == false)
                    continue;
            }
            return $room->room_number;
        }
    }

    protected function rooms_exist()
    {
        if (count($this->room_type->rooms) > 0) {
            return true;
        }
        $this->message = "Sorry, there are no room of given type available.";
        return false;
    }

    protected function room_bookings_exist($room)
    {
        if (count($room->room_bookings) > 0) {
            return true;
        }
    }

    protected function room_bookings_check($room_bookings)
    {
        foreach ($room_bookings as $room_booking) {
            $old_start_time = Carbon::parse($room_booking->start_time)->format('Y/m/d');
            $old_end_time = Carbon::parse($room_booking->end_time)->format('Y/m/d');
            if ($this->new_start_time < $old_start_time) {
                if ($this->new_end_time > $old_start_time)
                    return false;
            } elseif ($this->new_start_time > $old_start_time) {
                if ($this->new_start_time < $old_end_time) {
                    return false;
                }
            } elseif ($this->new_start_time == $old_start_time) {
                return false;
            }
        }
        return true;
    }
}
