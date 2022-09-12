<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'products';
    protected $fillable = [
        'id_animal',
        'id_food_type',
        'id_brand',
        'name',
        'description',
        'ingredient',
        'cover_file',
        'size',
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

    public static function get_brand()
    {
        $data = DB::table('brands')->where(['deleted_at' => null])->get();
        $group = [];
        foreach ($data as $key => $value) {
            $group[$value->id] = $value->name;
        }
        return $group;
    }

    public static function get_food_type()
    {
        $data = DB::table('food_types')->where(['deleted_at' => null])->get();
        $group = [];
        foreach ($data as $key => $value) {
            $group[$value->id] = $value->name;
        }
        return $group;
    }

    public static function rename_product()
    {
        $get_data = DB::table('products')
            ->select('products.*', 'products.name as product', 'variants.name as variant', 'variants.variant_file')
            ->join('variants', 'variants.id_product', '=', 'products.id')
            ->where(['products.deleted_at' => null, 'variants.deleted_at' => null])
            ->get()
            ->toArray();

        $grouping = [];
        foreach ($get_data as $key => $value) {
            $grouping[$value->product][] = $value;
        }

        foreach ($grouping as $product => $item) {
            foreach ($item as $key => $val) {
                $arr = [
                    'id_food_type' => $val->id_food_type,
                    'id_animal' => $val->id_animal,
                    'id_brand' => $val->id_brand,
                    'name' => $product . ' - ' . $val->variant,
                    'description' => $val->description,
                    'ingredient' => $val->ingredient,
                    'cover_file' => $val->variant_file,
                    'created_at' => now('UTC')
                ];
                // DB::table('products_new')->insert($arr);
            }
        }
    }
}
