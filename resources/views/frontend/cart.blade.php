@extends('frontend.layouts.master')
@section('page_css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/frontend/styles/cart_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/frontend/styles/cart_responsive.css') }}">
@endsection

@section('main_content_area')
    <!-- Cart -->

    <div class="cart_section">
        <div class="container">
            <div class="row">

                <div class="col-12 offset-lg-1">
                    <div class="cart_container">
                        <div class="cart_title">Shopping Cart</div>
                        @if ($message = Session::get('success'))
                        <div class="p-4 mb-3 bg-green-400 rounded">
                            <p class="text-green-800">{{ $message }}</p>
                        </div>
                    @endif

                        <div class="cart_items">
                            <ul class="cart_list">
                                @foreach ($cartItems as $item )
                                <li class="cart_item clearfix">
                                    <div class="cart_item_image"><img src="{{URL::asset($item->attributes->image)}}" alt=""></div>
                                    <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                        <div class="cart_item_name cart_info_col">
                                            <div class="cart_item_title">Name</div>
                                            <div class="cart_item_text">{{ $item->name }}</div>
                                        </div>
                                        <div class="cart_item_color cart_info_col">
                                            <div class="cart_item_title">Color</div>
                                            <div class="cart_item_text"><span
                                                    style="background-color:#999999;"></span>Silver</div>
                                        </div>

                                        <form action="{{ route('cart.update') }}" method="POST">
                                            @csrf
                                        <div class="cart_item_quantity cart_info_col">
                                            <div class="cart_item_title">Quantity</div>
                                            <div class="cart_item_text"><input type="number" name="quantity" value="{{$item->quantity}}" style="width:50px !important"></div>
                                        </div>
                                        <div class="cart_item_price cart_info_col">
                                            <div class="cart_item_title">Price</div>
                                            <div class="cart_item_text">{{ $item->price }}</div>
                                        </div>
                                        <div class="cart_item_total cart_info_col">
                                            <div class="cart_item_title">Total</div>
                                            <div class="cart_item_text">{{$item->price * $item->quantity}}</div>
                                        </div>
                                        <div class="cart_item_total cart_info_col">
                                            <div class="cart_item_title">Actions</div>
                                            <div class="cart_item_text">

                                                    <input type="hidden" value="{{ $item->id }}" name="id">
                                                    <button class="btn btn-info">Update</button>
                                                </form>

                                                <form action="{{ route('cart.remove') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" value="{{ $item->id }}" name="id">
                                                    <button class="px-4 py-2 text-white bg-red-600 shadow rounded-full">x</button>
                                                </form>



                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endforeach

                            </ul>
                        </div>

                        <!-- Order Total -->
                        <div class="order_total">
                            <div class="order_total_content text-md-right">
                                <div class="order_total_title">Order Total:</div>
                                <div class="order_total_amount">{{ Cart::getTotal() }}</div>
                            </div>
                        </div>

                        <div class="cart_buttons">
                            <button type="button" class="button cart_button_clear">Update</button>
                            <button type="button" class="button cart_button_checkout">Add to Cart</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
