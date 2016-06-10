@extends('layouts.site.main')

@section('css')
<link rel="stylesheet" href="{{ url('assets/plugins/master-slider/masterslider/style/masterslider.css') }}">
<link rel="stylesheet" href="{{ url('assets/plugins/master-slider/u-styles/testimonials-1.css') }}">
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

    .triangle-selector {
        position: relative;
    }
    .triangle-selector > i {
        position: absolute;
        display: inline-block;
        width: 0;
        height: 0;
        line-height: 0;
        border: 1.5em solid transparent;
        margin-top: -1.5em;
        border-bottom: .85em solid #ffffff;
        left:;
        top: 3.75em;
        z-index: 3;
    }
    .header-bg.Buy{
        background: url("{{ url('assets/images/banners/mountain-bg.jpg') }}") #333 center center no-repeat; height: 500px;
    }
    .header-bg.Sell{
        background: url("{{ url('assets/images/banners/brickhouse-bg.jpg') }}") #333 center center no-repeat; height: 500px;
    }
    .header-bg.Rent{
        background: url("{{ url('assets/images/banners/metro-bg.jpg') }}") #333 center center no-repeat; height: 500px;
    }

</style>
@endsection

@section('content')
    @include('errors.flashHover')
    <div class="header-bg Buy">
        <div class="container-fliud margin-bottom-160">
            <div class="row">
                <!--Text form input-->
                <div class="col-md-offset-4 col-md-4 header-formatting">
                <div class="btn-group-justified margin-bottom-10">
                    <div class="btn-group">
                        <button class="btn btn-dark btn-selected btn-lg" id='btn-buy'>Buy</button>
                        <i class="triangle-selector"><i></i></i>
                    </div>
                    <div class="btn-group">
                        <button class="btn btn-dark btn-lg" id='btn-sell'>Sell</button>
                        <i class="triangle-selector" style='display: none'><i></i></i>
                    </div>
                    <div class="btn-group">
                        <button class="btn btn-dark btn-lg" id='btn-rent'>Rent</button>
                        <i class="triangle-selector" style='display: none'><i></i></i>
                    </div>
                </div>
                    {!! Form::open( ['url' => ''] ) !!}

                    <div class='input-group form-group'>
                        {!! Form::hidden('search-type', null, ['class' => 'form-control', 'id' => 'search-type']) !!}
                        {!! Form::text('search', null, ['class' => 'form-control input-lg', 'placeholder' => 'Buy a Home in Utah - Enter City or Zip', 'id' => 'search']) !!}
                        <span class="input-group-btn">
                            <button class="btn btn-orange btn-lg" type="button" id='submit-search'>Search</button>
                        </span>
                    </div>
                    {!! Form::close() !!}
                </div>

            </div>
        </div>

        <!-- Testimonials section -->
        <section id="testimonials" class="g-theme-bg-color-1 g-text-color-2 text-center g-pt-100 g-pb-40">
            <div class="container">

                <div class="ms-staff-carousel">
                    <!-- MasterSlider -->
                    <div class="master-slider" id="masterslider">
                        <!-- Item 1 -->
                        <div class="ms-slide">
                            <img src="{{ url('assets/images/testimonials/img1.jpg') }}" data-src="{{ url('assets/images/testimonials/img1.jpg') }}" alt="">
                            <div class="ms-info">
                                <h3 class="ms-info-name">Julia B. Mcraflane | Spencet Group</h3>
                                <p><em>"Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt."</em></p>
                            </div>
                        </div>
                        <!-- End Item 1 -->

                        <!-- Item 2 -->
                        <div class="ms-slide">
                            <img src="{{ url('assets/images/testimonials/img2.jpg') }}" data-src="{{ url('assets/images/testimonials/img2.jpg') }}" alt="">
                            <div class="ms-info">
                                <h3 class="ms-info-name">Amy Clayton</h3>
                                <h4 class="ms-info-position">Abibas</h4>
                                <p><em>Ut augue diam, lacinia fringilla erat eu, vehicula commodo quam. Aliquam eget accumsan ligula. Maecenas sit amet consectetur lectus. Suspendisse commodo et magna non pulvinar. Quisque</em> et ul"tricies sem, et vulputate dui. Morbi aliquam leo id ipsum tempus mo"llis.</p>
                            </div>
                        </div>
                        <!-- End Item 2 -->

                        <div class="ms-slide">
                            <img src="{{ url('assets/images/testimonials/img3.jpg') }}" data-src="{{ url('assets/images/testimonials/img3.jpg') }}" alt="">
                            <div class="ms-info">
                                <h3 class="ms-info-name">Amy Clayton</h3>
                                <h4 class="ms-info-position">Abibas</h4>
                                <p><em>Ut augue diam, lacinia fringilla erat eu, vehicula commodo quam. Aliquam eget accumsan ligula. Maecenas sit amet consectetur lectus. Suspendisse commodo et magna non pulvinar. Quisque</em> et ul"tricies sem, et vulputate dui. Morbi aliquam leo id ipsum tempus mo"llis.</p>
                            </div>
                        </div>

                        <div class="ms-slide">
                            <img src="{{ url('assets/images/testimonials/img4.jpg') }}" data-src="{{ url('assets/images/testimonials/img4.jpg') }}" alt="">
                            <div class="ms-info">
                                <h3 class="ms-info-name">Amy Clayton</h3>
                                <h4 class="ms-info-position">Abibas</h4>
                                <p><em>Ut augue diam, lacinia fringilla erat eu, vehicula commodo quam. Aliquam eget accumsan ligula. Maecenas sit amet consectetur lectus. Suspendisse commodo et magna non pulvinar. Quisque</em> et ul"tricies sem, et vulputate dui. Morbi aliquam leo id ipsum tempus mo"llis.</p>
                            </div>
                        </div>

                        <div class="ms-slide">
                            <img src="{{ url('assets/images/testimonials/img5.jpg') }}" data-src="{{ url('assets/images/testimonials/img5.jpg') }}" alt="">
                            <div class="ms-info">
                                <h3 class="ms-info-name">Amy Clayton</h3>
                                <h4 class="ms-info-position">Abibas</h4>
                                <p><em>Ut augue diam, lacinia fringilla erat eu, vehicula commodo quam. Aliquam eget accumsan ligula. Maecenas sit amet consectetur lectus. Suspendisse commodo et magna non pulvinar. Quisque</em> et ul"tricies sem, et vulputate dui. Morbi aliquam leo id ipsum tempus mo"llis.</p>
                            </div>
                        </div>

                        <div class="ms-slide">
                            <img src="{{ url('assets/images/testimonials/img6.jpg') }}" data-src="{{ url('assets/images/testimonials/img6.jpg') }}" alt="">
                            <div class="ms-info">
                                <h3 class="ms-info-name">Amy Clayton</h3>
                                <h4 class="ms-info-position">Abibas</h4>
                                <p><em>Ut augue diam, lacinia fringilla erat eu, vehicula commodo quam. Aliquam eget accumsan ligula. Maecenas sit amet consectetur lectus. Suspendisse commodo et magna non pulvinar. Quisque</em> et ul"tricies sem, et vulputate dui. Morbi aliquam leo id ipsum tempus mo"llis.</p>
                            </div>
                        </div>

                        <!-- Item 3 -->
                        <div class="ms-slide">
                            <img src="{{ url('assets/images/testimonials/img7.jpg') }}" data-src="{{ url('assets/images/testimonials/img7.jpg') }}" alt="">
                            <div class="ms-info">
                                <h3 class="ms-info-name">Fred Penner</h3>
                                <h4 class="ms-info-position">Ruma</h4>
                                <p><em>"Ut augue diam, lacinia fringilla erat eu, vehicula commodo quam. Aliquam eget accumsan ligula. Maecenas sit amet consectetur lectus. Suspendisse commodo et magna non pulvinar."</em></p>
                            </div>
                        </div>
                        <!-- End Item 3 -->

                        <!-- Item 4 -->
                        <div class="ms-slide">
                            <img src="{{ url('assets/images/testimonials/img1.jpg') }}" data-src="{{ url('assets/images/testimonials/img1.jpg') }}" alt="">
                            <div class="ms-info">
                                <h3 class="ms-info-name">Martina Saiz</h3>
                                <h4 class="ms-info-position">Jonda</h4>
                                <p><em>"Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt."</em></p>
                            </div>
                        </div>
                        <!-- End Item 4 -->

                        <!-- Item 5 -->
                        <div class="ms-slide">
                            <img src="{{ url('assets/images/testimonials/img4.jpg') }}" data-src="{{ url('assets/images/testimonials/img4.jpg') }}" alt="">
                            <div class="ms-info">
                                <h3 class="ms-info-name">Joseph B. Seward</h3>
                                <h4 class="ms-info-position">Aodi</h4>
                                <p><em>"Maecenas sit amet consectetur lectus. Suspendisse commodo et magna non pulvinar. Quisque et ultricies sem, et vulputate dui. Morbi aliquam leo id ipsum tempus mollis."</em></p>
                            </div>
                        </div>
                        <!-- End Item 5 -->
                    </div>

                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2">
                            <div class="ms-staff-info" id="staff-info"></div>
                        </div>
                    </div>
                </div>
                <!-- End of MasterSlider -->

            </div>
        </section>
        <!-- End Testimonials section -->

@endsection

@section('js')
    <script src="{{ url('assets/plugins/master-slider/masterslider/masterslider.min.js') }}"></script>
    <script src="{{ url('assets/js/plugins/testimonials.js') }}"></script>
    <script>

        $(function(){
            $('body').on('click', '.btn-dark', function(){
                $('.header-bg').removeClass('Buy').removeClass('Sell').removeClass('Rent').addClass($(this).text());
                $('.triangle-selector').hide();
                $('.btn-dark').removeClass('btn-selected');
                $(this).addClass('btn-selected');
                $(this).next().show();
                $('form #search-type').val($(this).text());
                $('form #search').attr('placeholder', $(this).text()+" a Home in Utah - Enter City or Zip");
            });
        });

    </script>

@stop
