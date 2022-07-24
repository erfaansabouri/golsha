@extends('admin')
@section('content')
    @livewire('admin.behtarin-categories.edit', ['record' => $record])
@endsection
