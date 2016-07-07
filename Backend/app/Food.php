<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Model;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Illuminate\Support\Facades\Request;

class Food extends Model {

    public $table = "foods";
    public $fillable = [
        "name",
        "details",
        "image",
        "price",
        "special",
        "activate",
        "type",
        "slider",
        "thumbnail",
        "cooking_type"
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "name" => "string",
        "details" => "string",
        "image" => "string",
        "price" => "integer",
        "special" => "string",
        "activate" => "string",
        "type" => "string",
        "slider" => "string",
        "thumbnail" => "string",
        "cooking_type" => "string"
    ];
    public static $rules = [
        "name" => "required",
        "image" => "mimes:jpeg,bmp,png",
        "price" => "required",
        "activate" => "required",
        "slider" => "required",
        "thumbnail" => "mimes:jpeg,bmp,png"
    ];

    public function packages() {
        return $this->belongsToMany('App\Package');
    }

    public function categories() {
        return $this->belongsToMany('App\Category');
    }

    public static function moveFile(UploadedFile $file) {
        if (!file_exists(public_path() . '/images/foods')) {
            mkdir(public_path() . '/images/foods', 0777, true);
        }

        $imagename = time() . $file->getClientOriginalName();
        $file->move('images/foods', $imagename);
        return $imagename;
    }

    public static function moveThumbnailFile(UploadedFile $file) {
        if (!file_exists(public_path() . '/images/foods')) {
            mkdir(public_path() . '/images/foods', 0777, true);
        }
        if (!file_exists(public_path() . '/images/foods/thumb')) {
            mkdir(public_path() . '/images/foods/thumb', 0777, true);
        }
        $imagename = time() . $file->getClientOriginalName();
        $file->move('images/foods/thumb', $imagename);
        return $imagename;
    }

    public static function updatePackages($fooddetails, $packs) {
        $x = array_pluck($fooddetails->packages, 'id');
        $fooddetails->packages()->detach($x);
        $fooddetails->packages()->attach($packs);
        return null;
    }

    public static function updateCategories($fooddetails, $cats) {
        $y = array_pluck($fooddetails->categories, 'id');
        $fooddetails->categories()->detach($y);
        $fooddetails->categories()->attach($cats);
        return null;
    }

}
