@extends('layout')

@section('title', 'Thank You')

@section('extra-css')

@endsection

@section('body-class', 'sticky-footer')

@section('content')

   <div class="thank-you-section">
       <h1>Zahvaljujemo se  <br> na narudžbi!</h1>
       <p></p>
       <div class="spacer"></div>
       <div>
           <a href="{{ url('/') }}" class="button">Početna</a>
       </div>
   </div>




@endsection
