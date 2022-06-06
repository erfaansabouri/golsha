@extends('admin')
@section('content')
    @livewire('admin.invoices.index', ['status' => $status])
@endsection
