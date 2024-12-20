<?php

namespace App\Livewire\Admin;

use App\Models\Books;
use App\Models\CupboardNumber;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

#[\Livewire\Attributes\Title('List Dokumen')]

class ListBook extends Component
{
    use WithFileUploads;

    public $books, $no_book, $title_book, $year_publish, $book_publisher, $status, $cupboard_number_id, $book_id;
    public $isModalOpen = 0;
    public $foto = '';
    public $editMode = false;

    public function render()
    {
        return view('livewire.admin.list-book', [
            'listBooks' => Books::paginate(10),
            'cupboards' => CupboardNumber::all(),
        ]);
    }

    private function resetInputFields()
    {
        $this->no_book = '';
        $this->title_book = '';
        $this->year_publish = '';
        $this->book_publisher = '';
        $this->status = '';
        $this->foto = '';
        $this->cupboard_number_id = '';
        $this->book_id = '';
    }

    public function store()
    {
        $this->validate([
            'title_book' => 'required',
            'year_publish' => 'required|integer',
            'book_publisher' => 'required',
            'status' => 'required',
            'cupboard_number_id' => 'required|integer',
        ]);

        $book = Books::find($this->book_id);

        if ($this->foto) {
            $fotoPath = $this->foto->store('photos', 'public');

            // Hapus foto lama jika ada
            if ($book && $book->foto && Storage::disk('public')->exists($book->foto)) {
                Storage::disk('public')->delete($book->foto);
            }
        } else {
            $fotoPath = $book ? $book->foto : null;
        }

        // Generate unique code
        $latestDocument = Books::orderBy('id', 'desc')->first();
        $newCode = 'book-0001'; // Default code if no documents exist

        if ($latestDocument) {
            $latestNo = $latestDocument->no_book;
            $number = (int) substr($latestNo, 5); // Change 'no' to 'no_book'
            $number++;
            $newCode = 'book-' . str_pad($number, 4, '0', STR_PAD_LEFT);
        }

        Books::updateOrCreate(['id' => $this->book_id], [
            'no_book' => $newCode,
            'title_book' => $this->title_book,
            'year_publish' => $this->year_publish,
            'book_publisher' => $this->book_publisher,
            'status' => $this->status,
            'foto' => $fotoPath,
            'cupboard_number_id' => $this->cupboard_number_id,
        ]);

        session()->flash('message', $this->book_id ? 'Book Updated Successfully.' : 'Book Created Successfully.');

        $this->resetInputFields();
        // $this->closeModal();
    }


    public function edit($id)
    {
        $book = Books::findOrFail($id);
        $this->book_id = $id;
        $this->no_book = $book->no_book;
        // dd($this->no_book);
        $this->title_book = $book->title_book;
        $this->year_publish = $book->year_publish;
        $this->book_publisher = $book->book_publisher;
        $this->status = $book->status;
        $this->foto = $book->foto;
        $this->cupboard_number_id = $book->cupboard_number_id;
        $this->editMode = true;
        // $this->openModal();
    }

    public function delete($id)
    {
        $book = Books::find($id);

        if ($book) {
            $filePath = $book->foto;

            try {
                Storage::disk('public')->delete($filePath);
                Log::info("Image deleted: {$filePath}");
            } catch (\Exception $e) {
                Log::error("Error deleting image: {$e->getMessage()}");
            }

            $book->delete();
            session()->flash('message', 'Book and image deleted successfully.');
        } else {
            session()->flash('error', 'Book not found.');
        }
    }
}
