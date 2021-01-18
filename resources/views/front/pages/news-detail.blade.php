@extends('front.layout.master')
@section('content')


<section class="pb-5 pt-3">
    <div class="container">
        <div class="row">
            
            <div class="col-md-9">
                
                <h1 class="text-left text-capitalize mb-5 text-md ff-old-standart">
                    Artikel
                </h1>
                <p class="text-capitalize bredcrumb">
                    <i class="fa fa-home mr-4"></i>
                    <a href="{{ route('frontHome') }}">beranda</a> /
                    <a href="{{ route('frontNews') }}">artikel</a> /
                    <a href="{{ route('frontNewsCategory', $detail['category_slug']) }}">{{ $detail['category'] }}</a> /
                    {{ $detail['title'] }}
                </p>
                

                <div class="news_content">

                    <img src="{{ $detail['image_url'] }}" alt="{{ $detail['title'] }}" class="full-width" />
                    <p class="mt-3 mb-3 flow-root">
                        <span class="float-left text-uppercase">{{ $detail['category'] }}</span>
                        <span class="float-right text-uppercase news_date">{{ $detail['publish_date'] }}</span>
                    </p>

                    <h1 class="text-capitalize mt-2 mb-2 text-md ff-old-standart">{{ $detail['title'] }}</h1>
                    <div class="mt-4 text-justify d-block">
                        <p>{!! $detail['content'] !!}</p>
                    </div>
                </div>

                <div class="news_navigate desktop_only p-3">
                    
                    <div class="flex vend">
                        <div class="row d-flex between">
                            <div class="d-flex">
                                @if(isset($prev) && !empty($prev))
                                    <img src="{{ $prev['home_thumbnail_url'] }}" alt="{{ $prev['title'] }}" width="150" class="img-prev" />
                                    <p class="ml-3 mt-3 mb-3 text-center text-capitaize">
                                        <a href="{{ route('frontNewsDetail', $prev['slug']) }}">Sebelumnya</a>
                                    </p>
                                @endif
                            </div>
                            <div class="d-flex">
                                @if(isset($next) && !empty($next))
                                    <p class="mr-3 mt-3 mb-3 text-center text-capitaize">
                                        <a href="">Selanjutnya</a>
                                    </p>
                                    <img src="{{ $next['home_thumbnail_url'] }}" alt="{{ $next['title'] }}" width="150" class="img-prev" />
                                @endif
                            </div>
                        </div>
                    </div>
                    
                </div>
                @if(isset($related) && !empty($related))
                    <div class="related_news_title desktop_only mt-5">
                        <h3 class="text-center mb-2 mt-2 text-md">Artikel Terkait</h3>
                        <div class="row mt-4">
                            
                            @foreach($related as $relatedDesktop)
                                
                                <div class="col-md-4">
                                    <img src="{{ $relatedDesktop['home_thumbnail_url'] }}" alt="{{ $relatedDesktop['title'] }}" class="full-width" />
                                    <p class="mt-3 mb-3 text-center">
                                        <span class="text-uppercase">{{ $relatedDesktop['category'] }}</span>
                                    </p>
                                    <a href="{{ route('frontNewsDetail', $relatedDesktop['slug']) }}">
                                        <h3 class="mt-3 text-base">{{ $relatedDesktop['title'] }}</h3>
                                    </a>
                                </div>
                                
                            @endforeach
                        </div>
                    </div>

                    <div class="related_news mobile_only mb-3">
                        <div class="flex vend">
                            <h1 class="text-left mb-3 mt-2 text-md">Artikel Terkait</h1>
                            <div class="row d-flex between">
                                @foreach($related as $relatedMobile)
                                    
                                    <div class="d-flex ml-3">
                                        <img src="{{ $relatedMobile['home_thumbnail_url'] }}" alt="{{ $relatedMobile['title'] }}" width="150" class="" />
                                        <p class="m-3 text-justify text-capitaize text-sm style="line-hight: 1.6"">
                                            <a href="{{ route('frontNewsDetail', $relatedMobile['slug']) }}">
                                                {{ $relatedMobile['title'] }}
                                            </a>
                                        </p>
                                    </div>
                                    
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <div class="col-md-3 sidebar_news_detail position-relative">
            @include('front.partials.tags')
            </div>
        </div>

        <div class="row">
            <div class="col-md-9">
                <div class="mt-5 comment_section">
                    <h1 class="text-md ff-old-standart">Komentar</h1>
                    <p class="text-sm ff-heebo-regular">Alamat surel anda tidak akan ditampilkan. Bidang yang ditandai harus di isi.</p>
                </div>

                <div class="mt-5">
                    <form action="#" class="ff-heebo-regular" method="POST">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-5">
                                    <textarea name="comment" id="" style="height: 200px" class="form-comment" placeholder="komentar"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-5">
                                    <input type="text" placeholder="* Nama Lengkap" class="form-comment">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-5">
                                    <input type="number" placeholder="* Surel" class="form-comment">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-5">
                                    <input type="text" placeholder="Website" class="form-comment">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-5 float-left">
                                    <p class="d-inline-block margin-r20 width200">
                                        <input type="checkbox" id="user__data" class="check" value="1"> 
                                        <label for="user__data">
                                            Simpan data saya untuk komentar berikutnya.
                                        </label>
                                    </p>
                                </div>
                                <div class="form-group float-right">       
                                    <button type="submit" class="btn btn-submit-comment text-uppercase" disabled>Post koment</button>
                                </div>
                            </div>
                        </div>
                    </form>
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