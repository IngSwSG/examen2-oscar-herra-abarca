<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $primaryKey = 'codigo';

    protected $fillable = [
        'unidadMedida',
        'descripcion',
        'ubicacion',
        'categoria_id'
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id', 'idCategoria');
    }

    public function materialUnidades()
    {
        return $this->hasMany(MaterialUnidad::class, 'material_id', 'codigo');
    }
}