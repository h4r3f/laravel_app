<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Model;
use App\Customer;
use App\Cartitem;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\CartPackage;

class Cart extends Model {

    public $table = "carts";
    public $fillable = [
        "customer_id",
        "address",
        "price"
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "customer_id" => "integer",
        "address" => "string",
        "price" => "integer"
    ];
    public static $rules = [
        "address" => "required",
        "price" => "required"
    ];

    public function customer() {
        return $this->belongsTo('App\Customer');
    }

    public function cartitems() {
        return $this->hasMany('App\Cartitem');
    }

    public function cartpackages() {
        return $this->hasMany('App\CartPackage');
    }

    public static function applyCupon($offer, $input) {
        $type = $offer->type;
        $cuponval = $offer->price;

        if ($input['price'] >= $offer->minimum) {
            if ($type == 'Percentage') {
                $input['price'] = $input['price'] * ((100 - $cuponval) / 100);
            } else {
                $input['price'] = $input['price'] - $cuponval;
            }
            return $input['price'];
        } else {
            return 'false';
        }
    }

    public static function addCartValue($input) {
        $customer = Customer::create(
                        [
                            'name' => $input['name'],
                            'address' => $input['address'],
                            'email' => $input['email'],
                            'phone' => $input['phone']
                        ]
        );

        $cart = Cart::create([
                    'customer_id' => $customer->id,
                    'address' => $input['address'],
                    'price' => $input['price']
        ]);
        if (!empty($input['food_ids'])) {
            foreach ($input['food_ids'] as $food) {
                    CartItem::create([
                    'cart_id' => $cart->id,
                    'food_id' => $food['id'],
                     'qty' => $food['qty']
                ]);
            }
       
        }
        if (!empty($input['package_ids'])) {
            foreach ($input['package_ids'] as $package) {
                CartPackage::create([
                    'cart_id' => $cart->id,
                    'package_id' => $package['id'],
                    'qty' => $package['qty']
                ]);
            }
        }

        return 'Ok';
    }

    public static function mailSend($input) {

        $data = array();
        $data[0] = $input['name'];
        $data[1] = $input['address'];
        $data[2] = $input['price'];
        $data[3] = DB::table('settings')->first()->image;
        $data[4] = DB::table('settings')->first()->address;
        $data[5] = DB::table('settings')->first()->timmings;
        $data[6] = DB::table('settings')->first()->phone;
        $data[7] = DB::table('settings')->first()->email;
        $data[8] = DB::table('settings')->first()->website;
        $data[9] = DB::table('settings')->first()->name;
        $data[10]=$input['food_ids'];
        $data[11]=$input['package_ids'];
        $data[12]=DB::table('settings')->first()->currencytype;
       
        $to = $input['email'];
        $from = DB::table('settings')->first()->email;
        Mail::send('mail.cart', array('data' => $data), function ($message) use( $to, $from) {
            $message->from($from, 'Cart Confirmation');
            $message->subject('Cart Confirmation');
            $message->to($to);
        });
    }
    
    public static function mailAdminSend($input) {

        $data = array();
        $data[0] = $input['name'];
        $data[1] = $input['address'];
        $data[2] = $input['price'];
        $data[3] = DB::table('settings')->first()->image;
        $data[4] = DB::table('settings')->first()->address;
        $data[5] = DB::table('settings')->first()->timmings;
        $data[6] = DB::table('settings')->first()->phone;
        $data[7] = DB::table('settings')->first()->email;
        $data[8] = DB::table('settings')->first()->website;
        $data[9] = DB::table('settings')->first()->name;
        $data[10]=$input['food_ids'];
        $data[11]=$input['package_ids'];
        $data[12]=DB::table('settings')->first()->currencytype;
       
        $to = $input['email'];
        $from = DB::table('settings')->first()->email;
        Mail::send('mail.admincart', array('data' => $data), function ($message) use( $to, $from) {
            $message->from($to, 'Cart Confirmation');
            $message->subject('Cart Confirmation');
            $message->to($from);
        });
    }

}
