@extends('components.layout')
@section('title')
    All Activities
@endsection
@section('content')

    <h1 class="text-center text-warning mt-3">All Activities</h1>
    <div class="container">
        <div class="row">
            @foreach ($activities as $activity)
            <div class="col-lg-4 col-md-6 mt-3">
                <div class="card">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{  $activity->activity_name}}</h5>
                        <a href="{{ route('show_activity',$activity->id) }}" class="btn btn-info">Show</a>
                        <a href="{{ route('edit_activity', $activity->id) }}" class="btn btn-warning">Edit</a>
                        <a href="{{ route('delete_activity', $activity->id) }}" class="btn btn-danger">Delete</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="row mt-5">
        <h6 class="m-auto">
        {{ $activities->render() }}
        </h6>
    </div>

@endsection