<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\UsuarioController;

class UsuarioControllerApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_usuario_controller()
    {
        $usuarioController = UsuarioController::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/usuario_controllers', $usuarioController
        );

        $this->assertApiResponse($usuarioController);
    }

    /**
     * @test
     */
    public function test_read_usuario_controller()
    {
        $usuarioController = UsuarioController::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/usuario_controllers/'.$usuarioController->id
        );

        $this->assertApiResponse($usuarioController->toArray());
    }

    /**
     * @test
     */
    public function test_update_usuario_controller()
    {
        $usuarioController = UsuarioController::factory()->create();
        $editedUsuarioController = UsuarioController::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/usuario_controllers/'.$usuarioController->id,
            $editedUsuarioController
        );

        $this->assertApiResponse($editedUsuarioController);
    }

    /**
     * @test
     */
    public function test_delete_usuario_controller()
    {
        $usuarioController = UsuarioController::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/usuario_controllers/'.$usuarioController->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/usuario_controllers/'.$usuarioController->id
        );

        $this->response->assertStatus(404);
    }
}
