@extends('frontend.layouts.master')
@section('page_css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/frontend/styles/contact_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/frontend/styles/contact_responsive.css') }}">
@endsection
@section('main_content_area')

	<!-- Contact Info -->


	<!-- Contact Form -->

	<div class="contact_form">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="contact_form_container">
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
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
						<div class="contact_form_title">Login</div>

						<form action="{{route('login.check')}}" id="contact_form">
                            <label for="">Email</label>
							<input type="text" name="customer_email" class="form-control">
                            <label for="">Password</label>
							<input type="text" name="customer_password" class="form-control">

							<div class="contact_form_button">
								<button type="submit" class="button contact_submit_button">login</button>
                                <a href="{{route('reg.view')}}"  class="btn btn-success">Register</a>
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
