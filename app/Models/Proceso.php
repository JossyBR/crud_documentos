<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proceso extends Model
{
    use HasFactory;

    protected $primaryKey = 'pro_id';

    protected $fillable = [
        'pro_prefijo',
        'pro_nombre',
    ];
}
