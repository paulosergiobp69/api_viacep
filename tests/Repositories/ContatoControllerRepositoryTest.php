<?php namespace Tests\Repositories;

use App\Models\ContatoController;
use App\Repositories\ContatoControllerRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ContatoControllerRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ContatoControllerRepository
     */
    protected $contatoControllerRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->contatoControllerRepo = \App::make(ContatoControllerRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_contato_controller()
    {
        $contatoController = ContatoController::factory()->make()->toArray();

        $createdContatoController = $this->contatoControllerRepo->create($contatoController);

        $createdContatoController = $createdContatoController->toArray();
        $this->assertArrayHasKey('id', $createdContatoController);
        $this->assertNotNull($createdContatoController['id'], 'Created ContatoController must have id specified');
        $this->assertNotNull(ContatoController::find($createdContatoController['id']), 'ContatoController with given id must be in DB');
        $this->assertModelData($contatoController, $createdContatoController);
    }

    /**
     * @test read
     */
    public function test_read_contato_controller()
    {
        $contatoController = ContatoController::factory()->create();

        $dbContatoController = $this->contatoControllerRepo->find($contatoController->id);

        $dbContatoController = $dbContatoController->toArray();
        $this->assertModelData($contatoController->toArray(), $dbContatoController);
    }

    /**
     * @test update
     */
    public function test_update_contato_controller()
    {
        $contatoController = ContatoController::factory()->create();
        $fakeContatoController = ContatoController::factory()->make()->toArray();

        $updatedContatoController = $this->contatoControllerRepo->update($fakeContatoController, $contatoController->id);

        $this->assertModelData($fakeContatoController, $updatedContatoController->toArray());
        $dbContatoController = $this->contatoControllerRepo->find($contatoController->id);
        $this->assertModelData($fakeContatoController, $dbContatoController->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_contato_controller()
    {
        $contatoController = ContatoController::factory()->create();

        $resp = $this->contatoControllerRepo->delete($contatoController->id);

        $this->assertTrue($resp);
        $this->assertNull(ContatoController::find($contatoController->id), 'ContatoController should not exist in DB');
    }
}
