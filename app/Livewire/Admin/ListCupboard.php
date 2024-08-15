<?php

namespace App\Livewire\Admin;

use App\Models\Books;
use App\Models\CupboardNumber;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class ListCupboard extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    #[Title('List Rak Buku')]

    public $number, $description, $rakLemariId;

    protected $rules = [
        'number' => 'required|string|max:255',
        'description' => 'required|string|max:255',
    ];

    public function store()
    {
        $this->validate();

        CupboardNumber::create([
            'number' => $this->number,
            'description' => $this->description,
        ]);

        session()->flash('message', 'Data successfully added.');

        $this->resetFields();
    }

    public function edit($id)
    {
        $rakLemari = CupboardNumber::findOrFail($id);
        $this->rakLemariId = $rakLemari->id;
        $this->number = $rakLemari->number;
        $this->description = $rakLemari->description;
    }

    public function update()
    {
        $this->validate();

        $rakLemari = CupboardNumber::find($this->rakLemariId);
        $rakLemari->update([
            'number' => $this->number,
            'description' => $this->description,
        ]);

        session()->flash('message', 'Data successfully updated.');

        $this->resetFields();
    }

    public function delete($id)
    {
        $relatedRecords = Books::where('cupboard_number_id', $id)->exists();

        if ($relatedRecords) {
            session()->flash('error', 'Cannot delete this record as it has related records.');
            return;
        }

        CupboardNumber::find($id)->delete();
        session()->flash('message', 'Data successfully deleted.');
    }

    private function resetFields()
    {
        $this->number = '';
        $this->description = '';
        $this->rakLemariId = null;
    }

    public function render()
    {
        return view('livewire.admin.list-cupboard', [
            'listRakLemari' => CupboardNumber::paginate(5)
        ]);
    }
}
