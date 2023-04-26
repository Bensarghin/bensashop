@extends('backoffice.layouts.master')
@section('content')
    <div class="mb-3">
        <div class="row">
            <div class="col-6"><h4>customers <span class="text-danger">({{$customers->count()}}) </span></h4></div>
            <div class="col-6">
                <a href="{{route('admin.customer.create')}}" class="btn btn-primary float-end">New customer +</a>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <table class="table table-hover align-middle" id="myTable">
                <thead>
                    <td><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
                    <td>Name</td>
                    <td>Phone</td>
                    <td>Address</td>
                    <td>City</td>
                    <td>Actions</td>
                </thead>
                <tbody>
                    @foreach($customers as $customer)
                    <tr>
                        <td><input class="form-check-input" type="checkbox" value="{{$customer->id}}" id="flexCheckDefault"></td>
                        <td> {{$customer->full_name}} </td>
                        <td> {{$customer->phone}} </td>
                        <td> {{$customer->address}} </td>
                        <td> {{$customer->city}} </td>
                        <td>
                            <a href="{{route('admin.customer.edit',['customer' => $customer])}}" class="btn btn-success btn-sm"><i class="fa-solid fa-pen"></i> </a>
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