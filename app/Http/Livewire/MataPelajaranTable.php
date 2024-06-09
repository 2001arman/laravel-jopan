<?php

namespace App\Http\Livewire;

use App\Models\MataPelajaran;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class MataPelajaranTable extends LivewireTableComponent
{
    protected $model = MataPelajaran::class;

    public bool $showButtonOnHeader = true;

    public string $buttonComponent = 'pelajaran.add-button';

    protected $listeners = ['refresh' => '$refresh', 'resetPage'];

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setDefaultSort('mata_pelajarans.created_at', 'desc')
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
            Column::make('Nama', 'name')
                ->view('pelajaran.templates.nama')
                ->searchable()
                ->sortable(),
            Column::make(__('messages.common.action'), 'id')->view('pelajaran.action'),

        ];
    }

    public function builder(): Builder
    {
        /** @var MataPelajaran $query */
        return MataPelajaran::select('mata_pelajarans.*');
    }
}
