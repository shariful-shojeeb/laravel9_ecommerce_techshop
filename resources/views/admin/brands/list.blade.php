@extends('../admin.layouts.master')
@section('module_name')Brands @endsection
@section('page_name')Brand List @endsection
@section('content_area')

 <div class="row">
    <div class="col-12 col-lg-12 col-xl-12 d-flex">
      <div class="card radius-10 w-100">
        <div class="card-body">
          <div class="d-flex align-items-center">
            <h6 class="mb-0">Brand Lists</h6>
            <div class="fs-5 ms-auto dropdown">
                <a href="{{route('brand.add')}}" class="btn btn-success">Add New Brand</a>
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
                  <th>#Serial</th>
                  <th class="text-center">Brand Name</th>
                  <th>Brand Slug</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
               @foreach ($data as $key=>$brands )
               <tr>
                <td>{{$key+1}}</td>
                <td>
                  <div class="d-flex align-items-center gap-3">
                    <div class="product-box border">
                       <img src="{{URL::asset($brands->brand_image)}}" alt="">
                    </div>
                    <div class="product-info">
                      <h6 class="product-name mb-1">{{$brands->brand_name}}</h6>
                    </div>
                  </div>
                </td>
                <td>0</td>
                <td>
                    @if ($brands->brand_status=='1')
                        <span class="badge bg-success">Active</span>
                    @elseif ($brands->brand_status=='2')
                    <span class="badge bg-danger">Deactive</span>
                    @endif
                </td>
                <td>
                  <div class="d-flex align-items-center gap-3 fs-6">
                    <a href="{{route('brand.view', $brands->id )}}" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="View detail" aria-label="Views"><i class="bi bi-eye-fill"></i></a>
                    <a href="{{route('brand.edit', $brands->id)}}" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Edit info" aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                    @if ($brands->brand_status=='1')
                    <a href="{{route('brand.changeStatus', [$brands->id, $brands->brand_status ])}}" onclick="return confirm('Are you sure to Deactive?')" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete"><i class="bi bi-check"></i></a>
                    @elseif ($brands->brand_status=='2')
                    <a href="{{route('brand.changeStatus', [$brands->id, $brands->brand_status] )}}" onclick="return confirm('Are you sure to Active?')" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete"><i class="bi bi-x-square"></i></a>
                    @endif

                    <a href="{{route('brand.delete', $brands->id)}}" onclick="return confirm('Are you sure to delete?')" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                  </div>
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
