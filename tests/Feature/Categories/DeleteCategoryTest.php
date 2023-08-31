<?php

namespace Tests\Feature\Categories;

use Tests\TestCase;
use App\Models\User;
use App\Models\Category;
use Laravel\Passport\Passport;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DeleteCategoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_delete_category()
    {
        $user = User::factory()->create();
        Passport::actingAs($user);

        $category1 = Category::factory()->create();
        $category2 = Category::factory()->create(['parent_id' => $category1->id]);

        $response = $this->deleteJson("/api/category/$category2->id");
        $response->assertSuccessful();

        $this->assertDatabaseMissing('categories', [
            'id' => $category2->id,
            'parent_id' => $category1->id,
        ]);
    }

}
