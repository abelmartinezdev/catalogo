@extends('layouts.app')

@section('content')

@php
    $title = "Home";
    $breadcrumbs = [
        'First' => ['url' => '/first'],
        'Second' => ['url' => '/second'],
        'Third' => ['url' => '/third']
    ];
@endphp

<Customer :user="{{ auth()->user()->tojson() }}" domain="{{ env('APP_URL') }}">
   
</Customer>
@endsection