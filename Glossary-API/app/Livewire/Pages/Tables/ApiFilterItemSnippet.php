<?php

namespace App\Livewire\Pages\Tables;

use Livewire\Component;

class ApiFilterItemSnippet extends Component
{
    public $table;
    public $endpoint;
    public $tuplas;

    public function  mount($table){
        $this->table = $table;
        $this->loadData();
    }

    public function loadData()
    {
        if ($this->table == 'category') {
            $this->endpoint = 'http://localhost:8000/api/categories?category[eq]=ruso';
            $this->tuplas = [
                ['name' => 'id', 'description' => ': Filter by the category id.'],
                ['name' => 'category', 'description' => ': Filter by the category name.'],
                ['name' => 'includeSubCategories', 'description' => ': Filter for include categories into the category']
            ];
        }
        elseif ($this->table == 'subcategory') {
            $this->endpoint = 'http://localhost:8000/api/subcategories?id[eq]=15';
            $this->tuplas = [
                ['name' => 'id', 'description' => ': Filter by the sub category id.'],
                ['name' => 'includeWords', 'description' => ': Filter for include words into the subcategory'],
                ['name' => 'categoryId', 'description' => ': Filter by the category id.'],
                ['name' => 'subCategory', 'description' => ': Filter by the sub category name.']
            ];
        }
        elseif($this->table == 'words'){
            $this->endpoint = 'http://localhost:8000/api/words?id[eq]=15';
            $this->tuplas = [
                ['name' => 'id', 'description' => ': Filter by the word id.'],
                ['name' => 'subCategoryId', 'description' => ': Filter by the sub category id.'],
                ['name' => 'letter', 'description' => ': Filter by the letter.'],
                ['name' => 'word', 'description' => ': Filter by the word name.'],
                ['name' => 'definition', 'description' => ': Filter by the definition name.'],
            ];
        }
    }

    public function render()
    {
        return view('livewire.pages.tables.api-filter-item-snippet', [
            'table' => $this->table,
            'endpoint' => $this->endpoint,
            'tuplas' => $this->tuplas
        ]);
    }
}
