<div class="site-section" id="teachers-section">
    <div class="container">

      <div class="row mb-5 justify-content-center">
        <div class="col-lg-7 mb-5 text-center"  data-aos="fade-up" data-aos-delay="">
          <h2 class="section-title">Trung tâm</h2>
          <p class="mb-5">Tại đây chúng tôi cung cấp cho bạn các trung tâm ngoại ngữ phổ biên và chất lượng nhất trên toàn quốc, bạn chỉ cần chọn cho mình trung tâm thích họp, việc còn lại cứ để chúng tôi lo</p>
        </div>
      </div>

      <div class="row">
        @foreach ($center as $item)
          <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="100">
            <div class="teacher text-center">
              <img src="{{asset('src/app/images/person_1.jpg')}}" alt="Image" class="img-fluid w-50 rounded-circle mx-auto mb-4">
              <div class="py-2">
                <h3 class="text-black">{{$item->center_name}}</h3>
                <p class="position">Số điện thoại: {{$item->tel}}</p>
                <p class="position">Wibsite: {{$item->website}}</p>
                <p>Tỉnh thành: Cần Thơ</p>
              </div>
            </div>
          </div>
        @endforeach
        

        {{-- <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="200">
          <div class="teacher text-center">
            <img src="{{asset('src/app/images/person_2.jpg')}}" alt="Image" class="img-fluid w-50 rounded-circle mx-auto mb-4">
            <div class="py-2">
              <h3 class="text-black">Katleen Stone</h3>
              <p class="position">Physics Teacher</p>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro eius suscipit delectus enim iusto tempora, adipisci at provident.</p>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="300">
          <div class="teacher text-center">
            <img src="{{asset('src/app/images/person_3.jpg')}}" alt="Image" class="img-fluid w-50 rounded-circle mx-auto mb-4">
            <div class="py-2">
              <h3 class="text-black">Sadie White</h3>
              <p class="position">Physics Teacher</p>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro eius suscipit delectus enim iusto tempora, adipisci at provident.</p>
            </div>
          </div>
        </div> --}}
      </div>
    </div>
  </div>