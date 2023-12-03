@extends('adminlte::page')

@section('content_header')
    <x-breadcrumbs></x-breadcrumbs>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
        </div>
    </div>
    {{-- {!! $dataTable->table() !!} --}}
@endsection

@section('script')
    {{-- {!! $dataTable->scripts() !!} --}}
@endsection
