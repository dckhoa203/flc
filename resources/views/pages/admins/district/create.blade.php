@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-sm-6 m-auto">
            <form action="{{route('district.create_submit')}}" method="POST">
                @csrf
                <div class="form-group">
                        <label for="district_name" class="control-label">Tên quận/huyện:</label>
                        <input type="text" class="form-control" id="district_name" name="district_name" placeholder="Ninh Kiều">
                </div>
                <div class="form-group">
                    <label for="city_id" class="control-label">Tên Tỉnh/Thành phố</label>
                    <select name="city_id"  class="form-control pull-right">
                        @foreach($city as $item)
                            <option value="{{$item->city_id}}">{{$item->city_name}}</option>
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