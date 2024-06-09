@extends('layouts.app')
@section('title')
    Pelajaran
@endsection
@section('css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            @include('flash::message')
            <livewire:mata-pelajaran-table/>
        </div>
    </div>
@endsection
@section('page_scripts')
{{-- assets/js/moment.min.js --}}
@endsection
@section('scripts')
    {{-- assets/js/custom/input_price_format.js --}}
    {{-- assets/js/medicines/medicines.js --}}
@endsection
