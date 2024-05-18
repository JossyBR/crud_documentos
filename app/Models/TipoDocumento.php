<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
    use HasFactory;

    protected $primaryKey = 'tip_id';

    protected $fillable = [
        'tip_prefijo',
        'tip_nombre',
    ];
}
