@extends('../admin.layouts.master')
@section('module_name')Category @endsection
@section('page_name')View Category @endsection
@section('content_area')

<div class="row">
    <div class="col-lg-8 mx-auto">
     <div class="card">
       <div class="card-header py-3 bg-transparent">
          <h5 class="mb-0">View {{$data->category_name}}</h5>
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

         <form class="row g-3" method="POST" action="{{route('category.update',$data->id)}}" enctype="multipart/form-data">
            @csrf
           <div class="col-12">
             <label class="form-label">Category Name</label>
             <input type="text" name="category_name" value="{{$data->category_name}}" class="form-control" placeholder="Category Name" required>
           </div>
           <div class="col-12">
             <label class="form-label">Description</label>
             <textarea class="form-control" name="category_description"  placeholder="Full description" rows="4" cols="4" required>{{$data->category_description}}</textarea>
           </div>
           <div class="col-12">
             <label class="form-label">Images</label>
             <input class="form-control" name="category_image" type="file">
           </div>

           <div class="col-12">
            <div class="row">
                <div class="col-6">
                    <label class="form-label">Status</label>
                    <select name="category_status" class="form-control" id="">
                     <option value="">Select</option>
                     <option value="1" @if ($data->category_status=='1') {{ 'selected' }} @endif>Active</option>
                     <option value="2" @if ($data->category_status=='2') {{ 'selected' }} @endif>Inactive</option>
                    </select>
                </div>
                <div class="col-6">
                    <label class="form-label">Popular Status</label>
                    <select name="category_popular_status" class="form-control" id="">
                     <option value="">Select</option>
                     <option value="1" @if ($data->category_popular_status=='1') {{ 'selected' }} @endif>Active</option>
                     <option value="2" @if ($data->category_popular_status=='2') {{ 'selected' }} @endif>Inactive</option>
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
 </div><!--end row-->
@endsection
