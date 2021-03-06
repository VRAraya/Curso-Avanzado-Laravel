<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Laravel\Sanctum\Sanctum;

use App\Models\User;
use App\Models\Category;

class CategoryControllerTest extends TestCase
{
    use RefreshDatabase;
    
    protected function setUp(): void
    {
        parent::setUp();

        Sanctum::actingAs(
            User::factory()->create()
        );
    }

    public function test_index()
    {
        Category::factory(4)->create();

        $response = $this->getJson('/api/categories');

        $response->assertSuccessful();
        $response->assertHeader('content-type', 'application/json');
        $response->assertJsonCount(5, 'data');
    }

    public function test_create_new_category()
    {
        $data = [
            'name' => 'Any Category',
        ];
        $response = $this->postJson('/api/categories', $data);

        $response->assertSuccessful();
        $response->assertHeader('content-type', 'application/json');
        $this->assertDatabaseHas('categories', $data);
    }

    public function test_update_category()
    {
        /** @var Category $category */
        $category = Category::factory()->create();

        $data = [
            'name' => 'Update Category'
        ];

        $response = $this->patchJson("/api/categories/{$category->getKey()}", $data, ['content-type', 'application/json']);
        $response->assertSuccessful();
        $response->assertHeader('content-type', 'text/html; charset=UTF-8');
    }

    public function test_show_category()
    {
        /** @var Category $category */
        $category = Category::factory()->create();

        $response = $this->getJson("/api/categories/{$category->getKey()}", ['content-type', 'application/json']);
        $response->assertSuccessful();
        $response->assertHeader('content-type', 'application/json');
    }

    public function test_delete_category()
    {
        /** @var Category $category */
        $category = Category::factory()->create();

        $response = $this->deleteJson("/api/categories/{$category->getKey()}", ['content-type', 'application/json']);
        $response->assertSuccessful();
        $response->assertHeader('content-type', 'application/json');
        $this->assertDeleted($category);
    }
}
