<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Review extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'reviews';
    protected $fillable = [
        'pet_name',
        'pet_type',
        'review',
        'animal_file',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public static function get_animal()
    {
        $data = DB::table('animals')->where(['deleted_at' => null])->get();
        $group = [];
        foreach ($data as $key => $value) {
            $group[$value->type] = ucfirst($value->type);
        }
        return $group;
    }
}
