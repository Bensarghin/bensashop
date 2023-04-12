@extends('backoffice.layouts.master')
@section('content')

@if(Session::has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <p>{{Session::get('success')}}</p>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<h5 class="mb-3">Authentification Update</h5>
<form action="{{route('admin.user.update')}}" method="post">
    @csrf
    <div class="card mb-3">
        <div class="card-body">
            <div class="mb-3">
                <label for="" class="label-form">Name</label>
                <input type="text" class="form-control" value="{{Auth::user()->name}}" name="name" placeholder="Enter admin name here ...">
            </div>
            <div class="mb-3">
                <label for="" class="label-form">Email</label>
                <input type="email" class="form-control" value="{{Auth::user()->email}}" name="email" placeholder="Enter admin email here ...">
            </div>
            <div class="mb-3">
                <a href="" class="btn btn-link">New password</a>
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