@extends('layouts.site.main')

@section('css')
<!-- <link rel="stylesheet" href="{{ url('assets/plugins/master-slider/masterslider/style/masterslider.css') }}">
<link rel="stylesheet" href="{{ url('assets/plugins/master-slider/u-styles/testimonials-1.css') }}"> -->

<link rel="stylesheet" href="{{ url('assets/plugins/testimonial-carousel/owl-carousel/owl-carousel.css') }}">
<link rel="stylesheet" href="{{ url('assets/plugins/testimonial-carousel/tipso-master/src/tipso.css') }}">
<link rel="stylesheet" href="{{ url('assets/plugins/testimonial-carousel/testimonial-carousel/testimonial-carousel.css') }}">
<style>
    .header-formatting{
        margin-top: 150px;
    }

    .ms-staff-carousel .ms-staff-info {
        padding: 50px 30px 50px;
        background: #fff;
    }

    .master-slider, .master-slider * {
        -webkit-box-sizing: content-box;
        -moz-box-sizing: content-box;
        box-sizing: content-box;
        background: #bbb;
    }

</style>
@endsection

@section('content')
    <div class="before-after-owl">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-7 col-sm-12 col-md-12 col-lg-12 pull-right hidden-xs">
                    <div id="header-owl">

                      @foreach($testimonials as $testimonial)
                      <a  href="#{{  $testimonial->user ? $testimonial->user->firstname : NULL }}-{{ $testimonial->id }}" class="item link">
                          <img src="http://loremflickr.com/150/145/headshot" class="tipso-mipso" data-tipso=
                          '<div class="media">
                              <a href="">
                                  <img src="http://loremflickr.com/150/145/headshot" class="img-responsive center-image" alt="Actual Client">
                              </a>
                              <div class="mipso-body">
                                  <p>{{ $testimonial->user ? $testimonial->user->firstname : "Unknown" }} <br/> Client Since: {{ Carbon\Carbon::parse($testimonial->user ? $testimonial->user->created_at : NULL)->toFormattedDateString() }}</p>
                                  <p>
                                    <button class="btn btn-basic" onclick="launchTestimonialModal(&#39;{{ $testimonial->user ? $testimonial->user->firstname : "Unknown" }}-{{$testimonial->id}}&#39;)" data-toggle="modal" data-target="#testimonial-modal">Read My Story</button>
                                </p>
                              </div>
                          </div>' alt="Owl Image">
                          <button class="btn btn-block masked-text">{{ $testimonial->user ? $testimonial->user->firstname : "Unknown" }}: {{ Carbon\Carbon::parse($testimonial->created_at)->diffForHumans() }}</button>
                      </a>
                      @endforeach

                    </div>
                    <div class="realPeople" style='display: none'>Buy Confident.&nbsp;Sell Confident.</div>
                </div>
            </div>
        </div>
    </div>

    <div class="header-bg" style='background: url("{{ url('assets/images/banners/home-bg.jpg') }}") #333 center center no-repeat; height: 500px;'>
        <div class="container-fliud margin-bottom-150">
            <div class="row">

                <!--Text form input-->
                <div class="col-md-offset-4 col-md-4 header-formatting">
                <div class="btn-group-justified margin-bottom-10">
                    <div class="btn-group">
                        <button class="btn btn-dark btn-selected btn-lg" id='btn-buy'>Buy</button>
                    </div>
                    <div class="btn-group">
                        <button class="btn btn-dark btn-lg" id='btn-sell'>Sell</button>
                    </div>
                    <div class="btn-group">
                        <button class="btn btn-dark btn-lg" id='btn-rent'>Rent</button>
                    </div>
                </div>

                    <div class='input-group form-group'>
                        {!! Form::text('search', null, ['class' => 'form-control input-lg', 'placeholder' => 'Search For Homes in Utah - Enter City or Zip']) !!}
                        <span class="input-group-btn">
                            <button class="btn btn-orange btn-lg" type="button" id='submit-search'>Search</button>
                        </span>
                    </div>
                </div>

            </div>
        </div>

@endsection

@section('js')
<!--     <script src="{{ url('assets/plugins/master-slider/masterslider/masterslider.min.js') }}"></script>
    <script src="{{ url('assets/js/plugins/testimonials.js') }}"></script> -->

    <script type="text/javascript" src="{{ url('assets/plugins/testimonial-carousel/owl-carousel/owl-carousel.js') }}"></script>
    <script type="text/javascript" src="{{ url('assets/plugins/testimonial-carousel/tipso-master/src/tipso.js') }}"></script>
    <script type="text/javascript" src="{{ url('assets/plugins/testimonial-carousel/testimonial-carousel/testimonial-carousel.js') }}"></script>
    <script>

        $(function(){
            $('body').on('click', '.btn-dark', function(){
                $('.btn-dark').removeClass('btn-selected');
                $(this).addClass('btn-selected');
                $('form #search-type').val($(this).text());
            });
        });

    </script>

@stop
