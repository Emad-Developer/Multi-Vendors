@extends('components.layout')
@section('title')
    Edit Activity {{ $activity->activity_name }} 
@endsection
@section('content')
    
<h2 class="text-center text-warning my-4">Edit Activity</h2>
        <div class="container my-3">
            <form action="{{ route('update_activity' , $activity->id) }}" method="post">
                @csrf
                <div class="form-group">
                    <label>Activity</label>
                    <input type="text" class="form-control" name="activity_name" value={{ $activity->activity_name }}/>
                </div>
                {{-- <div class="form-group">
                    <label>Activity Image</label>
                    <input type="file" class="form-control" name="activity_img" />
                </div> --}}
                <button type="submit" class="btn btn-primary" name="submit">Update Activity</button>
            </form>
        </div>


@endsection