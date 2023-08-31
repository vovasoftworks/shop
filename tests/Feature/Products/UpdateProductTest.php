<?php

namespace Tests\Feature\Products;

use Tests\TestCase;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Laravel\Passport\Passport;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UpdateProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_update_product()
    {
        $user = User::factory()->create();
        Passport::actingAs($user);

        $category1 = Category::factory()->create();
        $category2 = Category::factory()->create();

        $product = Product::factory()->create([
            'owner_id' => $user->id,
            'name' => 'product_name',
            'category_id' => $category1->id,
        ]);

        $params = [
            'category_id' => $category2->id,
            'name' => 'new_name',
            'exists' => true,
        ];

        $response = $this->patchJson("/api/product/$product->id", $params);
        $response->assertSuccessful();

        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'category_id' => $category2->id,
            'exists' => true,
        ]);
    }

}
