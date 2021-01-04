@extends('front.layout.master')
@section('content')


<section class="pb-5 pt-3">
    <div class="container">
        <div class="row">
            
            <div class="col-md-12">
                <div class="col-md-3 sidebar_news">
                    <p class="text-uppercase text-left mb-3">
                        <h6>URUTKAN</h6>
                    </p>
                    <select class="form-control">
                        <option>Terbaru</option>
                    </select>
                    <br/>
                    <div class="news_tag">
                        <p class="text-uppercase text-left mb-3">
                            <h6>TAG</h6>
                        </p>
                        <p class="text-sm text-uppercase text-left mb-3">
                            <a href="">kecantikan (1)</a> <a href="">tips cantik (2)</a> <a href="">riasan (3)</a> <a href="">bibir (6)</a> <a href="">perawatan (2)</a>
                            <a href="">kulit sehat (5)</a> <a href="">rambut (4)</a> <a href="">pelembab (1)</a> <a href="">olah raga (3)</a> <a href="">produk (2)</a>
                            <a href="">senam (4)</a>
                        </p>
                    </div>
                </div>

                <h1 class="text-left text-capitalize mb-5 text-md">
                    Artikel
                </h1>
                <div class="col-xs-12 sidebar_news_mobile mb-3">
                        <p class="text-uppercase text-left mb-3">
                            <h6>URUTKAN</h6>
                        </p>
                        <select class="form-control">
                            <option>Terbaru</option>
                        </select>
                    </div>
                <p><i class="fa fa-home mr-2"></i>beranda / artikel / kecantikan</p>
                <br />
                <ul class="nav_article_category">
                    <li><a class="active">kecantikan</a></li>
                    <li><a>kesehatan</a></li>
                </ul>
                <div class="grid js-masonry" data-masonry='{ "itemSelector": ".grid-item", "columnWidth": 300 }'>
                    
                    @if(isset($news) && !empty($news))
                        @foreach($news as $keyNews=> $newsLanding)
                            <div class="grid-item m-3">
                                <img src="{{ $newsLanding['thumbnail_url'] }}" alt="{{ $newsLanding['title'] }}" class="full-width" />
                                <p class="mt-3 mb-3">
                                    <span class="float-left text-uppercase">{{ $newsLanding['category'] }}</span>
                                    <span class="float-right text-uppercase">{{ $newsLanding['publish_date'] }}</span>
                                </p>
                                <h3 class="mt-3">{{ $newsLanding['title'] }}</h3>
                                {!! $newsLanding['content'] !!}
                                <p class="mt-5">
                                    <a href="{{ route('frontNewsDetail', $newsLanding['slug']) }}">Lebih Lanjut<i class="fa fa-arrow-alt-circle-right ml-3"></i></a>
                                </p>
                            </div>
                        @endforeach
                    @endif
                    
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