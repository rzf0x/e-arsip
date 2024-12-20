<?php

namespace App\Livewire\Admin\Book;

use App\Models\Books;
use App\Models\Document;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;

class ListDocumentTatalaksana extends Component
{

    #[Title('Halaman dokumen tatalaksana')]

    public $editMode = false;
    public $no, $title, $desc, $year, $sender, $status;

    public function store()
    {

        $this->validate([
            'title' => 'required',
            'desc' => 'required',
            'year' => 'required|integer',
            'sender' => 'required',
            'status' => 'required',
        ]);

        $noUrutan = Document::where('tipe_doc', 'tatalaksana')->count() + 1;

        Document::create([
            'no' => "doc-tatalaksana-" . $noUrutan,
            'title' => $this->title,
            'desc' => $this->desc,
            'year' => $this->year,
            'sender' => $this->sender,
            'status' => $this->status,
            'tipe_doc' => 'tatalaksana'
        ]);

        $this->resetInputFields();

        // Emit event setelah berhasil
        $this->dispatch('actionCompleted', 'Data berhasil disimpan!');
    }

    private function resetInputFields()
    {
        $this->title = '';
        $this->desc = '';
        $this->year = '';
        $this->sender = '';
        $this->status = '';
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

    public function update()
    {
        $this->validate([
            'title' => 'required',
            'desc' => 'required',
            'year' => 'required|integer',
            'sender' => 'required',
            'status' => 'required',
        ]);

        $document = Document::find($this->no);

        $document->update([
            'title' => $this->title,
            'desc' => $this->desc,
            'year' => $this->year,
            'sender' => $this->sender,
            'status' => $this->status,
        ]);

        $this->editMode = false;
        $this->resetInputFields();

        $this->dispatch('actionCompleted', 'Data berhasil diperbarui!');
    }

    public function delete($id)
    {
        Document::find($id)->delete();
    }

    #[Computed]
    public function getData()
    {
        return Document::where('tipe_doc', 'tatalaksana')->paginate(5);
    }

    public function render()
    {
        return view('livewire.admin.book.list-document-tatalaksana');
    }
}
