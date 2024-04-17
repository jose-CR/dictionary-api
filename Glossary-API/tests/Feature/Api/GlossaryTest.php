<?php

namespace Tests\Feature\Api;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Word;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GlossaryTest extends TestCase
{

    /*
    These functions are to test the creation, 
    edit and delete of the API and also for their respective setStatusCode
    */

    use RefreshDatabase;


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

    public function test_api_edit_category()
    {
        $category = Category::factory()->create();

        $response = $this->put(route('category.edit', ['id' => $category->id]), [
            'Category' => 'español_actualizado'
        ]);

        $response->assertStatus(200);
        $this->assertDatabaseHas('categories', [
            'id' => $category->id,
            'Category' => 'español_actualizado'
        ]);
    }

    public function test_api_edit_subcategory()
    {
        $subcategory = SubCategory::factory()->create();

        $response = $this->put(route('subcategory.edit', ['id' => $subcategory->id]), [
            'subCategory' => 'verbo_actualizado',
        ]);

        $response->assertStatus(200);
        $this->assertDatabaseHas('sub_categories', [
            'id' => $subcategory->id,
            'subCategory' => 'verbo_actualizado',
        ]);
    }

    public function test_api_edit_word()
    {
        $word = Word::factory()->create();

        $response = $this->put(route('word.edit', ['id' => $word->id]), [
            'letter' => 'e_actualizado',
            'word' => 'Ejemplo_actualizado',
            'definition' => 'Esto es un ejemplo de definición actualizado',
        ]);

        $response->assertStatus(200);
        $this->assertDatabaseHas('words', [
            'id' => $word->id,
            'letter' => 'e_actualizado',
            'word' => 'Ejemplo_actualizado',
            'definition' => 'Esto es un ejemplo de definición actualizado',
        ]);
    }

    public function test_api_delete_category()
    {
        $category = Category::factory()->create();

        $response = $this->delete(route('category.destroy', ['category' => $category->id]));

        $response->assertStatus(204);

        $this->assertDatabaseMissing('categories', ['id' => $category->id]);
    }

    public function test_api_delete_subcategory()
    {
        $subcategory = SubCategory::factory()->create();

        $response = $this->delete(route('subcategory.destroy', ['subcategory' => $subcategory->id]));

        $response->assertStatus(204);

        $this->assertDatabaseMissing('sub_categories', ['id' => $subcategory->id]);
    }

    public function test_api_delete_word()
    {
        $word = Word::factory()->create();

        $response = $this->delete(route('word.destroy', ['word' => $word->id]));

        $response->assertStatus(204);

        $this->assertDatabaseMissing('words', ['id' => $word->id]);
    }
}