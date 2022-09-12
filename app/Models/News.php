<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'news';
    protected $fillable = [
        'id_animal',
        'id_category',
        'title',
        'description',
        'date',
        'news_file',
        'cover_file',
        'banner_file',
        'is_english',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public static function get_animal()
    {
        $data = DB::table('animals')->where(['deleted_at' => null])->get();
        $group = [];
        foreach ($data as $key => $value) {
            // $group[$value->id] = $value->name;
            $group[$value->id] = ucfirst($value->type);
        }
        return $group;
    }

    public static function get_news_category()
    {
        $data = DB::table('news_categories')->where(['deleted_at' => null])->get();
        $group = [];
        foreach ($data as $key => $value) {
            // $group[$value->id] = $value->name;
            $group[$value->id] = $value->name_in_english;
        }
        return $group;
    }
}
