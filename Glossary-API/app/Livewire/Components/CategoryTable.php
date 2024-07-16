<?php

namespace App\Livewire\Components;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;


class CategoryTable extends Component
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
            $this->columns = ['Id', 'Category', 'Acciones'];
        } elseif (in_array($this->role, ['user', 'temp'])) {
            $this->columns = ['Id', 'Category'];
        }
    }

    public function loadData()
    {
        $query = Category::query();

        if ($this->search) {
            $query->where('category', 'like', '%' . $this->search . '%');
        }

        $this->data = $query->get()->map(function ($category) {
            return [
                'id' => $category->id,
                'category' => $category->category,
            ];
        })->toArray();
    }

    public function render()
    {
        return view('livewire.components.category-table', [
            'data' => $this->data,
            'columns' => $this->columns,
        ]);
    }
}
