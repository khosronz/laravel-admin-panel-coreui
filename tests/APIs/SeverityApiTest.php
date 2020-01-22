<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Severity;

class SeverityApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_severity()
    {
        $severity = factory(Severity::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/severities', $severity
        );

        $this->assertApiResponse($severity);
    }

    /**
     * @test
     */
    public function test_read_severity()
    {
        $severity = factory(Severity::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/severities/'.$severity->id
        );

        $this->assertApiResponse($severity->toArray());
    }

    /**
     * @test
     */
    public function test_update_severity()
    {
        $severity = factory(Severity::class)->create();
        $editedSeverity = factory(Severity::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/severities/'.$severity->id,
            $editedSeverity
        );

        $this->assertApiResponse($editedSeverity);
    }

    /**
     * @test
     */
    public function test_delete_severity()
    {
        $severity = factory(Severity::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/severities/'.$severity->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/severities/'.$severity->id
        );

        $this->response->assertStatus(404);
    }
}
