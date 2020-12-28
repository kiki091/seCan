@extends('front.layout.master')
@section('content')

    <!-- Hero Section-->
    <!-- <section class="hero bg-cover bg-center" id="hero" style="background-image: url({{ asset('images/banner/home.png') }})"> -->
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="carousel">
                <div class="carousel-inner">
                    <input class="carousel-open" type="radio" id="carousel-1" name="carousel" aria-hidden="true" hidden="" checked="checked">
                    <div class="carousel-item-custom">
                        <img src="{{ asset('images/banner/1.jpg') }}">
                    </div>
                    <input class="carousel-open" type="radio" id="carousel-2" name="carousel" aria-hidden="true" hidden="">
                    <div class="carousel-item-custom">
                        <img src="{{ asset('images/banner/2.jpg') }}">
                    </div>
                    <label for="carousel-2" class="carousel-control next control-1">›</label>
                    <label for="carousel-1" class="carousel-control prev control-2">‹</label>
                    <label for="carousel-2" class="carousel-control prev control-3">‹</label>
                    <label for="carousel-1" class="carousel-control next control-3">›</label>
                    <ol class="carousel-indicators">
                        <li>
                            <label for="carousel-1" class="carousel-bullet">•</label>
                        </li>
                        <li>
                            <label for="carousel-2" class="carousel-bullet">•</label>
                        </li>
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
                        <a href="#">{{ trans('home.about_link') }}</a>
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
                <div class="col-md-3 col-sm-4 col-lg-3 col-xl-3">
                    <p class="text-center" style="">
                        <img src="{{ asset('images/Asset 05_thumbnail.png') }}" style="width: 100%" />
                        <span class="article_category">
                            TATARIAS
                        </span>
                        <h4 class="article_title text-center">Riasan Tanpa Riasan? Ini Dia.</h4>
                    </p>
                </div>
                <div class="col-md-3 col-sm-4 col-lg-3 col-xl-3">
                    <p class="text-center" style="">
                        <img src="{{ asset('images/Asset 05_thumbnail.png') }}" style="width: 100%" />
                        <span class="article_category">
                            PERONA MATA
                        </span>
                        <h4 class="article_title text-center">Perona Mata Krim dan Cair Terbaik</h4>
                    </p>
                </div>
                <div class="col-md-3 col-sm-4 col-lg-3 col-xl-3">
                    <p class="text-center" style="">
                        <img src="{{ asset('images/Asset 05_thumbnail.png') }}" style="width: 100%" />
                        <span class="article_category">
                            KECANTIKAN
                        </span>
                        <h4  class="article_title text-center">Memanjakan Diri Tetap Cantik Di Masa Karantina Di Rumah.</h4>
                    </p>
                </div>
                <div class="col-md-3 col-sm-12 col-lg-3 col-xl-3">
                    <div class="circle_bottom">
                        <span>Blog dan artikel perawatan kulit, riasan, dan yang diantaranya.</span>
                        <h5 style="margin-top:1em;">
                            <a href="" >
                                <u style="position: absolute;display: contents;">Jelajahi Semua</u>
                            </a>
                        </h5>
                    </div>
                </div>
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
                        <b><a href="#">Berlangganan</a></b> untuk ikuti kontent mingguan tentang kesehatan dan kecantikan.
                    </p>
                </div>
                <div class="col-md-4">
                    
                    <p class="text-center" style="">
                        <img src="{{ asset('images/video/thumb_1.png') }}" style="width: 100%" />
                        <span class="article_category">
                            KECANTIKAN DAN GAYA HIDUP
                        </span>
                        <h4 class="article_title text-center">Estetika dan Peremajaan</h4>
                    </p>
                </div>
                <div class="col-md-4">
                    
                    <p class="text-center" style="">
                        <img src="{{ asset('images/video/thumb_1.png') }}" style="width: 100%" />
                        <span class="article_category">
                            RIASAN DAN KECANTIKAN
                        </span>
                        <h4 class="article_title text-center">Kesehatan, Kecantikan yang tak ternilai</h4>
                    </p>
                </div>
                <div class="col-md-4">
                    
                    
                    <p class="text-center" style="">
                        <img src="{{ asset('images/video/thumb_1.png') }}" style="width: 100%" />
                        <span class="article_category">
                            RIASAN DAN KECANTIKAN
                        </span>
                        <h4 class="article_title text-center">Koleksi perawatan krim dan cair</h4>
                    </p>
                </div>
            </div>
        </div>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <img src="{{ asset('images/Asset 04_video play .png') }}" style="width: 100%;position: relative;z-index: 9;" />
                    <div class="circle">
                        <span>Disini tempat video tentang tips dan olah kecantikan untuk kamu.</span>
                        <h5 style="margin-top:1em;">
                            <a href="" >
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

    <section class="text-white bg-cover bg-center" style="background-image: url({{ asset('images/bg_section_contact.png') }})">
            
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="container-fluid">
                    
                        <div class="card-body">
                            <p>
                                Hanya dengan saling menyapa, kita bisa tau banyak hal.
                            </p>
                        <br/>
                        <br/>
                        <small>kontak@secan.id</small>
                            </p>
                            <form>
                                <div class="form-group">
                                <label class="form-control-label">Name</label>
                                <input type="text" placeholder="Nama Lengkap" class="form-contact">
                                </div>
                                <div class="form-group">       
                                <label class="form-control-label">Email</label>
                                <input type="email" placeholder="Email" class="form-contact">
                                </div>
                                <div class="form-group">       
                                <textarea class="form-contact" style="height: 200px" placeholder="Cerita Kamu"></textarea>
                                </div>
                                <div class="form-group">       
                                <button type="submit" class="btn btn-submit-contact">Kirim</button>
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


@stop