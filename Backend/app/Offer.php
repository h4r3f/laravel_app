<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Model;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Offer extends Model {

    public $table = "offers";
    public $fillable = [
        "name",
        "details",
        "image",
        "cuponcode",
        "price",
        "activate",
        "type",
        "minimum"
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
        "cuponcode" => "string",
        "price" => "integer",
        "activate" => "string",
        "type" => "string",
        "minimum" => "integer"
    ];
    public static $rules = [
        "name" => "required",
        "details" => "required",
        "image" => "mimes:jpeg,bmp,png",
        "cuponcode" => "required",
        "price" => "required",
        "activate" => "required",
        "type" => "required",
        "minimum" => "required"
    ];

    public static function moveFile(UploadedFile $file) {
        if (!file_exists(public_path() . '/images/offers')) {
            mkdir(public_path() . '/images/offers', 0777, true);
        }
        $imagename = time() . $file->getClientOriginalName();
        $file->move('images/offers', $imagename);
        return $imagename;
    }

}
