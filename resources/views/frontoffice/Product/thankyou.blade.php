@extends('frontoffice.layouts.master')
@section('content')
<div class="container my-5 text-center">
    <div class="card">
        <div class="card-body">
            @if($order)
            <div class="mb-3">
                <h1 class="text-success my-3"><i class="fa-solid fa-circle-check"></i></h1>
                <h1>شكرا لك</h1>
                <p class="h5">لقد تم إرسال طلبيتك ستتم مراجعته من طرف فريقنا, قبل الإتصال بك</p>
            </div>
            <div class="table-responsive my-5">
                <table class="table table-striped">
                    <tr>
                        <td>المنتج</td>
                        <td>العدد</td>
                        <td>الشكل</td>
                        <td>الشحن</td>
                        <td>المجموع</td>
                    </tr>
                    <tr>
                        <td>{{$order->product->name}}</td>
                        <td>3</td>
                        <td>أخضر/حقيبتين</td>
                        <td>0 د.م</td>
                        <td>299 د.م</td>
                    </tr>
                </table>
            </div>
            @else
            <div>
                <p>Oops! Something went wrong with your order.</p>
            </div>
            @endif
            <div class="my-4">
                <a href="" class="btn btn-primary">إستمر في التسوق</a>
            </div>
        </div>
    </div>
</div>
@endsection