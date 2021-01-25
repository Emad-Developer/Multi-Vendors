@extends('components/layout')
@section('title')
    Register
@endsection
@section('content')
@include('inc.errors')

    <h2 class="text-center text-warning my-4">Register</h2>
        <div class="container my-3">
            <form action="{{ route('auth_handleRegister') }}" method="post">
                @csrf
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}"/>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" name="email" value="{{ old('email') }}"/>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="pass" value="{{ old('pass') }}"/>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Register</button>
            </form>
        </div>

@endsection