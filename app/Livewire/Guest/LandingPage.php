<?php

namespace App\Livewire\Guest;

use App\Models\Books;
use Livewire\Attributes\Title;
use Livewire\Component;

class LandingPage extends Component
{
    public $query;
    public $book;

    #[Title('Website E-arsip')]

    public function searchBook()
    {
        $this->book = Books::where('title_book', 'like', '%' . $this->query . '%')->get();
    }

    public function resetBook()
    {
        $this->book = '';
        $this->query = '';
    }

    public function render()
    {
        return view('livewire.guest.landing-page', [
            'listBook' => Books::paginate(5),
        ])->layout('components.layouts.guest');
    }
}
