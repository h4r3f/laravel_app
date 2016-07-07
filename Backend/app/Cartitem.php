<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Model;

class Cartitem extends Model {

    public $table = "cartitems";
    public $timestamps=false;
    public $fillable = [

        "food_id",
        "cart_id",
        "qty"
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "food_id" => "integer",
        "cart_id" => "integer",
        "qty" => "integer"
    ];
    public static $rules = [
        "cart_id" => "required",
        "food_id" => "required",
        "qty" => "required"
    ];

    public function cart() {
        return $this->belongsTo('App\Cart');
    }

}
