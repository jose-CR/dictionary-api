<?php

namespace App\Livewire\Pages;

use App\Models\Word;
use Livewire\Component;
use Livewire\WithPagination;

class ComponentWord extends Component
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
            $this->columns = ['Id', 'Letter', 'Word', 'Description', 'Oración', 'Oracion en español', 'Acciones'];
    }

    public function loadData()
    {
        $query = Word::query();

        if ($this->search) {
            $query->where('word', 'like', '%' . $this->search . '%');
        }

        return $query->orderBy('id')->paginate(30);
    }

    public function formatDefinition($definition){
        if(is_array($definition)){
            return implode(', ', array_map('trim', $definition));
        }
        return $definition;
    }

    public function render()
    {
        return view('livewire.pages.component-word', [
            'data' => $this->loadData(),
            'columns' => $this->columns,
        ]);
    }
}
