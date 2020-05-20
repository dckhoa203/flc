@extends('layouts.admin')

@section('content-header')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark">Thêm chi nhánh</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">admin</a></li>
        <li class="breadcrumb-item"><a href="{{route('branch.index')}}">branch</a></li>
        <li class="breadcrumb-item active">create</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->
@endsection

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="row">
        <div class="col-sm-6 m-auto">
            <form action="{{route('branch.create_submit')}}" method="POST">
                @csrf
                <div class="form-group">
                        <label for="branch_name" class="control-label">Tên chi nhánh</label>
                        <input type="text" class="form-control" id="branch_name" name="branch_name" placeholder="Gia Việt Mậu Thân">
                </div>
                <div class="form-group">
                    <label for="center_id" class="control-label">Tên trung tâm</label>
                    <select name="center_id"  class="form-control pull-right">
                        <option value="">-- Chọn trung tâm --</option>
                        @foreach($center as $item)
                            <option value="{{$item->center_id}}">{{$item->center_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="address" class="control-label">Địa chỉ</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="102 Lê Bình, Xuân Khánh">
                </div>
                <div class="form-group">
                    <label for="city_id" class="control-label">Tỉnh</label>
                    <select name="city_id"  class="form-control pull-right" id="city">
                        <option value="" class="item_district">-- Chọn tỉnh / thành phố --</option>
                        @foreach($city as $item)
                            <option value="{{$item->city_id}}">{{$item->city_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="district_id" class="control-label">Huyện</label>
                    <select name="district_id"  class="form-control pull-right" id="district">
                        <option value="" class="item_district">-- Chọn quận /huyện --</option>
                    </select>
                </div>
                <div class="form-group">
                        <button type="submit" class="btn btn-primary">Lưu</button>
                        <a href="{{route('branch.index')}}" class="btn btn-default">Trờ lại</a>
                    </div>
            </form>
        </div>
    </div>    
@endsection

@section('script')
<script>
    $(document).ready(function() {
		$('#city').on('change',function(){
            const city_id = $('#city')[0].value;
            // alert(city_id);
			$.ajax({
				headers: {
          			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          		},
				type: 'post',
				url: "{{route('district.get_district_city')}}",
                data:{id: city_id},
				success: function(data){
                    // alert(data);
                    $(".item_district").remove();
                    data.forEach( (item,index)  => {
						$('#district').append('<option class="item_district" value='+item.district_id+'>'+item.district_name+'</option>')
					})	
				},
				error: function(data) {
			 	// alert(JSON.stringify(data));
                    alert('error');
                }
			});
		})
	})
</script>
@endsection