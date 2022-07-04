@extends('admin')
@section('content')
    @livewire('admin.read-more-sections.edit', ['record' => $record])
@endsection
