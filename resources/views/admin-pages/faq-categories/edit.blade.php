@extends('admin')
@section('content')
    @livewire('admin.faq-categories.edit', ['record' => $record])
@endsection
