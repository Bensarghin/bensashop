@extends('backoffice.layouts.master')
@section('content')

<div id="app">
    <create-component 
    :categories-data="{{json_encode($categoriesData)}}"
    :app-url="{{json_encode(env('APP_URL'))}}"
    ></create-component>
</div>
@endsection