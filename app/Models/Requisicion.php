<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Requisicion extends Model
{
    protected $primaryKey = 'idRequisicion';

    protected $fillable = [
        'fecha',
        'estado'
    ];
}