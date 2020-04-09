<!DOCTYPE html>
<html lang="en">
@include('layouts/widgets/head')
<body>
  <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
      <!-- Navbar -->
      @include('layouts/widgets/header')

      <!-- Main Sidebar Container -->
      @include('layouts/widgets/menu_left')

      @include('layouts/widgets/content')
      <!-- /.content-wrapper -->
      @include('layouts/widgets/footer')
    
      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
    </div>

    @include('layouts/widgets/js')
    @include('layouts/widgets/script')
</body>
</html>