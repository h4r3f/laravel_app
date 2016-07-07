<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Model;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Package extends Model {

    public $table = "packages";
    public $fillable = [
        "name",
        "image",
        "price"
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "name" => "string",
        "image" => "string",
        "price" => "integer"
    ];
    public static $rules = [
        "name" => "required",
        "image" => "mimes:jpeg,bmp,png",
        "price" => "required"
    ];

    public function foods() {
        return $this->belongsToMany('App\Food');
    }

    public static function moveFile(UploadedFile $file) {
        if (!file_exists(public_path() . '/images/packages')) {
            mkdir(public_path() . '/images/packages', 0777, true);
        }

        $imagename = time() . $file->getClientOriginalName();
        $file->move('images/packages', $imagename);
        return $imagename;
    }

}
