<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Weight extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'weights';
    protected $fillable = [
        'id_product',
        'id_measure',
        'weight',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public static function get_measure()
    {
        $data = DB::table('measures')->where(['deleted_at' => null])->get();
        $group = [];
        foreach ($data as $key => $value) {
            $group[$value->id] = $value->name;
        }
        return $group;
    }
}
