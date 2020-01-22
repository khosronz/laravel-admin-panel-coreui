<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\ProductType;

class ProductTypeApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_product_type()
    {
        $productType = factory(ProductType::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/product_types', $productType
        );

        $this->assertApiResponse($productType);
    }

    /**
     * @test
     */
    public function test_read_product_type()
    {
        $productType = factory(ProductType::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/product_types/'.$productType->id
        );

        $this->assertApiResponse($productType->toArray());
    }

    /**
     * @test
     */
    public function test_update_product_type()
    {
        $productType = factory(ProductType::class)->create();
        $editedProductType = factory(ProductType::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/product_types/'.$productType->id,
            $editedProductType
        );

        $this->assertApiResponse($editedProductType);
    }

    /**
     * @test
     */
    public function test_delete_product_type()
    {
        $productType = factory(ProductType::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/product_types/'.$productType->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/product_types/'.$productType->id
        );

        $this->response->assertStatus(404);
    }
}
