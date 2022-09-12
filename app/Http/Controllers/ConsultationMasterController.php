<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use Illuminate\Http\Request;
use DataTables;

class ConsultationMasterController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = Consultation::latest()->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . url('master-consultation/detail/' . $row->id) . '" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm">View Detail</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('page.master.consultation.list');
    }

    public function detail($id)
    {
        $detail = Consultation::find($id);
        $data = [
            'detail' => $detail
        ];
        return view('page.master.consultation.detail', $data);
    }
}
