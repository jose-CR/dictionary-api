<?php

namespace App\Livewire\Components;

use App\Models\Word;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class WordTable extends Component
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
            $this->columns = ['Id', 'Letter', 'Word', 'Description', 'Oración', 'oracion en español', 'Acciones'];
        } elseif (in_array($this->role, ['user', 'temp'])) {
            $this->columns = ['Id', 'Letter', 'Word', 'Description', 'Oración', 'Oracion en español'];
        }
    }

    public function loadData()
    {
        $query = Word::query();

        if($this->search)
        {
           $query->where('word', 'like', '%' . $this->search . '%');
        }

        $this->data = $query->get()->map(function ($word) {
            return [
                'id' => $word->id,
                'letter' => $word->letter,
                'word' => $word->word,
                'description' => is_string($word->definition) ? json_decode($word->definition, true) : $word->definition,
                'sentence' => $word->sentence,
                'spanish_sentence' => $word->spanish_sentence,
            ];
        })->toArray();
    }


    public function render()
    {
        return view('livewire.components.word-table', [
            'data' => $this->data,
            'columns' => $this->columns,
        ]);
    }
}
