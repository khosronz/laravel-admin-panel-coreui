<?php namespace Tests\Repositories;

use App\Models\AttributeProductValue;
use App\Repositories\AttributeProductValueRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class AttributeProductValueRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var AttributeProductValueRepository
     */
    protected $attributeProductValueRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->attributeProductValueRepo = \App::make(AttributeProductValueRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_attribute_product_value()
    {
        $attributeProductValue = factory(AttributeProductValue::class)->make()->toArray();

        $createdAttributeProductValue = $this->attributeProductValueRepo->create($attributeProductValue);

        $createdAttributeProductValue = $createdAttributeProductValue->toArray();
        $this->assertArrayHasKey('id', $createdAttributeProductValue);
        $this->assertNotNull($createdAttributeProductValue['id'], 'Created AttributeProductValue must have id specified');
        $this->assertNotNull(AttributeProductValue::find($createdAttributeProductValue['id']), 'AttributeProductValue with given id must be in DB');
        $this->assertModelData($attributeProductValue, $createdAttributeProductValue);
    }

    /**
     * @test read
     */
    public function test_read_attribute_product_value()
    {
        $attributeProductValue = factory(AttributeProductValue::class)->create();

        $dbAttributeProductValue = $this->attributeProductValueRepo->find($attributeProductValue->id);

        $dbAttributeProductValue = $dbAttributeProductValue->toArray();
        $this->assertModelData($attributeProductValue->toArray(), $dbAttributeProductValue);
    }

    /**
     * @test update
     */
    public function test_update_attribute_product_value()
    {
        $attributeProductValue = factory(AttributeProductValue::class)->create();
        $fakeAttributeProductValue = factory(AttributeProductValue::class)->make()->toArray();

        $updatedAttributeProductValue = $this->attributeProductValueRepo->update($fakeAttributeProductValue, $attributeProductValue->id);

        $this->assertModelData($fakeAttributeProductValue, $updatedAttributeProductValue->toArray());
        $dbAttributeProductValue = $this->attributeProductValueRepo->find($attributeProductValue->id);
        $this->assertModelData($fakeAttributeProductValue, $dbAttributeProductValue->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_attribute_product_value()
    {
        $attributeProductValue = factory(AttributeProductValue::class)->create();

        $resp = $this->attributeProductValueRepo->delete($attributeProductValue->id);

        $this->assertTrue($resp);
        $this->assertNull(AttributeProductValue::find($attributeProductValue->id), 'AttributeProductValue should not exist in DB');
    }
}
