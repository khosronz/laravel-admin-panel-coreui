<?php namespace Tests\Repositories;

use App\Models\ProductType;
use App\Repositories\ProductTypeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ProductTypeRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ProductTypeRepository
     */
    protected $productTypeRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->productTypeRepo = \App::make(ProductTypeRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_product_type()
    {
        $productType = factory(ProductType::class)->make()->toArray();

        $createdProductType = $this->productTypeRepo->create($productType);

        $createdProductType = $createdProductType->toArray();
        $this->assertArrayHasKey('id', $createdProductType);
        $this->assertNotNull($createdProductType['id'], 'Created ProductType must have id specified');
        $this->assertNotNull(ProductType::find($createdProductType['id']), 'ProductType with given id must be in DB');
        $this->assertModelData($productType, $createdProductType);
    }

    /**
     * @test read
     */
    public function test_read_product_type()
    {
        $productType = factory(ProductType::class)->create();

        $dbProductType = $this->productTypeRepo->find($productType->id);

        $dbProductType = $dbProductType->toArray();
        $this->assertModelData($productType->toArray(), $dbProductType);
    }

    /**
     * @test update
     */
    public function test_update_product_type()
    {
        $productType = factory(ProductType::class)->create();
        $fakeProductType = factory(ProductType::class)->make()->toArray();

        $updatedProductType = $this->productTypeRepo->update($fakeProductType, $productType->id);

        $this->assertModelData($fakeProductType, $updatedProductType->toArray());
        $dbProductType = $this->productTypeRepo->find($productType->id);
        $this->assertModelData($fakeProductType, $dbProductType->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_product_type()
    {
        $productType = factory(ProductType::class)->create();

        $resp = $this->productTypeRepo->delete($productType->id);

        $this->assertTrue($resp);
        $this->assertNull(ProductType::find($productType->id), 'ProductType should not exist in DB');
    }
}
