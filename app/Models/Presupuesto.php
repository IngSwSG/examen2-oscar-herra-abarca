<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Presupuesto extends Model
{
    protected $primaryKey = 'codigoPresupuesto';

    protected $fillable = ['nombrePresupuesto'];
}