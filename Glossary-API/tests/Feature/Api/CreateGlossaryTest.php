<?php

namespace Tests\Feature\Api;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class CreateGlossaryTest extends TestCase
{
    use DatabaseMigrations;


    public function test_api_create_category()
    {
        $response = $this->post(route('category.create'), [
            'category' => 'español'
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('categories', [
            'category' => 'español'
        ]);
    }

    public function test_api_create_subcategory()
    {
        $category = Category::factory()->create();

        $response = $this->post(route('subcategory.create'), [
            'category_id' => $category->id,
            'subcategory' => 'verbo',
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('sub_categories', [
            'category_id' => $category->id,
            'subcategory' => 'verbo',
        ]);
    }

    public function test_api_create_word()
    {
        $subcategory = SubCategory::factory()->create();

        $response = $this->post(route('word.create'), [
            'sub_category_id' => $subcategory->id,
            'letter' => 'e',
            'word' => 'Ejemplo',
            'definition' => 'Esto es un ejemplo de definición',
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('words', [
            'sub_category_id' => $subcategory->id,
            'letter' => 'e',
            'word' => 'Ejemplo',
            'definition' => 'Esto es un ejemplo de definición',
        ]);
    }
}