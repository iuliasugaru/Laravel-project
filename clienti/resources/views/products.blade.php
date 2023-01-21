@extends('layout')

<div class="card-header">
{{__('Shop')}}


                    <x-jet-nav-link href="{{URL::to('dashboard') }}">
                        {{ __('Dashboard') }}
                    </x-jet-nav-link>
</div>


 @section('content')
<div class="row">

@foreach($products as $product)

<div class="col-xs-18 col-sm-6 col-md-3" >
    <div class="thumbnail" style="weight=20px">

       <a href="detail/{{$product['id']}}">

       <img height=200px src="{{ $product->image }}" alt="" style="cursor: pointer; animation: shake 0.9s; animation-iteration-count: infinite;"> 
    <div class="caption">
    <h6>{{ $product->name }}</h6>
    <p style="font-size:13">{{ $product->description }}</p>
        <p><strong>Price: </strong> {{ $product->price }}$</p>

       </a>
        <p class="btn-holder"><a href="{{ route('add.to.cart', $product->id) }}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>
</div>
</div>
</div>
@endforeach
</div>
@endsection
