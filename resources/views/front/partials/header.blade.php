<!-- navbar-->
<header class="header">
    <nav class="navbar navbar-expand-lg">
    
        <div class="container-fluid">
            <div class="navbar-holder nav-language d-flex align-items-center justify-content-between">
                <ul class="desktop_only nav-menu list-unstyled flow-root flex-md-row align-items-md-center">
                    <!-- Languages dropdown    -->
                    <li class="nav-item dropdown right">
                        <a id="languages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link language dropdown-toggle">
                        @if (LaravelLocalization::getCurrentLocale() == 'en')    
                        <img src="{{ asset('images/flags/GB.png') }}" alt="{{ current(explode(' ', LaravelLocalization::getCurrentLocaleNative())) }}">
                        @else
                        <img src="{{ asset('images/flags/ID.png') }}" alt="{{ current(explode(' ', LaravelLocalization::getCurrentLocaleNative())) }}">
                        @endif
                        
                        <span class="d-none d-sm-inline-block">
                            {{ current(explode(' ', LaravelLocalization::getCurrentLocaleNative())) }}
                            </span>
                        </a>
                        <ul aria-labelledby="languages" class="dropdown-menu">
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $language)
                                <li>
                                    <a rel="nofollow" class="dropdown-item" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                        @if ($localeCode == 'en')
                                            <img src="{{ asset('images/flags/GB.png') }}" alt="{{ current(explode(' ', $language['native'])) }}" class="mr-2">
                                        @else
                                            <img src="{{ asset('images/flags/ID.png') }}" alt="{{ current(explode(' ', $language['native'])) }}" class="mr-2">
                                        @endif
                                        {{ current(explode(' ', $language['native'])) }}
                                    </a>
                                </li>

                            
                            @endforeach
                        </ul>
                    </li>
                    
                </ul>
            </div>
            <!-- <div class="row"> -->
                <!-- <div class="col-md-3"> -->
                    <div class="d-flex navbar-brand">
                        <img id="logo-images" class="logo" src="{{ asset('images/logo_header.png') }}">
                    </div>
                <!-- </div> -->
                    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                        <i class="fas fa-bars"></i>
                    </button>
                <!-- <div class="col-md-9"> -->
                    
                    <!--  -->
                        
                    <!--  -->
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <div class="form-search-icon-m">
                                <input type="text" class="form-search" placeholder="Cari" />
                                    <img src="{{ asset('images/search_icon.png') }}" />
                                </div>
                            </li>
                            <li class="nav-item"><a class="nav-link link-scroll" href="{{ route('frontHome') }}">Beranda </a></li>
                            <li class="nav-item"><a class="nav-link link-scroll" href="{{ route('frontAbout') }}">Tentang SeCan</a></li>
                            <li class="nav-item"><a class="nav-link link-scroll" href="{{ route('frontNews') }}">Artikel</a></li>
                            <li class="nav-item"><a class="nav-link link-scroll" href="{{ route('frontDoctor') }}">Dokter</a></li>
                            <li class="nav-item"><a class="nav-link link-scroll" href="{{ route('frontVideo') }}">Video</a></li>
                            <li class="nav-item"><a class="nav-link link-scroll" href="#contact">Kontak<span
                                class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <div class="form-search-icon">
                                <input type="text" class="form-search" placeholder="Cari" />
                                    <img src="{{ asset('images/search_icon.png') }}" />
                                </div>
                            </li>
                        </ul>
                    </div>
                <!-- </div> -->
            <!-- </div> -->
        </div>
    </nav>
</header>