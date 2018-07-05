@extends('layout.index')

@section('content')
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
              {{$post->categories->name}} </a> <a href=""><i class="fa fa-eye"></i>  {{$post->views}}</a> </div>
              	{!!$post->content!!}
                <div class="well">
                  <div id="fb-root"></div>
                  <div class="fb-comments" style="padding-left: 80px" data-href="http://localhost:8080/news/public/single/{{ $post->id }}" data-numposts="5"></div>
                  <script>(function(d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) return;
                    js = d.createElement(s); js.id = id;
                    js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.0';
                    fjs.parentNode.insertBefore(js, fjs);
                  }(document, 'script', 'facebook-jssdk'));</script>
                </div>
            </div>
          </div>
        </div>
        <div class="share_post"> <a class="facebook" href="#"><i class="fa fa-facebook"></i>Facebook</a> <a class="twitter" href="#"><i class="fa fa-twitter"></i>Twitter</a> <a class="googleplus" href="#"><i class="fa fa-google-plus"></i>Google+</a> </div>
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