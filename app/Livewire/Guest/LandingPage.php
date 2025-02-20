<?php

namespace App\Livewire\Guest;

use App\Models\documents;
use App\Models\Document;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class LandingPage extends Component
{

    use WithPagination;

    #[Layout('components.layouts.guest')]
    #[Title('Sistem Informasi kumpulan arsip bagian organisasi')]

    public $searchTerm = '';
    public $documents;

    public function mount()
    {
        // Inisialisasi dengan koleksi kosong
        $this->documents = collect();
    }

    public function updatedSearchTerm()
    {
        $this->searchDocuments();
    }

    public function searchDocuments()
    {
        $this->documents = Document::where('title', 'like', '%' . $this->searchTerm . '%')
            ->orWhere('sender', 'like', '%' . $this->searchTerm . '%')
            ->orWhere('no', 'like', '%' . $this->searchTerm . '%')
            ->get(); // Ini akan mengembalikan koleksi
    }

    public function resetSearch()
    {
        $this->searchTerm = '';
        $this->documents = collect(); // Reset documents
    }

    public function render()
    {
        // Ambil 6 dokumen terbaru untuk ditampilkan
        $latestDocuments = Document::orderBy('created_at', 'desc')->paginate(6);

        return view('livewire.guest.landing-page', [
            'latestDocuments' => $latestDocuments,
            'documents' => $this->documents,
        ]);
    }
}
