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
                    <select class="form-control" id="filter_order" onChange="orderNews()">
                        <option value="desc">Terbaru</option>
                        <option value="asc">Terdahulu</option>
                    </select>
                    @include('front.partials.tags')
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
                <p class="text-capitalize bredcrumb">
                    <i class="fa fa-home mr-2"></i>
                    <a href="{{ route('frontHome') }}">beranda</a>
                     / <a href="{{ route('frontNews') }}">artikel</a> {{ isset($category_name) ? '/ '.$category_name : '' }}</p>
                <br />
                <ul class="nav_article_category ff-old-standart">
                    <li><a href="{{ route('frontNewsCategory', 'kecantikan') }}" class="active">kecantikan</a></li>
                    <li><a href="{{ route('frontNewsCategory', 'kesehatan') }}">kesehatan</a></li>
                </ul>
                <div class="grid js-masonry" data-masonry='{ "itemSelector": ".grid-item", "columnWidth": 300 }'>
                    
                    @if(isset($news) && !empty($news))
                        @foreach($news as $keyNews=> $newsLanding)
                            <div class="grid-item m-3">
                                <img src="{{ $newsLanding['thumbnail_url'] }}" alt="{{ $newsLanding['title'] }}" class="full-width" />
                                <p class="mt-3 mb-3 d-flex ff-heebo-light">
                                    <span class="float-left text-uppercase">{{ $newsLanding['category'] }}</span>
                                    <span class="float-right text-uppercase news_date">{{ $newsLanding['publish_date'] }}</span>
                                </p>
                                <h4 class="mt-4 mb-3 d-flex full-width ff-old-standart">{{ $newsLanding['title'] }}</h4>
                                <div class="news_intro">
                                    
                                        {!! $newsLanding['content'] !!}
                                    
                                </div>
                                
                                
                                <p class="mt-5 ff-old-standart">
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
$(document).ready(function() {
    
    let paramSelected = ''
    let filterSelected = 'desc'
    let param = location.search

    if(param !== '') {
        paramSelected = param.split('=')

        if(paramSelected.length == 2) {
            filterSelected = paramSelected[1]
        }
    }
    $('#filter_order').val(filterSelected)
    
})
function orderNews() {

    let value = $('#filter_order').val();
    // console.log(window.location)
    let url = window.location.origin+window.location.pathname+'?order_type='+value
    location.href = url
}
</script>

@stop