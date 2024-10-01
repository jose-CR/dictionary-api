<?php

namespace App\Livewire\Pages\Tables;

use Livewire\Component;

class ApiCodeSnippet extends Component
{

    public $table;
    public $enpoint;

    public function  mount($table){
        $this->table = $table;
        $this->loadData();
    }

    public function loadData()
    {
        if ($this->table == 'category') {
            $this->enpoint = 'http://localhost:8000/api/categories';
        }
        elseif ($this->table == 'subcategory') {
            $this->enpoint = 'http://localhost:8000/api/subcategories';
        }
        elseif($this->table === 'words'){
            $this->enpoint = 'http://localhost:8000/api/words';
        }
    }

    public function render()
    {
        return view('livewire.pages.tables.api-code-snippet', [
            'table' => $this->table,
            'enpoint' => $this->enpoint
        ]);
    }
}
