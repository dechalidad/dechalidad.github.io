<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Consultation extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'consultations';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'message',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
