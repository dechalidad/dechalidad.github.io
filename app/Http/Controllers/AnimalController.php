<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\File;

class AnimalController extends Controller
{
    public $form = [
        [
            'field' => 'name',
            'type'  => 'text',
            'label' => 'Animal Type ("Bahasa")',
            'placeholder' => 'Type in Bahasa. ex : burung,kucing,etc',
            'rules' => 'required'
        ],
        [
            'field' => 'type',
            'type'  => 'text',
            'label' => 'Animal Type ("English")',
            'placeholder' => 'Type in English. ex : bird,cat,etc',
            'rules' => 'required'
        ],
        [
            'field' => 'icon',
            'type'  => 'text',
            'label' => 'Icon',
            'placeholder' => 'Insert name of css class. ex : fas fa-cat (ref. FontAwesome)',
            'rules' => 'required'
        ],
        [
            'field' => 'tagline',
            'type'  => 'text',
            'label' => 'Tagline ("Bahasa")',
            'placeholder' => 'Tagline in Bahasa',
            'rules' => 'required|max:40'
        ],
        [
            'field' => 'tagline_in_english',
            'type'  => 'text',
            'label' => 'Tagline ("English")',
            'placeholder' => 'Enter Tagline in English',
            'rules' => 'required|max:40'
        ],
        [
            'field' => 'animal_file',
            'type'  => 'file',
            'label' => 'Animal Image',
            'placeholder' => '',
            'rules' => 'required'
        ],
        [
            'field' => 'banner_file',
            'type'  => 'file',
            'label' => 'Animal Banner',
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

            $data = Animal::latest()->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . url('master-animal/' . $row->id . '/edit') . '" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-success btn-sm">Edit</a>';
                    $btn .= "<form action=" . url('master-animal/' . $row->id) . " method='POST' class='d-inline process-delete'>
                    <input type='hidden' name='_method' value='delete'>
                    <input type='hidden' name='_token' value=" . csrf_token() . ">
                    <button type='submit' class='btn btn-danger btn-sm'>Delete</button>
                </form>";
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('page.master.animal.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arr = [
            'form' => $this->form,
            'action' => 'create'
        ];

        return view('page.master.animal.form', $arr);
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
            'name' => $request->name,
            'type' => $request->type,
            'icon' => $request->icon,
            'tagline' => $request->tagline,
            'tagline_in_english' => $request->tagline_in_english,
            'created_at' => date('Y-m-d H:i:s')
        ];

        foreach ($request->file() as $key => $value) {
            $document_file = $key . '_' . date('dmY') . '_' . time() . '.' . $request->$key->extension();
            $post[$key] = $document_file;
            $request->file($key)->move(public_path('assets/lampiran/' . $key), $document_file);
        }

        Animal::create($post);

        return redirect(url('master-animal'))->with('status', 'Data has been successfully added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $a = Animal::where('id', $id)->first()->toArray();

        $data = [
            'data' => $a,
            'form' => $this->form,
            'action' => 'edit'
        ];

        return view('page.master.animal.form', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Animal  $animal
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
            'name' => $request->name,
            'type' => $request->type,
            'icon' => $request->icon,
            'tagline' => $request->tagline,
            'tagline_in_english' => $request->tagline_in_english,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $old_data = Animal::where('id', $id)->first();

        foreach ($request->file() as $key => $value) {
            $document_file = $key . '_' . date('dmY') . '_' . time() . '.' . $request->$key->extension();
            $post[$key] = $document_file;
            if (File::exists(public_path('assets/lampiran/' . $key . '/' . $old_data->$key))) {
                unlink(public_path('assets/lampiran/' . $key . '/' . $old_data->$key));
            }
            $request->file($key)->move(public_path('assets/lampiran/' . $key), $document_file);
        }

        Animal::where('id', $id)->update($post);
        return redirect(url('master-animal'))->with('status', 'Data has been successfully changed.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Animal::destroy($id);
        // return redirect(url('master-animal'))->with('status', 'Data berhasil dihapus');
        if ($delete) {
            return response()->json(['status' => 200, 'message' => 'Data has been successfully deleted.']);
        } else {
            return response()->json(['status' => 500, 'message' => 'Ops, there is some error.']);
        }
    }
}
