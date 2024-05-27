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

        $response = $this->postJson(route('subcategory.create'), [
            'categoryId' => $category->id,
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
    
        $response = $this->postJson(route('word.create'), [
            'sub_category_id' => $subcategory->id,
            'letter' => 'a',
            'word' => 'apple',
            "definition" => ["manzana", "arbol"],
            'sentence' => 'This is an apple.',
            'spanish_sentence' => 'Esta es una manzana.'
        ]);
    
        $response->assertStatus(201);
    
        $response->assertJsonStructure([
            'data' => [
                'id',
                'subCategoryId',
                'letter',
                'word',
                'definition',
                'sentence',
                'spanishSentence',
            ]
        ]);
    
        $responseData = $response->json('data');
    
        $this->assertDatabaseHas('words', [
            'id' => $responseData['id'],
            'sub_category_id' => $subcategory->id,
            'letter' => $responseData['letter'],
            'word' => $responseData['word'],
            'definition' => json_encode($responseData['definition']),
            'sentence' => $responseData['sentence'],
            'spanish_sentence' => $responseData['spanishSentence'],
        ]);
    }

    public function test_api_edit_category()
    {
        $category = Category::factory()->create();

        $response = $this->put(route('category.edit', ['id' => $category->id]), [
            'category' => 'español_actualizado'
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
        $subcategory = SubCategory::factory()->create();
        $word = Word::factory()->create(['sub_category_id' => $subcategory->id]);
    
        $editData = [
            'sub_category_id' => $subcategory->id,
            'letter' => 'b',
            'word' => 'banana',
            'definition' => json_encode(["plátano", "fruta"]),
            'sentence' => 'This is a banana.',
            'spanish_sentence' => 'Esta es una banana.'
        ];
    
        $response = $this->putJson(route('word.edit', ['id' => $word->id]), $editData);
    
        $response->assertStatus(200);
    
        $response->assertJsonStructure([
            'message'
        ]);
    
        $this->assertDatabaseHas('words', [
            'id' => $word->id,
            'sub_category_id' => $editData['sub_category_id'],
            'letter' => $editData['letter'],
            'word' => $editData['word'],
            'definition' => json_encode($editData['definition']),
            'sentence' => $editData['sentence'],
            'spanish_sentence' => $editData['spanish_sentence'],
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