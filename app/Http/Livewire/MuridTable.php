<?php

namespace App\Http\Livewire;

use App\Models\Murid;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class MuridTable extends LivewireTableComponent
{
    protected $model = Murid::class;

    public bool $showButtonOnHeader = true;

    public string $buttonComponent = 'murid.add-button';

    protected $listeners = ['refresh' => '$refresh', 'resetPage'];

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setDefaultSort('murids.created_at', 'desc')
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
                ->view('murid.templates.nama')
                ->searchable()
                ->sortable(),
            Column::make('Jenis Kelamin', 'gender')
                ->view('murid.templates.jenis_kelamin'),
            Column::make('Phone', 'phone')
                ->view('murid.templates.phone'),
            Column::make('Tanggal Lahir', 'tanggal_lahir')
                ->view('murid.templates.dob'),
            Column::make(__('messages.common.action'), 'id')->view('murid.action'),

        ];
    }

    public function builder(): Builder
    {
        /** @var Murid $query */
        return Murid::select('murids.*');
    }
}
