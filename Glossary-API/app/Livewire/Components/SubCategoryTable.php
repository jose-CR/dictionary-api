<?php

namespace App\Livewire\Components;

use Livewire\Component;
use Livewire\WithPagination;

class SubCategoryTable extends Component
{

    use WithPagination;

    public $columns = [];
    public $data = [];

    public function mount($columns, $data)
    {
        $this->columns = $columns;
        $this->data = $data;
    }

    public function render()
    {
        return view('livewire.components.sub-category-table');
    }
}
