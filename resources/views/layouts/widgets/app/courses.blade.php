<div class="site-section courses-title" id="courses-section">
    <div class="container">
      <div class="row mb-5 justify-content-center">
        <div class="col-lg-7 text-center" data-aos="fade-up" data-aos-delay="">
          <h2 class="section-title">Khóa học</h2>
        </div>
      </div>
    </div>
  </div>
  <div class="site-section courses-entry-wrap"  data-aos="fade-up" data-aos-delay="100">
    <div class="container">
      <div class="row">

        <div class="owl-carousel col-12 nonloop-block-14">
          @foreach ($post as $item)
            <div class="course bg-white h-100 align-self-stretch">
              <figure class="m-0">
                <a href="{{route('show_post', $item->post_id)}}"><img src="{{asset('src/app/images')}}/{{$item->image}}" alt="Image" class="img-fluid"></a>
              </figure>
              <div class="course-inner-text py-4 px-4">
                <span class="course-price">{{$item->rental}}</span>
                <div class="meta"><span class="icon-clock-o"></span>{{$item->start}}</div>
                <h3><a href="#">{{$item->user->branch->branch_name}}</a></h3>
                <p>{{$item->content}}</p>
              </div>
              <div class="d-flex border-top stats">
                <div class="py-3 px-4"><span class="icon-users"></span> 2,193 students</div>
                <div class="py-3 px-4 w-25 ml-auto border-left"><span class="icon-chat"></span> 2</div>
              </div>
            </div>
          @endforeach
          

          {{-- <div class="course bg-white h-100 align-self-stretch">
            <figure class="m-0">
              <a href="course-single.html"><img src="{{asset('src/app/images/img_2.jpg')}}" alt="Image" class="img-fluid"></a>
            </figure>
            <div class="course-inner-text py-4 px-4">
              <span class="course-price">$99</span>
              <div class="meta"><span class="icon-clock-o"></span>4 Lessons / 12 week</div>
              <h3><a href="#">Logo Design Course</a></h3>
              <p>Lorem ipsum dolor sit amet ipsa nulla adipisicing elit. </p>
            </div>
            <div class="d-flex border-top stats">
              <div class="py-3 px-4"><span class="icon-users"></span> 2,193 students</div>
              <div class="py-3 px-4 w-25 ml-auto border-left"><span class="icon-chat"></span> 2</div>
            </div>
          </div>

          <div class="course bg-white h-100 align-self-stretch">
            <figure class="m-0">
              <a href="course-single.html"><img src="{{asset('src/app/images/img_3.jpg')}}" alt="Image" class="img-fluid"></a>
            </figure>
            <div class="course-inner-text py-4 px-4">
              <span class="course-price">$99</span>
              <div class="meta"><span class="icon-clock-o"></span>4 Lessons / 12 week</div>
              <h3><a href="#">JS Programming Language</a></h3>
              <p>Lorem ipsum dolor sit amet ipsa nulla adipisicing elit. </p>
            </div>
            <div class="d-flex border-top stats">
              <div class="py-3 px-4"><span class="icon-users"></span> 2,193 students</div>
              <div class="py-3 px-4 w-25 ml-auto border-left"><span class="icon-chat"></span> 2</div>
            </div>
          </div>



          <div class="course bg-white h-100 align-self-stretch">
            <figure class="m-0">
              <a href="course-single.html"><img src="{{asset('src/app/images/img_4.jpg')}}" alt="Image" class="img-fluid"></a>
            </figure>
            <div class="course-inner-text py-4 px-4">
              <span class="course-price">$20</span>
              <div class="meta"><span class="icon-clock-o"></span>4 Lessons / 12 week</div>
              <h3><a href="#">Study Law of Physics</a></h3>
              <p>Lorem ipsum dolor sit amet ipsa nulla adipisicing elit. </p>
            </div>
            <div class="d-flex border-top stats">
              <div class="py-3 px-4"><span class="icon-users"></span> 2,193 students</div>
              <div class="py-3 px-4 w-25 ml-auto border-left"><span class="icon-chat"></span> 2</div>
            </div>
          </div>

          <div class="course bg-white h-100 align-self-stretch">
            <figure class="m-0">
              <a href="course-single.html"><img src="{{asset('src/app/images/img_5.jpg')}}" alt="Image" class="img-fluid"></a>
            </figure>
            <div class="course-inner-text py-4 px-4">
              <span class="course-price">$99</span>
              <div class="meta"><span class="icon-clock-o"></span>4 Lessons / 12 week</div>
              <h3><a href="#">Logo Design Course</a></h3>
              <p>Lorem ipsum dolor sit amet ipsa nulla adipisicing elit. </p>
            </div>
            <div class="d-flex border-top stats">
              <div class="py-3 px-4"><span class="icon-users"></span> 2,193 students</div>
              <div class="py-3 px-4 w-25 ml-auto border-left"><span class="icon-chat"></span> 2</div>
            </div>
          </div>

          <div class="course bg-white h-100 align-self-stretch">
            <figure class="m-0">
              <a href="course-single.html"><img src="{{asset('src/app/images/img_6.jpg')}}" alt="Image" class="img-fluid"></a>
            </figure>
            <div class="course-inner-text py-4 px-4">
              <span class="course-price">$99</span>
              <div class="meta"><span class="icon-clock-o"></span>4 Lessons / 12 week</div>
              <h3><a href="#">JS Programming Language</a></h3>
              <p>Lorem ipsum dolor sit amet ipsa nulla adipisicing elit. </p>
            </div>
            <div class="d-flex border-top stats">
              <div class="py-3 px-4"><span class="icon-users"></span> 2,193 students</div>
              <div class="py-3 px-4 w-25 ml-auto border-left"><span class="icon-chat"></span> 2</div>
            </div>
          </div> --}}

        </div>

       

      </div>
      <div class="row justify-content-center">
        <div class="col-7 text-center">
          <button class="customPrevBtn btn btn-primary m-1">Trước</button>
          <button class="customNextBtn btn btn-primary m-1">Kế tiếp</button>
        </div>
      </div>
    </div>
  </div>