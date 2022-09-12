<?php

namespace App\Http\Controllers;

use App\Models\Weight;
use Illuminate\Http\Request;
use DataTables;

class WeightController extends Controller
{
    public $form = [
        [
            'field' => 'id_measure',
            'type'  => 'dropdown',
            'label' => 'Satuan Berat',
            'placeholder' => '',
            'rules' => 'required'
        ],
        [
            'field' => 'weight',
            'type'  => 'text',
            'label' => 'Berat',
            'placeholder' => '',
            'rules' => 'required'
        ],
    ];

    public function index(Request $request, $id_product)
    {
        if ($request->ajax()) {

            $data = Weight::select('weights.*', 'measures.name as measure')
                ->join('measures', 'measures.id', '=', 'weights.id_measure')
                ->where(['id_product' => $id_product])
                ->latest()
                ->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) use ($id_product) {
                    $btn = '<a href="' . url('edit-weight/' . $row->id . '/' . $id_product) . '" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-success btn-sm">Edit</a>';
                    $btn .= "<form action=" . url('delete-weight/' . $row->id) . " method='POST' class='d-inline process-delete'>
                        <input type='hidden' name='_method' value='delete'>
                        <input type='hidden' name='_token' value=" . csrf_token() . ">
                        <button type='submit' class='btn btn-danger btn-sm'>Hapus</button>
                    </form>";
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $data = [
            'id_product' => $id_product
        ];

        return view('page.master.weight.list', $data);
    }

    public function create($id_product)
    {
        $this->form[0]['source'] = Weight::get_measure();

        $arr = [
            'form' => $this->form,
            'action' => 'create',
            'id_product' => $id_product
        ];

        return view('page.master.weight.form', $arr);
    }

    public function save(Request $request, $id_product)
    {
        $rules = [];

        foreach ($this->form as $key => $value) {
            $rules[$value['field']] = $value['rules'];
        }

        $validated = $request->validate($rules);

        $request->merge(['id_product' => $id_product]);
        $insert = Weight::create($request->except(['_token']));

        return redirect(url('list-weight/' . $id_product))->with('status', 'Data berhasil ditambahkan');
    }

    public function edit($id_weight, $id_product)
    {
        $this->form[0]['source'] = Weight::get_measure();

        $detail = Weight::where('id', $id_weight)->first();

        $arr = [
            'form' => $this->form,
            'action' => 'edit',
            'data' => $detail,
            'id_product' => $id_product
        ];

        return view('page.master.weight.form', $arr);
    }

    public function update(Request $request, $id, $id_product)
    {
        $rules = [];

        foreach ($this->form as $key => $value) {
            $rules[$value['field']] = $value['rules'];
        }

        $validated = $request->validate($rules);

        $request->merge(['updated_at' => now('UTC')]);
        $update = Weight::where('id', $id)->update($request->only(['id_measure', 'weight', 'updated_at']));
        return redirect(url('list-weight/' . $id_product))->with('status', 'Data berhasil ditambahkan');
    }

    public function delete($id)
    {
        $delete = Weight::destroy($id);

        if ($delete) {
            return response()->json(['status' => 200, 'message' => 'Data berhasil dihapus']);
        } else {
            return response()->json(['status' => 500, 'message' => 'Gagal Terjadi Kesahalan']);
        }
    }
}
