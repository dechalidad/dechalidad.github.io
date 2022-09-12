<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\File;

class BannerController extends Controller
{
    public $form = [
        [
            'field' => 'is_active',
            'type'  => 'dropdown',
            'label' => 'Show Banner',
            'placeholder' => '',
            'source' => [
                1 => 'Yes',
                0 => 'No'
            ],
            'rules' => 'required'
        ],
        [
            'field' => 'banner_file',
            'type'  => 'file',
            'label' => 'Banner Image File',
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

            $data = Banner::latest()->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('banner_image', function ($row) {
                    $img = '<img src="' . url('assets/lampiran/banner_file/' . $row->banner_file) . '" style="width:200px;">';
                    return $img;
                })
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . url('master-banner/' . $row->id . '/edit') . '" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-success btn-sm">Edit</a>';
                    return $btn;
                })
                ->rawColumns(['action', 'banner_image'])
                ->make(true);
        }

        return view('page.master.banner.list');
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

        return view('page.master.banner.form', $arr);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $a = Banner::where('id', $id)->first()->toArray();

        $data = [
            'data' => $a,
            'form' => $this->form,
            'action' => 'edit'
        ];

        return view('page.master.banner.form', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
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
            'is_active' => $request->is_active,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $old_data = Banner::where('id', $id)->first();

        foreach ($request->file() as $key => $value) {
            $document_file = $key . '_' . date('dmY') . '_' . time() . '.' . $request->$key->extension();
            $post[$key] = $document_file;
            if (File::exists(public_path('assets/lampiran/' . $key . '/' . $old_data->$key))) {
                unlink(public_path('assets/lampiran/' . $key . '/' . $old_data->$key));
            }
            $request->file($key)->move(public_path('assets/lampiran/' . $key), $document_file);
        }

        Banner::where('id', $id)->update($post);
        return redirect(url('master-banner'))->with('status', 'Data has been successfully changed.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        //
    }
}
