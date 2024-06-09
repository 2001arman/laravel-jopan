@extends('layouts.app')
@section('title')
    Edit Murid
@endsection
@section('header_toolbar')
    <div class="container-fluid">
        <div class="d-flex flex-wrap align-items-center justify-content-between mb-7">
            <h1 class="mb-0 me-3">@yield('title')</h1>
            <a href="{{ route('murid.index') }}"
               class="btn btn-outline-primary">{{ __('messages.common.back') }}</a>
        </div>
    </div>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column livewire-table">
            <div class="row">
                <div class="col-12">
                    @include('layouts.errors')
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    {{ Form::model($murid, ['route' => ['murid.update', $murid->id], 'method' => 'patch', 'id' => 'editMedicine']) }}
                    <div class="row">
                        @include('murid.fields')
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    {{--  assets/js/custom/input_price_format.js --}}
    {{--    assets/js/medicines/new.js --}}
@endsection
