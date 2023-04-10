@extends('backoffice.layouts.master')
@section('content')

@if(Session::has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <p>{{Session::get('success')}}</p>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<h5 class="mb-3">Create Category</h5>
<form action="{{route('admin.category.store')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-sm-8">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="category" class="form-label">Category name:</label>
                        <input type="text" class="form-control" value="{{old('name')}}" placeholder="Name ..." name="name">
                        @error('name') <span class="text-danger"> {{$message}} </span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Category slug:</label>
                        <input type="text" class="form-control" value="{{old('slug')}}" placeholder="Slug ..." name="slug">
                        @error('slug') <span class="text-danger"> {{$message}} </span> @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" {{old('visible')=='1'?'checked':''}} value="1" name="visible">
                        <label class="form-check-label" for="flexCheckChecked">
                        Show in page
                        </label>
                        @error('visible') <span class="text-danger"> {{$message}} </span> @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection