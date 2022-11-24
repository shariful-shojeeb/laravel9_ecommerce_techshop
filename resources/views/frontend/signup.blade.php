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
                        <div class="contact_form_title">Sign Up</div>
                        @if (session('success_message'))
                            <div class="alert alert-success">
                                @php
                                    echo session('success_message');
                                    session()->put('success_message', null);
                                @endphp
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>*{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('user.store') }}" id="contact_form">
                            @csrf
                            <label for="">Full Name</label>
                            <input type="text" class="form-control @error('user_name') is-invalid @enderror" name="user_name"  value="{{old('user_name')}}">
                            <label for="">Email Address</label>
                            <input type="email" class="form-control @error('user_email') is-invalid @enderror" name="user_email"  value="{{old('user_email')}}">
                            <label for="">Moblile Number</label>
                            <input type="number" class="form-control @error('user_phone') is-invalid @enderror" name="user_phone"  value="{{old('user_phone')}}">
                            <label for="">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"  value="{{old('password')}}">
                            <label for="">Confirm Password</label>
                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation"  value="{{old('password_confirmation')}}">

                            <div class="contact_form_button">
                                <input type="submit" class="button contact_submit_button" value="Sign Up">
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
