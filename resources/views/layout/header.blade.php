<header id="header">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="header_top">
          <div class="header_top_left">
            <ul class="top_nav">
              <li><a href="{{ route('trangchu') }}">{{ trans('message.home') }}</a></li>
              <li><a href="{{ route('lienhe') }}">{{ trans('message.contact') }}</a></li>
              <li><a @if (Session::get('locale') == 'vi') style="color: red; font-weight: bold;" @endif href="{{ route('localization', ['lang' => 'vi'])}}">VN</a></li>
              <li>|</li>
              <li><a  @if (Session::get('locale') == 'en') style="color: red; font-weight: bold;" @endif href="{{ route('localization', ['lang' => 'en'])}}">EN</a></li>
            </ul>
          </div>
          <div class="header_top_right">
            <form action="{{ route('timkiem') }}" method="get" class="search_form">
              <input type="text" name="tukhoa" placeholder="{{ trans('message.search') }}">
              <input type="submit" value="">
            </form>
          </div>
        </div>
        <div class="header_bottom">
          <div class="header_bottom_left"><a class="logo" href="{{ route('trangchu') }}">Tin<strong>24h</strong></a></div>
        </div>
      </div>
    </div>
</header>
  