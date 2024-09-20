<?php

namespace App\Livewire\Pages;

use App\Models\subCategory;
use Livewire\Component;
use Livewire\WithPagination;

class ComponentSubcategory extends Component
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
            $this->columns = ['Id', 'Sub category', 'Acciones'];
    }

    public function loadData()
    {
        $query = subCategory::query();

        if ($this->search) {
            $query->where('subcategory', 'like', '%' . $this->search . '%');
        }
    
        return $query->orderBy('id')->paginate(10);
    }

    public function render()
    {
        return view('livewire.pages.component-subcategory', [
            'data' => $this->loadData(),
            'columns' => $this->columns,
        ]);
    }
}
