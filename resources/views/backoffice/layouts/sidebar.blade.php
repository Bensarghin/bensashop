<div class="offcanvas offcanvas-start show" style="visibility: visible; border:none;" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasScrollingLabel">BENSASHOP</h5>
    </div>
    <div class="offcanvas-body">
        <ul class="list-group">
            <li class="list-group-item">
                <a href="#" class="{{ Request::url() === route('admin.home') ? 'active' : '' }}"><i class="fa-solid fa-house"></i><span class="sidebar-item"> Dashboard</span>  </a>
            </li>
            <li class="list-group-item">
                <a href="{{route('admin.order.index')}}" class="{{ Request::url() == route('admin.order.index') ? 'active' : '' }}">
                    <i class="fa-regular fa-arrow-pointer"></i>
                    <span class="sidebar-item"> orders <span class="badge bg-primary d-inline-block p-2 ms-5">
                        {{$orders->count()}}</span></span>
                </a>
            </li>
            <li class="list-group-item">
                <a class="#" class="{{ Request::url() == route('admin.product.index') ? 'active' : '' }}" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                    <i class="fa-regular fa-tag"></i>
                    <span class="sidebar-item"> Product <i class="d-inline-block ms-5 fa-solid fa-chevron-down"></i></span> 
                </a>
                <div class="collapse" id="collapseExample">
                    <div class="">
                      <ul class="sub-group">
                        <li class="list-group-item"><a href="{{route('admin.product.index')}}">All Products</a></li>
                        <li class="list-group-item"><a href="{{route('admin.product.create')}}">New Product</a></li>
                        <li class="list-group-item"><a href="{{route('admin.category.index')}}">Categories</a></li>
                        <li class="list-group-item"><a href="#">Reviews</a></li>
                      </ul>
                    </div>
                </div>
                {{-- <ul class="dropdown-menu dropdown-menu-dark">
                    <li><a class="dropdown-item" href="{{route('admin.product.index')}}">All Product</a></li>
                    <li><a class="dropdown-item" href="{{route('admin.product.create')}}">New Product</a></li>
                    <li><a class="dropdown-item" href="{{route('admin.category.index')}}">Categories</a></li>
                    <li><a class="dropdown-item" href="#">Reviews</a></li>
                </ul> --}}
            </li>
            <li class="list-group-item ">
                <a href="{{route('admin.customer.index')}}" class="{{ Request::url() == route('admin.customer.index') ? 'active' : '' }}"><i class="fa-regular fa-user"></i><span class="sidebar-item">Customers</span></a>
            </li>
            <li class="list-group-item">
                <a href=""><i class="fa-regular fa-chart-line"></i><span class="sidebar-item">Insight </span> </a>
            </li>
        </ul>
    </div>
    
    <div class="offcanavs-footer">
        <li class="list-group-item ">
            <a href=""><i class="fa-solid fa-sliders"></i><span class="sidebar-item">Customize</span></a>
        </li>
        <li class="list-group-item">
            <a href=""><i class="fa-solid fa-gear"></i><span class="sidebar-item">Settings </span> </a>
        </li>
    </div>
</div>