@extends('admin')
@section('content')
    @livewire('admin.categories.edit', ['record' => $record])
@endsection
