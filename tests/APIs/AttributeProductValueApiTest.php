<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\AttributeProductValue;

class AttributeProductValueApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_attribute_product_value()
    {
        $attributeProductValue = factory(AttributeProductValue::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/attribute_product_values', $attributeProductValue
        );

        $this->assertApiResponse($attributeProductValue);
    }

    /**
     * @test
     */
    public function test_read_attribute_product_value()
    {
        $attributeProductValue = factory(AttributeProductValue::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/attribute_product_values/'.$attributeProductValue->id
        );

        $this->assertApiResponse($attributeProductValue->toArray());
    }

    /**
     * @test
     */
    public function test_update_attribute_product_value()
    {
        $attributeProductValue = factory(AttributeProductValue::class)->create();
        $editedAttributeProductValue = factory(AttributeProductValue::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/attribute_product_values/'.$attributeProductValue->id,
            $editedAttributeProductValue
        );

        $this->assertApiResponse($editedAttributeProductValue);
    }

    /**
     * @test
     */
    public function test_delete_attribute_product_value()
    {
        $attributeProductValue = factory(AttributeProductValue::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/attribute_product_values/'.$attributeProductValue->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/attribute_product_values/'.$attributeProductValue->id
        );

        $this->response->assertStatus(404);
    }
}
