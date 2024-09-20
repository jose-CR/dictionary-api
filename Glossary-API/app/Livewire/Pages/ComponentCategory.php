<?php

namespace App\Livewire\Pages;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class ComponentCategory extends Component
{
    use WithPagination;

    public $columns = [];
    public $search = '';

    protected $updatesQueryString = ['search'];

    public function mount()
    {
        $this->updateColumns();
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updateColumns()
    {
            $this->columns = ['Id', 'Category', 'Acciones'];
    }

    public function loadData()
    {
        $query = Category::query();

        if ($this->search) {
            $query->where('category', 'like', '%' . $this->search . '%');
        }
    
        return $query->orderBy('id')->paginate(10);
    }

    public function render()
    {
        return view('livewire.pages.component-category', [
            'data' => $this->loadData(),
            'columns' => $this->columns,
        ]);
    }
}
