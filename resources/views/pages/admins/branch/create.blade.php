@extends('layouts.admin')

@section('content')
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
                    <select name="city_id"  class="form-control pull-right">
                        @foreach($city as $item)
                            <option value="{{$item->city_id}}">{{$item->city_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="district_id" class="control-label">Huyện</label>
                    <select name="district_id"  class="form-control pull-right">
                        @foreach($district as $item)
                            <option value="{{$item->district_id}}">{{$item->district_name}}</option>
                        @endforeach
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