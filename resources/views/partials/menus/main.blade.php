

<ul>
  <li><a href="{{route('shop.index')}}">Proizvodi</a></li>
  <li>
    <a href="{{route('cart.index')}}">Košarica <span class=""><span>
    @if (Cart::instance('default')->count() > 0)
      <span class="cart-count"><span>{{ Cart::instance('default')->count() }}</span></span>
    @endif
    </a>
  </li>
</ul>