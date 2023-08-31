<?php

namespace Tests\Feature\Categories;

use Tests\TestCase;
use App\Models\User;
use App\Models\Category;
use Laravel\Passport\Passport;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateCategoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_category()
    {
        $user = User::factory()->create();
        Passport::actingAs($user);

        $category1 = Category::factory()->create();

        $params = [
            'parent_id' => $category1->id,
            'name' => '11 PRO MAX'
        ];

        $response = $this->postJson("/api/category", $params);
        $response->assertSuccessful();

        $this->assertDatabaseHas('categories', [
            'parent_id' => $category1->id,
        ]);
    }
}
