@extends('front.layout.master')
@section('content')
<div class="row">
    <div class="col-md-12 col-lg-12 pl-0 pr-0 pb-0">
        <div class="carousel">
            <div class="carousel-inner">
                <input class="carousel-open" type="radio" id="carousel-1" name="carousel" aria-hidden="true" hidden="" checked="checked">
                <div class="carousel-item-custom">
                    <img src="{{ asset('images/about/banner.jpg') }}">
                </div>
            </div>
        </div>
    </div>
</div>
<section class="pb-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-center text-capitalize mb-5 ff-inconsolata-l">
                    Dalami Perjalanan kesehatan dan kecantikan secan.
                </h4>
                <hr />
            </div>

            <div class="col-md-5 mr-5 col-sm-12 mt-5">
                <img src="{{ asset('images/about/section_1.png') }}" class="full-width" />
            </div>

            <div class="col-md-5 about_description">
                <h3>
                    Filosofi SeCan
                </h3>

                <p>
                    Kita bisa memahami diri sendiri untuk menuju cantik itu seharusnya gampang dan penerapannya mudah. Gabungan dari 
                    macam-macam yang segar dan inklusif - SeCan berisi ragam artikel dan video yang bikin kita penasaran tentang kecantikan 
                    dan kesehatan. Di sini ada hal-hal riasan, perawatan kulit dan tema yang berkaitan. SeCan Dari Indonesia, ingin mengangkat 
                    dan menginspirasi individu untuk lebih percaya diri. Lintas budaya suku dan warna kulit kami percaya semua orang Indonesia 
                    bisa sehat sekaligus cantik
                </p>
                <br />
                <p>Ikuti kami di <a href="https://www.instagram.com/infosehatdancantik.id/" target="__blank"><b>@SeCanindonesia</b></a></p>
                <br/>
                <h1 class="bottom_about_info">Mulai hari kita dengan percaya diri.</h1>
            </div>
        </div>
    </div>
</section>
<section class="pt-5 pb-0">
    <div class="row">
        <div class="col-md-12">
            <img src="{{ asset('images/about/about_section_3.jpg') }}" class="full-width" />
        </div>
    </div>
</section>
<section class="pt-0">
    <div class="container">
        <div class="row">

            <div class="col-md-4 bg-dark text-white pt-5 pl-5 pr-5 pb-5 ff-old-standart">
                <p class="text-uppercase text-sm">
                    Mari berkarya bersama kami
                </p>

                <p class="side_desc_bottom_left">
                    Anda juga mengangkat kecantikan Indonesia yang sehat?
                </p>

                <a href="" class="btn btn-dark text-center border side_desc_bottom_left_button">Hubungi Kami</a>
            </div>

            <div class="col-md-8">
                <img src="{{ asset('images/about/section_3.jpg') }}" class="full-width" />
            </div>
        </div>
    </div>
</section>

@stop
