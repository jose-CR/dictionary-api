<?php

namespace App\Livewire\Pages\Tables;

use Livewire\Component;

class SimpleTable extends Component
{
    public $table;
    public $columns = [];
    public $rows = [];

    public function mount($table)
    {
        $this->table = $table;
        $this->loadData();
    }

    public function loadData()
    {
        if ($this->table == 'category') {
            $this->columns = ['Key', 'Type', 'Description'];
            $this->rows = [
                ['id', 'int', 'The id of the category.'],
                ['category', 'string', 'The name of the category.']
            ];
        }
        elseif ($this->table == 'subcategory') {
            $this->columns = ['key', 'Type', 'Description'];
            $this->rows = [
                ['id', 'int', 'the id of the sub category'],
                ['categoryId', 'integer', 'the id of the category'],
                ['subCategory', 'string', 'the name of the sub categories']
            ];
        }
        elseif ($this->table == 'words') {
            $this->columns = ['key', 'Type', 'Description'];
            $this->rows = [
                ['id', 'int', 'the id of the words'],
                ['subCategoryId', 'integer', 'the id  o the sub category'],
                ['letter', 'string', 'the letter of the word '],
                ['word', 'string', 'the word of the word '],
                ['definition', 'text', 'the different definitions of the words'],
                ['spanishSentence', 'string', 'prayer in spanish'],
                ['sentence', 'string', 'prayer of the word'],
            ];
        }
    }

    public function render()
    {
        return view('livewire.pages.tables.simple-table', [
            'columns' => $this->columns,
            'rows' => $this->rows,
        ]);
    }
}
