<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class OffersModel extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $timestamps = false;
    protected $table = 'ms_dining';
    protected $fillable = [
        'id',
        'title',
        'type',
        'desc',
        'dining_file',
        'date',
        'release_on',
        'entry_stamp',
        'edit_stamp',
        'del'
    ];

    public static function get_data()
    {
        $q = DB::table('ms_dining')->where('del', 0)
                                    ->whereNotIn('release_on', array(1))
                                //  ->where('status', 1)
                                //  ->orWhere('status', 2)
                                 ->orderBy('id')
                                 ->get();
        $result = json_decode($q, true);
        return $result;
    }

    public static function get_detail($id)
    {
        $q = DB::table('ms_dining')->where('id', $id)
                                 ->get();
        $result = json_decode($q, true);
        return $result;
    }
}
