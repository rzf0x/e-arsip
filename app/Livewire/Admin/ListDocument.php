<?php

namespace App\Livewire\Admin;

use App\Models\Document;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class ListDocument extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    #[Title('List Dokumen')]

    public $no, $title, $desc, $year, $sender, $status, $documentId;
    public $updateMode = false;

    protected $rules = [
        'title' => 'required|string|max:255',
        'desc' => 'required|string',
        'year' => 'required|integer',
        'sender' => 'required|string|max:255',
        'status' => 'required|in:rusak,hilang,musnah,layak',
    ];

    public function resetInputFields()
    {
        $this->title = '';
        $this->desc = '';
        $this->year = '';
        $this->sender = '';
        $this->status = '';
        $this->documentId = '';
    }
    public function store()
    {
        $this->validate();

        // Generate unique code
        $latestDocument = Document::orderBy('id', 'desc')->first();
        $newCode = 'doc-0001'; // Default code if no documents exist

        if ($latestDocument) {
            $latestNo = $latestDocument->no;
            $number = (int) substr($latestNo, 4);
            $number++;
            $newCode = 'doc-' . str_pad($number, 4, '0', STR_PAD_LEFT);
        }

        Document::create([
            'no' => $newCode,
            'title' => $this->title,
            'desc' => $this->desc,
            'year' => $this->year,
            'sender' => $this->sender,
            'status' => $this->status,
        ]);

        session()->flash('message', 'Document created successfully.');

        $this->resetInputFields();
        // $this->emit('closeModal');
    }


    public function edit($id)
    {
        $document = Document::findOrFail($id);
        $this->documentId = $id;
        $this->no = $document->no;
        $this->title = $document->title;
        $this->desc = $document->desc;
        $this->year = $document->year;
        $this->sender = $document->sender;
        $this->status = $document->status;

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate();

        $document = Document::find($this->documentId);
        $document->update([
            'no' => $this->no,
            'title' => $this->title,
            'desc' => $this->desc,
            'year' => $this->year,
            'sender' => $this->sender,
            'status' => $this->status,
        ]);

        $this->updateMode = false;

        session()->flash('message', 'Document updated successfully.');

        $this->resetInputFields();
        // $this->emit('closeModal');
    }

    public function delete($id)
    {
        Document::find($id)->delete();
        session()->flash('message', 'Document deleted successfully.');
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    private function generateCode()
    {
        $latestDocument = Document::orderBy('id', 'desc')->first();
        if (!$latestDocument) {
            return 'doc-0001';
        }

        $latestNo = $latestDocument->no;
        $number = (int) substr($latestNo, 4);
        $number++;
        return 'doc-' . str_pad($number, 4, '0', STR_PAD_LEFT);
    }

    public function render()
    {
        return view('livewire.admin.list-document', [
            'documents' => Document::paginate(5),
        ]);
    }
}
