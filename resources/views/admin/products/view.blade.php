@extends('../admin.layouts.master')
@section('module_name')
    Notices
@endsection
@section('page_name')
    Ntice Details
@endsection
@section('content_area')
    <script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
    <style>
        .ck-editor__editable {
            min-height: 400px;
        }
    </style>
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card">


                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h6 class="mb-0">Details</h6>
                        <div class="fs-5 ms-auto dropdown">
                            <a href="" class="btn btn-primary">Edit</a>
                        </div>
                    </div>
                    <br>
                    @if (session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
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

                    <div class="border p-3 rounded">
                        <form class="row g-3" method="POST" action="{{ route('notice.store') }}" enctype='multipart/form-data'>
                            @csrf
                            <div class="col-12">
                              <h2>{{$data->notice_title}}</h2>
                              <hr>
                            <div class="col-12">
                              {!!$data->notice_content!!}
                            </div>
                            <hr>

                            <div class="col-12 text-center">
                                <img src="{{URL::asset('/public/files/notices/images').'/'.$data->notice_image}}"width="100%" alt="">
                            </div>
                            <hr>
                            <div class="col-12 text-center">

                                <br>
                                <a href="{{URL::asset('/public/files/notices/docs').'/'.$data->notice_file}}" target="_blank" class="btn btn-success">Download File</a>
                            </div>
                            <hr>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6">
                                        <label class="form-label">Status</label>
                                        <select name="notice_status" class="form-control" id="">
                                            <option value="1">Published</option>
                                            <option value="2">Draft</option>
                                        </select>
                                    </div>

                                    <div class="col-6">
                                        <label class="form-label">Scroll</label>
                                        <select name="notice_scroll" class="form-control" id="">
                                            <option value="1">On</option>
                                            <option value="2">Off</option>
                                        </select>
                                    </div>

                                </div>

                            </div>

                            <div class="col-12">

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end row-->
@section('page_js')
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
@endsection
