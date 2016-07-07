<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Model;
use App\Cartitem;

class Customer extends Model {

    public $table = "customers";
    public $fillable = [
        "name",
        "address",
        "email",
        "phone"
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "name" => "string",
        "address" => "string",
        "email" => "string",
        "phone" => "integer"
    ];
    public static $rules = [
        "name" => "required",
        "address" => "required",
        "email" => "required",
        "phone" => "required"
    ];

    public function carts() {
        return $this->hasMany('App\Cart');
    }

    public static function deleteItems($customer) {
        foreach ($customer->carts as $cart) {
            $cartitems = Cartitem::where('cart_id', $cart->id)->get();
            foreach ($cartitems as $cartitem) {
                $cartitem->delete();
            }
            $cart->delete();
        }
        return 'ok';
    }

}
