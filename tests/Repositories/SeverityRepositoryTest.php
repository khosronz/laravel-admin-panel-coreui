<?php namespace Tests\Repositories;

use App\Models\Severity;
use App\Repositories\SeverityRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class SeverityRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var SeverityRepository
     */
    protected $severityRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->severityRepo = \App::make(SeverityRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_severity()
    {
        $severity = factory(Severity::class)->make()->toArray();

        $createdSeverity = $this->severityRepo->create($severity);

        $createdSeverity = $createdSeverity->toArray();
        $this->assertArrayHasKey('id', $createdSeverity);
        $this->assertNotNull($createdSeverity['id'], 'Created Severity must have id specified');
        $this->assertNotNull(Severity::find($createdSeverity['id']), 'Severity with given id must be in DB');
        $this->assertModelData($severity, $createdSeverity);
    }

    /**
     * @test read
     */
    public function test_read_severity()
    {
        $severity = factory(Severity::class)->create();

        $dbSeverity = $this->severityRepo->find($severity->id);

        $dbSeverity = $dbSeverity->toArray();
        $this->assertModelData($severity->toArray(), $dbSeverity);
    }

    /**
     * @test update
     */
    public function test_update_severity()
    {
        $severity = factory(Severity::class)->create();
        $fakeSeverity = factory(Severity::class)->make()->toArray();

        $updatedSeverity = $this->severityRepo->update($fakeSeverity, $severity->id);

        $this->assertModelData($fakeSeverity, $updatedSeverity->toArray());
        $dbSeverity = $this->severityRepo->find($severity->id);
        $this->assertModelData($fakeSeverity, $dbSeverity->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_severity()
    {
        $severity = factory(Severity::class)->create();

        $resp = $this->severityRepo->delete($severity->id);

        $this->assertTrue($resp);
        $this->assertNull(Severity::find($severity->id), 'Severity should not exist in DB');
    }
}
