<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class StatCard extends Component
{
    /**
     * Create a new component instance.
     */

    public $title;
    public $amount;
    public $icon;

    public function __construct($title, $amount, $icon=null)
    {
        $this->title = $title;
        $this->amount = $amount;
        $this->icon = $icon;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.stat-card');
    }
}
