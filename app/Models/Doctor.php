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

    public $translatedAttributes = [
        'name',
    ];

    public $fillable = [
        'email',
        'email_verified_at',
        'password',
        'phone',
        'name',
        'section_id', //relation with section
    ];

    /**
     * Get the Doctor's image polymorphic relationship
     */
    // public function image()
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    /**
     * Get the Section Name relationship
     */

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }
}
