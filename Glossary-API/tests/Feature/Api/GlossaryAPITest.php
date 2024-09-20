<?php

namespace Tests\Feature\Api;

use App\Models\Category;
use App\Models\subCategory;
use App\Models\Word;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GlossaryAPITest extends TestCase
{
    /**
     * A basic feature test example.
     */

     use RefreshDatabase;


    /**
     * Test the index method of CategoryController.
     *
     * @return void
     */
    public function test_index_returns_paginated_categories()
    {
        Category::factory()->count(15)->create();

        $response = $this->get(route('categories.index'));

        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'info' => ['count', 'pages', 'next', 'prev'],
                     'data' => ['*' => ['id', 'category']],
                     'meta' => ['current_page', 'per_page', 'from', 'to', 'last_page', 'total'],
                     'links' => ['first', 'prev', 'next', 'last'],
                 ]);
    }

    /**
     * Test the index method of subCategoryController.
     *
     * @return void
     */
    public function test_index_returns_paginated_subcategories()
    {
        subCategory::factory()->count(15)->create();

        $response = $this->get(route('subcategories.index'));

        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'info' => ['count', 'pages', 'next', 'prev'],
                     'data' => ['*' => ['id', 'subCategory']],
                     'meta' => ['current_page', 'per_page', 'from', 'to', 'last_page', 'total'],
                     'links' => ['first', 'prev', 'next', 'last'],
                 ]);
    }
    
    /**
     * Test the index method of WordController.
     *
     * @return void
     */
    public function test_index_returns_paginated_word()
    {
        Word::factory()->count(15)->create();

        $response = $this->get(route('categories.index'));

        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'info' => ['count', 'pages', 'next', 'prev'],
                     'data' => ['*' => ['id', 'subCategoryId', 'letter', 'word', 'definition', 'sentence', 'spanishSentence']],
                     'meta' => ['current_page', 'per_page', 'from', 'to', 'last_page', 'total'],
                     'links' => ['first', 'prev', 'next', 'last'],
                 ]);
    }

    /**
     * Test the store method of CategoryController.
     *
     * @return void
     */
    public function test_store_creates_new_category()
    {
        $categoryData = ['category' => 'New Category'];

        $response = $this->postJson(route('categories.store'), $categoryData);

        $response->assertStatus(201)
                 ->assertJsonFragment($categoryData);
    }

    /**
     * Test the store method of subCategoryController.
     *
     * @return void
     */
    public function test_store_creates_new_subcategory()
    {
        $category = Category::factory()->create();

        $response = $this->postJson(route('subcategories.store'), [
            'categoryId' => $category->id,
            'subcategory' => 'verbo',
        ]);
    
        $response->assertStatus(201);
        $this->assertDatabaseHas('sub_categories', [
            'category_id' => $category->id,
            'subcategory' => 'verbo',
        ]);
    }

    /**
     * Test the store method of WordController.
     *
     * @return void
     */
    public function test_store_creates_new_word()
    {
        $subcategory = subCategory::factory()->create();
        $word = Word::factory()->create();

        $wordData = ['subCategoryId' => $subcategory->id, 'letter' => $word->letter, 'word' =>  $word->word, 'definition' =>  $word->definition, 'sentence' =>  $word->sentence, 'spanishSentence' =>  $word->spanish_sentence];

        $response = $this->postJson(route('words.store'), $wordData);

        $response->assertStatus(201)
                 ->assertJsonFragment($wordData);
    }

    /**
     * Test the show method of CategoryController.
     *
     * @return void
     */
    public function test_show_returns_category()
    {
        $category = Category::factory()->create();
    
        $response = $this->get(route("categories.show", ['category' => $category->id]));
    
        $response->assertStatus(200)
                 ->assertJsonFragment([
                     'id' => $category->id,
                     'category' => $category->category,
                 ]);
    }

    /**
     * Test the show method of subController.
     *
     * @return void
     */

    public function test_show_subcategory()
    {
        // Crear una categoría y una subcategoría asociada
        $subcategory = SubCategory::factory()->create();
    
        // Hacer una solicitud GET a la ruta para obtener la subcategoría
        $response = $this->get(route('subcategories.show', ['subcategory' => $subcategory->id]));
    
        // Verificar que el estado de la respuesta sea 200 (OK)
        $response->assertStatus(200)
                 ->assertJsonFragment([
                     'id' => $subcategory->id,
                     'categoryId' => $subcategory->category_id,
                     'subCategory' => $subcategory->subcategory,
                 ]);
    }

    /**
     * Test the show method of WordController.
     *
     * @return void
     */
    public function test_show_returns_word()
    {
        $word = Word::factory()->create();
    
        $response = $this->get(route("words.show", ['word' => $word->id]));
    
        $response->assertStatus(200)
                 ->assertJsonFragment([
                     'id' => $word->id,
                     'subCategoryId' => $word->subCategoryId,
                     'letter' => $word->letter,
                     'word' => $word->word,
                     'definition' => $word->definition,
                     'sentence' => $word->sentence,
                     'spanishSentence' => $word->spanish_sentence
                 ]);
    }

    /**
     * Test the update method of CategoryController.
     *
     * @return void
     */
    public function test_update_category()
    {
        $category = Category::factory()->create();
        $updatedData = ['category' => 'Updated Category'];

        $response = $this->putJson(route('categories.update', ['category' => $category->id]), $updatedData);

        $response->assertStatus(200);

        $this->assertDatabaseHas('categories', $updatedData);
    }

        /**
     * Test the update method of SubCategoryController.
     *
     * @return void
     */
    public function test_update_subcategory()
    {
        $subcategory = subCategory::factory()->create();
        $updatedData = [
            'category_id' => $subcategory->category_id,
            'subCategory' => $subcategory->subcategory,
        ];
    
        $response = $this->put(route('subcategories.update', ['subcategory' => $subcategory->id]), $updatedData);
    
        $response->assertStatus(200);
    
        $this->assertDatabaseHas('sub_categories', [
            'category_id' => $subcategory->category_id,
            'subcategory' =>$subcategory->subcategory,
        ]);
    }

    /**
     * Test the update method of WordController.
     *
     * @return void
     */
    public function test_update_word()
    {
        $subcategory = SubCategory::factory()->create();
        $word = Word::factory()->create();
        $updatedData = [
            'subCategoryId' => $subcategory->id,
            'letter' => $word->letter,
            'word' => $word->word,
            'definition' => $word->definition,
            'sentence' => $word->sentence,
            'spanishSentence' => $word->spanish_sentence
        ];
    
        $response = $this->putJson(route('words.update', ['word' => $word->id]), $updatedData);
    
        $response->assertStatus(200);
    
        $this->assertDatabaseHas('words', [
            'sub_category_id' => $subcategory->id,
            'letter' =>$word->letter,
            'word' => $word->word,
            'definition' => $word->definition,
            'sentence' => $word->sentence,
            'spanish_sentence' => $word->spanish_sentence
        ]);
    }
    /**
     * Test the destroy method of CategoryController.
     *
     * @return void
     */
    public function test_destroy_deletes_category()
    {
        $category = Category::factory()->create();

        $response = $this->deleteJson(route('categories.destroy', ['category' => $category->id]));

        $response->assertStatus(200)
                 ->assertJson(['message' => 'Category deleted successfully']);

        $this->assertDatabaseMissing('categories', ['id' => $category->id]);
    }
    /**
     * Test the destroy method of SubCategoryontroller.
     *
     * @return void
     */
    public function test_destroy_deletes_subcategory()
    {
        $subcategory = SubCategory::factory()->create();

        $response = $this->deleteJson(route('subcategories.destroy', ['subcategory' => $subcategory->id]));

        $response->assertStatus(200);

        $this->assertDatabaseMissing('sub_categories', ['id' => $subcategory->id]);
    }

    /**
     * Test the destroy method of WordController.
     *
     * @return void
     */
    public function test_destroy_deletes_word()
    {
        $word = Word::factory()->create();

        $response = $this->deleteJson(route('words.destroy', ['word' => $word->id]));

        $response->assertStatus(200)
                 ->assertJson(['message' => 'Word deleted successfully']);

        $this->assertDatabaseMissing('words', ['id' => $word->id]);
    }
}
