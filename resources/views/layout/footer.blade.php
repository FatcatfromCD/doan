<footer id="footer">
  <div class="footer_top">
    <div class="container">
      <div class="row">
        {{-- <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="single_footer_top wow fadeInLeft">
            <h2>{{ trans('message.image') }}</h2>
            <ul class="flicker_nav">
              <li><a href="#"><img src="{{asset('upload/image/hinh2.jpg')}}" alt=""></a></li>
              <li><a href="#"><img src="{{asset('upload/image/hinh3.jpg')}}" alt=""></a></li>
              <li><a href="#"><img src="{{asset('upload/image/hinh4.jpg')}}" alt=""></a></li>
              <li><a href="#"><img src="{{asset('upload/image/hinh5.jpg')}}" alt=""></a></li>
              <li><a href="#"><img src="{{asset('upload/image/IMG_1720.jpg')}}" alt=""></a></li>
              <li><a href="#"><img src="{{asset('upload/image/IMG_1739.jpg')}}" alt=""></a></li>
              <li><a href="#"><img src="{{asset('upload/image/IMG_1740.jpg')}}" alt=""></a></li>
              <li><a href="#"><img src="{{asset('upload/image/IMG_1742.jpg')}}" alt=""></a></li>
            </ul>
          </div>
        </div> --}}
        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="single_footer_top wow fadeInRight">
            <h2>{{ trans('message.about') }}</h2>
            <p>Tin24h</p>
            <p>Phúc Diễn - Bắc Từ Liêm - Hà Nội</p>
            <p>Mọi ý kiến đống góp xin gửi về: tin24h@gmail.com</p>
            <p>Hotline: 01656473161</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="single_footer_top wow fadeInDown">
            <h2>{{ trans('message.tag') }}</h2>
            <ul class="labels_nav">
              <li><a href="{{route('category', ['id' => 11, 'category' => 'phim ảnh'])}}">Phim ảnh</a></li>
              <li><a href="{{route('category', ['id' => 14, 'category' => 'âm nhạc'])}}">Âm nhạc</a></li>
              <li><a href="{{route('category', ['id' => 17, 'category' => 'xã hội'])}}">Xã hội</a></li>
              <li><a href="{{route('category', ['id' => 20, 'category' => 'kinh doanh'])}}">Kinh doanh</a></li>
              <li><a href="{{route('category', ['id' => 23, 'category' => 'games'])}}">Games</a></li>
              <li><a href="{{route('category', ['id' => 26, 'category' => 'thời trang'])}}">Thời trang</a></li>
              <li><a href="{{route('category', ['id' => 29, 'category' => 'thể thao'])}}">Bóng đá</a></li>
              <li><a href="{{route('category', ['id' => 32, 'category' => 'công nghệ'])}}">Công nghệ</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>