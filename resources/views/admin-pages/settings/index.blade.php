@extends('admin')
@section('content')
    @livewire('admin.settings.index', ['category' => $category])
@endsection
