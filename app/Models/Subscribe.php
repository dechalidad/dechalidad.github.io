<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Subscribe extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'subscribes';
    protected $fillable = [
        'email',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
