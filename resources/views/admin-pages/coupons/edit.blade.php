@extends('admin')
@section('content')
    @livewire('admin.coupons.edit', ['record' => $record])
@endsection
