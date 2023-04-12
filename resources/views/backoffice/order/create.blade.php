@extends('backoffice.layouts.master')
@section('content')

@if(Session::has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <p>{{Session::get('success')}}</p>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<h5 class="my-4">New Order</h5>
<form action="{{route('admin.category.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-sm-8">
            <div class="card mb-3">
                <div class="card-header">
                    <h4>Product</h4>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="" class="form-label">Product</label>
                            <select name="product" id="" class="form-control">
                                <option selected>Select product from here</option>
                                @foreach ($products as $product)
                                    <option value="{{$product->id}}"> {{$product->name}} </option> 
                                @endforeach
                            </select>
                            @error('product') <span class="text-danger"> {{$message}} </span> @enderror
                        </div>
                        <div class="col-sm-6">
                            <label for="" class="form-label">Quantity</label>
                            <div class="qty-container">
                                <button class="qty-btn-minus btn-light" type="button">-</button>
                                <input type="text" name="qty" value="0" class="input-qty"/>
                                <button class="qty-btn-plus btn-light" type="button">+</button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="" class="form-label">Pay status</label>
                            <select name="pay_status" id="" class="form-control">
                                <option value="unpaid">Unpaid</option>
                                <option value="cancel">Canceled</option>
                                <option value="paid">Paid</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="" class="form-label">Shipping status</label>
                            <select name="ship_status" id="" class="form-control">
                                <option value="unshiped">Unshiped</option>
                                <option value="shiped">Shiped</option>
                                <option value="fullfilled">Fullfilled</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-header">
                    <h4>Order Details</h4>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                       <table class="table table-striped">
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                       </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card mb-3">
                <div class="card-header">
                    <h4>Customer</h4>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <select name="customer" id="" class="form-control">
                            <option selected>Select customer from here</option>
                            @foreach ($customers as $customer)
                             <option value="{{$customer->id}}">{{$customer->full_name}}</option> 
                            @endforeach
                        </select>
                        @error('customer') <span class="text-danger"> {{$message}} </span> @enderror
                    </div>
                    <a href="" class="btn btn-danger">New Customer +</a>
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