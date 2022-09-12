<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class RoomsModel extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $timestamps = false;
    protected $table = 'ms_accomodation';
    protected $fillable = [
        'id',
        'title',
        'type',
        'desc',
        'accomodation_file',
        'date',
        'release_on',
        'align',
        'entry_stamp',
        'edit_stamp',
        'del'
    ];

    public static function get_data()
    {
        $q = DB::table('ms_accomodation')->where('del', 0)
                                        ->whereNotIn('release_on', array(1))
                                         ->orderBy('id')
                                         ->get();
                                        //  dd($q);
        $result = json_decode($q, true);
        return $result;
    }

    public static function get_detail($id)
    {
        $q = DB::table('ms_accomodation')->where('id', $id)
                                         ->get();
        $result = json_decode($q, true);
        return $result;
    }
}
