<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\AttributeProductMapping;

class AttributeProductMappingApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_attribute_product_mapping()
    {
        $attributeProductMapping = factory(AttributeProductMapping::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/attribute_product_mappings', $attributeProductMapping
        );

        $this->assertApiResponse($attributeProductMapping);
    }

    /**
     * @test
     */
    public function test_read_attribute_product_mapping()
    {
        $attributeProductMapping = factory(AttributeProductMapping::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/attribute_product_mappings/'.$attributeProductMapping->id
        );

        $this->assertApiResponse($attributeProductMapping->toArray());
    }

    /**
     * @test
     */
    public function test_update_attribute_product_mapping()
    {
        $attributeProductMapping = factory(AttributeProductMapping::class)->create();
        $editedAttributeProductMapping = factory(AttributeProductMapping::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/attribute_product_mappings/'.$attributeProductMapping->id,
            $editedAttributeProductMapping
        );

        $this->assertApiResponse($editedAttributeProductMapping);
    }

    /**
     * @test
     */
    public function test_delete_attribute_product_mapping()
    {
        $attributeProductMapping = factory(AttributeProductMapping::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/attribute_product_mappings/'.$attributeProductMapping->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/attribute_product_mappings/'.$attributeProductMapping->id
        );

        $this->response->assertStatus(404);
    }
}
