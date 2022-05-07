@extends('admin')
@section('content')
    @livewire('admin.groups.edit', ['record' => $record])
@endsection
