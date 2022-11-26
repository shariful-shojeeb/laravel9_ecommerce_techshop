@extends('../admin.layouts.master')
@section('module_name')
    Brands
@endsection
@section('page_name')
    Add Brand
@endsection
@section('content_area')

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card">
                <div class="card-header py-3 bg-transparent">
                    <h5 class="mb-0">Add New Brand</h5>
                </div>
                <div class="card-body">
                    <div class="border p-3 rounded">

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
                        <form class="row g-3" method="POST" action="{{route('brand.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="col-12">
                                <label class="form-label">Brand Name</label>
                                <input type="text" name="brand_name"
                                    class="form-control @error('brand_name') is-invalid @enderror"
                                    placeholder="Brand Name" value="{{old('brand_name')}}" >

                            </div>

                            <div class="col-12">
                                <label class="form-label">Brand Image</label>
                                <input class="form-control" name="brand_image" type="file" required>
                            </div>


                            <div class="col-12">
                                <input type="submit" class="btn btn-primary px-4" value="Add">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end row-->


@endsection
