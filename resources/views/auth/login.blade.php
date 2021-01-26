@extends('components/layout')
@section('title')
    Login
@endsection
@section('content')
@include('inc.errors')

    <h2 class="text-center text-warning my-4">Login</h2>
        <div class="container my-3">
            <form action="{{ route('auth_handleLogin') }}" method="post">
                @csrf
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" name="email" value="{{ old('email') }}"/>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" value="{{ old('password') }}"/>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Login</button>
            </form>
        </div>

@endsection