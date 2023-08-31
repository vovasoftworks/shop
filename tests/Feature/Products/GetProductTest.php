<?php

namespace Tests\Feature\Products;

use Tests\TestCase;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Laravel\Passport\Passport;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GetProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_get_product()
    {
        $user = User::factory()->create();
        Passport::actingAs($user);

        $category = Category::factory()->create();

        $product = Product::factory()->create([
            'owner_id' => $user->id,
            'name' => 'product_name',
            'category_id' => $category->id,
        ]);

        $response = $this->getJson("/api/product/$product->id");
        $response->assertSuccessful();

        $this->assertEquals($user->id, $response['data']['owner_id']);
        $this->assertEquals($category->id, $response['data']['category_id']);
    }
}
