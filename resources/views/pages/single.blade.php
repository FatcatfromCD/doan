@extends('layout.index')
@section('content')
<meta property="fb:admins" content="{100002945160900}"/>
<section id="mainContent">
    <div class="content_bottom">
      <div class="col-lg-8 col-md-8">
        <div class="content_bottom_left">
          <div class="single_page_area">
            <ol class="breadcrumb">
                {!!$helper->get_path($post->categories->id)!!}
            </ol>
            <h2 class="post_titile">{{$post->title}}</h2>
            <div class="single_page_content">
            <div class="post_commentbox"> <a href="#"><i class="fa fa-user"></i>{{$post->users->name}}</a> <span><i class="fa fa-calendar"></i>{{$post->created_at}}</span> <a href="{{ route('category', ['id' => $post->categories->id, 'theloai' => $post->categories->name]) }}"><i class="fa fa-tags"></i>
              {{$post->categories->name}} </a> <a href=""><i class="fa fa-eye"></i>  {{$post->views}}</a>
              <div class="stars">
                <form action="">
                  <input class="star star-5" id="star-5" type="radio" name="star" value='5' {{$rate == 5 ? "checked" : ""}} onclick='validate(this, {{$post->id}})'/>
                  <label class="star star-5" for="star-5"></label>
                  <input class="star star-4" id="star-4" type="radio" name="star" value='4' {{$rate == 4 ? "checked" : ""}} onclick='validate(this, {{$post->id}})'/>
                  <label class="star star-4" for="star-4"></label>
                  <input class="star star-3" id="star-3" type="radio" name="star" value='3' {{$rate == 3 ? "checked" : ""}} onclick='validate(this, {{$post->id}})'/>
                  <label class="star star-3" for="star-3"></label>
                  <input class="star star-2" id="star-2" type="radio" name="star" value='2' {{$rate == 2 ? "checked" : ""}} onclick='validate(this, {{$post->id}})'/>
                  <label class="star star-2" for="star-2"></label>
                  <input class="star star-1" id="star-1" type="radio" name="star" value='1' {{$rate == 1 ? "checked" : ""}} onclick='validate(this, {{$post->id}})'/>
                  <label class="star star-1" for="star-1"></label>
                </form>
              </div>
            </div>
                {!!$post->content!!}

                {{-- fb comment --}}
                <div class="well">
                  <div id="fb-root"></div>
                  <div class="fb-comments" style="padding-left: 80px" data-href="http://localhost:8080/news/public/single/{{ $post->id }}" data-numposts="3"></div>
                  <script>(function(d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) return;
                    js = d.createElement(s); js.id = id;
                    js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.0&appId=187087091969247&autoLogAppEvents=1';
                    fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));</script>
                    <div class="fb-share-button"
                    data-href="http://google.com"
                    data-layout="button_count">
                  </div>
                </div>
            </div>
          </div>
        </div>
        <div class="share_post"> <a class="facebook" href=""><i class="fa fa-facebook"></i>Facebook</a> </div>
        <div class="similar_post">
          <h2>{{ trans('message.mostviewest') }}</h2>
          <ul class="small_catg similar_nav wow fadeInDown animated">
            @foreach($bottommostviewest as $bmv)
            <li>
              <div class="media wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;"> <a class="media-left related-img" href="{{ route('single', ['id' => $bmv->id]) }}"><img src="{{asset("{$bmv->media->path}/{$bmv->media->image}")}}" alt=""></a>
                <div class="media-body">
                  <h4 class="media-heading"><a href="{{ route('single', ['id' => $bmv->id]) }}">{{ $bmv->title }}</a></h4>
                  <p>{!!Illuminate\Support\Str::words($bmv->content, 20, '...')!!}</p>
                </div>
              </div>
            </li>
            @endforeach
          </ul>
        </div>
      </div>
      <div class="col-lg-4 col-md-4">
        <div class="content_bottom_right">
          <div class="single_bottom_rightbar">
            <h2>{{ trans('message.latest') }}</h2>
            <ul class="small_catg popular_catg wow fadeInDown">
              @foreach($singlerightlatest as $srl)
              <li>
                <div class="media wow fadeInDown"> <a href="{{ route('single', ['id' => $srl->id]) }}" class="media-left"> <img alt="" src="{{asset("{$srl->media->path}/{$srl->media->image}")}}"> </a>
                  <div class="media-body">
                    <h4 class="media-heading"><a href="{{ route('single', ['id' => $srl->id]) }}">{{ $srl->title }}</a></h4>
                    <p>{!!Illuminate\Support\Str::words($srl->content, 20, '...')!!}</p>
                  </div>
                </div>
              </li>
              @endforeach
            </ul>
          </div>
          <div class="single_bottom_rightbar">
            <h2>{{ trans('message.mostviewest') }}</h2>
            <ul class="small_catg popular_catg wow fadeInDown">
              @foreach($singlerightmostviewest as $srmv)
              <li>
                <div class="media wow fadeInDown"> <a href="{{ route('single', ['id' => $srmv->id]) }}" class="media-left"> <img alt="" src="{{asset("{$srmv->media->path}/{$srmv->media->image}")}}"> </a>
                  <div class="media-body">
                    <h4 class="media-heading"><a href="{{ route('single', ['id' => $srmv->id]) }}">{{ $srmv->title }}</a></h4>
                    <p>{!!Illuminate\Support\Str::words($srmv->content, 20, '...')!!}</p>
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

@section('css')
<link href="{{asset("admin_asset/css/star.css")}}" rel="stylesheet">
@endsection

@section('script')
  <script>
    var number = Math.floor((Math.random() * 9999) + 1000);
    function validate(input, post_id)
    {
      window.location.href = `/news/public/rate/${post_id}/${input.value}`
    }
  </script>
@endsection