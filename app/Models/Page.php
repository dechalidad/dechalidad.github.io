<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Page extends Model
{
    use HasFactory;

    public static function get_animal()
    {
        $data = DB::table('animals')->where('deleted_at', null)->get();
        return $data;
    }

    public static function get_brand()
    {
        $data = DB::table('brands')->where('deleted_at', null)->get();
        return $data;
    }

    public static function get_product()
    {
        $data = DB::table('products')
            ->select('*', 'products.id as id_product', 'products.name as product', 'animals.name as animal')
            ->join('animals', 'animals.id', '=', 'products.id_animal')
            ->where('products.deleted_at', null)
            ->get()
            ->toArray();
        $variant = self::grouping_variant();

        foreach ($data as $key => $value) {
            $data[$key]->variants = (isset($variant[$value->id_product])) ? $variant[$value->id_product] : [];
        }

        return $data;
    }

    public static function get_product_by_type($id_item, $type, $id_animal)
    {
        $data = DB::table('products')
            ->select(
                '*',
                'products.cover_file',
                'products.id as id_product',
                'products.name as product',
                'animals.name as animal'
            )
            ->join('animals', 'animals.id', '=', 'products.id_animal')
            ->join('brands', 'brands.id', '=', 'products.id_brand')
            ->join('food_types', 'food_types.id', '=', 'products.id_food_type')
            ->where(['products.deleted_at' => null, 'products.id_animal' => $id_animal]);

        if ($type == 'brand') {
            $data->where(['id_brand' => $id_item]);
        } else {
            $data->where(['id_food_type' => $id_item]);
        }

        $data = $data->orderBy('food_types.seq', 'ASC')->orderBy('products.size', 'DESC')->get()->toArray();

        $variant = self::grouping_variant();

        foreach ($data as $key => $value) {
            $data[$key]->variants = (isset($variant[$value->id_product])) ? $variant[$value->id_product] : [];
        }

        return $data;
    }

    public static function grouping_variant()
    {
        $data = DB::table('variants')->where('deleted_at', null)->get();
        $grouping = [];
        foreach ($data as $key => $value) {
            $grouping[$value->id_product][] = $value;
        }
        return $grouping;
    }

    public static function filter_product($param)
    {
        $data = DB::table('products')
            ->select('*', 'products.cover_file', 'products.id as id_product', 'products.name as product', 'animals.name as animal')
            ->join('animals', 'animals.id', '=', 'products.id_animal')
            ->join('brands', 'brands.id', '=', 'products.id_brand')
            ->join('food_types', 'food_types.id', '=', 'products.id_food_type')
            ->where('products.deleted_at', null);

        if (isset($param->animal)) {
            if (count($param->animal) > 0) {
                $data->whereIn('products.id_animal', $param->animal);
            }
        }

        if (isset($param->brand)) {
            if (count($param->brand) > 0) {
                $data->whereIn('products.id_brand', $param->brand);
            }
        }
        $data = $data->orderBy('food_types.seq', 'ASC')->orderBy('products.size', 'DESC')->get()->toArray();
        $variant = self::grouping_variant();
        foreach ($data as $key => $value) {
            $data[$key]->variants = (isset($variant[$value->id_product])) ? $variant[$value->id_product] : [];
        }

        return $data;
    }

    public static function get_product_detail($id_product)
    {
        $data = DB::table('products')
            ->select('*', 'products.id as id_product', 'products.name as product', 'brands.name as brand', 'animals.name as animal')
            ->join('animals', 'animals.id', '=', 'products.id_animal')
            ->join('brands', 'brands.id', '=', 'products.id_brand')
            ->where('products.id', $id_product)
            ->first();
        $variant = self::grouping_variant();

        return [
            'detail' => $data,
            'variants' => (isset($variant[$data->id_product])) ? $variant[$data->id_product] : []
        ];
    }

    public static function get_total_product()
    {
        $data = DB::table('products')
            ->select(
                'animals.*',
                'animals.id as id_animal',
                'animals.name AS animal',
                DB::raw('COUNT(*) as total_product')
            )
            ->join('animals', 'animals.id', '=', 'products.id_animal')
            ->whereNull('products.deleted_at')
            ->groupBy('animals.id')
            ->get()
            ->toArray();

        foreach ($data as $key => $value) {
            $brands = DB::table('products')
                ->select(
                    'brands.name'
                )
                ->join('brands', 'brands.id', '=', 'products.id_brand')
                ->join('animals', 'animals.id', '=', 'products.id_animal')
                ->where([
                    'products.deleted_at' => null,
                    'animals.id' => $value->id_animal
                ])
                ->groupBy('brands.id', 'animals.id')
                ->get()
                ->toArray();
            $data[$key]->brands = $brands;
        }

        return $data;
    }

    public static function get_news($lang = "")
    {
        if ($lang == "en") {
            $field = 'animals.type as animal';
            $where = ['news.deleted_at' => null, 'is_english' => 1];
        } else {
            $field = 'animals.name as animal';
            $where = ['news.deleted_at' => null, 'is_english' => 0];
        }

        $data = DB::table('news')
            ->select(
                'animals.name as animal',
                'news.*',
                $field
            )
            ->join('animals', 'animals.id', '=', 'news.id_animal')
            ->where($where)
            ->get()
            ->toArray();

        foreach ($data as $key => $value) {
            $data[$key]->date = date('d M Y', strtotime($value->date));
        }

        $grouping = [];
        foreach ($data as $key => $value) {
            $grouping[ucfirst($value->animal)][] = $value;
        }

        return $grouping;
    }

    public static function detail_news($id)
    {
        $data = DB::table('news')->where('id', $id)->first();
        return $data;
    }

    public static function get_review()
    {
        $data = DB::table('reviews')->whereNull('deleted_at')->get()->toArray();
        return $data;
    }

    public static function filter_news($params)
    {
        $data = DB::table('news')
            ->select(
                'animals.name as animal',
                'news.*'
            )
            ->join('animals', 'animals.id', '=', 'news.id_animal')
            ->whereNull('news.deleted_at');

        if ($params->id_category != 'all') {
            $data->where(['news.id_category' => $params->id_category]);
        }

        if ($params->lang == 'en') {
            $data->where(['news.is_english' => 1]);
        } else {
            $data->where(['news.is_english' => 0]);
        }

        $data = $data->get()->toArray();

        foreach ($data as $key => $value) {
            $data[$key]->date = date('d M Y', strtotime($value->date));
        }
        $grouping = [];
        foreach ($data as $key => $value) {
            $grouping[$value->animal][] = $value;
        }
        return $grouping;
    }

    public static function get_list_news_category($lang = "")
    {
        if ($lang == "en") {
            $field = 'news_categories.name_in_english as name';
        } else {
            $field = 'news_categories.name';
        }

        $data = DB::table('news')
            ->select(
                'news_categories.*',
                $field
            )
            ->join('news_categories', 'news_categories.id', '=', 'news.id_category')
            ->join('animals', 'animals.id', '=', 'news.id_animal')
            ->whereNull('news.deleted_at')
            ->groupBy('news_categories.id')
            ->get()
            ->toArray();

        return $data;
    }

    public static function get_news_index($lang)
    {
        if ($lang == 'en') {
            $where = ['deleted_at' => null, 'news.is_english' => 1];
        } else {
            $where = ['deleted_at' => null, 'news.is_english' => 0];
        }

        $data = DB::table('news')->where($where)->orderBy('id', 'DESC')->get()->toArray();
        return $data;
    }

    public static function get_brand_by_animal($id_animal, $lang)
    {
        $brand = DB::table('products')
            ->select(
                'brands.*'
            )
            ->join('brands', 'brands.id', '=', 'products.id_brand')
            ->join('animals', 'animals.id', '=', 'products.id_animal')
            ->where([
                'products.deleted_at' => null,
                'animals.id' => $id_animal,
                'brands.deleted_at' => null
            ])
            ->groupBy('brands.id', 'animals.id')
            ->orderBy('brands.seq', 'ASC')
            ->get()
            ->toArray();

        $animal  = self::get_detail_animal($id_animal, $lang);
        $food_type = DB::table('food_types')->where(['deleted_at' => null])->whereIn('id', [1, 2, 3, 4])->get()->toArray();

        return [
            'brand' => $brand,
            'animal' => $animal,
            'food_type' => $food_type,
        ];
    }

    public static function get_detail_animal($id, $lang = "")
    {
        if ($lang == 'en') {
            $field = 'animals.tagline_in_english as tagline';
        } else {
            $field = 'animals.tagline as tagline';
        }

        $animal  = DB::table('animals')->select('animals.*', $field)->where(['id' => $id, 'deleted_at' => null])->first();
        return $animal;
    }

    public static function filter_product_quiz($request)
    {
        if ($request->lang == 'en') {
            $where = [
                'products.deleted_at' => null,
                'animals.type' => strtolower($request->animal),
                'food_types.name' => $request->food_type,
            ];
        } else {
            $where = [
                'products.deleted_at' => null,
                'animals.name' => $request->animal,
                'food_types.name' => $request->food_type,
            ];
        }

        $data = DB::table('products')
            ->select('*', 'products.cover_file as cover_file', 'products.id as id_product', 'products.name as product', 'animals.name as animal')
            ->join('animals', 'animals.id', '=', 'products.id_animal')
            ->join('food_types', 'food_types.id', '=', 'products.id_food_type')
            ->where($where)
            ->limit(3)
            ->orderBy('products.id', 'DESC')
            ->get()
            ->toArray();
        $variant = self::grouping_variant();

        foreach ($data as $key => $value) {
            $data[$key]->variants = (isset($variant[$value->id_product])) ? $variant[$value->id_product] : [];
        }

        return $data;
    }

    public static function search_product($product_name, $lang)
    {
        $data = DB::table('products')
            ->select('*', 'products.cover_file', 'products.id as id_product', 'products.name as product', 'animals.name as animal')
            ->join('animals', 'animals.id', '=', 'products.id_animal')
            ->join('food_types', 'food_types.id', '=', 'products.id_food_type')
            ->where([
                'products.deleted_at' => null,
            ])
            ->where('products.name', 'LIKE', '%' . $product_name . '%')
            ->orderBy('products.id', 'DESC')
            ->get()
            ->toArray();

        $variant = self::grouping_variant();

        foreach ($data as $key => $value) {
            $data[$key]->variants = (isset($variant[$value->id_product])) ? $variant[$value->id_product] : [];
        }

        return $data;
    }

    public static function get_banner()
    {
        $data = DB::table('banners')->first();
        return $data;
    }
}
