@extends('../admin.layouts.master')
@section('module_name')
    Products
@endsection
@section('page_name')
    Add Product
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
    </style>
    <style>
        .images-preview-div img {
            padding: 10px;
            max-width: 100px;
        }
    </style>
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="card">
                <div class="card-header py-3 bg-transparent">
                    <h5 class="mb-0">Add Product</h5>
                </div>
                <div class="card-body">
                    @if (session()->has('success_message'))
                        <div class="alert alert-success">
                            {{ session()->get('success_message') }}
                            {{ session()->put('success_message', null) }}
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
                        <form class="row g-3" method="POST" action="{{ route('product.store') }}"
                            enctype='multipart/form-data'>
                            @csrf
                            <div class="col-12">
                                <label class="form-label">Product Name <span class="required-field"></span></label>
                                <input type="text" name="product_name" value="{{ old('product_name') }}"
                                    class="required-field form-control  @error('product_name') is-invalid @enderror"
                                    placeholder="">
                            </div>


                            <div class="col-12">
                                <div class="row">
                                    <div class="col-4">
                                        <label class="form-label">Category <span class="required-field"></span></label>
                                        <select name="category_id" class="form-control" id="">
                                            <option value="">Select</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-4">
                                        <label class="form-label">Brand</label>
                                        <select name="brand_id" class="form-control" id="">
                                            <option value="">Select</option>
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-4">
                                        <label class="form-label">Product Code (SKU)</label>
                                        <input type="text" class="form-control" name="product_code" readonly>
                                    </div>

                                </div>

                            </div>

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6">
                                        <label class="form-label">Color <span class="required-field"></span></label>
                                        <input type="text" name="color" class="form-control" data-role="tagsinput"
                                            value="value">
                                    </div>

                                    <div class="col-6">
                                        <label class="form-label">Size</label>
                                        <input type="text" name="size" class="form-control" data-role="tagsinput"
                                            value="value">
                                    </div>



                                </div>

                            </div>



                            <div class="col-12">
                                <div class="row">
                                    <div class="col-4">
                                        <label class="form-label">Purchase Price <span
                                                class="required-field"></span></label>
                                        <input type="number"
                                            class="form-control @error('product_purchase_price') is-invalid @enderror"
                                            name="product_purchase_price" value="{{ old('product_purchase_price') }}">
                                    </div>

                                    <div class="col-4">
                                        <label class="form-label">Selling Price <span class="required-field"></span></label>
                                        <input type="number"
                                            class="form-control @error('product_selling_price') is-invalid @enderror"
                                            name="product_selling_price" value="{{ old('product_selling_price') }}">
                                    </div>

                                    <div class="col-4">
                                        <label class="form-label">Discounted Price <span
                                                class="required-field"></span></label>
                                        <input type="number"
                                            class="form-control @error('product_discount_price') is-invalid @enderror"
                                            name="product_discount_price" value="{{ old('product_discount_price') }}">
                                    </div>

                                </div>

                            </div>

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-4">
                                        <label class="form-label">Stock Quantity <span
                                                class="required-field"></span></label>
                                        <input type="number"
                                            class="form-control @error('product_quantity') is-invalid @enderror"
                                            name="product_quantity" value="{{ old('product_quantity') }}">
                                    </div>



                                    <div class="col-4">
                                        <label class="form-label">Alert Quantity <span
                                                class="required-field"></span></label>
                                        <input type="number"
                                            class="form-control @error('product_alert_quantity') is-invalid @enderror"
                                            name="product_alert_quantity" value="{{ old('product_alert_quantity') }}">
                                    </div>

                                    <div class="col-4">
                                        <label class="form-label">Tag</label>
                                        <input type="text"
                                            class="form-control @error('product_tag') is-invalid @enderror"
                                            name="product_tag" value="{{ old('product_tag') }}">
                                    </div>

                                </div>

                            </div>

                            <div class="col-12">
                                <label class="form-label">Product Description<span class="required-field"></span></label>
                                <textarea id="editor" name="product_description"
                                    class="form-control @error('product_description') is-invalid @enderror" placeholder="" rows="100"
                                    cols="40"> {{ old('product_description') }}</textarea>
                            </div>


                            <div class="col-12">
                                <div class="row">
                                    <div class="col-9">
                                        <label class="form-label">Thumbnail <span class="requirments">Allowed file types:
                                                .jpg, .jpeg, .png | Max: 300KB</span></label>
                                        <input class="form-control @error('product_thumbnail') is-invalid @enderror"
                                            name="product_thumbnail" accept="image/*" type='file' id="imgInput">
                                    </div>
                                    <div class="col-3 text-center">
                                        <img id="noticeImage" class="img img-thumbnail" style="width: 130px"
                                            src="{{ URL::asset('public/admin/assets/images/1.png') }}"
                                            alt="your image" />
                                    </div>
                                </div>

                            </div>

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-4">
                                        <label class="form-label">Images <span class="requirments">Min:1, Max: 4| Allowed
                                                file types: .jpg, .jpeg, .png | Max: 300KB/image</span></label>
                                        <input class="form-control @error('product_images') is-invalid @enderror"
                                            name="product_images[]" id='images' accept="image/*" type='file'
                                            placeholder="Choose images" multiple>

                                    </div>
                                    <div class="col-8 text-center">
                                        <div class="images-preview-div"> </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6">
                                        <label class="form-label">Status <span class="required-field"> </label>
                                        <select name="product_status" class="form-control" id="">
                                            <option value="">Select</option>
                                            <option value="1">Published</option>
                                            <option value="2">Draft</option>
                                        </select>
                                    </div>

                                    <div class="col-6">
                                        <label class="form-label">Featured Status <span class="required-field"></label>
                                        <select name="product_featured_status" class="form-control" id="">
                                            <option value="">Select</option>
                                            <option value="1">On</option>
                                            <option value="2">Off</option>
                                        </select>
                                    </div>
                                </div>

                            </div>


                            <div class="col-12">
                                <label class="form-label">Related Products</label>
                                <select class="multiple-select form-control" name="related_products[]" data-placeholder="Choose anything"
                                    multiple="multiple">
                                    @foreach ($products as $product)
                                        <option value="{{$product->id}}">{{$product->product_name}}</option>
                                    @endforeach
                                </select>
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
    <script>
        $(function() {
            // Multiple images preview with JavaScript
            var previewImages = function(input, imgPreviewPlaceholder) {
                if (input.files) {
                    var filesAmount = input.files.length;
                    for (i = 0; i < 3; i++) {
                        var reader = new FileReader();
                        reader.onload = function(event) {
                            $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(
                                imgPreviewPlaceholder);
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
