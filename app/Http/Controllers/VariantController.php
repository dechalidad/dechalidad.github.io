<?php

namespace App\Http\Controllers;

use App\Models\Variant;
use Illuminate\Http\Request;
use DataTables;

class VariantController extends Controller
{
    public $form = [
        [
            'field' => 'name',
            'type'  => 'text',
            'label' => 'Nama Varian',
            'placeholder' => '',
            'rules' => 'required',
            'source' => []
        ],
        [
            'field' => 'variant_file',
            'type'  => 'file',
            'label' => 'Foto',
            'placeholder' => '',
            'rules' => 'required',
            'source' => []
        ],
    ];

    public function index(Request $request, $id_product)
    {
        if ($request->ajax()) {

            $data = Variant::select('variants.*', 'products.name as product')
                ->join('products', 'products.id', '=', 'variants.id_product')
                ->where(['id_product' => $id_product])
                ->latest()
                ->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) use ($id_product) {
                    $btn = '<a href="' . url('edit-variant/' . $row->id . '/' . $id_product) . '" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-success btn-sm">Edit</a>';
                    $btn .= "<form action=" . url('delete-variant/' . $row->id) . " method='POST' class='d-inline process-delete'>
                    <input type='hidden' name='_method' value='delete'>
                    <input type='hidden' name='_token' value=" . csrf_token() . ">
                    <button type='submit' class='btn btn-danger btn-sm'>Hapus</button>
                </form>";
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $item = [
            'id_product' => $id_product
        ];

        return view('page.master.variant.list', $item);
    }

    public function create($id_product)
    {
        $arr = [
            'form' => $this->form,
            'action' => 'create',
            'id_product' => $id_product
        ];

        return view('page.master.variant.form', $arr);
    }

    public function save(Request $request, $id_product)
    {
        $rules = [];

        foreach ($this->form as $key => $value) {
            $rules[$value['field']] = $value['rules'];
        }

        $validated = $request->validate($rules);

        $post = [
            'id_product' => $id_product,
            'name' => $request->name,
            'created_at' => date('Y-m-d H:i:s')
        ];

        foreach ($request->file() as $key => $value) {
            $document_file = $key . '_' . date('dmY') . '_' . time() . '.' . $request->$key->extension();
            $post[$key] = $document_file;
            $request->file($key)->move(public_path('assets/lampiran/' . $key), $document_file);
        }

        Variant::create($post);

        return redirect(url('list-variant/' . $id_product))->with('status', 'Data berhasil ditambahkan');
    }

    public function edit($id, $id_product)
    {
        $list_product = Variant::get_product();
        $this->form[0]['source'] = $list_product;
        $a = Variant::where('id', $id)->first()->toArray();

        $data = [
            'data' => $a,
            'form' => $this->form,
            'action' => 'edit',
            'id_product' => $id_product
        ];

        return view('page.master.variant.form', $data);
    }

    public function update(Request $request, $id, $id_product)
    {
        $rules = [];

        foreach ($this->form as $key => $value) {
            $a = $value['field'] . '_hidden';
            $hide = $request->$a;
            if (!isset($hide)) {
                $rules[$value['field']] = $value['rules'];
            } else {
                $request->merge([str_replace('_hiden', '', $value['field']) => $hide]);
                unset($request->$a);
            }
        }

        $validated = $request->validate($rules);

        $post = [
            'name' => $request->name,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $old_data = Variant::where('id', $id)->first();

        foreach ($request->file() as $key => $value) {
            $document_file = $key . '_' . date('dmY') . '_' . time() . '.' . $request->$key->extension();
            $post[$key] = $document_file;
            unlink(public_path('assets/lampiran/' . $key . '/' . $old_data->$key));
            $request->file($key)->move(public_path('assets/lampiran/' . $key), $document_file);
        }

        Variant::where('id', $id)->update($post);
        return redirect(url('list-variant/' . $id_product))->with('status', 'Data berhasil diubah');
    }

    public function delete($id)
    {
        $delete = Variant::destroy($id);

        if ($delete) {
            return response()->json(['status' => 200, 'message' => 'Data berhasil dihapus']);
        } else {
            return response()->json(['status' => 500, 'message' => 'Gagal Terjadi Kesahalan']);
        }
    }
}
