<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\Traits\MakeImprintTrait;
use Tests\ApiTestTrait;

class ImprintApiTest extends TestCase
{
    use MakeImprintTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_imprint()
    {
        $imprint = $this->fakeImprintData();
        $this->response = $this->json('POST', '/api/imprints', $imprint);

        $this->assertApiResponse($imprint);
    }

    /**
     * @test
     */
    public function test_read_imprint()
    {
        $imprint = $this->makeImprint();
        $this->response = $this->json('GET', '/api/imprints/'.$imprint->id);

        $this->assertApiResponse($imprint->toArray());
    }

    /**
     * @test
     */
    public function test_update_imprint()
    {
        $imprint = $this->makeImprint();
        $editedImprint = $this->fakeImprintData();

        $this->response = $this->json('PUT', '/api/imprints/'.$imprint->id, $editedImprint);

        $this->assertApiResponse($editedImprint);
    }

    /**
     * @test
     */
    public function test_delete_imprint()
    {
        $imprint = $this->makeImprint();
        $this->response = $this->json('DELETE', '/api/imprints/'.$imprint->id);

        $this->assertApiSuccess();
        $this->response = $this->json('GET', '/api/imprints/'.$imprint->id);

        $this->response->assertStatus(404);
    }
}
