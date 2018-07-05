@extends('layout.index')

@section('content')
<section id="mainContent">
    <div class="content_bottom">
      <div class="col-lg-8 col-md-8">
        <div class="content_bottom_left">
          <div class="single_category wow fadeInDown">
            <div class="archive_style_1">
              <div style="margin-top:15px;">
                <ol class="breadcrumb">
                  <li class='active'>Kết quả tìm kiếm cho: {{$tukhoa}}</li>  
                </ol>
              </div>
              <h2> <span class="bold_line"><span></span></span> <span class="solid_line"></span> <span class="title_text">Mới nhất</span> </h2>
              @foreach($posts as $post)
              @if($post->status !=0)
              <div class="business_category_left wow fadeInDown">
                <ul class="fashion_catgnav">
                  <li>
                    <div class="catgimg2_container"> <a href="{{ route('single', ['id' => $post->id]) }}"><img alt="" src="{{asset("{$post->media->path}/{$post->media->image}")}}"></a> </div>
                    <h2 class="catg_titile"><a href="{{ route('single', ['id' => $post->id]) }}">{{$post->title}}</a></h2>
                    <div class="comments_box"> <span class="meta_date">{{$post->created_at}}</span> <span class="meta_comment"><a href="#">{{$post->comments->count()}}</a></span> <span class="meta_more"><a  href="{{ route('single', ['id' => $post->id]) }}">Đọc thêm...</a></span> </div>
                    <p>{!!Illuminate\Support\Str::words($post->content, 20, '...')!!}</p>
                  </li>
                </ul>
              </div>
              @endif
              @endforeach 
            </div>
          </div>
        </div>
        <div class="pagination_area">
          <nav align="right">
            {{$posts->appends(['tukhoa' =>  $tukhoa])->render()}}
          </nav>
        </div>
      </div>
      <div class="col-lg-4 col-md-4">
        <div class="content_bottom_right">
          <div class="single_bottom_rightbar">
            <h2>Tin tức mới</h2>
            <ul class="small_catg popular_catg wow fadeInDown">
              @foreach($searchrightlatest as $srl)
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
            <h2>Tin tức nổi bật nhất</h2>
            <ul class="small_catg popular_catg wow fadeInDown">
              @foreach($searchrightmostviewest as $srmv)
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