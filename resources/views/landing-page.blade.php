<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Pčelarstvo Putak</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat%7CRoboto:300,400,700" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

    </head>
    <body>
        <header class="with-background">
            <div class="top-nav container">
            <div class="top-nav-left">
            <div class="logo"><a href="/">Pčelarstvo Putak</a></div>
                    {{menu('main','partials.menus.main')}}
                </div>
                
                @include('partials.menus.main-right')
                
            </div> <!-- end top-nav -->
            <div class="hero container">
                <div class="hero-copy">
                    <h1>Web trgovina</h1>
                    <p>Pčelarstvo Putak od sada ima i online prodaju svojeg bogatoga asortimana, pogledajte ponudu i naručite svoj idealan proizvod</p>
                </div> <!-- end hero-copy -->

                <div class="hero-image">
                    <img src="img/med2.png" alt="hero image">
                </div> <!-- end hero-image -->
            </div> <!-- end hero -->
        </header>

        <div class="featured-section">

            <div class="container">
                <h1 class="text-center">Proizvodi</h1>
                <div class="products text-center">
                @foreach ($products as $product)
                <div class="product">
                        <a href="{{route('shop.show', $product->slug)}}"><img src="{{asset('storage/' .$product->image)}}" alt="product"></a>
                        <a href="{{route('shop.show', $product->slug)}}"><div class="product-name">{{$product->name}}</div></a>
                        <div class="product-price">{{$product->price}} <span> Kn</span> </div>
                    </div>
                @endforeach
                    
                    
                </div> <!-- end products -->

                <div class="text-center button-container">
                    <a href="{{route('shop.index')}}" class="button">Pogledajte sve proizvode</a>
                </div>

            </div> <!-- end container -->

        </div> <!-- end featured-section -->

        
            </div> <!-- end container -->
        </div> <!-- end blog-section -->

        @include('partials.footer')


    </body>
</html>
