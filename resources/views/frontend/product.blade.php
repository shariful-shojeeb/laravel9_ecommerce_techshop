@extends('frontend.layouts.master')
@section('page_css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/frontend/styles/product_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/frontend/styles/product_responsive.css') }}">
@endsection
@section('main_content_area')
    <div class="single_product">
        <div class="container">
            <div class="row">

                <!-- Images -->
                <div class="col-lg-2 order-lg-1 order-2">
                    <ul class="image_list">
                        @foreach (json_decode($product_details->product_images) as $image)
                            <li data-image="{{ URL::asset($image) }}"><img
                                    src="{{ URL::asset($image) }}" alt=""></li>
                        @endforeach


                    </ul>
                </div>

                <!-- Selected Image -->
                <div class="col-lg-5 order-lg-2 order-1">
                    <div class="image_selected"><img src="{{ URL::asset($product_details->product_thumbnail) }}"
                            alt=""></div>
                </div>

                <!-- Description -->
                <div class="col-lg-5 order-3">
                    <div class="product_description">
                        <div class="product_category">{{ $product_details->category_name }}</div>
                        <div class="product_name">{{ $product_details->product_name }}</div>
                        <div class="rating_r rating_r_4 product_rating"><i></i><i></i><i></i><i></i><i></i></div>
                        <div class="product_text">
                            <p>{!! $product_details->product_description !!}</p>
                        </div>
                        <div class="order_info d-flex flex-row">
                            <form action="{{route('cart.update')}}" method="POST">
                                <div class="clearfix" style="z-index: 1000;">

                                    <div class="row">
                                        <div class="col-6">
                                            <!-- Product Quantity -->
                                            <div class="product_quantity">
                                                <span>Quantity: </span>
                                                <input id="quantity_input" type="text" pattern="[0-9]*" value="1">
                                                <div class="quantity_buttons">
                                                    <div id="quantity_inc_button" class="quantity_inc quantity_control"><i
                                                            class="fas fa-chevron-up"></i></div>
                                                    <div id="quantity_dec_button" class="quantity_dec quantity_control"><i
                                                            class="fas fa-chevron-down"></i></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <!-- Product Color -->
                                            <div class=" ">
                                                <span>Color: </span>
                                                {{-- <input id="quantity_input" type="text" pattern="[0-9]*" value="1"> --}}
                                                <select name="" class="" id="">
                                                    <option value=""></option>
                                                    @foreach ($veriants as $data )

                                                    <option value="">{{$data->size}}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                    </div>




                                </div>

                                <div class="product_price">$2000</div>
                                <div class="button_container">

                                    <button type="button" class="button cart_button">Add to Cart</button>
                                    <div class="product_fav"><i class="fas fa-heart"></i></div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- Related Prdoucts --}}

@if (!empty($related_products))
<div class="viewed">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="viewed_title_container">
                    <h3 class="viewed_title">Related Products</h3>
                    <div class="viewed_nav_container">
                        <div class="viewed_nav viewed_prev"><i class="fas fa-chevron-left"></i></div>
                        <div class="viewed_nav viewed_next"><i class="fas fa-chevron-right"></i></div>
                    </div>
                </div>

                <div class="viewed_slider_container">

                    <!-- Recently Viewed Slider -->

                    <div class="owl-carousel owl-theme viewed_slider">

                        @foreach ($related_products as $key=>$related)
                               <!-- Recently Viewed Item {{$key+1}}-->

                               <div class="owl-item">
                                <a href="{{route('product',$related->id)}}" target="_blank">
                            <div class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                <div class="viewed_image"><img
                                        src="{{ URL::asset($related->product_thumbnail) }}"
                                        alt="">
                                </div>
                                <div class="viewed_content text-center">
                                    <div class="viewed_price">{{ $related->product_discount_price }}<span>{{ $related->product_selling_price }}</span></div>
                                    <div class="viewed_name"><a href="#">{{ $related->product_name }}</a></div>
                                </div>
                                <ul class="item_marks">
                                    <li class="item_mark item_discount">-25%</li>
                                    <li class="item_mark item_new">{{ $related->product_tag }}</li>
                                </ul>
                            </div>
                        </a>
                        </div>

                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
