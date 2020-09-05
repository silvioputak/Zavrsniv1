@extends('layout')

@section('title', 'Moje narudžbe')

@section('extra-css')

@endsection

@section('content')

    <div class="breadcrumbs">
        <div class="container">
            <a href="/">Početna</a>
            <i class="fa fa-chevron-right breadcrumb-separator"></i>
            <span>Narudžbe</span>
        </div>
    </div> <!-- end breadcrumbs -->

    <div class="products-section my-orders container">
        <div class="sidebar">
        </div> <!-- end sidebar -->
        <div>
            <h1 class="stylish-heading">Moje narudžbe</h1>
            <div>
                @foreach ($orders as $order)
                <div class="order-container">
                    <div class="order-header">
                        <div class="order-header-items">
                            <div>
                                <div class="uppercase font-bold">Datum</div>
                                <div>{{ $order->created_at }}</div>
                            </div>
                            <div>
                                <div class="uppercase font-bold">Broj narudžbe</div>
                                <div>{{ $order->id }}</div>
                            </div><div>
                                <div class="uppercase font-bold">Ukupno</div>
                                <div>{{ $order->billing_total }} <span> Kn</span></div>
                            </div>
                        </div>
                        <div>
                            <div class="order-header-items">
                                <div><a href="{{ route('orders.show', $order->id) }}">Detalji narudžbe</a></div>
                                
                                
                            </div>
                        </div>
                    </div>
                    <div class="order-products">
                        @foreach ($order->products as $product)
                            <div class="order-product-item">
                                <div><img src="{{asset('storage/' .$product->image)}}" alt="Product Image"></div>
                                <div>
                                    <div>
                                        <a href="{{ route('shop.show', $product->slug) }}">{{ $product->name }}</a>
                                    </div>
                                    <div>{{ $product->price }} <span> Kn</span></div>
                                    <div>Količina: {{ $product->pivot->quantity }}</div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div> <!-- end order-container -->
                @endforeach
            </div>
        </div>
    </div>


@endsection
