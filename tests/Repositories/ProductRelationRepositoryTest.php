<?php namespace Tests\Repositories;

use App\Models\ProductRelation;
use App\Repositories\ProductRelationRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ProductRelationRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ProductRelationRepository
     */
    protected $productRelationRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->productRelationRepo = \App::make(ProductRelationRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_product_relation()
    {
        $productRelation = factory(ProductRelation::class)->make()->toArray();

        $createdProductRelation = $this->productRelationRepo->create($productRelation);

        $createdProductRelation = $createdProductRelation->toArray();
        $this->assertArrayHasKey('id', $createdProductRelation);
        $this->assertNotNull($createdProductRelation['id'], 'Created ProductRelation must have id specified');
        $this->assertNotNull(ProductRelation::find($createdProductRelation['id']), 'ProductRelation with given id must be in DB');
        $this->assertModelData($productRelation, $createdProductRelation);
    }

    /**
     * @test read
     */
    public function test_read_product_relation()
    {
        $productRelation = factory(ProductRelation::class)->create();

        $dbProductRelation = $this->productRelationRepo->find($productRelation->id);

        $dbProductRelation = $dbProductRelation->toArray();
        $this->assertModelData($productRelation->toArray(), $dbProductRelation);
    }

    /**
     * @test update
     */
    public function test_update_product_relation()
    {
        $productRelation = factory(ProductRelation::class)->create();
        $fakeProductRelation = factory(ProductRelation::class)->make()->toArray();

        $updatedProductRelation = $this->productRelationRepo->update($fakeProductRelation, $productRelation->id);

        $this->assertModelData($fakeProductRelation, $updatedProductRelation->toArray());
        $dbProductRelation = $this->productRelationRepo->find($productRelation->id);
        $this->assertModelData($fakeProductRelation, $dbProductRelation->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_product_relation()
    {
        $productRelation = factory(ProductRelation::class)->create();

        $resp = $this->productRelationRepo->delete($productRelation->id);

        $this->assertTrue($resp);
        $this->assertNull(ProductRelation::find($productRelation->id), 'ProductRelation should not exist in DB');
    }
}
