<?php

namespace App\Livewire\Admin;

use App\Models\Books;
use App\Models\CupboardNumber;
use App\Models\Document;
use Livewire\Attributes\Computed;
use Livewire\Component;

#[\Livewire\Attributes\Title('Dashboard Admin')]

class Dashboard extends Component
{

    public $totalLemari, $totalDokumentatalaksana, $totalDokumenPelayananPublic;

    // List Book
    #[Computed]
    public function listBook()
    {
        return Books::orderBy('created_at', 'desc')
            ->take(5)
            ->get();
    }

    // List Document
    #[Computed]
    public function listCupBoard()
    {
        return CupboardNumber::orderBy('created_at', 'desc')
            ->take(5)
            ->get();
    }

    public function mount()
    {
        $this->totalLemari = CupboardNumber::count();
        $this->totalDokumentatalaksana = Document::where('tipe_doc', 'tatalaksana')->count();
        $this->totalDokumenPelayananPublic = Document::where('tipe_doc', 'pelayanan_public')->count();
    }

    public function render()
    {
        return view('livewire.admin.dashboard');
    }
}
