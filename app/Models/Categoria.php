<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // <-- AGREGA ESTA LÍNEA
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $primaryKey = 'idCategoria';

    protected $fillable = ['nombre'];

    public function materiales()
    {
        return $this->hasMany(Material::class, 'categoria_id', 'idCategoria');
    }
}