<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Model;

class CartPackage extends Model {

    public $table = "cartpackages";
    public $timestamps = false;
    public $fillable = [
        "package_id",
        "cart_id",
        "qty"
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "package_id" => "integer",
        "cart_id" => "integer",
        "qty" => "integer"
    ];

    public function cart() {
        return $this->belongsTo('App\Cart');
    }

}
