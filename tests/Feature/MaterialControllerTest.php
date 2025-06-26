<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Categoria;

class MaterialControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function dadoUnMaterialQueNoExiste_insertarMaterial_funcionaCorrectamente()
    {
        $categoria = Categoria::factory()->create();

        $data = [
            'unidadMedida' => 'kg',
            'descripcion' => 'Material de prueba',
            'ubicacion' => 'Bodega',
            'categoria_id' => $categoria->idCategoria,
        ];

        $response = $this->postJson('/materiales', $data);

        $response->assertStatus(201)
                 ->assertJsonFragment([
                     'unidadMedida' => 'kg',
                     'descripcion' => 'Material de prueba',
                     'ubicacion' => 'Bodega',
                     'categoria_id' => $categoria->idCategoria,
                 ]);
    }

    /** @test */
    public function noPermiteInsertarMaterialSinCategoria()
    {
        $data = [
            'unidadMedida' => 'kg',
            'descripcion' => 'Material sin categoría',
            'ubicacion' => 'Bodega',
            // 'categoria_id' => falta
        ];

        $response = $this->postJson('/materiales', $data);

        $response->assertStatus(422); 
    }
}