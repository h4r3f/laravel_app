<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('images/user.jpg') }}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>0Effort Admin</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">HEADER</li>
            <!-- Optionally, you can add icons to the links -->
      <!--      <li class="active"><a href="{!! route('packages.index') !!}"><i class="fa fa-link"></i> <span>Packages</span></a></li>
            <li><a href="#"><i class="fa fa-link"></i> <span>Another Link</span></a></li>-->

            <li class="treeview"><a href="#"><i class="fa fa-link"></i> <span>Settings</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{!! route('settings.index') !!}">Settings</a></li>
                    <li><a href="{!! url('/settings/adminemail') !!}">Admin Email Change</a></li>
                </ul>
            <li class="treeview">
                <a href="#"><i class="fa fa-link"></i> <span>Packages</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{!! route('packages.index') !!}">All Packages</a></li>
                    <li><a href="{!! route('packages.create') !!}">Create New</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#"><i class="fa fa-link"></i> <span>Categories</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{!! route('categories.index') !!}">All Categories</a></li>
                    <li><a href="{!! route('categories.create') !!}">Create New</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#"><i class="fa fa-link"></i> <span>Foods</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{!! route('foods.index') !!}">All Foods</a></li>
                    <li><a href="{!! route('foods.create') !!}">Create New</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#"><i class="fa fa-link"></i> <span>Offers</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{!! route('offers.index') !!}">All Offers</a></li>
                    <li><a href="{!! route('offers.create') !!}">Create New</a></li>
                </ul>
            </li>
            <li><a href="{!! route('customers.index') !!}"><i class="fa fa-link"></i> <span>All Customers</span></a></li>
            <li><a href="{!! route('bookings.index') !!}"><i class="fa fa-link"></i> <span>All Bookings</span></a></li>
            <li><a href="{!! route('carts.index') !!}"><i class="fa fa-link"></i> <span>Orders</span></a></li>
            <li><a href="{!! route('contacts.index') !!}"><i class="fa fa-link"></i> <span>All Messages</span></a></li>

        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>