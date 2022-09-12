<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TemplateController extends Controller
{
    public function home()
    {
        return view('page/index');
    }

    public function about()
    {
        return view('page/about-us');
    }

    public function product_all()
    {
        return view('page/products');
    }

    public function product_brand()
    {
        return view('page/products-brand');
    }

    public function product_detail()
    {
        return view('page/product-detail');
    }

    public function news_all()
    {
        return view('page/news');
    }

    public function news_detail()
    {
        return view('page/news-detail');
    }

    public function contact()
    {
        return view('page/contact');
    }

    public function blank()
    {
        return view('template/blank');
    }

    public function under_construction()
    {
        return view('page/under-construction');
    }

    public function cheatsheet()
    {
        return view('template/cheatsheet');
    }
}
