@extends('app')
@section('content')
    @livewire('front.contact-us.create', ['formType' => $formType ?? 'تماس با ما'])
@endsection
