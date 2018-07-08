@extends('layout.index')

@section('content')
<section id="ContactContent">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="contact_area">
            <h1>{{ trans('message.contact2') }}</h1>
            {{-- in thông báo lỗi --}}
                        @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                            {{$err}}<br>
                            @endforeach
                        </div>
                        @endif
                        {{-- In thông báo thành công --}}
                        @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                        @endif
            <div class="contact_bottom">
              <div class="contact_us wow fadeInRightBig">
                <h2>{{ trans('message.contact3') }}</h2>
                <form action="./postlienhe" class="contact_form" method="post">
                  {{csrf_field()}}
                  <input name="name" class="form-control" type="text" placeholder="{{ trans('message.name') }}">
                  <input name="email" class="form-control" type="email" placeholder="E-mail">
                  <textarea name='content' class="form-control" cols="30" rows="10" placeholder="{{ trans('message.message') }}"></textarea>
                  <input type="submit" value="{{ trans('message.send') }}">
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection