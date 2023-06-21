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
          <div class="card">
            @if($product->images->count() > 0)
              <img src="{{asset('uploads/products/'.$product->images->first()->name)}}" class="card-img-top" alt="...">
            @else
              <img src="{{asset('uploads/default/product.webp')}}" class="card-img-top" alt="...">
            @endif  
              <div class="card-body">
                <p class="card-title text-center text-bold"><b>{{$product->name}}</b></p>
                <p class="text-center">
                  <del class="compare-price">{{$product->compare_price}},00 د.م</del> 
                  <span class="new-price mx-1">{{$product->price}},00 د.م</span></p>
                <div class="w-100 text-center">
                  <a href="{{route('product.show',['product' => $product])}}" class="btn btn-primary d-inline w-50">إضغط هنا للطلب</a>
                  <a href="#" class="btn btn-light d-inline add-to-cart w-50" style="background: #f8f9fa !important; border:1px solid rgba(0, 0, 0, 0.05) !important;" data-product-id="{{$product->id}}"> أضف إلى السلة </a>
                </div>
              </div>
          </div>
      </div>
      @endforeach
    </div>
  </div>

@endsection
