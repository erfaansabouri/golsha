@extends('admin')
@section('content')
    @livewire('admin.blog-posts.edit', ['record' => $record])
@endsection
