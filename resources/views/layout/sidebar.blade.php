<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.manage.users') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-seedling"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Healthy Life</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        การจัดการ
    </div>

    <!-- Nav Item - Manage Users -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.manage.users') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>จัดการผู้ใช้</span></a>
    </li>

    <!-- Nav Item - Manage Sensors -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSensors" aria-expanded="true" aria-controls="collapseSensors">
            <i class="fas fa-fw fa-microchip"></i>
            <span>จัดการเซ็นเซอร์</span>
        </a>
        <div id="collapseSensors" class="collapse" aria-labelledby="headingSensors" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.sensors.index') }}">เซ็นเซอร์</a>
                <a class="collapse-item" href="{{ route('admin.npks.shownpk') }}">N P K</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Manage Orders -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOrders" aria-expanded="true" aria-controls="collapseOrders">
            <i class="fas fa-fw fa-shopping-cart"></i>
            <span>จัดการคำสั่งซื้อ</span>
        </a>
        <div id="collapseOrders" class="collapse" aria-labelledby="headingOrders" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.orders.index') }}">คำสั่งซื้อ</a>
                <a class="collapse-item" href="{{ route('admin.upload.qrcode') }}">อัปโหลด QR Code</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Manage Products -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.products.index') }}">
            <i class="fas fa-fw fa-box"></i>
            <span>จัดการสินค้า</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
