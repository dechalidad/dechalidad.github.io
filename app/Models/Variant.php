<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Variant extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'variants';
    protected $fillable = [
        'id_product',
        'name',
        'variant_file',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public static function get_product()
    {
        $data = DB::table('products')->where(['deleted_at' => null])->get();
        $group = [];
        foreach ($data as $key => $value) {
            $group[$value->id] = $value->name;
        }
        return $group;
    }
}
