<?php namespace Tests\Repositories;

use App\Models\Imprint;
use App\Repositories\ImprintRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\Traits\MakeImprintTrait;
use Tests\ApiTestTrait;

class ImprintRepositoryTest extends TestCase
{
    use MakeImprintTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ImprintRepository
     */
    protected $imprintRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->imprintRepo = \App::make(ImprintRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_imprint()
    {
        $imprint = $this->fakeImprintData();
        $createdImprint = $this->imprintRepo->create($imprint);
        $createdImprint = $createdImprint->toArray();
        $this->assertArrayHasKey('id', $createdImprint);
        $this->assertNotNull($createdImprint['id'], 'Created Imprint must have id specified');
        $this->assertNotNull(Imprint::find($createdImprint['id']), 'Imprint with given id must be in DB');
        $this->assertModelData($imprint, $createdImprint);
    }

    /**
     * @test read
     */
    public function test_read_imprint()
    {
        $imprint = $this->makeImprint();
        $dbImprint = $this->imprintRepo->find($imprint->id);
        $dbImprint = $dbImprint->toArray();
        $this->assertModelData($imprint->toArray(), $dbImprint);
    }

    /**
     * @test update
     */
    public function test_update_imprint()
    {
        $imprint = $this->makeImprint();
        $fakeImprint = $this->fakeImprintData();
        $updatedImprint = $this->imprintRepo->update($fakeImprint, $imprint->id);
        $this->assertModelData($fakeImprint, $updatedImprint->toArray());
        $dbImprint = $this->imprintRepo->find($imprint->id);
        $this->assertModelData($fakeImprint, $dbImprint->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_imprint()
    {
        $imprint = $this->makeImprint();
        $resp = $this->imprintRepo->delete($imprint->id);
        $this->assertTrue($resp);
        $this->assertNull(Imprint::find($imprint->id), 'Imprint should not exist in DB');
    }
}
