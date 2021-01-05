@extends('front.layout.master')
@section('content')

    <!-- Hero Section-->
    <!-- <section class="hero bg-cover bg-center" id="hero" style="background-image: url({{ asset('images/banner/home.png') }})"> -->
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="carousel">
                <div class="carousel-inner">
                    @if(isset($home_sliders) && !empty($home_sliders))
                        @foreach($home_sliders as $keySlider=> $slider)
                            @if($keySlider == '0')
                                <input class="carousel-open" type="radio" id="carousel-{{ $keySlider }}" name="carousel" aria-hidden="true" hidden="" checked="checked">
                            @else
                                <input class="carousel-open" type="radio" id="carousel-{{ $keySlider }}" name="carousel" aria-hidden="true" hidden="">
                            @endif  
                            <div class="carousel-item-custom">
                                <img src="{{ $slider['image_url'] }}" alt="{{ $slider['title'] }}">
                            </div>
                            {{--<label for="carousel-{{ $keySlider }}" class="carousel-control next control-{{ $keySlider+1 }}">›</label>--}}

                            
                        @endforeach
                    @endif
                    <!-- 
                    <label for="carousel-2" class="carousel-control next control-1">›</label>
                    <label for="carousel-1" class="carousel-control prev control-2">‹</label>
                    <label for="carousel-2" class="carousel-control prev control-3">‹</label>
                    <label for="carousel-1" class="carousel-control next control-3">›</label>
                     -->
                    <ol class="carousel-indicators">
                        @for ($index = 0; $index < count($home_sliders); $index++)
                            <li>
                                <label for="carousel-{{ $index }}" class="carousel-bullet">•</label>
                            </li>
                        @endfor
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- About Section-->
    <section class="bg-cover bg-center" style="background-image: url({{ asset('images/bg_section_about.png') }})">
            
        <div class="container">
             <div class="row">
                <div class="col-md-12">
                <p class="about_deskription">
                        {{ trans('home.about_section_description') }}
                        <br />
                        {{ trans('home.follow_at_link') }}<b><a href="mailto:@SeCanindonesia">@SeCanindonesia</a></b>
                    </p>
                </div>
                <div class="col-md-3">
                    <p class="about_link">
                        <a href="{{ route('frontAbout') }}">{{ trans('home.about_link') }}</a>
                    </p>
                </div>
                <div class="col-md-9">
                    <img src="{{ asset('images/section-2.png') }}" style="width: 100%" />
                </div>
                
            </div>
        </div>
    </section>

    <!-- Article Section-->
    <section class="bg-cover bg-center" style="background-image: url({{ asset('images/bg_section_news.png') }})">
        <div class="container-fluid">
            <div class="row" style="margin: 0 3em;">
                <div class="col-md-12">

                     <div class="container">
                        <p class="article_description">
                        {!! trans('home.article_section_description') !!}
                        </p>
                    </div>
                </div>
                @if(isset($home_news) && !empty($home_news))
                    @foreach($home_news as $keyNews=> $news)
                        <div class="col-md-3 col-sm-4 col-lg-3 col-xl-3">
                            <p class="text-center" style="">
                                <img src="{{ $news['home_thumbnail_url'] }}" alt="{{ $news['title'] }}" style="width: 100%" />
                                <span class="article_category">
                                {{ $news['category'] }}
                                </span>
                                <a href="{{ route('frontNewsDetail', $news['slug']) }}">
                                    <h4 class="article_title text-center">{{ $news['title'] }}</h4>
                                </a>
                            </p>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>

    <!-- Youtube Section -->
    <section class="bg-cover bg-center" style="background-image: url({{ asset('images/bg_section_full_video.png') }})">
            
        <div class="container">
             <div class="row">
                <div class="col-md-12">
                    <p class="article_description">
                        Dunia kesehatan yang juga cantik - standar kecantikan juga memahami definisi 
                        sebenarnya untuk Indonesia-. Apakah yang kita korbankan sehingga kita 
                        mencapai "cantik" ?
                        <br />
                        <br />
                        <b><a href="#subscribe">Berlangganan</a></b> untuk ikuti kontent mingguan tentang kesehatan dan kecantikan.
                    </p>
                </div>
                @if(isset($home_video) && !empty($home_video))
                    @foreach($home_video as $home_video)
                        <div class="col-md-4">
                            
                            <p class="text-center" style="">
                                <img src="{{ $home_video['home_thumbnail_url'] }}" alt="{{ $home_video['title'] }}" style="width: 100%" />
                                <span class="article_category">
                                    {{ $home_video['category'] }}
                                </span>
                                <a href="{{ route('frontVideoDetail', $home_video['slug']) }}">
                                    <h4 class="article_title text-center">{{ $home_video['title'] }}</h4>
                                </a>
                            </p>
                        </div>
                    @endforeach
                @endif
                
            </div>
        </div>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <img src="{{ asset('images/Asset 04_video play .png') }}" style="width: 100%;position: relative;z-index: 9;" />
                    <div class="circle">
                        <span>Disini tempat video tentang tips dan olah kecantikan untuk kamu.</span>
                        <h5 style="margin-top:1em;">
                            <a href="{{ route('frontVideo') }}" >
                                <u style="position: absolute;display: contents;">Jelajahi Video</u>
                            </a>
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-cover bg-center" style="background-image: url({{ asset('images/bg_section_doctor.png') }})">
            
        <div class="container">
                <div class="row">
                <div class="col-md-12">
                    <p class="article_description">
                        SeCan paham pentingnya tenaga ahli yang kredibel untuk ragam kecantikan yang sehat di Indonesia. 
                        Kita bisa tahu banyak hal dengan konsultasi dengan para dokter.
                    </p>
                </div>
                <div class="col-md-3 col-sm-4">
                    
                    <p class="text-center" style="">
                        <img src="{{ asset('images/doctor/dokter_1.png') }}" style="width: 100%" />
                        
                    </p>
                </div>
                <div class="col-md-3 col-sm-4">
                    
                    <p class="text-center" style="">
                        <img src="{{ asset('images/doctor/dokter_2.png') }}" style="width: 100%" />
                        
                    </p>
                </div>
                <div class="col-md-3 col-sm-4">
                    
                    
                    <p class="text-center" style="">
                        <img src="{{ asset('images/doctor/dokter_3.png') }}" style="width: 100%" />
                        
                    </p>
                </div>
                <div class="col-md-3">
                    <div class="circle_bottom">
                        <span>Dokter-dokter yang berafiliasi dengan SeCan adalah terpercaya dan ahli.</span>
                        <h5 style="margin-top:1em;">
                            <a href="" >
                                <u style="position: absolute;display: contents;">Lihat Dokter</u>
                            </a>
                        </h5>
                    </div>
                </div>
                <div class="col-md-12">
                    <p class="text-small mt-4">Pelajari Produk Kecantikan</p>
                </div>
            </div>
        </div>
    </section>

    <section id="contact" class="text-white bg-cover bg-center" style="background-image: url({{ asset('images/bg_section_contact.png') }})">
            
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="container-fluid">
                    
                        <div class="card-body">
                            <p>
                                Hanya dengan saling menyapa, kita bisa tau banyak hal.
                            
                                <br/>
                                <br/>
                                <small>kontak@secan.id</small>
                            </p>
                            <form action="{{ route('storeContact') }}" method="POST" id="form_contact" @submit.prevent>
                                <div class="form-group">
                                    <label class="form-control-label">Name</label>
                                    <input type="text" name="fullname" v-model="models.fullname" placeholder="Nama Lengkap" class="form-contact">
                                    <span class="text-error mt-2 d-block" id="field_fullname"></span>
                                </div>
                                <div class="form-group">       
                                    <label class="form-control-label">Email</label>
                                    <input type="email" name="email" v-model="models.email" placeholder="Email" class="form-contact">
                                    <span class="text-error mt-2 d-block" id="field_email"></span>
                                </div>
                                <div class="form-group">       
                                    <textarea class="form-contact" name="message" v-model="models.message" style="height: 200px" placeholder="Cerita Kamu"></textarea>
                                    <span class="text-error mt-2 d-block" id="field_message"></span>
                                </div>
                                <div class="form-group">   
                                    {{ csrf_field() }}	    
                                    <button type="submit" class="btn btn-submit-contact" @click="storeContact">Kirim</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 desktop_only">
                    <img src="{{ asset('images/Asset 07_img.png') }}" style="width: 100%" />
                </div>
            </div>
        </div>
    </section>
@stop

@section('scripts')

<script>
    var contact = new Vue({
        el: "#contact",
        data: {
            models: {
                fullname: '',
                email: '',
                message: ''
            }
        },

        methods: {

            storeContact: function() {

                try {

                    var vm = this;

                    var optForm = {
                        dataType: "json",
                        beforeSerialize: function (form, options) {
                            // showLoading()
                        },
                        beforeSend: function () {
                            vm.clearErrorMessage();

                        },
                        success: function (response) {
                            if (response.status == false) {
                                if (response.is_error_form_validation) {

                                    var message_validation = []
                                    $.each(response.message, function (key, value) {

                                        $('input[name="' + key.replace('.', '_') + '"]').focus();
                                        $('#field_' + key.replace('.', '_')).text(value)
                                    });


                                } else {
                                    notify('Error!', response.message, 'error');

                                }
                            } else {

                                vm.clearErrorMessage();
                                vm.resetForm()
                                notify('Success!', 'Submit contact berhasil, terimaksih.', 'success');

                            }
                        },
                        complete: function (response) {
                            // hideLoading()
                        }

                    };
                    $("#form_contact").ajaxForm(optForm);
                    $("#form_contact").submit();
                    
                } catch (error) {
                    
                }
            },

            clearErrorMessage: function() {
                $('.text-error').text('')
            },

            resetForm: function() {
                this.models = {
                    fullname: '',
                    email: '',
                    message: ''
                }
            }
        }
            
    });
</script>
@stop