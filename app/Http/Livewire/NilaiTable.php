<?php

namespace App\Http\Livewire;

use App\Models\Nilai;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class NilaiTable extends LivewireTableComponent
{
    protected $model = Nilai::class;

    public bool $showButtonOnHeader = true;

    public string $buttonComponent = 'nilai.add-button';

    protected $listeners = ['refresh' => '$refresh', 'resetPage'];

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setDefaultSort('nilais.created_at', 'desc')
            ->setQueryStringStatus(false);
        $this->setTdAttributes(function (Column $column, $row, $columnIndex, $rowIndex) {
            if ($column->isField('name')) {
                return [
                    'class' => 'pt-5',
                ];
            }

            return [];
        });
    }

    public function columns(): array
    {
        return [
            Column::make('Murid', 'id')
                ->view('nilai.templates.murid')
                ->searchable()
                ->sortable(),
            Column::make('Kelas', 'id')
                ->view('nilai.templates.kelas')
                ->searchable()
                ->sortable(),
            Column::make('Nilai', 'nilai')
                ->view('nilai.templates.nilai')
                ->sortable(),
            Column::make(__('messages.common.action'), 'id')->view('nilai.action'),

        ];
    }

    public function builder(): Builder
    {
        /** @var Nilai $query */
        return Nilai::select('nilais.*')->with(['kelas.mataPelajaran', 'kelas.guru', 'murid']);
    }
}
