@extends('backoffice.layouts.master')
@section('content')
<div class="mb-3">
    <div class="row">
        <div class="col-6"><h4>categories <span class="text-danger">({{$categories->count()}}) </span></h4></div>
        <div class="col-6">
            <a href="{{route('admin.category.create')}}" class="btn btn-danger float-end">New Category +</a>
        </div>
    </div>
</div>
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
                            <a href="" class="btn btn-success btn-sm"><i class="fa-solid fa-eye"></i> </a>
                            <a href="{{route('admin.category.edit',['category' => $category])}}" class="btn btn-primary btn-sm"><i class="fa-solid fa-pen"></i> </a>
                            <a href="" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a> 
                            <a href="" class="btn btn-secondary btn-sm"><i class="fa-solid fa-copy"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection