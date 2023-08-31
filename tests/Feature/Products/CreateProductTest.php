<?php

namespace Tests\Feature\Products;

use Tests\TestCase;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Laravel\Passport\Passport;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_product()
    {
        $user = User::factory()->create();
        Passport::actingAs($user);

        $category = Category::factory()->create();

        $params = [
            'category_id' => $category->id,
            'name' => Str::random(8),
            'price' => Str::random(5),
            'about' => Str::random(30),
        ];

        $response = $this->postJson('/api/product', $params);
        $response->assertSuccessful();

        $this->assertDatabaseHas('products', [
            'category_id' => $category->id,
            'name' => $params['name'],
            'price' => $params['price'],
            'about' => $params['about']
        ]);
    }
}
