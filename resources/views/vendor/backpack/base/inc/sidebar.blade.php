@if (Auth::check())
    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        @include('backpack::inc.sidebar_user_panel')

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
          {{-- <li class="header">{{ trans('backpack::base.administration') }}</li> --}}
          <!-- ================================================ -->
          <!-- ==== Recommended place for admin menu items ==== -->
          <!-- ================================================ -->
          <li><a href="{{ backpack_url('dashboard') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('backpack::base.dashboard') }}</span></a></li>


          <!-- ======================================= -->
          {{-- <li class="header">Other menus</li> --}}
          <li><a href="{{ backpack_url('elfinder') }}"><i class="fa fa-files-o"></i> <span>File manager</span></a></li>
          <li><a href="{{ backpack_url('student') }}"><i class="fa fa-users"></i> <span>Student Info Mgmt</span></a></li>
          <li><a href="{{ backpack_url('academic_year') }}"><i class="fa fa-calendar"></i> <span>Academic Year Mgmt</span></a></li>
          <li><a href="{{ backpack_url('course') }}"><i class="fa fa-clipboard"></i> <span>Courses Mgmt</span></a></li>
          <li><a href="{{ backpack_url('subject') }}"><i class="fa fa-book"></i> <span>Subjects Mgmt</span></a></li>
          <li><a href="{{ backpack_url('fee') }}"><i class="fa fa-dollar"></i> <span>Fees Mgmt</span></a></li>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>
@endif
