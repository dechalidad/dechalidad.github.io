<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class FoodType extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'food_types';
    protected $fillable = [
        'name',
        'cover_file',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
