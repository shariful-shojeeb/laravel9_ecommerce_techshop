<aside class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ URL::asset('public/admin') }}/assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Onedash</h4>
            @yield('test')
        </div>
        <div class="toggle-icon ms-auto"> <i class="bi bi-list"></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{ URL::to('admin/dashboard') }}">
                <div class="parent-icon"><i class="bi bi-house-fill"></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>


        <li class="menu-label">Controls</li>


        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-collection"></i>
                </div>
                <div class="menu-title">Category</div>
            </a>
            <ul>
                <li> <a href="{{ URL::route('category.add') }}"><i class="bi bi-circle"></i>Add category</a>
                </li>
                <li> <a href="{{ URL::route('category.list') }}"><i class="bi bi-circle"></i>Category List</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-collection"></i>
                </div>
                <div class="menu-title">Brands</div>
            </a>
            <ul>
                <li> <a href="{{ URL::route('brand.add') }}"><i class="bi bi-circle"></i>Add brand</a>
                </li>
                <li> <a href="{{ URL::route('brand.list') }}"><i class="bi bi-circle"></i>All Brands</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-collection"></i>
                </div>
                <div class="menu-title">Product</div>
            </a>
            <ul>
                <li> <a href="{{ URL::route('product.add') }}"><i class="bi bi-circle"></i>Add Product</a>
                </li>
                <li> <a href="{{ URL::route('product.list') }}"><i class="bi bi-circle"></i>All Products</a>
                </li>
            </ul>
        </li>







{{--
        <li class="menu-label">Authentication</li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-person-badge-fill"></i>
                </div>
                <div class="menu-title">Manage Admins</div>
            </a>
            <ul>
                <li> <a href="{{ route('admin.add') }}"><i class="bi bi-circle"></i>Add</a>
                <li> <a href="{{ route('admin.list') }}"><i class="bi bi-circle"></i>List</a>
                </li>
            </ul>
        </li> --}}


        <li class="menu-label">Settings</li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-file-code-fill"></i>
                </div>
                <div class="menu-title">Website</div>
            </a>
            <ul>
                <li> <a href="widgets-static-widgets.html"><i class="bi bi-circle"></i>Static Widgets</a>
                </li>

            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-file-earmark-code-fill"></i>
                </div>
                <div class="menu-title">Admin Panel </div>
            </a>
            <ul>
                <li> <a href="ecommerce-products-list.html"><i class="bi bi-circle"></i>Products List</a>
                </li>

                </li>
            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bi bi-gear-fill"></i>
                </div>
                <div class="menu-title">Others</div>
            </a>
            <ul>
                <li> <a href="component-alerts.html"><i class="bi bi-circle"></i>Alerts</a>
                </li>


            </ul>
        </li>




    </ul>
    <!--end navigation-->
</aside>
