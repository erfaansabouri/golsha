@extends('admin')
@section('content')
    @livewire('admin.users.edit', ['record' => $record])
@endsection
