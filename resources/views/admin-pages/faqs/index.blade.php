@extends('admin')
@section('content')
    @livewire('admin.faqs.index', ['category_id' => $category_id])
@endsection
