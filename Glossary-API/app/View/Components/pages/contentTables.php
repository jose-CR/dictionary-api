<?php

namespace App\View\Components\pages;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class contentTables extends Component
{
    public $table;

    /**
     * Create a new component instance.
     */
    public function __construct($table)
    {
        $this->table = $table;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.pages.content-tables');
    }
}
