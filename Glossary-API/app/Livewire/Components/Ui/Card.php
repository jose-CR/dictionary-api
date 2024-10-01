<?php

namespace App\Livewire\Components\Ui;

use App\Models\Category;
use App\Models\subCategory;
use App\Models\Word;
use Livewire\Component;

class Card extends Component
{

    public $categories;
    public $subcategories;
    public $words;

    public function loadData()
    {
        $this->categories = Category::inRandomOrder()->limit(2)->get();
        $this->subcategories = subCategory::inRandomOrder()->limit(1)->get();
        $this->words = Word::inRandomOrder()->limit(1)->get();
    }

    public function render()
    {
        $this->loadData();

        return view('livewire.components.ui.card', [
            'categories' => $this->categories,
            'subcategories' => $this->subcategories,
            'words' => $this->words,
        ]);
    }
}
