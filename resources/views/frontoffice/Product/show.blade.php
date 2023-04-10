@extends('frontoffice.layouts.master')
@section('content')
<div class="my-3">
<ol class="list-unstyled">
    <li class="list-item"><a href="#"><b><i class="fa-solid fa-house"></i>  الرئيسية </b></a></li>
    <li class="list-item"> / </li>
    <li class="list-item"><b>منتج تجربة رقم 1</b></li>
</ol>
</div>
<div class="container-fluid">
<div class="my-5" style="margin: 10px 40px">
    <div class="row">
        <div class="col-sm-6">
            <img src="{{asset('carousel/carousel3.jpeg')}}" alt="" width="500" height="500">
        </div>
        <div class="col-sm-6">
            <ul class="list-unstyled" style="padding:0">
                <li class="list-item"><span class="badge text-bg-success">تخفيض 25%</span></li>
                <li class="list-item"><span class="badge text-bg-dark">في المخزن</span></li>
            </ul>
            <h1>المنتج رقم 1</h1>
            <p><del class="old-price">299,00 د.م</del> <b><span class="h3 mx-4">199,00 د.م</span></b></p>
            <form action="" style="margin-top: 45px">
                <h4>عنوان الشحن</h4>
                <div class="row mb-3">
                    <div class="col-sm-6">
                        <input type="text" placeholder="الإسم" class="form-control form-control-lg" aria-labelledby="textHelpBlock">
                    </div>
                    <div class="col-sm-6">
                        <input type="text" placeholder="رقم الهاتف" class="form-control form-control-lg" aria-labelledby="textHelpBlock">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <input type="text" placeholder="العنوان" class="form-control form-control-lg" aria-labelledby="textHelpBlock">
                    </div>
                    <div class="col-sm-6">
                        <input type="text" placeholder="المدينة" class="form-control form-control-lg" aria-labelledby="textHelpBlock">
                    </div>
                </div>
                <div class="mt-3 d-block">
                    <button class="btn btn-primary d-block">إضغط هنا للطلب</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection