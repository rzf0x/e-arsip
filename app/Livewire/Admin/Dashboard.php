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
    public $totalLemari, $totalDokumentatalaksanaPelayananPublik, $totalDokumenKelembagaanAnjab, $totalDokumenInovasiPelayananPublik, $totalDokumenPeningkatanKinerjaReformasiBirokrasi;
    public $pendapatanBulanan, $years;

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
        $this->totalDokumentatalaksanaPelayananPublik = Document::where('tipe_doc', 'tatalaksana_pelayanan_publik')->count();
        $this->totalDokumenKelembagaanAnjab = Document::where('tipe_doc', 'kelembagaan_anjab')->count();
        $this->totalDokumenInovasiPelayananPublik = Document::where('tipe_doc', 'inovasi_pelayanan_publik')->count();
        $this->totalDokumenPeningkatanKinerjaReformasiBirokrasi = Document::where('tipe_doc', 'peningkatan_kinerja_reformasi_birokrasi')->count();
        // Ambil data pendapatan bulanan dari database
        $this->pendapatanBulanan = Document::selectRaw('year, COUNT(*) as total')
            ->groupBy('year')
            ->orderBy('year')
            ->pluck('total')
            ->toArray();

        // Ambil tahun yang unik dari database
        $this->years = Document::select('year')
            ->distinct()
            ->orderBy('year')
            ->pluck('year')
            ->toArray();
    }

    public function render()
    {
        return view('livewire.admin.dashboard');
    }
}
