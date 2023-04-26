@extends('backoffice.layouts.master')
@section('content')

@if(Session::has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> {{Session::get('success')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<h5 class="mb-3">New Product</h5>
<form action="{{route('admin.product.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-sm-8">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="mb-4">
                        <input type="text" class="form-control" value="{{old('name')}}" placeholder="Name ..." name="name">
                        @error('name') <span class="text-danger"> {{$message}} </span> @enderror
                    </div>
                    <div class="mb-4 ">
                        <div class="card">
                        <div class="card-body" style="padding: 5px !important">
                            <p class="d-inline w-50">{{env('APP_URL')}}/product/</p>
                            <input class="d-inline w-50 form-control" type="text" value="{{old('slug')}}" placeholder="Slug ..." name="slug">
                        </div>
                        </div>
                         @error('slug') <span class="text-danger"> {{$message}} </span> @enderror
                    </div>
                    <div class="mb-4">
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="number" class="form-control" value="{{old('price')}}" placeholder="New price ..." name="price">
                                @error('price') <span class="text-danger"> {{$message}} </span> @enderror

                            </div>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" value="{{old('compare_price')}}" placeholder="Old price ..." name="compare_price">
                                @error('compare_price') <span class="text-danger"> {{$message}} </span> @enderror

                            </div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <textarea name="description" id="editor" cols="30" rows="100">{{old('description')}}</textarea>
                        @error('description') <span class="text-danger"> {{$message}} </span> @enderror
                    </div>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-6">
                            <h5>Images</h5>
                             @error('files[]') <span class="text-danger"> {{$message}} </span> @enderror
                        </div>
                        <div class="col-sm-6">
                            <input class="form-control" id="image-files" type="file" name="files[]" multiple>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div id="image-preview"></div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Visibility</h5>
                </div>
                <div class="card-body">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" {{old('visible')=='1'?'checked':''}} value="1" name="visible">
                        <label class="form-check-label" for="flexCheckChecked">
                        Show in store
                        </label>
                        @error('visible') <span class="text-danger"> {{$message}} </span> @enderror
                    </div>
                </div>
            </div>
            <div class="mb-4">
                <div class="card">
                    <div class="card-header"><h5>Categories</h5></div>
                    <div class="card-body">
                        <select name="categories[]" multiple class="select-multiple form-control">
                            @foreach ($categories as $category)
                            <option {{old('category')==$category->id?'selected':''}} value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        @error('categories') <span class="text-danger"> {{$message}} </span> @enderror
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