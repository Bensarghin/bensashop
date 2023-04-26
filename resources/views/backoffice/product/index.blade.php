@extends('backoffice.layouts.master')
@section('content')
<div class="mb-3">
    <div class="row">
        <div class="col-6"><h4>products <span class="text-danger">({{$products->count()}}) </span></h4></div>
        <div class="col-6">
            <a href="{{route('admin.product.create')}}" class="btn btn-primary float-end">New Product +</a>
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
            <table class="table table-hover align-middle">
                <thead>
                    <td><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
                    <td></td>
                    <td>Name</td>
                    <td>Orders</td>
                    <td>Price</td>
                    <td>Show in store</td>
                    <td>Actions</td>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td><input class="form-check-input" type="checkbox" value="{{$product->id}}" id="flexCheckDefault"></td>
                        <td><img src="{{asset('uploads/products/'.($product->images->first()->name!=null?$product->images->first()->name:''))}}" class="img-thumbnail" alt="" width="75" height="75"></td>
                        <td> {{$product->name}} </td>
                        <td>{{$product->id}}</td>
                        <td>{{$product->price}}</td>
                        <td><span class="badge bg-{{$product->visible==1?'success':'danger'}}">{{$product->visible==1?'Visible':'Hidden'}}</span></td>
                        <td>
                            <a href="" class="btn btn-success btn-sm"><i class="fa-solid fa-eye"></i> </a>
                            <a href="{{route('admin.product.edit',['product' => $product])}}" class="btn btn-primary btn-sm"><i class="fa-solid fa-pen"></i> </a>
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