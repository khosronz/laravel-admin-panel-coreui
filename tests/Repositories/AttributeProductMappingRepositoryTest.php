<?php namespace Tests\Repositories;

use App\Models\AttributeProductMapping;
use App\Repositories\AttributeProductMappingRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class AttributeProductMappingRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var AttributeProductMappingRepository
     */
    protected $attributeProductMappingRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->attributeProductMappingRepo = \App::make(AttributeProductMappingRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_attribute_product_mapping()
    {
        $attributeProductMapping = factory(AttributeProductMapping::class)->make()->toArray();

        $createdAttributeProductMapping = $this->attributeProductMappingRepo->create($attributeProductMapping);

        $createdAttributeProductMapping = $createdAttributeProductMapping->toArray();
        $this->assertArrayHasKey('id', $createdAttributeProductMapping);
        $this->assertNotNull($createdAttributeProductMapping['id'], 'Created AttributeProductMapping must have id specified');
        $this->assertNotNull(AttributeProductMapping::find($createdAttributeProductMapping['id']), 'AttributeProductMapping with given id must be in DB');
        $this->assertModelData($attributeProductMapping, $createdAttributeProductMapping);
    }

    /**
     * @test read
     */
    public function test_read_attribute_product_mapping()
    {
        $attributeProductMapping = factory(AttributeProductMapping::class)->create();

        $dbAttributeProductMapping = $this->attributeProductMappingRepo->find($attributeProductMapping->id);

        $dbAttributeProductMapping = $dbAttributeProductMapping->toArray();
        $this->assertModelData($attributeProductMapping->toArray(), $dbAttributeProductMapping);
    }

    /**
     * @test update
     */
    public function test_update_attribute_product_mapping()
    {
        $attributeProductMapping = factory(AttributeProductMapping::class)->create();
        $fakeAttributeProductMapping = factory(AttributeProductMapping::class)->make()->toArray();

        $updatedAttributeProductMapping = $this->attributeProductMappingRepo->update($fakeAttributeProductMapping, $attributeProductMapping->id);

        $this->assertModelData($fakeAttributeProductMapping, $updatedAttributeProductMapping->toArray());
        $dbAttributeProductMapping = $this->attributeProductMappingRepo->find($attributeProductMapping->id);
        $this->assertModelData($fakeAttributeProductMapping, $dbAttributeProductMapping->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_attribute_product_mapping()
    {
        $attributeProductMapping = factory(AttributeProductMapping::class)->create();

        $resp = $this->attributeProductMappingRepo->delete($attributeProductMapping->id);

        $this->assertTrue($resp);
        $this->assertNull(AttributeProductMapping::find($attributeProductMapping->id), 'AttributeProductMapping should not exist in DB');
    }
}
