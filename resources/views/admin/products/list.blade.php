@extends('../admin.layouts.master')
@section('module_name')Products @endsection
@section('page_name')Product List @endsection
@section('content_area')

 <div class="row">
    <div class="col-12 col-lg-12 col-xl-12 d-flex">
      <div class="card radius-10 w-100">
        <div class="card-body">
          <div class="d-flex align-items-center">
            <h6 class="mb-0">Product List</h6>
            <div class="fs-5 ms-auto dropdown">
                <a href="{{route('product.add')}}" class="btn btn-success">Add New Product</a>
             </div>
           </div>
           <div class="table-responsive mt-2">
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
            <table id="example" class="table table-striped align-middle mb-0">
              <thead class="table-light">
                <tr>
                  <th>#ID</th>
                  <th class="text-center">Name</th>
                  <th>Category</th>
                  <th>Brand</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
               @foreach ($data as $key=>$products )
               <tr>
                <td>{{$key+1}}</td>
                <td>
                  <div class="d-flex align-items-center gap-3">
                    <div class="product-box border">
                       <img src="{{URL::asset($products->product_thumbnail)}}" alt="">
                    </div>
                    <div class="product-info">
                      <h6 class="product-name mb-1">{{$products->product_name}}</h6>
                    </div>
                  </div>
                </td>
                <td>{{$products->category_name}}</td>
                <td>{{$products->brand_name}}</td>
                <td>
                    @if ($products->product_status=='1')
                        <span class="badge bg-success">Active</span>
                    @elseif ($products->product_status=='2')
                    <span class="badge bg-danger">Deactive</span>
                    @endif
                </td>
                <td>
                  {{-- <div class="d-flex align-items-center gap-3 fs-6">
                    <a href="{{URL::to('admin/category/view').'/'.$categories->id}}" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="View detail" aria-label="Views"><i class="bi bi-eye-fill"></i></a>
                    <a href="{{route('category.edit',$categories->id)}}" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Edit info" aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                    @if ($categories->category_status=='1')
                    <a href="{{URL::to('/admin/category/changeStatus/').'/'.$categories->id.'/'.$categories->category_status}}" onclick="return confirm('Are you sure to Deactive?')" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete"><i class="bi bi-check"></i></a>
                    @elseif ($categories->category_status=='2')
                    <a href="{{URL::to('/admin/category/changeStatus/').'/'.$categories->id.'/'.$categories->category_status}}" onclick="return confirm('Are you sure to Active?')" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete"><i class="bi bi-x-square"></i></a>
                    @endif

                    <a href="{{URL::to('admin/category/delete').'/'.$categories->id}}" onclick="return confirm('Are you sure to delete?')" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                  </div> --}}
                </td>
              </tr>
               @endforeach

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
 </div><!--end row-->

@endsection
