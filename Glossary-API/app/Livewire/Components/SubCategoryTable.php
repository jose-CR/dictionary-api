<?php

namespace App\Livewire\Components;

use App\Models\SubCategory;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SubCategoryTable extends Component
{
    public $columns = [];
    public $data;
    public $search = '';
    public $role;

    public function mount($role = null)
    {
        $this->role = $role ?? Auth::user()->roles->pluck('name')->first();
        $this->updateColumns();
        $this->loadData();
    }

    public function updatedSearch()
    {
        $this->loadData();
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

     $this->data = $query->get()->map(function ($subcategory) {
        return [
            'id' => $subcategory->id,
            'subcategory' => $subcategory->subcategory,
        ];
    })->toArray();
    }

    public function render()
    {
        return view('livewire.components.sub-category-table', [
            'data' => $this->data,
            'columns' => $this->columns,
        ]);
    }
}
