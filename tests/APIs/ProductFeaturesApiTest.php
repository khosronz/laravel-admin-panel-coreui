<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\ProductFeatures;

class ProductFeaturesApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_product_features()
    {
        $productFeatures = factory(ProductFeatures::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/product_features', $productFeatures
        );

        $this->assertApiResponse($productFeatures);
    }

    /**
     * @test
     */
    public function test_read_product_features()
    {
        $productFeatures = factory(ProductFeatures::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/product_features/'.$productFeatures->id
        );

        $this->assertApiResponse($productFeatures->toArray());
    }

    /**
     * @test
     */
    public function test_update_product_features()
    {
        $productFeatures = factory(ProductFeatures::class)->create();
        $editedProductFeatures = factory(ProductFeatures::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/product_features/'.$productFeatures->id,
            $editedProductFeatures
        );

        $this->assertApiResponse($editedProductFeatures);
    }

    /**
     * @test
     */
    public function test_delete_product_features()
    {
        $productFeatures = factory(ProductFeatures::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/product_features/'.$productFeatures->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/product_features/'.$productFeatures->id
        );

        $this->response->assertStatus(404);
    }
}
