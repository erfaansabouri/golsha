@extends('admin')
@section('content')
    @livewire('admin.banners.edit', ['record' => $record])
@endsection
