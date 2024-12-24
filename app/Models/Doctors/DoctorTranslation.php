<?php

namespace App\Models\Doctors;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorTranslation extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'appointments'];
    public $timestamps = false;
}
