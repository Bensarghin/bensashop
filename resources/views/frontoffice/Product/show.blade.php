@extends('frontoffice.layouts.master')
@section('content')
<div class="my-3">
<ol class="list-unstyled">
    <li class="list-item"><a href="#"><b><i class="fa-solid fa-house"></i>  الرئيسية </b></a></li>
    <li class="list-item"> / </li>
    <li class="list-item"><b>{{$product->name}}</b></li>
</ol>
</div>
<div class="container-fluid">
<div class="my-5">
    <div class="row">
        <div class="col-sm-6">
           <div class="row">
               <div class="col-3">
                 <div id="small-images-container">
                    @foreach ($product->images as $image)
                        <img src="{{asset('uploads/products/'.$image->name)}}" alt="" class="img-fluid variants-img" >
                    @endforeach
                 </div>
               </div>
            <div class="col-9">
                <img src="{{asset('uploads/products/'.$product->images->first()->name)}}" id="main-img" class="img-fluid" alt="">
            </div>
           </div>
        </div>
        <div class="col-sm-6 mt-4">
            <ul class="list-unstyled" style="padding:0">
                <li class="list-item"><span class="badge text-bg-success">تخفيض 25%</span></li>
                <li class="list-item"><span class="badge text-bg-dark">في المخزن</span></li>
            </ul>
            <h1 class="product-name">{{$product->name}}</h1>
            <p><del class="old-price">{{$product->compare_price}},00 د.م</del> <b><span class="new-price">{{$product->price}},00 د.م</span></b></p>
            <form action="" style="margin-top: 45px">
                <h4 class="form-title">معلومات الزبون</h4>
                <div class="row mb-3">
                    <div class="col-sm-6">
                        <label for="">الإسم الكامل *</label>
                        <input type="text" placeholder="" class="form-control form-control-lg" aria-labelledby="textHelpBlock">
                    </div>
                    <div class="col-sm-6">
                        <label for="">رقم الهاتف *</label>
                        <input type="text" placeholder="" class="form-control form-control-lg" aria-labelledby="textHelpBlock">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <label for="">العنوان *</label>
                        <input type="text" placeholder="" class="form-control form-control-lg" aria-labelledby="textHelpBlock">
                    </div>
                    <div class="col-sm-6">
                        <label for="">المدينة *</label>
                        <input type="text" placeholder="" class="form-control form-control-lg" aria-labelledby="textHelpBlock">
                    </div>
                </div>
                <div class="mt-3 d-block">
                    <button class="btn btn-primary call-to-action d-block">إضغط هنا للطلب</button>
                </div>
            </form>
        </div>
    </div>
</div>
<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
    <li class="nav-item" role="presentation">
    <button class="btn btn-link active" id="description-tab" data-bs-toggle="pill" data-bs-target="#description" type="button" role="tab" aria-controls="description" aria-selected="true">
        <h3 class="product-description-title">وصف المنتج</h3>
    </button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="btn btn-link" id="review-tab" data-bs-toggle="pill" data-bs-target="#review" type="button" role="tab" aria-controls="review" aria-selected="false">
        <h3 class="product-description-title">أراء الزبناء</h3>
      </button>
    </li>
</ul>
<hr>
<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab" tabindex="0">
        <div class="product-description">
            {!! $product->description !!}
        </div>
    </div>
    <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab" tabindex="0">...</div>
</div>
</div>
@endsection