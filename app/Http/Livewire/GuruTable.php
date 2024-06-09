<?php

namespace App\Http\Livewire;

use App\Models\Guru;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class GuruTable extends LivewireTableComponent
{
    protected $model = Guru::class;

    public bool $showButtonOnHeader = true;

    public string $buttonComponent = 'guru.add-button';

    protected $listeners = ['refresh' => '$refresh', 'resetPage'];

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setDefaultSort('gurus.created_at', 'desc')
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
                ->view('guru.templates.nama')
                ->searchable()
                ->sortable(),
            Column::make('Jenis Kelamin', 'gender')
                ->view('guru.templates.jenis_kelamin'),
            Column::make('Phone', 'phone')
                ->view('guru.templates.phone'),
            Column::make('Tanggal Lahir', 'tanggal_lahir')
                ->view('guru.templates.dob'),
            Column::make(__('messages.common.action'), 'id')->view('guru.action'),

        ];
    }

    public function builder(): Builder
    {
        /** @var Guru $query */
        return Guru::select('gurus.*');
    }
}
