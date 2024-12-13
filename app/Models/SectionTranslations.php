<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionTranslations extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    protected $table = 'section_translations';

    public $timestamps = false;
}
