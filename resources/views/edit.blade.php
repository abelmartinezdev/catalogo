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

@if (session('ok'))
    <div class="alert alert-success">
        {{ session('ok') }}
    </div>
@endif

<Customeredit :customer="{{$customer}}" :user="{{ auth()->user()->tojson() }}" domain="{{ env('APP_URL') }}">
   
</Customeredit>

@endsection