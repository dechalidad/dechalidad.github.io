<?php

namespace App\Http\Controllers;

use App\Models\ProductionModel;
use App\Models\NewsModel;
use App\Models\OffersModel;
use App\Models\RoomsModel;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
// use Illuminate\Routing\Controller as BaseController;

class Production extends Controller
{
    // use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        $data = [
            'offers' => OffersModel::get_data(),
        ];
        return view('production/index', $data);
    }

    public function news_all()
    {
        $data = [
            'data' => NewsModel::get_data(),
        ];
        return view('production/news/news-all', $data);
    }

    public function detailNews($id)
    {
        $data = [
            'data' => NewsModel::get_detail($id),
        ];
        return view('production/news/news-detail', $data);
    }

    public function offers_all()
    {
        $data = [
            'data' => OffersModel::get_data(),
        ];
        return view('production/offers/offers-all', $data);
    }

    public function detailOffers($id)
    {
        $data = [
            'data' => OffersModel::get_detail($id),
        ];
        return view('production/offers/offers-detail', $data);
    }

    public function room_all()
    {
        $data = [
            'data' => RoomsModel::get_data(),
        ];
        return view('production/rooms/room-all', $data);
    }

    public function detailRooms($id)
    {
        $data = [
            'data' => RoomsModel::get_detail($id),
        ];
        return view('production/rooms/room-detail', $data);
    }

    public function facilities_all()
    {
        return view('production/facilities/facilities-all');
    }

    public function facilities_detail()
    {
        return view('production/facilities/facilities-detail');
    }
}
