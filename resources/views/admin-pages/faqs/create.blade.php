@extends('admin')
@section('content')
    @livewire('admin.faqs.create', ['category_id' => $category_id])
@endsection
