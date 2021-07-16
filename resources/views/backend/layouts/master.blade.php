<!DOCTYPE html>
<html>
  <head>
    @include('backend.includes.head')
    @yield('after-head')
  </head>
  
  <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

      @include('backend.includes.nav-bar')

      @include('backend.includes.sidebar')

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">

        @yield('content-header')

        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            @yield('content')
          </div>
        </section>
        <!-- /.content -->

      </div>
      <!-- /.content-wrapper -->
      
      @include('backend.includes.footer')

    </div>
    <!-- ./wrapper -->

    @include('backend.includes.script')
    
    @yield('after-script')

  </body>
</html>
