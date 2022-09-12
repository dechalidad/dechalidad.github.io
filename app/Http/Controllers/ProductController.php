<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public $form = [
        [
            'field' => 'id_animal',
            'type'  => 'dropdown',
            'label' => 'Animal Type',
            'placeholder' => '',
            'rules' => 'required'
        ],
        [
            'field' => 'id_food_type',
            'type'  => 'dropdown',
            'label' => 'Food Type',
            'placeholder' => '',
            'rules' => 'required'
        ],
        [
            'field' => 'id_brand',
            'type'  => 'dropdown',
            'label' => 'Brand',
            'placeholder' => '',
            'rules' => 'required'
        ],
        [
            'field' => 'name',
            'type'  => 'text',
            'label' => 'Products Name',
            'placeholder' => '',
            'rules' => 'required'
        ],
        [
            'field' => 'size',
            'type'  => 'number',
            'label' => 'Size (in gram measurement)',
            'placeholder' => 'In gram measurement',
            'rules' => 'required'
        ],
        [
            'field' => 'description',
            'type'  => 'textarea',
            'label' => 'Description',
            'placeholder' => '',
            'rules' => 'required'
        ],
        [
            'field' => 'ingredient',
            'type'  => 'textarea',
            'label' => 'Ingredients',
            'placeholder' => '',
            'rules' => 'required'
        ],
        [
            'field' => 'cover_file',
            'type'  => 'file',
            'label' => 'Product Image',
            'placeholder' => '',
            'rules' => 'required'
        ],
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = Product::select('products.*', 'animals.name as animal', 'brands.name as brand')
                ->join('animals', 'animals.id', '=', 'products.id_animal')
                ->join('brands', 'brands.id', '=', 'products.id_brand')
                ->latest()
                ->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . url('master-product/' . $row->id . '/edit') . '" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-success btn-sm">Edit</a>';
                    $btn .= "<form action=" . url('master-product/' . $row->id) . " method='POST' class='d-inline process-delete'>
                    <input type='hidden' name='_method' value='delete'>
                    <input type='hidden' name='_token' value=" . csrf_token() . ">
                    <button type='submit' class='btn btn-danger btn-sm'>Delete</button>
                </form>";
                    // $btn .= '<a href="' . url('list-weight/' . $row->id) . '" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm">Tambah Ukuran</a>';
                    // $btn .= '<a href="' . url('list-variant/' . $row->id) . '" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm ml-1">Tambah Varian</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('page.master.product.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list_animal = Product::get_animal();
        $list_brand = Product::get_brand();
        $list_food_type = Product::get_food_type();

        $this->form[0]['source'] = $list_animal;
        $this->form[1]['source'] = $list_food_type;
        $this->form[2]['source'] = $list_brand;

        $arr = [
            'form' => $this->form,
            'action' => 'create'
        ];

        return view('page.master.product.form', $arr);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [];

        foreach ($this->form as $key => $value) {
            $rules[$value['field']] = $value['rules'];
        }

        $validated = $request->validate($rules);

        $post = [
            'id_animal' => $request->id_animal,
            'id_food_type' => $request->id_food_type,
            'id_brand' => $request->id_brand,
            'name' => $request->name,
            'size' => $request->size,
            'description' => $request->description,
            'ingredient' => $request->ingredient,
            'created_at' => date('Y-m-d H:i:s')
        ];

        foreach ($request->file() as $key => $value) {
            $document_file = $key . '_' . date('dmY') . '_' . time() . '.' . $request->$key->extension();
            $post[$key] = $document_file;
            $request->file($key)->move(public_path('assets/lampiran/' . $key), $document_file);
        }

        Product::create($post);

        return redirect(url('master-product'))->with('status', 'Data has been successfully added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $list_animal = Product::get_animal();
        $list_brand = Product::get_brand();
        $list_food_type = Product::get_food_type();

        $this->form[0]['source'] = $list_animal;
        $this->form[1]['source'] = $list_food_type;
        $this->form[2]['source'] = $list_brand;

        $a = Product::where('id', $id)->first()->toArray();

        $data = [
            'data' => $a,
            'form' => $this->form,
            'action' => 'edit'
        ];

        return view('page.master.product.form', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
            'id_animal' => $request->id_animal,
            'id_food_type' => $request->id_food_type,
            'id_brand' => $request->id_brand,
            'name' => $request->name,
            'size' => $request->size,
            'description' => $request->description,
            'ingredient' => $request->ingredient,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $old_data = Product::where('id', $id)->first();

        foreach ($request->file() as $key => $value) {
            $document_file = $key . '_' . date('dmY') . '_' . time() . '.' . $request->$key->extension();
            $post[$key] = $document_file;
            if (File::exists(public_path('assets/lampiran/' . $key . '/' . $old_data->$key))) {
                unlink(public_path('assets/lampiran/' . $key . '/' . $old_data->$key));
            }
            $request->file($key)->move(public_path('assets/lampiran/' . $key), $document_file);
        }

        Product::where('id', $id)->update($post);
        return redirect(url('master-product'))->with('status', 'Data has been successfully changed.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Product::destroy($id);

        if ($delete) {
            return response()->json(['status' => 200, 'message' => 'Data has been successfully deleted.']);
        } else {
            return response()->json(['status' => 500, 'message' => 'Ops, there is some error.']);
        }
    }

    public function rename_product()
    {
        Product::rename_product();
    }
}
