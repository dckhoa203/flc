<!DOCTYPE html>
<html lang="en">
@include('layouts/widgets/admin/head')
<body>
  <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <br>
        <div class="alert alert-success" role="alert" id='showMessage'
        style="position: fixed;width: 99%;padding: 10px; margin: 10px">
        <span>{{$success}}</span>
    </div>
    </div>

    @include('layouts/widgets/admin/js')
    @include('layouts/widgets/admin/script')
</body>
</html>

<meta http-equiv="refresh" content="2; url='{{route('home')}}'">