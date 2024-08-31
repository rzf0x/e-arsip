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
    public function listDocument()
    {
        return Document::orderBy('created_at', 'desc')
            ->take(5)
            ->get();
    }

    public function render()
    {
        $data = [
            // Book List
            'total_buku' => Books::count(),
            'total_buku_rusak' => Books::where('status', 'rusak')->count(),
            'total_buku_hilang' => Books::where('status', 'hilang')->count(),
            'total_buku_musnah' => Books::where('status', 'musnah')->count(),
            'total_buku_layak' => Books::where('status', 'layak')->count(),

            // Document
            'total_document' => Document::count(),
            'total_document_rusak' => Document::where('status', 'rusak')->count(),
            'total_document_hilang' => Document::where('status', 'hilang')->count(),
            'total_document_musnah' => Document::where('status', 'musnah')->count(),
            'total_document_layak' => Document::where('status', 'layak')->count(),

            // Lemari
            'total_lemari' => CupboardNumber::count(),
        ];

        return view('livewire.admin.dashboard', $data);
    }
}
