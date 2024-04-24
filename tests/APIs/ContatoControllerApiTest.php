<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\ContatoController;

class ContatoControllerApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_contato_controller()
    {
        $contatoController = ContatoController::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/contato_controllers', $contatoController
        );

        $this->assertApiResponse($contatoController);
    }

    /**
     * @test
     */
    public function test_read_contato_controller()
    {
        $contatoController = ContatoController::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/contato_controllers/'.$contatoController->id
        );

        $this->assertApiResponse($contatoController->toArray());
    }

    /**
     * @test
     */
    public function test_update_contato_controller()
    {
        $contatoController = ContatoController::factory()->create();
        $editedContatoController = ContatoController::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/contato_controllers/'.$contatoController->id,
            $editedContatoController
        );

        $this->assertApiResponse($editedContatoController);
    }

    /**
     * @test
     */
    public function test_delete_contato_controller()
    {
        $contatoController = ContatoController::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/contato_controllers/'.$contatoController->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/contato_controllers/'.$contatoController->id
        );

        $this->response->assertStatus(404);
    }
}
