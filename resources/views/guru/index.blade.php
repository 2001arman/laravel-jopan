@extends('layouts.app')
@section('title')
    Murid
@endsection
@section('css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            @include('flash::message')
            <livewire:guru-table/>
        </div>
        @include('medicines.show_modal')
    </div>
@endsection
@section('page_scripts')
{{-- assets/js/moment.min.js --}}
@endsection
@section('scripts')
    {{-- assets/js/custom/input_price_format.js --}}
    {{-- assets/js/medicines/medicines.js --}}
@endsection
