<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function languageChecker($lang = "", $view = "", $data = [])
    {
        if ($lang == '') {
            return view('page/production/' . $view, $data);
        } else {
            return view('page/production/en/' . $view, $data);
        }
    }

    public function home($lang = "")
    {
        $data = [
            'total_product' => Page::get_total_product(),
            'news' => Page::get_news_index($lang),
            'review' => Page::get_review(),
            'banner' => Page::get_banner(),
            'lang' => $lang
        ];

        // return view('page/production/index', $data);
        return $this->languageChecker($lang, 'index', $data);
    }

    public function about($lang = '')
    {
        return $this->languageChecker($lang, 'about-us');
    }

    public function product_intro($lang = '')
    {
        $data = [
            'total_product' => Page::get_total_product(),
            'product' => Page::get_product(),
        ];

        // return view('page/production/products-intro', $data);
        return $this->languageChecker($lang, 'products-intro', $data);
    }

    public function product_brand($lang = '', $id_animal = "")
    {
        if ($lang != 'en') {
            $id_animal = $lang;
            $lang = "";
        }

        $item = Page::get_brand_by_animal($id_animal, $lang);

        $data = [
            'brand' => $item['brand'],
            'animal' => $item['animal'],
            'food_type' => $item['food_type'],
        ];

        // return view('page/production/products-brand', $data);
        return $this->languageChecker($lang, 'products-brand', $data);
    }

    public function product_all($lang = '', $id_animal = "", $id_item = "", $type = "")
    {
        if ($lang != 'en') {
            $type = $id_item;
            $id_item = $id_animal;
            $id_animal = $lang;
            $lang = "";
        }

        $data = [
            'animals' => Page::get_animal(),
            'brands' => Page::get_brand(),
            'products' => Page::get_product_by_type($id_item, $type, $id_animal),
            'detail_animal' => Page::get_detail_animal($id_animal)
        ];

        // return view('page/production/products', $data);
        return $this->languageChecker($lang, 'products', $data);
    }

    public function product_detail($lang = '', $id_product = "")
    {
        if ($lang != 'en') {
            $id_product = $lang;
            $lang = "";
        }

        $data = [
            'item' => Page::get_product_detail($id_product)
        ];

        // return view('page/production/product-detail', $data);
        return $this->languageChecker($lang, 'product-detail', $data);
    }

    public function news_all($lang = '')
    {
        $data = [
            'category' => Page::get_list_news_category($lang),
            'news' => Page::get_news($lang),
            'lang' => $lang
        ];

        // return view('page/production/news', $data);
        return $this->languageChecker($lang, 'news', $data);
    }

    public function news_detail($lang = '', $id_news = "")
    {
        if ($lang != 'en') {
            $id_news = $lang;
            $lang = '';
        }

        $data = [
            'detail' => Page::detail_news($id_news)
        ];

        // return view('page/production/news-detail', $data);
        return $this->languageChecker($lang, 'news-detail', $data);
    }

    public function contact($lang = '')
    {
        // return view('page/production/contact');
        return $this->languageChecker($lang, 'contact');
    }

    public function blank()
    {
        return view('template/blank');
    }

    public function cheatsheet()
    {
        return view('template/cheatsheet');
    }

    public function filter_product(Request $request)
    {
        if ($request->ajax()) {
            $data = Page::filter_product($request);
            return response()->json(['status' => 200, 'data' => $data]);
        }
    }

    public function filter_news(Request $request)
    {
        if ($request->ajax()) {
            $data = Page::filter_news($request);
            return response()->json(['status' => 200, 'data' => $data]);
        }
    }

    public function filter_product_quiz(Request $request)
    {
        if ($request->ajax()) {
            $data = Page::filter_product_quiz($request);
            return response()->json(['status' => 200, 'data' => $data]);
        }
    }

    // public function filter_product_quiz_en(Request $request)
    // {
    //     if ($request->ajax()) {
    //         $data = Page::filter_product_quiz_en($request);
    //         return response()->json(['status' => 200, 'data' => $data]);
    //     }
    // }

    public function search_product($lang = "", $product_name = "")
    {
        if ($lang != 'en') {
            $product_name = $lang;
            $lang = "";
        }

        $data = [
            'animals' => Page::get_animal(),
            'brands' => Page::get_brand(),
            'products' => Page::search_product($product_name, $lang)
        ];

        // return view('page/production/result-search', $data);
        return $this->languageChecker($lang, 'result-search', $data);
    }
}
