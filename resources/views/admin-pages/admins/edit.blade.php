@extends('admin')
@section('content')
    @livewire('admin.admins.edit', ['record' => $record])
@endsection
