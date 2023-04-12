@extends('frontoffice.layouts.master')
@section('content')
  <div id="carouselExampleIndicators" class="carousel slide">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{asset('carousel/carousel2.png')}}" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="{{asset('carousel/carousel2.png')}}" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="{{asset('carousel/carousel2.png')}}" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <div style="margin: 72px auto;"></div>
  <div class="container-fluid">
    <div class="heading">
      <h3 class="text-center">آخر المنتجات</h3>
      <p class="text-center mb-5">جرب الجديد الآن</p>
    </div>
    <div class="row">
      @foreach ($products as $product)    
      <div class="col-sm-3">
          <div class="card" style="width: 18rem;">
              <img src="{{asset('uploads/products/'.$product->images->first()->name)}}" class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-title text-center text-bold"><b>{{$product->name}}</b></p>
                <p class="card-title text-center"><del class="old-price">{{$product->compare_price}},00 د.م</del> <span class="h5 mx-4">{{$product->price}},00 د.م</span></p>

                <a href="{{route('product.show',['product' => $product])}}" class="btn btn-primary d-block">إضغط هنا للطلب</a>
              </div>
          </div>
      </div>
      @endforeach
    </div>  
  </div>

@endsection
