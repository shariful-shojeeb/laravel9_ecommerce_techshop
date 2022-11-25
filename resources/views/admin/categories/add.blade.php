@extends('../admin.layouts.master')
@section('module_name')
    Category
@endsection
@section('page_name')
    Add Category
@endsection
@section('content_area')

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card">
                <div class="card-header py-3 bg-transparent">
                    <h5 class="mb-0">Add New Category</h5>
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
                        <form class="row g-3" method="POST" action="{{route('category.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="col-12">
                                <label class="form-label">Category Name</label>
                                <input type="text" name="category_name"
                                    class="form-control @error('category_name') is-invalid @enderror"
                                    placeholder="Category Name" value="{{old('category_name')}}" >

                            </div>
                            <div class="col-12">
                                <label class="form-label">Description</label>
                                <textarea class="form-control @error('categroy_description') is-invalid @enderror" name="category_description"
                                    placeholder="Full description" rows="4" cols="4">{{old('categroy_description')}}</textarea>

                            </div>
                            @error('categroy_description')
                                {{ $message }}
                            @enderror
                            <div class="col-12">
                                <label class="form-label">Images</label>
                                <input class="form-control" name="category_image" type="file">
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
