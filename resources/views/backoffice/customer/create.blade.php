@extends('backoffice.layouts.master')
@section('content')

@if(Session::has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> {{Session::get('success')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<h5 class="mb-3">Create Customer</h5>
<form action="{{route('admin.customer.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card mb-3">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label for="full_name" class="form-label">Full name:</label>
                        <input type="text" class="form-control" value="{{old('full_name')}}" placeholder="Enter customer name ..." name="full_name">
                        @error('full_name') <span class="text-danger"> {{$message}} </span> @enderror
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone:</label>
                        <input class="form-control" type="text" value="{{old('phone')}}" placeholder="Enter customer phone ..." name="phone">
                            @error('phone') <span class="text-danger"> {{$message}} </span> @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label for="address" class="form-label">Address:</label>
                        <input type="text" class="form-control" value="{{old('address')}}" placeholder="Enter customer address ..." name="address">
                        @error('address') <span class="text-danger"> {{$message}} </span> @enderror
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label for="city" class="form-label">City:</label>
                        <input class="form-control" type="text" value="{{old('city')}}" placeholder="Enter customer city ..." name="city">
                            @error('city') <span class="text-danger"> {{$message}} </span> @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-body">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </div>
</form>
@endsection