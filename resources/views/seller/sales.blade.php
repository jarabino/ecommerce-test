<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <table id="cart" class="table table-hover .table-sm ">
        <thead>
        <tr>

            <th style="width:50%">Product</th>
            <th style="width:10%">Price</th>
            <th style="width:8%">Quantity</th>
            <th style="width:22%" class="text-center">Subtotal</th>
        </tr>
        </thead>
        <tbody>
        @foreach(auth()->user()->sales as $item)
        <tr>
            <td data-th="Product">

                <div class="row">
                    <div class="col-sm-3 hidden-xs"><img src="http://placehold.it/100x100" alt="..." class="img-responsive"/></div>
                    <div class="col-sm-9">
                        <h4 class="nomargin">{{$item->product->name}}</h4>
                        <p>{{$item->product->description}}</p>
                    </div>
                </div>
            </td>
            <td data-th="Price">{{$item->product->price}}</td>
            <td data-th="Quantity">
            {{$item->quantity}}
            </td>
            <td data-th="Subtotal" class="text-center">{{$item->product->price}}</td>
            
        </tr>
        @endforeach
        </tbody>
        <tfoot>
        
        <tr>
            <td><a href="{{ route('products')}}" class="btn btn-warning"><i class="fa fa-angle-left"></i>Product List</a></td>
            <td colspan="4" class="hidden-xs text-center"></td>
        </tr>
        </tfoot>
    </table>
</x-app-layout>
