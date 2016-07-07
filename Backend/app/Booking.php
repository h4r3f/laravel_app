<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class Booking extends Model {

    public $table = "bookings";
    public $fillable = [
        "name",
        "email",
        "phone",
        "booking_date",
        "booking_time",
        "confirmed",
        "persons"
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "name" => "string",
        "email" => "string",
        "phone" => "string",
        "booking_time" => "string",
        "confirmed" => "string",
        "persons" => "integer"
    ];
    public static $rules = [
        "name" => "required",
        "email" => "required",
        "phone" => "required",
        "booking_date" => "required",
        "booking_time" => "required",
        "confirmed" => "required",
        "persons" => "required"
    ];

    public static function sendMail($booking) {

        $data = array();
        $data[0] = $booking->booking_date;
        $data[1] = $booking->booking_time;
        $data[2] = $booking->persons;
        $data[3] = $booking->name;
        $data[4] = DB::table('settings')->first()->image;
        $data[5] = DB::table('settings')->first()->address;
        $data[6] = DB::table('settings')->first()->timmings;
        $data[7] = DB::table('settings')->first()->phone;
        $data[8] = DB::table('settings')->first()->email;
        $data[9] = DB::table('settings')->first()->website;
        $data[10] = DB::table('settings')->first()->name;
        $data[11] = $booking->email;
        $data[12] = $booking->phone;
        $to = $booking->email;
        $from = DB::table('settings')->first()->email;
        Mail::send('mail.booking', array('data' => $data), function ($message) use( $to, $from) {
            $message->from($from, 'Booking Confirmation');
            $message->subject('Booking Confirmation');
            $message->to($to);
        });
    }
    
        public static function sendAdminMail($booking) {

        $data = array();
        $data[0] = $booking->booking_date;
        $data[1] = $booking->booking_time;
        $data[2] = $booking->persons;
        $data[3] = $booking->name;
        $data[4] = DB::table('settings')->first()->image;
        $data[5] = DB::table('settings')->first()->address;
        $data[6] = DB::table('settings')->first()->timmings;
        $data[7] = DB::table('settings')->first()->phone;
        $data[8] = DB::table('settings')->first()->email;
        $data[9] = DB::table('settings')->first()->website;
        $data[10] = DB::table('settings')->first()->name;
        $data[11] = $booking->email;
        $data[12] = $booking->phone;
        $to = $booking->email;
        $from = DB::table('settings')->first()->email;
       
         Mail::send('mail.confirm', array('data' => $data), function ($message) use( $to, $from) {
            $message->from($to, 'Booking Request');
            $message->subject('Booking Request');
            $message->to($from);
        });
        
    }

}
