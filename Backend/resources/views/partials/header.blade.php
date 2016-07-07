<!-- Main Header -->
<header class="main-header">
  <a href="" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>0</b>ET</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>0</b> Effort Themes</span>
  </a>
  <nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <li><a href="http://www.0effortthemes.com/support/">Support</a></li>
        <li><a href="http://codecanyon.net/user/0effortthemes">CodeCanyon Profile</a></li>
        @if(Auth::check())
          <li><a href="{!! url('/logout'); !!}">Logout</a></li>
        @endif
      </ul>
    </div>
  </nav>
</header>

