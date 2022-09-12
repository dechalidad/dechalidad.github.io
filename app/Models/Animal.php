<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Animal extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'animals';
    protected $fillable = [
        'name',
        'type',
        'icon',
        'tagline',
        'tagline_in_english',
        'animal_file',
        'banner_file',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
