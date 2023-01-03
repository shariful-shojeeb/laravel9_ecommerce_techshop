@extends('../admin.layouts.master')
@section('module_name')
    Notices
@endsection
@section('page_name')
    Edit Notice
@endsection
@section('content_area')
    <script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
    <style>
        .ck-editor__editable {
            min-height: 400px;
        }
    </style>
    <style type="text/css">
        .required-field::after {
            content: "*";
            color: red;
            margin-left: 2px
        }

        .requirments {
            color: red;
            font-size: 13px;
            font-style: italic;
        }

        input[type=file] {
            color: transparent;
        }
    </style>
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card">
                <div class="card-header py-3 bg-transparent">
                    <h5 class="mb-0">Edit Notice</h5>
                </div>
                <div class="card-body">
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
                        <p class="requirments">* Marked Fields are Required</p>
                        <form class="row g-3" method="POST" action="{{ route('notice.update',$data->id) }}"
                            enctype='multipart/form-data'>
                            @csrf
                            <div class="col-12">
                                <label class="form-label">Notice Title <span class="required-field"></span></label>
                                <input type="text" name="notice_title"
                                    value="{{ old('notice_title', $data->notice_title) }}"
                                    class="required-field form-control  @error('notice_title') is-invalid @enderror"
                                    placeholder="">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Notice Content<span class="required-field"></span></label>
                                <textarea id="editor" name="notice_content" class="form-control @error('notice_content') is-invalid @enderror"
                                    placeholder="" rows="100" cols="40"> {{ old('notice_content', $data->notice_content) }}</textarea>
                            </div>


                            <div class="col-12">
                                <div class="row">
                                    <div class="col-9">
                                        <label for="notice_image" class="form-label">Notice Image <span
                                                class="requirments">Allowed file types: .jpg, .jpeg, .png | Max:
                                                5MB</span></label>
                                        <input class="form-control @error('notice_image') is-invalid @enderror"
                                            name="notice_image" accept="image/*" type='file' id="imgInput">
                                    </div>
                                    <div class="col-3 text-center">
                                        <img id="noticeImage" class="img img-thumbnail" style="width: 130px"
                                            src="{{URL::asset('/public/files/notices/images').'/'.$data->notice_image}}" alt="your image" />
                                    </div>
                                </div>

                            </div>

                            <div class="col-12">
                                <label class="form-label">Notice File <span
                                        class="requirments">Allowed file types: .pdf, .doc, .docx | Max: 5MB</span></label>
                                <input class="form-control @error('notice_file') is-invalid @enderror" name="notice_file"
                                    type="file">
                            </div>

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6">
                                        <label class="form-label">Status</label>
                                        <select name="notice_status" class="form-control" id="notice_status">
                                            <option value="1">Published</option>
                                            <option value="2">Draft</option>
                                        </select>
                                    </div>

                                    <div class="col-6">
                                        <label class="form-label">Scroll</label>
                                        <select name="notice_scroll" class="form-control" id="notice_scroll">
                                            <option value="1">On</option>
                                            <option value="2">Off</option>
                                        </select>
                                    </div>

                                </div>

                            </div>

                            <div class="col-12">
                                <input type="submit" class="btn btn-primary px-4" value="Update">
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

        //Image preview before upload
        imgInput.onchange = evt => {
            const [file] = imgInput.files
            if (file) {
                noticeImage.src = URL.createObjectURL(file)
            }
        }



        window.pressed = function() {
            var a = document.getElementById('imgInput');
            if (a.value == "") {
                fileLabel.innerHTML = "Choose file";
            } else {
                var theSplit = a.value.split('\\');
                fileLabel.innerHTML = theSplit[theSplit.length - 1];
            }
        };


    </script>

     {{-- Selected Value --}}
     <script type="text/javascript">
        document.getElementById("notice_status").value = {{ $data->notice_status }};
        document.getElementById("notice_scroll").value = {{ $data->notice_scroll }};
    </script>
@endsection
@endsection
