<?php

namespace App\Http\Livewire;

use App\Models\Kelas;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class KelasTable extends LivewireTableComponent
{
    protected $model = Kelas::class;

    public bool $showButtonOnHeader = true;

    public string $buttonComponent = 'kelas.add-button';

    protected $listeners = ['refresh' => '$refresh', 'resetPage'];

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setDefaultSort('kelas.created_at', 'desc')
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
            Column::make('Pelajaran', 'id')
                ->view('kelas.templates.pelajaran')
                ->searchable()
                ->sortable(),
            Column::make('Guru', 'id')
                ->view('kelas.templates.guru')
                ->searchable()
                ->sortable(),
            Column::make(__('messages.common.action'), 'id')->view('kelas.action'),

        ];
    }

    public function builder(): Builder
    {
        /** @var Kelas $query */
        return Kelas::select('kelas.*');
    }
}
