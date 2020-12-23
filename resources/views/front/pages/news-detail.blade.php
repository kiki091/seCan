@extends('front.layout.master')
@section('content')


<section class="pb-5 pt-3">
    <div class="container">
        <div class="row">
            
            <div class="col-md-9">
                
                <h1 class="text-left text-capitalize mb-5">
                    Artikel
                </h1>
                <p><i class="fa fa-home mr-4"></i>beranda / artikel / kecantikan / binar-wajah-di-cuaca-ekstrem</p>
                

                <div class="news_content">

                    <img src="{{ asset('images/news/detail.png') }}" class="full-width" />
                    <p class="mt-3 mb-3 flow-root">
                        <span class="float-left text-uppercase">kecantikan</span>
                        <span class="float-right text-uppercase">05/01/2020</span>
                    </p>

                    <h1 class="text-capitalize mt-2 mb-2 text-md">Binar Wajah di Cuaca Ekstrem</h1>
                    <div class="mt-4 text-justify d-block">
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                            when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                        </p>
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                            when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                        </p>
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                            when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                        </p>
                    </div>
                </div>

                <div class="news_navigate desktop_only">
                    <div class="row">
                        <div class="col-md-5">
                            <img src="{{ asset('images/news/related_1.png') }}" class="" />
                            <p class="mt-3 mb-3 text-center">
                                <span class="text-uppercase">kecantikan</span>
                            </p>
                        </div>
                        <div class="col-md-5">
                            <img src="{{ asset('images/news/related_1.png') }}" class="" />
                            <p class="mt-3 mb-3 text-center">
                                <span class="text-uppercase">kecantikan</span>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="related_news_title desktop_only">
                    <h3 class="text-center mb-2 mt-2 text-md">Artikel Terkait</h3>
                    <div class="row">
                        <div class="col-md-3 m-3">
                            <img src="{{ asset('images/news/related_1.png') }}" class="full-width" />
                            <p class="mt-3 mb-3 text-center">
                                <span class="text-uppercase">kecantikan</span>
                            </p>
                            <h3 class="mt-3 text-base">Riasan tanpa riasan? Ini dia.</h3>
                        </div>

                        <div class="col-md-3 m-3">
                            <img src="{{ asset('images/news/related_2.png') }}" class="full-width" />
                            <p class="mt-3 mb-3 text-center">
                                <span class="text-uppercase">kecantikan</span>
                            </p>
                            <h3 class="mt-3 text-base">Riasan tanpa riasan? Ini dia.</h3>
                        </div>

                        <div class="col-md-3 m-3">
                            <img src="{{ asset('images/news/related_3.png') }}" class="full-width" />
                            <p class="mt-3 mb-3 text-center">
                                <span class="text-uppercase">kecantikan</span>
                            </p>
                            <h3 class="mt-3 text-base">Riasan tanpa riasan? Ini dia.</h3>
                        </div>
                        </div>
                </div>
            </div>

            <div class="col-md-3 sidebar_news_detail position-relative">
                    
                <div class="">
                    <p class="text-uppercase text-left mb-3">
                        <h6>TAG</h6>
                    </p>
                    <p class="text-sm text-uppercase text-left mb-3">
                        <a href="">kecantikan (1)</a> <a href="">tips cantik (2)</a> <a href="">riasan (3)</a> <a href="">bibir (6)</a> <a href="">perawatan (2)</a>
                        <a href="">kulit sehat (5)</a> <a href="">rambut (4)</a> <a href="">pelembab (1)</a> <a href="">olah raga (3)</a> <a href="">produk (2)</a>
                        <a href="">senam (4)</a>
                    </p>
                    <br/>
                    <p class="text-uppercase text-left mb-3"><h6>INSTAGRAM</h6></p>
                </div>
            </div>
        </div>
    </div>
</section>
@stop


@section('scripts')
<script>

</script>

@stop