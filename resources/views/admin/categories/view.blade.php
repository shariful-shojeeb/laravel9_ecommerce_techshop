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
         <form class="row g-3">
           <div class="col-12">
             <label class="form-label">Category Name</label>
             <input type="text" name="category_name" value="{{$data->category_name}}" class="form-control" placeholder="Category Name">
           </div>
           <div class="col-12">
             <label class="form-label">Description</label>
             <textarea class="form-control" name="category_description"   placeholder="Full description" rows="4" cols="4">{{$data->category_description}}</textarea>
           </div>
           <div class="col-12">
             <label class="form-label">Images</label>
             <input class="form-control" type="file">
           </div>


           <div class="col-12">
             {{-- <input type="submit" class="btn btn-primary px-4" value="Update"> --}}
           </div>
         </form>
         </div>
        </div>
       </div>
    </div>
 </div><!--end row-->
@endsection
