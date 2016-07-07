<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Model;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Setting extends Model {

    public $table = "settings";
    public $fillable = [
        "name",
        "address",
        "image",
        "email",
        "phone",
        "timmings",
        "website",
        "currencytype"
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "name" => "string",
        "address" => "string",
        "image" => "string",
        "email" => "string",
        "phone" => "string",
        "timmings" => "string",
        "website" => "string",
        "currencytype" => "string"
    ];
    public static $rules = [
        "name" => "required",
        "address" => "required",
        "image" => "mimes:jpeg,bmp,png",
        "email" => "required",
        "timmings" => "required",
        "currencytype" => "required"
    ];

    public static function moveFile(UploadedFile $file) {
        if (!file_exists(public_path() . '/images/settings')) {
            mkdir(public_path() . '/images/settings', 0777, true);
        }
        $imagename = time() . $file->getClientOriginalName();
        $file->move('images/settings', $imagename);
        return $imagename;
    }

}
