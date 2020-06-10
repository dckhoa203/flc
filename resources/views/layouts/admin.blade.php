<!DOCTYPE html>
<html lang="en">
@include('layouts/widgets/admin/head')
<body>
  <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
      <!-- Navbar -->
      @include('layouts/widgets/admin/header')

      <!-- Main Sidebar Container -->
      @include('layouts/widgets/admin/menu_left')

      @include('layouts/widgets/admin/content')
      <!-- /.content-wrapper -->
      @include('layouts/widgets/admin/footer')
    
      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
    </div>

    @include('layouts/widgets/admin/js')
    @include('layouts/widgets/admin/script')
</body>
</html>