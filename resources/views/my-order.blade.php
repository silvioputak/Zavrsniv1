@extends('layout')

@section('title', 'Narudžba')

@section('extra-css')

@endsection

@section('content')

    <div class="breadcrumbs">
        <div class="container">
            <a href="/">Početna</a>
            <i class="fa fa-chevron-right breadcrumb-separator"></i>
            <span>Narudžba</span>
        </div>
    </div> <!-- end breadcrumbs -->

    <div class="products-section my-orders container">
        <div class="sidebar">
        <ul>
          
        </ul>
        </div> <!-- end sidebar -->
        <div>
            <h1 class="stylish-heading">Id narudžbe: {{ $order->id}}</h1>
            <div>
                <div class="order-container">
                    <div class="order-header">
                        <div class="order-header-items">
                            <div>
                                <div class="uppercase font-bold">Datum narudžbe</div>
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
                                
                            </div>
                        </div>
                    </div>
                    <div class="order-products">
                        <table class="table" style="width:50%">
                            <tbody>
                                <tr>
                                    <td>Ime</td>
                                    <td>{{ $order->user->name }}</td>
                                </tr>
                                <tr>
                                    <td>Adresa</td>
                                    <td>{{ $order->billing_address }}</td>
                                </tr>
                                <tr>
                                    <td>Grad</td>
                                    <td>{{ $order->billing_city }}</td>
                                </tr>
                                <tr>
                                    <td>Subtotal</td>
                                    <td>{{ $order->billing_subtotal }}</td>
                                </tr>
                                <tr>
                                    <td>Tax</td>
                                    <td>{{ $order->billing_tax }}</td>
                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td>{{ $order->billing_total }}</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div> <!-- end order-container -->
        </div>
    </div>


@endsection
