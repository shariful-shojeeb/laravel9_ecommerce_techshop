@extends('../admin.layouts.master')
@section('module_name')
    Products
@endsection
@section('page_name')
    Add Product Veriant
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
  margin-left:2px
}
.requirments{
    color: red;
    font-size: 13px;
    font-style: italic;
}
      </style>
      <style>
        .images-preview-div img
        {
        padding: 10px;
        max-width: 100px;
        }
        </style>
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="card">
                <div class="card-header py-3 bg-transparent">
                    <h5 class="mb-0">Add Product Veriant</h5>
                </div>
                <div class="card-body">
                    @if (session()->has('success_message'))
                        <div class="alert alert-success">
                            {{ session()->get('success_message') }}
                            {{ session()->put('success_message',null ) }}
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
                        <form class="row g-3" method="POST" action="{{ route('product.verientStore') }}"
                            enctype='multipart/form-data'>
                            @csrf
                            <div class="col-12">
                                <label class="form-label" >Product Name <span class="required-field"></span></label>

                                <select name="product_id" class="form-control"  id="">
                                    @foreach ($data as $details)
                                    <option value="{{$details->id}}">{{$details->product_name}}</option>
                                    @endforeach

                                </select>
                            </div>



                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6">
                                        <label class="form-label">Color <span class="required-field"></span></label>
                                    <select name="color" class="form-control" id="">
                                        <option value="">Select</option>
                                        <option value="Red">Red</option>
                                        <option value="Blue">Blue</option>
                                    </select>
                                    </div>

                                    <div class="col-6">
                                        <label class="form-label">Size</label>
                                        <select name="size" class="form-control" id="">
                                            <option value="">Select</option>
                                            <option value="M">M</option>
                                            <option value="XL">XL</option>
                                        </select>
                                    </div>


                                    <div class="col-6">
                                        <label class="form-label">Quantity</label>
                                        <input type="number" name="quantity" class="form-control" >
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

        // Required * mark
    </script>

{{-- Multiple Image upload --}}
<script >
    $(function() {
    // Multiple images preview with JavaScript
    var previewImages = function(input, imgPreviewPlaceholder) {
    if (input.files) {
    var filesAmount = input.files.length;
    for (i = 0; i < 3; i++) {
    var reader = new FileReader();
    reader.onload = function(event) {
    $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
    }
    reader.readAsDataURL(input.files[i]);
    }
    }
    };
    $('#images').on('change', function() {
    previewImages(this, 'div.images-preview-div');
    });
    });
    </script>
@endsection
@endsection
