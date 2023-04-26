@extends('backoffice.layouts.master')
@section('content')
<div class="mb-3">
    <div class="row">
        <div class="col-6"><h4>orders <span class="text-danger">({{$orders->count()}}) </span></h4></div>
        <div class="col-6">
            <a href="{{route('admin.order.create')}}" class="btn btn-primary float-end">New order +</a>
        </div>
    </div>
</div>
    <div class="card">
        <div class="card-body">
            <table class="table table-hover align-middle" id="myTable">
                <thead>
                    <td><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
                    <td># ID</td>
                    <td>Name</td>
                    <td>Phone</td>
                    <td>Product</td>
                    <td>Price</td>
                    <td>Actions</td>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td><input class="form-check-input" type="checkbox" value="{{$order->id}}" id="flexCheckDefault"></td>
                        <td>{{$order->id}}</td>
                        <td> {{$order->customer->full_name}} </td>
                        <td> {{$order->customer->phone}} </td>
                        <td> {{$order->product->name}} </td>
                        <td> {{$order->product->price}} </td>
                        <td>
                            <a href="{{route('admin.order.edit',['order' => $order])}}" class="btn btn-success btn-sm"><i class="fa-solid fa-pen"></i> </a>
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