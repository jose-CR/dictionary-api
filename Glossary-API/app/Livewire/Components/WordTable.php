<?php

namespace App\Livewire\Components;

use App\Models\Word;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class WordTable extends Component
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
        $this->resetPage(); // Reset pagination when search is updated
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

        if ($this->search) {
            $query->where('word', 'like', '%' . $this->search . '%');
        }

        return $query->paginate(10)->through(function ($word) {
            return [
                'id' => $word->id,
                'letter' => $word->letter,
                'word' => $word->word,
                'description' => is_string($word->definition) ? json_decode($word->definition, true) : $word->definition,
                'sentence' => $word->sentence,
                'spanish_sentence' => $word->spanish_sentence,
            ];
        });
    }

    public function render()
    {
        return view('livewire.components.word-table', [
            'data' => $this->loadData(),
            'columns' => $this->columns,
        ]);
    }
}
