<?php

namespace App\Livewire\Pages;

use App\Models\Word;
use Livewire\Component;
use Livewire\WithPagination;

class ComponentTimes extends Component
{
    use WithPagination;

    public $columns = [];


    public function mount()
    {
        $this->updateColumns();
    }

    public function updateColumns()
    {
            $this->columns = ['Id', 'Word', 'Times', 'Definition', 'Sentence', 'oracion en español'];
    }

    public function loadData()
    {
        $query = Word::query();

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
        return view('livewire.pages.component-times', [
            'data' => $this->loadData(),
            'columns' => $this->columns,
        ]);
    }
}
