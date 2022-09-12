<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\File;

class ReviewController extends Controller
{
    public $form = [
        [
            'field' => 'pet_type',
            'type'  => 'dropdown',
            'label' => 'Animal Type',
            'placeholder' => '',
            'rules' => 'required'
        ],
        [
            'field' => 'pet_name',
            'type'  => 'text',
            'label' => 'Name of Pet',
            'placeholder' => '',
            'rules' => 'required'
        ],
        [
            'field' => 'review',
            'type'  => 'textarea',
            'label' => 'Review',
            'placeholder' => '',
            'rules' => 'required'
        ],
        [
            'field' => 'animal_file',
            'type'  => 'file',
            'label' => 'Picture',
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

            $data = Review::latest()->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('animal_image', function ($row) {
                    $img = '<img src="' . url('assets/lampiran/animal_file/' . $row->animal_file) . '" style="width:200px;">';
                    return $img;
                })
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . url('master-review/' . $row->id . '/edit') . '" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-success btn-sm">Edit</a>';
                    $btn .= "<form action=" . url('master-review/' . $row->id) . " method='POST' class='d-inline process-delete'>
                    <input type='hidden' name='_method' value='delete'>
                    <input type='hidden' name='_token' value=" . csrf_token() . ">
                    <button type='submit' class='btn btn-danger btn-sm'>Hapus</button>
                </form>";
                    // $btn .= '<a href="' . url('list-weight/' . $row->id) . '" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm">Tambah Ukuran</a>';
                    // $btn .= '<a href="' . url('list-variant/' . $row->id) . '" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm ml-1">Tambah Varian</a>';
                    return $btn;
                })
                ->rawColumns(['action', 'animal_image'])
                ->make(true);
        }

        return view('page.master.review.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list_animal = Review::get_animal();

        $this->form[0]['source'] = $list_animal;

        $arr = [
            'form' => $this->form,
            'action' => 'create'
        ];

        return view('page.master.review.form', $arr);
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
            'pet_type' => $request->pet_type,
            'pet_name' => $request->pet_name,
            'review' => json_encode($request->review),
            'created_at' => date('Y-m-d H:i:s')
        ];

        foreach ($request->file() as $key => $value) {
            $document_file = $key . '_' . date('dmY') . '_' . time() . '.' . $request->$key->extension();
            $post[$key] = $document_file;
            $request->file($key)->move(public_path('assets/lampiran/' . $key), $document_file);
        }

        Review::create($post);

        return redirect(url('master-review'))->with('status', 'Data has been successfully added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\review  $review
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $list_animal = Review::get_animal();
        $this->form[0]['source'] = $list_animal;

        $a = Review::where('id', $id)->first()->toArray();

        $data = [
            'data' => $a,
            'form' => $this->form,
            'action' => 'edit'
        ];

        return view('page.master.review.form', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\review  $review
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
            'pet_type' => $request->pet_type,
            'pet_name' => $request->pet_name,
            'review' => json_encode($request->review),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $old_data = Review::where('id', $id)->first();

        foreach ($request->file() as $key => $value) {
            $document_file = $key . '_' . date('dmY') . '_' . time() . '.' . $request->$key->extension();
            $post[$key] = $document_file;
            if (File::exists(public_path('assets/lampiran/' . $key . '/' . $old_data->$key))) {
                unlink(public_path('assets/lampiran/' . $key . '/' . $old_data->$key));
            }
            $request->file($key)->move(public_path('assets/lampiran/' . $key), $document_file);
        }

        Review::where('id', $id)->update($post);
        return redirect(url('master-review'))->with('status', 'Data has been successfully changed.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Review::destroy($id);

        if ($delete) {
            return response()->json(['status' => 200, 'message' => 'Data has been successfully deleted.']);
        } else {
            return response()->json(['status' => 500, 'message' => 'Ops, there is some error.']);
        }
    }
}
