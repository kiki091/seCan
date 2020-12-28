@extends('front.layout.master')
@section('content')


<section class="pb-5 pt-3">
    <div class="container">
        <div class="row">
            
            <div class="col-md-12">

                <h1 class="text-left text-capitalize mb-5 text-md">
                    Video
                </h1>
                
                <p class="text-capitalize bredcrumb"><i class="fa fa-home mr-2"></i>beranda / video / kecantikan / Kesehatan Kulit Wajah Tetap Terjaga Ketika Era Adaptasi Kebuasaan Baru</p>
                
            </div>

            <div class="col-md-8 mb-5">
                <h1 class="text-base mobile_only">
                    Kesehatan Kulit Wajah Tetap Terjaga Ketika Era Adaptasi Kebuasaan Baru
                </h1>
                <iframe class="full-width" height="515" src="https://www.youtube.com/embed/fEOIBToGmF0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <!-- <video src="https://www.youtube.com/watch?v=fEOIBToGmF0" class="full-width"></video> -->
            </div>

            <div class="col-md-4 mb-5">
                <div class="">
                    <h1 class="text-md desktop_only">
                        Kesehatan Kulit Wajah Tetap Terjaga Ketika Era Adaptasi Kebuasaan Baru
                    </h1>
                    <table>
                        <tbody>
                            <tr>
                                <th class="pt-3 pr-3 pb-1">Kategori</th><td class="pt-3 pl-3 pb-1">KECANTIKAN</td>
                            </tr>
                            <tr>
                                <th class="pt-3 pr-3 pb-1">Tag</th><td class="pt-3 pl-3 pb-1">CANTIK  KULIT</td>
                            </tr>
                            <tr>
                                <th class="pt-3 pr-3 pb-1">Tanggal</th><td class="pt-3 pl-3 pb-1">05/10/2020</td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-md-12">
                <div class="news_navigate desktop_only p-3">
                    
                    <div class="flex vend">
                        <div class="row d-flex between">
                            <div class="d-flex">
                                <img src="{{ asset('images/news/related_1.png') }}" width="150" class="img-prev" />
                                <p class="ml-3 mt-3 mb-3 text-center text-capitaize">
                                    <a href="">Sebelumnya</a>
                                </p>
                            </div>
                            <div class="d-flex">
                                <p class="mr-3 mt-3 mb-3 text-center text-capitaize">
                                    <a href="">Selanjutnya</a>
                                </p>
                                <img src="{{ asset('images/news/related_2.png') }}" width="150" class="img-prev" />
                            </div>
                        </div>
                    </div>
                    
                </div>

                <div class="related_news_title desktop_only mt-5">
                    <h3 class="text-center mb-2 mt-2 text-md">Artikel Terkait</h3>
                    <div class="row mt-4">
                        <div class="col-md-3">
                            <img src="{{ asset('images/video/video_4png.png') }}" class="full-width" />
                            <p class="mt-3 mb-3 ">
                                <span class="text-uppercase text-sm">kecantikan</span>
                            </p>
                            <h3 class="mt-3 text-base">Riasan tanpa riasan? Ini dia.</h3>
                        </div>

                        <div class="col-md-3">
                            <img src="{{ asset('images/video/video_5png.png') }}" class="full-width" />
                            <p class="mt-3 mb-3 ">
                                <span class="text-uppercase text-sm">kecantikan</span>
                            </p>
                            <h3 class="mt-3 text-base">Riasan tanpa riasan? Ini dia.</h3>
                        </div>

                        <div class="col-md-3">
                            <img src="{{ asset('images/video/video_6png.png') }}" class="full-width" />
                            <p class="mt-3 mb-3 ">
                                <span class="text-uppercase text-sm">kecantikan</span>
                            </p>
                            <h3 class="mt-3 text-base">Riasan tanpa riasan? Ini dia.</h3>
                        </div>

                        <div class="col-md-3">
                            <img src="{{ asset('images/video/video_1png.png') }}" class="full-width" />
                            <p class="mt-3 mb-3 ">
                                <span class="text-uppercase text-sm">kecantikan</span>
                            </p>
                            <h3 class="mt-3 text-base">Riasan tanpa riasan? Ini dia.</h3>
                        </div>
                    </div>
                </div>

                <div class="related_news mobile_only mb-3">
                    <div class="flex vend">
                        <h1 class="text-left mb-3 mt-2 text-md">Artikel Terkait</h1>
                        <div class="row d-flex between">
                            <div class="d-flex ml-3 mt-3">
                                <a href="" class="d-flex">
                                    <img src="{{ asset('images/video/video_2png.png') }}" width="150" class="" />
                                    <p class="m-3 text-justify text-capitaize text-sm" style="line-hight: 1.6">
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                    </p>
                                </a>
                            </div>

                            <div class="d-flex ml-3 mt-3">
                                <a href="" class="d-flex">
                                    <img src="{{ asset('images/video/video_1png.png') }}" width="150" class="" />
                                    <p class="m-3 text-justify text-capitaize text-sm" style="line-hight: 1.6">
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop