<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Card extends Component
{
    public $title;
    public $route;
    public $buttonText;
    public $footerText;

    public function __construct($title, $route, $buttonText, $footerText)
    {
        $this->title = $title;
        $this->route = $route;
        $this->buttonText = $buttonText;
        $this->footerText = $footerText;
    }

    public function render()
    {
        return view('components.card');
    }
}
