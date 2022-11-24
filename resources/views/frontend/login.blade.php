@extends('frontend.layouts.master')
@section('page_css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/frontend/styles/contact_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/frontend/styles/contact_responsive.css') }}">
@endsection
@section('main_content_area')
    <!-- Contact Form -->

    <div class="contact_form">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-4">
                    <div class="contact_form_container">
                        <div class="contact_form_title">Login</div>
                        @if (session('error_message'))
                            <div class="alert alert-danger">
                                @php
                                    echo session('error_message');
                                    session()->put('error_message', null);
                                @endphp
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('user.loginChk') }}" id="contact_form">
                            @csrf
                            <label for="">Email Address</label>
                            <input type="email" class="form-control" name="user_email">
                            <label for="">Password</label>
                            <input type="password" class="form-control" name="password">

                            <div class="contact_form_button">
                                <input type="submit" class="button contact_submit_button" value="Login">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <div class="panel"></div>
    </div>

    <!-- Map -->

    <div class="contact_map">
        <div id="google_map" class="google_map">
            <div class="map_container">
                <div id="map"></div>
            </div>
        </div>
    </div>
@endsection
