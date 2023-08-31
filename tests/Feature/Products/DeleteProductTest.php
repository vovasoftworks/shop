<?php

namespace Tests\Feature\Products;

use Tests\TestCase;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Laravel\Passport\Passport;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DeleteProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_delete_product()
    {
        $user = User::factory()->create();
        Passport::actingAs($user);

        $category = Category::factory()->create();

        $product = Product::factory()->create([
            'owner_id' => $user->id,
            'name' => 'product_name',
            'category_id' => $category->id,
        ]);

        $response = $this->deleteJson("/api/product/$product->id");
        $response->assertSuccessful();

        $this->assertDatabaseMissing('products', [
            'id' => $product->id,
            'category_id' => $category->id,
        ]);
    }

}
