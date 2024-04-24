<?php namespace Tests\Repositories;

use App\Models\UsuarioController;
use App\Repositories\UsuarioControllerRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class UsuarioControllerRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var UsuarioControllerRepository
     */
    protected $usuarioControllerRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->usuarioControllerRepo = \App::make(UsuarioControllerRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_usuario_controller()
    {
        $usuarioController = UsuarioController::factory()->make()->toArray();

        $createdUsuarioController = $this->usuarioControllerRepo->create($usuarioController);

        $createdUsuarioController = $createdUsuarioController->toArray();
        $this->assertArrayHasKey('id', $createdUsuarioController);
        $this->assertNotNull($createdUsuarioController['id'], 'Created UsuarioController must have id specified');
        $this->assertNotNull(UsuarioController::find($createdUsuarioController['id']), 'UsuarioController with given id must be in DB');
        $this->assertModelData($usuarioController, $createdUsuarioController);
    }

    /**
     * @test read
     */
    public function test_read_usuario_controller()
    {
        $usuarioController = UsuarioController::factory()->create();

        $dbUsuarioController = $this->usuarioControllerRepo->find($usuarioController->id);

        $dbUsuarioController = $dbUsuarioController->toArray();
        $this->assertModelData($usuarioController->toArray(), $dbUsuarioController);
    }

    /**
     * @test update
     */
    public function test_update_usuario_controller()
    {
        $usuarioController = UsuarioController::factory()->create();
        $fakeUsuarioController = UsuarioController::factory()->make()->toArray();

        $updatedUsuarioController = $this->usuarioControllerRepo->update($fakeUsuarioController, $usuarioController->id);

        $this->assertModelData($fakeUsuarioController, $updatedUsuarioController->toArray());
        $dbUsuarioController = $this->usuarioControllerRepo->find($usuarioController->id);
        $this->assertModelData($fakeUsuarioController, $dbUsuarioController->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_usuario_controller()
    {
        $usuarioController = UsuarioController::factory()->create();

        $resp = $this->usuarioControllerRepo->delete($usuarioController->id);

        $this->assertTrue($resp);
        $this->assertNull(UsuarioController::find($usuarioController->id), 'UsuarioController should not exist in DB');
    }
}
