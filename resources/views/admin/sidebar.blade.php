<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <ul class="sidebar-menu">
        <li class="header">MENIU</li>
        <!-- Optionally, you can add icons to the links -->
		@if (!Auth::guest() && Auth::user()->isAdmin())
		<li >
		<a href="{{route('admin.messages')}}"@if (\Route::current()->getName()=='admin.messages') class="active" @endif><i class="fa fa-book"></i> <span>Pranešimai</span></a>
		</li>
        <!--  -->
		<li >
		<a href="{{route('admin.users')}}"@if (\Route::current()->getName()=='admin.users') class="active" @endif><i class="fa fa-users"></i> <span>Vartotojai</span></a>
		</li>
		@endif
		
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>