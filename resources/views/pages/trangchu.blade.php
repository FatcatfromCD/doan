@extends('layout.index')

@section('content')

<section id="mainContent">
    <div class="content_top">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm6">
          <div class="latest_slider">
            <div class="slick_slider">
              <div class="single_iteam"><img src="images/imagetest1.jpg" alt="">
                <!-- <h2><a class="slider_tittle" href=""></a></h2> -->
              </div>
              <div class="single_iteam"><img src="images/imagetest3.jpg" alt="">
                <!-- <h2><a class="slider_tittle" href=""></a></h2> -->
              </div>
              <div class="single_iteam"><img src="images/imagetest4.jpg" alt="">
                {{-- <h2><a class="slider_tittle" href="">Demo3</a></h2> --}}
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm6">
          <div class="content_top_right">
            <ul class="featured_nav wow fadeInDown">
              @foreach ($latest as $post)
                <li><img src="{{ $post->media->path . '/' .$post->media->image }}" alt="">
                  <div class="title_caption">
                    <a href="{{ route('single', ['id' => $post->id]) }}">
                       {{ $post->title }}
                    </a>
                  </div>
                </li>
              @endforeach
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="content_middle">
      <div class="col-lg-3 col-md-3 col-sm-3">
        <div class="content_middle_leftbar">
          <div class="single_category wow fadeInDown">
            <h2> <span class="bold_line"><span></span></span> <span class="solid_line"></span> <a href="{{route('category', ['id' => 11, 'category' => 'phim ảnh'])}}" class="title_text">Phim ảnh</a> </h2>
            <ul class="catg1_nav">
              @foreach($moviePosts as $post)
              <li>
                <div class="catgimg_container"> <a href="{{ route('single', ['id' => $post->id]) }}" class="catg1_img"><img alt="" src="{{ $post->media->path . '/' .$post->media->image }}"></a></div>
                <h3 class="post_titile"><a href="{{ route('single', ['id' => $post->id]) }}">{{ $post->title }} </a></h3>
              </li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="content_middle_middle">
          <div class="slick_slider2">
            @foreach($bongdaPosts as $bongda)
            <div class="single_featured_slide"> <a href="{{ route('single', ['id' => $bongda->id]) }}"><img src="{{ $bongda->media->path . '/' .$bongda->media->image }}" alt=""></a>
              <h2><a href="{{ route('single', ['id' => $bongda->id]) }}">{{ $bongda->title }}</a></h2>
              <p>{!!Illuminate\Support\Str::words($bongda->content, 50, '...')!!}</p>
            </div>
            @endforeach
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-3">
        <div class="content_middle_rightbar">
          <div class="single_category wow fadeInDown">
            <h2> <span class="bold_line"><span></span></span> <span class="solid_line"></span> <a href="{{route('category', ['id' => 14, 'category' => 'âm nhạc'])}}" class="title_text">Âm nhạc</a> </h2>
            <ul class="catg1_nav">
              @foreach($musicPosts as $post)
              <li>
                <div class="catgimg_container"> <a href="{{ route('single', ['id' => $post->id]) }}" class="catg1_img"><img alt="" src="{{ $post->media->path . '/' .$post->media->image }}"></a></div>
                <h3 class="post_titile"><a href="{{ route('single', ['id' => $post->id]) }}">{{ $post->title }} </a></h3>
              </li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="content_bottom">
      <div class="col-lg-8 col-md-8">
        <div class="content_bottom_left">
          <div class="single_category wow fadeInDown">
            <h2> <span class="bold_line"><span></span></span> <span class="solid_line"></span> <a class="title_text" href="{{route('category', ['id' => 20, 'category' => 'kinh doanh'])}}">Kinh Doanh</a> </h2>
            <div class="business_category_left wow fadeInDown" style="padding-top: 10px">
              <ul class="fashion_catgnav">
                <li>
                  <div class="catgimg2_container"> <a href="{{ route('single', ['id' => $kinhdoanhPosts[0]->id]) }}"><img alt="" src="{{ $kinhdoanhPosts[0]->media->path . '/' .$kinhdoanhPosts[0]->media->image }}"></a> </div>
                  <h2 class="catg_titile"><a href="{{ route('single', ['id' => $kinhdoanhPosts[0]->id]) }}">{{$kinhdoanhPosts[0]->title}}</a></h2>
                  <div class="comments_box"> <span class="meta_date">{{$kinhdoanhPosts[0]->updated_at}}</span> <span class="meta_comment"><a>{{$kinhdoanhPosts[0]->comments->count()}}</a></span> <span class="meta_more"><a  href="{{ route('single', ['id' => $kinhdoanhPosts[0]->id]) }}">Đọc thêm...</a></span> </div>
                  <p>{!!Illuminate\Support\Str::words($kinhdoanhPosts[0]->content, 20, '...')!!}</p>
                </li>
              </ul>
            </div>
            @foreach($kinhdoanhPosts as $k => $kd)
            @if($k != 0)
            <div class="business_category_right wow fadeInDown" >
              <ul class="small_catg">
                <li>
                  <div class="media wow fadeInDown"> <a class="media-left" href="{{ route('single', ['id' => $kd->id]) }}"><img src="{{ $kd->media->path . '/' .$kd->media->image }}" alt=""></a>
                    <div class="media-body">
                      <h4 class="media-heading"><a href="{{ route('single', ['id' => $kd->id]) }}">{{$kd->title}}</a></h4>
                      <div class="comments_box"> <span class="meta_date">{{$kd->updated_at}}</span> <span class="meta_comment"><a href="#">{{$kd->comments->count()}}</a></span> </div>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
            @endif
            @endforeach
          </div>
          <div class="games_fashion_area">
            <div class="games_category">
              <div class="single_category">
                <h2> <span class="bold_line"><span></span></span> <span class="solid_line"></span> <a class="title_text" href="{{route('category', ['id' => 23, 'category' => 'games'])}}">Games</a> </h2>
                <ul class="fashion_catgnav wow fadeInDown">
                  <li>
                    <div class="catgimg2_container"> <a href="{{ route('single', ['id' => $gamePosts[0]->id]) }}"><img alt="" src="{{ $gamePosts[0]->media->path . '/' .$gamePosts[0]->media->image }}"></a> </div>
                    <h2 class="catg_titile"><a href="{{ route('single', ['id' => $gamePosts[0]->id]) }}">{{$gamePosts[0]->title}}</a></h2>
                    <div class="comments_box"> <span class="meta_date">{{$gamePosts[0]->updated_at}}</span> <span class="meta_comment"><a >{{$gamePosts[0]->comments->count()}}</a></span> <span class="meta_more"><a  href="{{ route('single', ['id' => $gamePosts[0]->id]) }}">Đọc thêm...</a></span> </div>
                    <p>{!!Illuminate\Support\Str::words($gamePosts[0]->content, 20, '...')!!}.</p>
                  </li>
                </ul>
                <ul class="small_catg wow fadeInDown">
                @foreach($gamePosts as $g => $gp)
                @if($g != 0)
                  <li>
                    <div class="media"> <a class="media-left" href="{{ route('single', ['id' => $gp->id]) }}"><img src="{{$gp->media->path . '/' .$gp->media->image }}" alt=""></a>
                      <div class="media-body">
                        <h4 class="media-heading"><a href="{{ route('single', ['id' => $gp->id]) }}">{{$gp->title}} </a></h4>
                        <div class="comments_box"> <span class="meta_date">{{$gp->updated_at}}</span> <span class="meta_comment"><a href="#">{{$gp->comments->count()}}</a></span> </div>
                      </div>
                    </div>
                  </li>
                @endif
                @endforeach
                </ul>
              </div>
            </div>
            <div class="fashion_category">
              <div class="single_category">
                <div class="single_category wow fadeInDown">
                  <h2> <span class="bold_line"><span></span></span> <span class="solid_line"></span> <a class="title_text" href="{{route('category', ['id' => 26, 'category' => 'thời trang'])}}">Thời trang</a> </h2>
                  <ul class="fashion_catgnav wow fadeInDown">
                    <li>
                    <div class="catgimg2_container"> <a href="{{ route('single', ['id' => $fashionPosts[0]->id]) }}"><img alt="" src="{{ $fashionPosts[0]->media->path . '/' .$fashionPosts[0]->media->image }}"></a> </div>
                    <h2 class="catg_titile"><a href="{{ route('single', ['id' => $fashionPosts[0]->id]) }}">{{$fashionPosts[0]->title}}</a></h2>
                    <div class="comments_box"> <span class="meta_date">{{$fashionPosts[0]->updated_at}}</span> <span class="meta_comment"><a href="#">{{$fashionPosts[0]->comments->count()}}</a></span> <span class="meta_more"><a  href="{{ route('single', ['id' => $fashionPosts[0]->id]) }}">Đọc thêm...</a></span> </div>
                    <p>{!!Illuminate\Support\Str::words($fashionPosts[0]->content, 20, '...')!!}.</p>
                  </li>
                  </ul>
                  <ul class="small_catg wow fadeInDown">
                @foreach($fashionPosts as $f => $fp)
                @if($f != 0)
                  <li>
                    <div class="media"> <a class="media-left" href="{{ route('single', ['id' => $fp->id]) }}"><img src="{{$fp->media->path . '/' .$fp->media->image }}" alt=""></a>
                      <div class="media-body">
                        <h4 class="media-heading"><a href="{{ route('single', ['id' => $fp->id]) }}">{{$fp->title}} </a></h4>
                        <div class="comments_box"> <span class="meta_date">{{$fp->updated_at}}</span> <span class="meta_comment"><a >{{$fp->comments->count()}}</a></span> </div>
                      </div>
                    </div>
                  </li>
                @endif
                @endforeach
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="technology_catrarea">
            <div class="single_category">
              <h2> <span class="bold_line"><span></span></span> <span class="solid_line"></span> <a class="title_text" href="{{route('category', ['id' => 32, 'category' => 'công nghệ'])}}">Công nghệ</a> </h2>
              <div class="business_category_left" style="padding-top: 10px">
                <ul class="fashion_catgnav wow fadeInDown" >
                  <li>
                    <div class="catgimg2_container"> <a href="{{ route('single', ['id' => $technologyPosts[0]->id]) }}"><img alt="" src="{{ $technologyPosts[0]->media->path . '/' .$technologyPosts[0]->media->image }}"></a> </div>
                    <h2 class="catg_titile"><a href="{{ route('single', ['id' => $technologyPosts[0]->id]) }}">{{$technologyPosts[0]->title}}</a></h2>
                    <div class="comments_box"> <span class="meta_date">{{$technologyPosts[0]->updated_at}}</span> <span class="meta_comment"><a href="#">{{$technologyPosts[0]->comments->count()}}</a></span> <span class="meta_more"><a  href="{{ route('single', ['id' => $technologyPosts[0]->id]) }}">Đọc thêm...</a></span> </div>
                  <p>{!!Illuminate\Support\Str::words($technologyPosts[0]->content, 20, '...')!!}</p>
                </li>
                </ul>
              </div>
              @foreach($technologyPosts as $t => $tp)
              @if($t != 0)
                <div class="business_category_right wow fadeInDown" >
                  <ul class="small_catg">
                  <li>
                  <div class="media wow fadeInDown"> <a class="media-left" href="{{ route('single', ['id' => $tp->id]) }}"><img src="{{ $tp->media->path . '/' .$tp->media->image }}" alt=""></a>
                    <div class="media-body">
                      <h4 class="media-heading"><a href="{{ route('single', ['id' => $tp->id]) }}">{{$tp->title}}</a></h4>
                      <div class="comments_box"> <span class="meta_date">{{$tp->updated_at}}</span> <span class="meta_comment"><a >{{$tp->comments->count()}}</a></span> </div>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
            @endif
            @endforeach
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4">
        <div class="content_bottom_right">
          <div class="single_bottom_rightbar">
            <h2>{{ trans('message.latest') }}</h2>
            <ul class="small_catg popular_catg wow fadeInDown">
              @foreach($rightlatest as $rightpost)
              <li>
                <div class="media wow fadeInDown"> <a href="{{ route('single', ['id' => $rightpost->id]) }}" class="media-left"><img alt="" src="{{ $rightpost->media->path . '/' .$rightpost->media->image }}"> </a>
                  <div class="media-body">
                    <h4 class="media-heading"><a href="{{ route('single', ['id' => $rightpost->id]) }}">{{ $rightpost->title }}</a></h4>
                    <p>{!!Illuminate\Support\Str::words($rightpost->content, 20, '...')!!}</p>
                  </div>
                </div>
              </li>
              @endforeach
            </ul>
          </div>
          <div class="single_bottom_rightbar">
            <h2>{{ trans('message.mostviewest') }}</h2>
            <ul class="small_catg popular_catg wow fadeInDown">
              @foreach($rightmostviewest as $rmv)
              <li>
                <div class="media wow fadeInDown"> <a href="{{ route('single', ['id' => $rmv->id]) }}" class="media-left"><img alt="" src="{{ $rmv->media->path . '/' .$rmv->media->image }}"> </a>
                  <div class="media-body">
                    <h4 class="media-heading"><a href="{{ route('single', ['id' => $rmv->id]) }}">{{ $rmv->title }}</a></h4>
                    <p>{!!Illuminate\Support\Str::words($rmv->content, 20, '...')!!}</p>
                  </div>
                </div>
              </li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection