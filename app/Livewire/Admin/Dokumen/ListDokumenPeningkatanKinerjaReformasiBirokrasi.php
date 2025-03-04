<?php

namespace App\Livewire\Admin\Dokumen;

use Livewire\Component;
use App\Models\Document;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ListDokumenPeningkatanKinerjaReformasiBirokrasi extends Component
{
    use WithPagination;
    use WithFileUploads;

    protected $paginationTheme = 'bootstrap';
    // list-dokumen-peningkatan-kinerja-reformasi-birokrasi
    #[Title('Dokumen Peningkatan Kinerja Reformasi Birokrasi')]

    public $search = '';
    public $sortField = 'id';
    public $sortDirection = 'asc';
    public $perPage = 10; // Number of items per page
    public $selectedYear = ''; // New property for selected year

    public $editMode = false;
    public $no, $title, $desc, $year, $sender, $status;
    public $file;

    public function updatingSearch()
    {
        $this->resetPage(); // Reset pagination when search is updated
    }

    public function sortBy($field)
    {
        $this->sortDirection = $this->sortField === $field && $this->sortDirection === 'asc' ? 'desc' : 'asc';
        $this->sortField = $field;
    }

    public function loadDocuments()
    {
        $this->search;
    }

    #[Computed]
    public function getYear()
    {
        return Document::where('tipe_doc', 'peningkatan_kinerja_reformasi_birokrasi')
            ->select('year')
            ->distinct()
            ->pluck('year'); // Use pluck to get an array of year values
    }

    public function resetSearch()
    {
        $this->search = '';
        $this->selectedYear = '';
        $this->resetPage(); // Reset pagination when search is reset
    }

    public function resetInputFields()
    {
        $this->no = '';
        $this->title = '';
        $this->desc = '';
        $this->year = '';
        $this->sender = '';
        $this->status = '';
        $this->file = '';
    }

    public function edit($id)
    {
        $document = Document::find($id);
        $this->no = $document->id;
        $this->title = $document->title;
        $this->desc = $document->desc;
        $this->year = $document->year;
        $this->sender = $document->sender;
        $this->status = $document->status;

        $this->editMode = true;
    }


    public function store()
    {
        $this->validate([
            'title' => 'required',
            'desc' => 'required',
            'year' => 'required|integer',
            'sender' => 'required',
            'status' => 'required',
            'file' => 'required|file|mimes:pdf,doc,docx,jpg,jpeg,png', // Validate file
        ]);

        $noUrutan = Document::where('tipe_doc', 'peningkatan_kinerja_reformasi_birokrasi')->count() + 1;

        // Handle file upload
        $filePath = $this->file->store('documents/PeningkatanKinerjaReformasiBirokrasi', 'public'); // Store in 'storage/app/public/documents'

        Document::create([
            'no' => "PKRB." . $noUrutan,
            'title' => $this->title,
            'desc' => $this->desc,
            'year' => $this->year,
            'sender' => $this->sender,
            'status' => $this->status,
            'tipe_doc' => 'peningkatan_kinerja_reformasi_birokrasi',
            'file' => $filePath, // Save the file path
        ]);

        $this->resetInputFields();

        // Emit event setelah berhasil
        $this->dispatch('actionCompleted', 'Data berhasil disimpan!');
    }

    public function update()
    {
        $this->validate([
            'title' => 'required',
            'desc' => 'required',
            'year' => 'required|integer',
            'sender' => 'required',
            'status' => 'required',
            'file' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png', // Validate file
        ]);

        $document = Document::find($this->no);

        // Handle file upload if a new file is provided
        if ($this->file) {
            // Delete the old file if necessary
            if ($document->file) {
                Storage::disk('public')->delete($document->file);
            }

            $filePath = $this->file->store('documents/PeningkatanKinerjaReformasiBirokrasi', 'public'); // Store in 'storage/app/public/documents'
            $document->file = $filePath; // Update the file path
        }

        $document->update([
            'title' => $this->title,
            'desc' => $this->desc,
            'year' => $this->year,
            'sender' => $this->sender,
            'status' => $this->status,
            // 'file' => $document->file, // No need to update if file is not changed
        ]);

        $this->editMode = false;
        $this->resetInputFields();

        $this->dispatch('actionCompleted', 'Data berhasil diperbarui!');
    }

    public function delete($id)
    {
        $document = Document::find($id);

        // Delete the file if necessary
        if ($document->file) {
            Storage::disk('public')->delete($document->file);
        }

        $document->delete();

        $this->dispatch('actionCompleted', 'Data berhasil dihapus!');
    }


    public function render()
    {
        $documents = Document::where('tipe_doc', 'peningkatan_kinerja_reformasi_birokrasi')
            ->where(function ($query) {
                if ($this->search) {
                    $query->where('title', 'like', '%' . $this->search . '%')
                        ->orWhere('no', 'like', '%' . $this->search . '%')
                        ->orWhere('sender', 'like', '%' . $this->search . '%');
                }
            })
            ->when($this->selectedYear, function ($query) {
                return $query->where('year', $this->selectedYear);
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate($this->perPage); // Use paginate here

        return view('livewire.admin.dokumen.list-dokumen-peningkatan-kinerja-reformasi-birokrasi', [
            'documents' => $documents,
        ]);
    }
}
