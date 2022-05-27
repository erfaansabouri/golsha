@extends('admin')
@section('content')
    @livewire('admin.settings.edit', ['record' => $record])
@endsection
