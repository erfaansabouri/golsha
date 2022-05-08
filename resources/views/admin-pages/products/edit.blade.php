@extends('admin')
@section('content')
    @livewire('admin.products.edit', ['record' => $record])
@endsection
