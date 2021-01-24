@extends('components.layout')
@section('title')
    {{ $seller->sellerName }}
@endsection
@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-lg-6">
            <img src="{{ "../../uploads/sellers/$seller->storeImage" }}" class="w-100" alt="...">
        </div>
        <div class="col-lg-6">
            <h3 class="my-3 text-info">Seller ID {{ $seller->id }}</h3>
            <h2 class="my-3">Seller Name: {{  $seller->sellerName}}</h2>
            <h3 class="my-3">Store Name: {{  $seller->storeName}}</h3>
            <a href="{{ route('show_sellers') }}" class="btn btn-info">Back To Sellers </a>
        </div>
    </div>
</div>
@endsection
