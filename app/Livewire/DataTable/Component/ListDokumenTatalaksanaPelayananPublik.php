<?php

namespace App\Livewire\DataTable\Component;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Document;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Log;

class ListDokumenTatalaksanaPelayananPublik extends DataTableComponent
{
    protected $model = Document::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function query(): \Illuminate\Database\Eloquent\Builder
    {
        // Filter the query to only include documents of type 'tatalaksana_pelayanan_publik'
        return Document::query()->where('tipe_doc', 'tatalaksana_pelayanan_publik');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("No", "no")
                ->sortable(),
            Column::make("Title", "title")
                ->sortable()
                ->searchable(),
            Column::make("Desc", "desc")
                ->sortable(),
            Column::make("Year", "year")
                ->sortable(),
            Column::make("Sender", "sender")
                ->sortable(),
            Column::make("Status", "status")
                ->sortable()
                ->format(function ($value) {
                    return $value === 'aktif' ?
                        '<div class="text-center"><span class="badge bg-success">Aktif</span></div>' :
                        '<div class="text-center"><span class="badge bg-danger">Inaktif</span></div>';
                })
                ->html(),
            Column::make("Tipe doc", "tipe_doc")
                ->sortable(),
        ];
    }
}
