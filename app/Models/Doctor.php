<?php

namespace App\Models;

use App\Models\Image;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory, Translatable;


    public $translatedAttributes = ['name', 'appointments'];

    public $fillable = ['email', 'email_verified_at', 'password', 'phone', 'price', 'name', 'appointments'];

    /**
     * Get the Doctor's image polymorphic relationship
     */
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

}
