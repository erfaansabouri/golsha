@extends('admin')
@section('content')
    @livewire('admin.faqs.edit', ['record' => $record])
@endsection
