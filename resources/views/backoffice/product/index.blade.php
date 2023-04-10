@extends('backoffice.layouts.master')
@section('content')
<h4 class="mb-3">Products</h4>
    <div class="card">
        <div class="card-body">
            <table class="table table-hover align-middle" id="myTable">
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
                        <td><img src="{{asset('uploads/'.$product->images->first()->name)}}" class="img-thumbnail" alt="" width="75" height="75"></td>
                        <td> {{$product->name}} </td>
                        <td>{{$product->id}}</td>
                        <td>{{$product->price}}</td>
                        <td><span class="badge bg-{{$product->visible==1?'success':'danger'}}">{{$product->visible==1?'Visible':'Hidden'}}</span></td>
                        <td>
                            <a href="" class="d-inline mx-2 border p-2 rounded-3"><i class="fa-solid fa-eye"></i> </a>
                            <a href="" class="d-inline mx-2 border p-2 rounded-3"><i class="fa-solid fa-pen"></i> </a>
                            <a href="" class="d-inline mx-2 border p-2 rounded-3"><i class="fa-solid fa-trash"></i></a> 
                            <a href="" class="d-inline mx-2 border p-2 rounded-3"><i class="fa-solid fa-copy"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection