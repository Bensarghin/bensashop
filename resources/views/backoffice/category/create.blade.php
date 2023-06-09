@extends('backoffice.layouts.master')
@section('content')

@if(Session::has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> {{Session::get('success')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<h5 class="mb-3">Create Category</h5>
<form action="{{route('admin.category.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-sm-8">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="category" class="form-label">Name *</label>
                        <input type="text" class="form-control" value="{{old('name')}}" placeholder="Enter category name ..." name="name">
                        @error('name') <span class="text-danger"> {{$message}} </span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Slug *</label>
                        <div class="card">
                            <div class="card-body" style="padding: 5px !important">
                                <p class="d-inline w-50">{{env('APP_URL')}}/category/</p>
                                <input class="d-inline w-50 form-control" type="text" value="{{old('slug')}}" placeholder="Enter category slug ..." name="slug">
                            </div>
                        </div>
                         @error('slug') <span class="text-danger"> {{$message}} </span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description (optional)</label>
                        <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{old('description')}}</textarea>
                        @error('description') <span class="text-danger"> {{$message}} </span> @enderror
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
            <div class="card mb-3">
                <div class="card-body">
                    @error('image') <span class="text-danger"> {{$message}} </span> @enderror
                    <input type="file" name="image" onchange="loadImage(event)" id="image" class="form-control">
                    <img src="" class="img-thumbnail my-2" id="img-preview" alt="" width="300" height="300">
                </div>
            </div>
        </div>
    </div>
    <div class="card my-4">
        <div class="card-body">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </div>
</form>
@endsection