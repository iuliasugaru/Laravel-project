@extends('layout')

<div class="card-header">
<a href="{{URL::to('index')}}">{{__('Shop')}} </a>

 <x-jet-nav-link href="{{URL::to('dashboard') }}">
  {{ __('Dashboard') }}
 </x-jet-nav-link>
</div>


 @section('content')

 <div class="container">
     <div class="row" >
         <div class="col-sm-6">
            <img style="height:500px" src="{{asset($product->image)}}" alt="">
        </div>

        <div class="col-sm-6">
            <a href="/index">Go back </a>
            <h2>{{$product['name']}} </h2>
            <h3>Price: {{$product['price']}}</h3>
            <h4>Details: {{$product['description']}}</h4>
            <br><br>
            <form action="/item_to_cart" method="POST">
                @csrf  
            <input type="hidden" name="product_id" value={{ $product->id }}>
           
           <!-- <a href="{{ route('add.to.cart', $product->id) }}">Add <button class="btn btn-primary"> </a> -->
          
               
              
           
           <br><br>
           <p class="btn-holder"><a href="{{ route('add.to.cart', $product->id) }}" class="btn btn-primary" role="button">Add to cart</a> </p>
           <button type="hidden" class="btn btn-primary"> 
                     Add to Cart in db </button> 
            </form>
            
        </div>
    </div>

</div>
@endsection
