@extends('layouts.frontend')

@section('title', 'Cart')

@section('content')

    <table id="cart" class="table table-hover table-condensed">
        <thead>
        <tr>
            <th style="width:50%">Product</th>
            <th style="width:10%">Price</th>
            <th style="width:8%">Quantity</th>
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:10%"></th>
        </tr>
        </thead>
        <tbody>
            <?php $total = 0 ?>
            @if(session('cart'))
                @foreach(session('cart') as $id => $details)
                    <?php $total += $details['price'] * $details['quantity'] ?>
                    <tr>
                        <td data-th="Product">
                            <div class="row">
                                <div class="col-sm-3 hidden-xs"><img src="{{ asset('images/'.$details['photo']) }}" class="img-responsive" width="100" height="100" /></div>
                                <div class="col-sm-9">
                                    <h4 class="nomargin">{{ $details['nama'] }}</h4>
                                </div>
                            </div>
                        </td>
                        <td data-th="Price">Rp {{ $details['price'] }}</td>
                        <td data-th="Quantity">{{ $details['quantity'] }}</td>
                        <td data-th="Subtotal" class="text-center">Rp {{ $details['price'] * $details['quantity'] }}</td>
                        <td class="actions" data-th="">
                            <button class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button>
                            <button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
        <tfoot>
        <tr class="visible-xs">
            <td class="text-center"><strong>Total  {{ $total }}}</strong></td>
        </tr>
        <tr>
            <td><a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
            <td class="hidden-xs"></td>
            <td class="hidden-xs"><a href="{{ url('/checkout') }}" class="btn btn-danger">Checkout <i class="fa fa-angle-right"></i></a></td>
            <td class="hidden-xs text-center"><strong>Total Rp {{ $total }}</strong></td>
        </tr>
        </tfoot>
    </table>

@endsection