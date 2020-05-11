@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-sm-6 m-auto">
            <form action="{{route('service.update', $service->service_id)}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="service_id" class="control-label">ID:</label>
                <input type="text" class="form-control" id="service_id" name="service_id" placeholder="" value="{{$service->service_id}}" disabled>
                </div>
                <div class="form-group">
                    <label for="service_name" class="control-label">Tên quận/huyện:</label>
                    <input type="text" class="form-control" id="district_name" name="district_name" placeholder="" value="{{$district->district_name}}">
                </div>
                <div class="form-group">
                    <label for="city_id" class="control-label">Tên Tỉnh/Thành phố</label>
                    <select name="city_id"  class="form-control pull-right">
                        @foreach($city as $item)
                            <option value="{{$item->city_id}}" @if($item->city_id == $district->city_id) selected @endif>{{$item->city_name}}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group">
                        <button type="submit" class="btn btn-primary">Lưu</button>
                        <a href="{{route('district.index')}}" class="btn btn-default">Trờ lại</a>
                    </div>
            </form>
        </div>
    </div>    
@endsection