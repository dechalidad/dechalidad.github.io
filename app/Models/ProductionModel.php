<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class NewsModel extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $timestamps = false;
    protected $table = 'ms_news';
    protected $fillable = [
        'id',
        'title',
        'type',
        'desc',
        'news_file',
        'date',
        'release_on',
        'entry_stamp',
        'edit_stamp',
        'del'
    ];

    public static function get_data()
    {
        $q = DB::table('ms_news')->where('del', 0)
                                 ->orWhereNotIn('release_on', array(1))
                                 ->orderBy('id')
                                 ->get();
        $result = json_decode($q, true);
        return $result;
    }

    public static function get_detail($id)
    {
        $q = DB::table('ms_news')->where('id', $id)
                                 ->get();
        $result = json_decode($q, true);
        return $result;
    }
}
