<div id="navarea">
    <nav class="navbar navbar-default" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav custom_nav">
            <li class=""><a href="{{ route('trangchu') }}">Trang chủ</a></li>
              {{--  @foreach($theloai as $tl)
                @if($tl->parent_id ==0 && $tl->id != 11)
                  <li class="dropdown">   
                   <a href="{{ route('category', ['id' => $tl->id, 'theloai' => $tl->name]) }}" class="" data-toggle="dropdown" role="button" aria-expanded="false" onclick='goRoute(this);'>{{$tl->name}}</a>
                    {!!$helper->call('', $tl->id)!!}
                  </li>
                @endif               
                @endforeach --}}

                @foreach($theloai as $tl)
                @if($tl->parent_id ==0)
                  <li class="dropdown">   
                   <a href="{{ route('category', ['id' => $tl->id, 'theloai' => $tl->name]) }}" class="" data-toggle="dropdown" role="button" aria-expanded="false" onclick='goRoute(this);'>{{$tl->name}}</a>
                    {!!$helper->call('', $tl->id)!!}
                  </li>
                @endif
               @endforeach
          </ul>
        </div>
      </div>
    </nav>
  </div>
