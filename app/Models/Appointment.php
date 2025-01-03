<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use Translatable; // 2. To add translation methods

    public $translatedAttributes = ['name'];

    protected $fillable = [
        'name',
        'doctor_id',
        'section_id',
    ];
}
