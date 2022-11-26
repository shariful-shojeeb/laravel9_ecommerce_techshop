@extends('../admin.layouts.master')
@section('module_name')Brands @endsection
@section('page_name')View Brand @endsection
@section('content_area')

<div class="row">
    <div class="col-lg-8 mx-auto">
     <div class="card">
       <div class="card-header py-3 bg-transparent">
          <h5 class="mb-0">View {{$data->brand_name}}</h5>
         </div>
       <div class="card-body">
         <div class="border p-3 rounded">
         <form class="row g-3">
           <div class="col-12">
             <label class="form-label">Brand Name</label>
             <input type="text" name="" value="{{$data->brand_name}}" class="form-control" placeholder="Category Name">
           </div>
           <div class="col-12">
             <label class="form-label">Brand Image</label>
            <img class='img img-thumbnail' src="{{URL::asset($data->brand_image)}}" alt="">
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
