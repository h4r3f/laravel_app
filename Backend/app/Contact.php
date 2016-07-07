<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Model;

class Contact extends Model {

    public $table = "contacts";
    public $fillable = [
        "name",
        "email",
        "phone",
        "message"
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
        "message" => "string"
    ];
    public static $rules = [
        "name" => "required",
        "email" => "required",
        "message" => "required"
    ];

}
