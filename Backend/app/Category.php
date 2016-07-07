<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Model;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Category extends Model {

    public $table = "categories";
    public $fillable = [
        "name",
        "image"
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "name" => "string",
        "image" => "string"
    ];
    public static $rules = [
        "name" => "required",
        "image" => "mimes:jpeg,bmp,png"
    ];

    public function foods() {
        return $this->belongsToMany('App\Food');
    }

    public static function moveFile(UploadedFile $file) {
        if (!file_exists(public_path() . '/images/categories')) {
            mkdir(public_path() . '/images/categories', 0777, true);
        }
        $imagename = time() . $file->getClientOriginalName();

        $file->move('images/categories', $imagename);
        return $imagename;
    }

}
