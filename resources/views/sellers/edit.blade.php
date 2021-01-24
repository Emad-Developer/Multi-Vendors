@extends('components.layout')
@section('title')
    Edit Seller {{ $seller->sellerName }} 
@endsection
@section('content')
@include('inc.errors')
<h2 class="text-center text-warning my-4">Edit Seller</h2>
        <div class="container my-3">
            <form action="{{ route('update_seller' , $seller->id) }}" method="post" enctype="multipart/form-data">
                {{-- {{ dd($seller) }} --}}
                @csrf
                <div class="form-group">
                    <label>Seller Name</label>
                    <input type="text" class="form-control" name="sellerName" value="{{ old('sellerName') ?? $seller->sellerName }}"/>
                </div>
                <div class="form-group">
                    <label>Store Name</label>
                    <input type="text" class="form-control" name="storeName" value="{{ old('storeName') ?? $seller->storeName }}"/>
                </div>
                {{-- <div class="form-group">
                    <label>Activity</label>
                    <select class="form-control" name="activity_id" value="{{ old('activity_id') }}">
                        @foreach ($activities as $activity)
                            <option value={{ $activity->id }}>{{ $activity->activity_name }}</option>
                        @endforeach
                    </select>
                </div> --}}
                <div class="form-group">
                    <label>Seller Email</label>
                    <input type="text" class="form-control" name="email" value="{{ old('email') ?? $seller->email}}"/>
                </div>
                <div class="form-group">
                    <label>Store Address</label>
                    <input type="text" class="form-control" name="storeAddress" value="{{ old('storeAddress') ?? $seller->storeAddress}}"/>
                </div>
                <div class="form-group">
                    <label>City</label>
                    <input type="text" class="form-control" name="city" value="{{ old('city') ?? $seller->city }}"/>
                </div>
                <div class="form-group">
                    <label>Store Phone</label>
                    <input type="text" class="form-control" name="storePhone" value="{{ old('storePhone') ?? $seller->storePhone}}"/>
                </div>
                <img src="{{ "../../uploads/sellers/$seller->storeImage" }}" class="w-25" alt="...">
                <div class="form-group">
                    <label>Store Image</label>
                    <input type="file" class="form-control" name="img" />
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Update Seller</button>
            </form>
        </div>

                
@endsection