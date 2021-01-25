@extends('components.layout')
@section('title')
    Multi Vendors
@endsection
@section('content')
@foreach ($user as $admin)
    

    <h1 class="text-center text-warning mt-3">Welcome {{  $admin->name }}</h1>
    @endforeach
        <div class="container">
        
    </div>
    

@endsection