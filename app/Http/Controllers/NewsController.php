<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class NewsController extends Controller
{
    public $form = [
        [
            'field' => 'is_english',
            'type'  => 'dropdown',
            'label' => 'Language',
            'placeholder' => '',
            'rules' => 'required',
            'source' => [
                0 => 'Bahasa',
                1 => 'English'
            ]
        ],
        [
            'field' => 'id_animal',
            'type'  => 'dropdown',
            'label' => 'Animal Type',
            'placeholder' => '',
            'rules' => 'required'
        ],
        [
            'field' => 'id_category',
            'type'  => 'dropdown',
            'label' => 'Article Type',
            'placeholder' => '',
            'rules' => 'required'
        ],
        [
            'field' => 'title',
            'type'  => 'text',
            'label' => 'Title',
            'placeholder' => '',
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
            'field' => 'date',
            'type'  => 'date',
            'label' => 'Article Date',
            'placeholder' => '',
            'rules' => 'required'
        ],
        [
            'field' => 'cover_file',
            'type'  => 'file',
            'label' => 'Article Cover',
            'placeholder' => '',
            'rules' => 'required'
        ],
        [
            'field' => 'banner_file',
            'type'  => 'file',
            'label' => 'Article Banner',
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

            $data = News::select(
                'news_categories.name as type',
                'news.*'
            )
                ->join('news_categories', 'news_categories.id', '=', 'news.id_category')
                ->latest()
                ->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . url('master-news/' . $row->id . '/edit') . '" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-success btn-sm">Edit</a>';
                    $btn .= "<form action=" . url('master-news/' . $row->id) . " method='POST' class='d-inline process-delete'>
                    <input type='hidden' name='_method' value='delete'>
                    <input type='hidden' name='_token' value=" . csrf_token() . ">
                    <button type='submit' class='btn btn-danger btn-sm'>Delete</button>
                </form>";
                    return $btn;
                })
                ->addColumn('language', function ($row) {
                    if ($row->is_english == 1) {
                        return 'English';
                    } else {
                        return 'Bahasa';
                    }
                })
                ->rawColumns(['action', 'language'])
                ->make(true);
        }

        return view('page.master.news.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->form[1]['source'] = News::get_animal();
        $this->form[2]['source'] = News::get_news_category();
        $arr = [
            'form' => $this->form,
            'action' => 'create'
        ];

        return view('page.master.news.form', $arr);
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
            'id_category' => $request->id_category,
            'title' => $request->title,
            'date' => $request->date,
            'is_english' => $request->is_english,
            'description' => json_encode($request->description),
            'created_at' => date('Y-m-d H:i:s')
        ];

        foreach ($request->file() as $key => $value) {
            $document_file = $key . '_' . date('dmY') . '_' . time() . '.' . $request->$key->extension();
            $post[$key] = $document_file;
            $request->file($key)->move(public_path('assets/lampiran/' . $key), $document_file);
        }

        News::create($post);

        return redirect(url('master-news'))->with('status', 'Data has been successfully added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $a = News::where('id', $id)->first()->toArray();
        $this->form[1]['source'] = News::get_animal();
        $this->form[2]['source'] = News::get_news_category();

        $data = [
            'data' => $a,
            'form' => $this->form,
            'action' => 'edit'
        ];

        return view('page.master.news.form', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
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
            'id_category' => $request->id_category,
            'title' => $request->title,
            'date' => $request->date,
            'is_english' => $request->is_english,
            'description' => json_encode($request->description),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $old_data = News::where('id', $id)->first();

        foreach ($request->file() as $key => $value) {
            $document_file = $key . '_' . date('dmY') . '_' . time() . '.' . $request->$key->extension();
            $post[$key] = $document_file;
            if (File::exists(public_path('assets/lampiran/' . $key . '/' . $old_data->$key))) {
                unlink(public_path('assets/lampiran/' . $key . '/' . $old_data->$key));
            }
            $request->file($key)->move(public_path('assets/lampiran/' . $key), $document_file);
        }

        News::where('id', $id)->update($post);
        return redirect(url('master-news'))->with('status', 'Data has been successfully changed.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = News::destroy($id);

        if ($delete) {
            return response()->json(['status' => 200, 'message' => 'Data has been successfully deleted.']);
        } else {
            return response()->json(['status' => 500, 'message' => 'Ops, there is some error.']);
        }
    }

    public function format_desc_news()
    {
        $data = DB::table('news')->whereNull('deleted_at')->get()->toArray();
        foreach ($data as $key => $value) {
            $decoded_desc = base64_decode($value->description);
            $format_desc = json_encode($decoded_desc);

            // DB::table('news')->where(['id' => $value->id])->update(['description' => $format_desc]);
        }
    }
}
