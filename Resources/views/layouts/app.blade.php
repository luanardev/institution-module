@extends('layouts.app')

@section('sidebar')
    @include('institution::layouts.sidebar')
@endsection

@section('control')
    @include('layouts.control')
@endsection

@section('components')
    @livewire('livewire-loader')
@endsection

@section('css') 
    @livewireAlertStyles
    @livewireLoaderStyles
@endsection

@section('js')
    @livewireAlertScripts
    @livewireLoaderScripts
@endsection
