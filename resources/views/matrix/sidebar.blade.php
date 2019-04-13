<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="p-t-30">
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" id="dashboard" href="" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" id="product-management" href="{{ route('item.index') }}" aria-expanded="false"><i class="mdi mdi-chart-bar"></i><span class="hide-menu">Product Management</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" id="order-management" href="{{ route('order.index') }}" aria-expanded="false"><i class="mdi mdi-chart-bubble"></i><span class="hide-menu">Order Management</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"  href="" aria-expanded="false"><i class="mdi mdi-border-inside"></i><span class="hide-menu">Sales Report</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" id='manage-users' href="{{ route('user.index') }}" aria-expanded="false"><i class="mdi mdi-blur-linear"></i><span class="hide-menu">Manage Users</span></a></li>

            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
