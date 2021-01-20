<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="container products">

<div class="row">
    @foreach($products as $product)
    <div class="col-xs-18 col-sm-6 col-md-3">
        <div class="thumbnail">
            <img src="http://placehold.it/500x300" alt="">
            <div class="caption">
                <h4>{{$product->name}}</h4>
                <p>{{$product->description}}</p>
                <p><strong>Price: </strong> {{$product->price}}</p>
                @if(auth()->user()->type === 2)
                <p><strong>Status: </strong> {{$product->status?'Posted':'Pending'}}</p>
                <p class="btn-holder"><a href="#" class="btn btn-warning btn-block text-center" role="button">Edit Product</a> </p>
                @elseif(auth()->user()->type === 1)
                <p><strong>Status: </strong> {{$product->status?'Posted':'Pending'}}</p>
                <p class="btn-holder">
                    @if($product->status === 0)
                    <a href="{{route('approved.product', $product->id)}}" class="btn btn-warning btn-block text-center" role="button">Approved</a> </p>
                    @endif
                @else
                <p class="btn-holder"><a href="{{route('addToCart.products', $product->id)}}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>
                @endif
            </div>
        </div>
    </div>
    @endforeach
    

</div><!-- End row -->

</div>
            </div>
        </div>
    </div>
</x-app-layout>
