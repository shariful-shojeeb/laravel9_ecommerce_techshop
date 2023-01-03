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
						<div class="contact_form_title">Register</div>

						<form action="{{route('customer.add')}}" id="contact_form">
                            @csrf
                            <label for="">Full Name</label>
							<input type="text" name="customer_name" class="form-control">

                            <label for="">Email</label>
							<input type="text" name="customer_email" class="form-control">
                            <label for="">Phone</label>
							<input type="text" name="customer_phone" class="form-control">
                            <label for="">Password</label>
							<input type="text" name="customer_password" class="form-control">
                            <label for="">Address</label>
							<input type="text" name="customer_address" class="form-control">
                            <label for="">City</label>
							<input type="text" name="customer_city" class="form-control">
                            <label for="">Country</label>
							<input type="text" name="customer_country" class="form-control">
                            <label for="">Zip Code</label>
							<input type="number" name="customer_zip" class="form-control">

							<div class="contact_form_button">
								<button type="submit" class="button contact_submit_button">Register</button>

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
