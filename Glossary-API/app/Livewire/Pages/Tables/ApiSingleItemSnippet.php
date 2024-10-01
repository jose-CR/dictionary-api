<?php

namespace App\Livewire\Pages\Tables;

use Livewire\Component;

class ApiSingleItemSnippet extends Component
{
    public $table;
    public $endpoint;

    public function  mount($table){
        $this->table = $table;
        $this->loadData();
    }

    public function loadData()
    {
        if ($this->table == 'category') {
            $this->endpoint = 'http://localhost:8000/api/categories/1';
        }
        elseif ($this->table == 'subcategory') {
            $this->endpoint = 'http://localhost:8000/api/subcategories/1';
        }
        elseif($this->table == 'words'){
            $this->endpoint = 'http://localhost:8000/api/words/1';
        }
    }

    public function render()
    {
        return view('livewire.pages.tables.api-single-item-snippet', [
            'table' => $this->table,
            'endpoint' => $this->endpoint
        ]);
    }
}
