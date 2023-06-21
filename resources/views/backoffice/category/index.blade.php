@extends('backoffice.layouts.master')
@section('content')
<div class="mb-3">
    <div class="row">
        <div class="col-6"><h4>categories <span class="text-danger">({{$categories->count()}}) </span></h4></div>
        <div class="col-6">
            <a href="{{route('admin.category.create')}}" class="btn btn-primary float-end">New Category +</a>
        </div>
    </div>
</div>
@if(Session::has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> {{Session::get('success')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
    <div class="card">
        <div class="card-body">
            <table class="table table-hover align-middle" id="myTable">
                <thead>
                    <td><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
                    <td></td>
                    <td>Name</td>
                    <td>Show in store</td>
                    <td>Actions</td>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td><input class="form-check-input" type="checkbox" value="{{$category->id}}" id="flexCheckDefault"></td>
                        <td><img src="{{asset('uploads/categories/'.$category->image)}}" class="img-thumbnail" alt="" width="75" height="75"></td>
                        <td> {{$category->name}} </td>
                        <td><span class="badge bg-{{$category->visible==1?'success':'danger'}}">{{$category->visible==1?'Visible':'Hidden'}}</span></td>
                        <td>
                            <a href="{{route('admin.category.edit',['category' => $category])}}" class="btn btn-primary btn-sm"><i class="fa-solid fa-pen"></i> </a>
                            {{-- <a href="{{route('admin.category.destroy',['category' => $category->id])}}" onclick="return confirm('Are you sure??!!');document.getElementById('delete-form-{{$category->id}}').submit();" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>  --}}
                            <form class="d-inline" action="{{ route('admin.category.destroy',['category' => $category]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure??!!');" class="d-inline btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
                            </form>
                            <a href="" class="btn btn-secondary btn-sm"><i class="fa-solid fa-copy"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection