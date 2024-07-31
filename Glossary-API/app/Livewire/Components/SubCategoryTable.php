<?php

namespace App\Livewire\Components;

use App\Models\SubCategory;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class SubCategoryTable extends Component
{

    use WithPagination;

    public $columns = [];
    public $search = '';
    public $role;

    protected $updatesQueryString = ['search'];

    public function mount($role = null)
    {
        $this->role = $role ?? Auth::user()->roles->pluck('name')->first();
        $this->updateColumns();
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updateColumns()
    {
        if ($this->role == 'admin') {
            $this->columns = ['Id', 'Sub category', 'Acciones'];
        } elseif (in_array($this->role, ['user', 'temp'])) {
            $this->columns = ['Id', 'Sub category'];
        }
    }

    public function loadData()
    {
     $query = SubCategory::query();
     
     if($this->search)
     {
        $query->where('subcategory', 'like', '%' . $this->search . '%');
     }

     return $query->paginate(10);

    }

    public function render()
    {
        return view('livewire.components.sub-category-table', [
            'data' => $this->loadData(),
            'columns' => $this->columns,
        ]);
    }
}
