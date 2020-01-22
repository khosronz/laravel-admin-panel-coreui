<?php namespace Tests\Repositories;

use App\Models\ProductFeatures;
use App\Repositories\ProductFeaturesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ProductFeaturesRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ProductFeaturesRepository
     */
    protected $productFeaturesRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->productFeaturesRepo = \App::make(ProductFeaturesRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_product_features()
    {
        $productFeatures = factory(ProductFeatures::class)->make()->toArray();

        $createdProductFeatures = $this->productFeaturesRepo->create($productFeatures);

        $createdProductFeatures = $createdProductFeatures->toArray();
        $this->assertArrayHasKey('id', $createdProductFeatures);
        $this->assertNotNull($createdProductFeatures['id'], 'Created ProductFeatures must have id specified');
        $this->assertNotNull(ProductFeatures::find($createdProductFeatures['id']), 'ProductFeatures with given id must be in DB');
        $this->assertModelData($productFeatures, $createdProductFeatures);
    }

    /**
     * @test read
     */
    public function test_read_product_features()
    {
        $productFeatures = factory(ProductFeatures::class)->create();

        $dbProductFeatures = $this->productFeaturesRepo->find($productFeatures->id);

        $dbProductFeatures = $dbProductFeatures->toArray();
        $this->assertModelData($productFeatures->toArray(), $dbProductFeatures);
    }

    /**
     * @test update
     */
    public function test_update_product_features()
    {
        $productFeatures = factory(ProductFeatures::class)->create();
        $fakeProductFeatures = factory(ProductFeatures::class)->make()->toArray();

        $updatedProductFeatures = $this->productFeaturesRepo->update($fakeProductFeatures, $productFeatures->id);

        $this->assertModelData($fakeProductFeatures, $updatedProductFeatures->toArray());
        $dbProductFeatures = $this->productFeaturesRepo->find($productFeatures->id);
        $this->assertModelData($fakeProductFeatures, $dbProductFeatures->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_product_features()
    {
        $productFeatures = factory(ProductFeatures::class)->create();

        $resp = $this->productFeaturesRepo->delete($productFeatures->id);

        $this->assertTrue($resp);
        $this->assertNull(ProductFeatures::find($productFeatures->id), 'ProductFeatures should not exist in DB');
    }
}
