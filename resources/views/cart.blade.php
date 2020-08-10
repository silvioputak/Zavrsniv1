@extends('layout')

@section('title', 'Shopping Cart')

@section('extra-css')

@endsection

@section('content')

    <div class="breadcrumbs">
        <div class="container">
            <a href="#">Početna</a>
            <i class="fa fa-chevron-right breadcrumb-separator"></i>
            <span>Košarica</span>
        </div>
    </div> <!-- end breadcrumbs -->

    <div class="cart-section container">
        <div>
        @if (session()->has('success_message'))
                <div class="alert alert-success">
                    {{ session()->get('success_message') }}
                </div>
            @endif

            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(Cart::count() > 0)

            <h2>{{Cart::count()}} proizvod/a u košarici</h2>

            <div class="cart-table">
                @foreach(Cart::content() as $item)
                <div class="cart-table-row">
                    <div class="cart-table-row-left">
                        <a href="{{route('shop.show', $item->model->slug)}}"><img src="{{asset('storage/' .$item->model->image)}}" alt="item" class="cart-table-img"></a>
                        <div class="cart-item-details">
                            <div class="cart-table-item"><a href="{{route('shop.show', $item->model->slug)}}">{{$item->model->name}}</a></div>
                            <div class="{{$item->model->details}}"></div>
                        </div>
                    </div>
                    <div class="cart-table-row-right">
                        <div class="cart-table-actions">
                            <form action="{{route('cart.destroy', $item->rowId)}} " method="POST">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}

                            <button type="submit" class="cart-options">Obriši</button>

                            </form>
                            <a href=""></a>
                        </div>
                        <div>
                            <select class="quantity" data-id="{{$item->rowId}}">

                                @for($i = 1; $i < 5 + 1 ; $i++)
                                <option {{$item->qty == $i ?'selected' : ''}}>{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <div>{{$item->subtotal()}} <span> Kn</span></div>
                    </div>
                </div> <!-- end cart-table-row -->
                @endforeach
                

                

            </div> <!-- end cart-table -->

            

            <div class="cart-totals">
                <div class="cart-totals-left">
                    Besplatna poštarina za sve naše kupce!
                </div>

                <div class="cart-totals-right">
                    <div>
                        Neto <br>
                        Porez(%) <br>
                        <span class="cart-totals-total">Ukupno </span>
                    </div>
                    <div class="cart-totals-subtotal">
                        {{Cart::subtotal()}} <span> Kn</span> <br>
                        {{Cart::tax()}} <span> Kn</span> <br>
                        <span class="cart-totals-total">{{Cart::total()}} <span> Kn</span></span>
                    </div>
                </div>
            </div> <!-- end cart-totals -->

            <div class="cart-buttons">
                <a href="{{route('shop.index')}}" class="button">Povratak u web trgovinu</a>
                
                @if (auth()->user())
                    <a href="{{route('checkout.index')}}" class="button-primary">Plaćanje</a>
                @else
                    <p class="spacer1">Morate se registrirati kako bi obavili kupnju!</p>
                    <a href="{{route('register')}}" class="button-primary">Registracija</a>
                @endif
            </div>
            @else
                <h3>Nema proizvoda u košarici</h3>
                <div class="spacer"></div>
                <a href="{{route('shop.index')}}" class="button ml-1">Povratak u Web trgovinu</a>
                <div class="spacer"></div>
            @endif
            
            

        </div>

    </div> <!-- end cart-section -->

    


@endsection

@section('extra-js')
    <script src="{{ URL::to('js/app.js') }}"></script>
    <script>
        (function(){
            const classname = document.querySelectorAll('.quantity')
            Array.from(classname).forEach(function(element) {
                element.addEventListener('change', function() {
                    const id = element.getAttribute('data-id')
                    axios.patch(`/cart/${id}`, {
                        quantity: this.value
                    })
                    .then(function (response) {
                        // console.log(response);
                        window.location.href = '{{ route('cart.index') }}'
                    })
                    .catch(function (error) {
                        // console.log(error);
                        window.location.href = '{{ route('cart.index') }}'
                    });
                })
            })
        })();
    </script>
@endsection