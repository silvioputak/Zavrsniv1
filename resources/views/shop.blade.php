@extends('layout')

@section('title', 'Products')

@section('extra-css')

@endsection

@section('content')

    <div class="breadcrumbs">
        <div class="container">
            <a href="/">Početna</a>
            <i class="fa fa-chevron-right breadcrumb-separator"></i>
            <span>Web trgovina</span>
        </div>
    </div> <!-- end breadcrumbs -->

    <div class="products-section container">
        <div class="sidebar">
        </div> <!-- end sidebar -->
        <div>
            <h1 class="stylish-heading">Proizvodi</h1>
            <div class="products text-center">

                @foreach($products as $product)
                <div class="product">
                    <a href="{{route('shop.show', $product->slug)}}"><img src="{{asset('storage/' .$product->image)}}" alt="product"></a>
                    <a href="{{route('shop.show', $product->slug)}}"><div class="product-name">{{$product->name}}</div></a>
                    <div class="product-price">{{$product->price}} <span> Kn</span></div>
                </div>
                @endforeach
               
                
            </div> <!-- end products -->
        </div>
    </div>


@endsection
