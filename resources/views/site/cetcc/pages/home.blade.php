<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>
    {{-- @extends('site.cetcc.layout.layout')
    @section('title', 'Home')
    @section('content')
        @include('site.cetcc.components.carrossel')
        @include('site.cetcc.components.features', [ 'features' => $features ])
        @include('site.cetcc.components.categories_courses', [ 'categoriesCourseType' => $categoriesCourseType ])
        @if (isset($contentsSection[3]))
            @include('site.cetcc.components.home_about', $contentsSection[3]->content[0] )
        @endif
        @include('site.cetcc.components.gallery_couse', [ 'courseCategories' => $courseCategories ])

        @include('site.cetcc.components.course_pop', [ 'courses' => $courses ])

        @if (isset($event) && !empty($event))
            @include('site.cetcc.components.home_about', $event)
        @endif

        @include('site.cetcc.components.news_blog', [ 'blogPosts' => $blogPosts ])

        @include('site.cetcc.components.short_info', [ 'contentsSection' => $contentsSection[1] ])

        @include('site.cetcc.components.testemunial', [ 'testemonial' => $testemonial ])

        <div class="clearfix" style="background-color: #27F0FF; color: #022138; padding: 15px 0; text-align: center;">
            <div class="container">
                @include('site.cetcc.components.newsletter')
            </div>
        </div>

    @endsection

    @section('scripts')
        @parent

        <!-- SPECIFIC SCRIPTS -->
        <script src="{!! asset('cetcc/layerslider/js/greensock.js') !!}"></script>
        <script src="{!! asset('cetcc/layerslider/js/layerslider.transitions.js') !!}"></script>
        <script src="{!! asset('cetcc/layerslider/js/layerslider.kreaturamedia.jquery.js') !!}"></script>
        <script type="text/javascript">
            'use strict';
            $('#layerslider').layerSlider({
                autoStart: true,
                navButtons: false,
                navStartStop: false,
                showCircleTimer: false,
                responsive: true,
                // responsiveUnder: 1280,
                responsiveUnder: 430,
                layersContainer: 1200,
                skinsPath: '/cetcc/layerslider/skins/'
                // Please make sure that you didn't forget to add a comma to the line endings
                // except the last line!
            });
            $(document).ready(function() {
                $("#reccomended").owlCarousel({});
            });
        </script>
        <!-- comentario -->

    @endsection --}}

    <title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="{{ url ('assets/images/site/LogoMini Negativo Roxo.png')}}" type="image/x-icon">
    <link rel="stylesheet" type="text/css"
        href="//fonts.googleapis.com/css?family=Poppins:300,400,500,600,700%7CLato%7CKalam:300,400,700">
    <link rel="stylesheet" href="{{ url('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/fonts.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}">

    <link rel="stylesheet" href="{{ url('assets/fonts.css') }}">
    <link rel="stylesheet" href="{{ url('assets/images.css') }}">
    <link rel="stylesheet" href="{{ url('assets/js.css') }}">
    <style>
        .ie-panel {
            display: none;
            background: #212121;
            padding: 10px 0;
            box-shadow: 3px 3px 5px 0 rgba(0, 0, 0, .3);
            clear: both;
            text-align: center;
            position: relative;
            z-index: 1;
        }

        html.ie-10 .ie-panel,
        html.lt-ie-10 .ie-panel {
            display: block;
        }

    </style>
</head>

<body>
    <div class="ie-panel">
        <a href="http://windows.microsoft.com/en-US/internet-explorer/"><img
                src="images/ie8-panel/warning_bar_0000_us.jpg" height="42" width="820"
                alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a>
    </div>
    <div class="preloader">
        <div class="preloader-body">
            <div class="cssload-bell">
                <div class="cssload-circle">
                    <div class="cssload-inner"></div>
                </div>
                <div class="cssload-circle">
                    <div class="cssload-inner"></div>
                </div>
                <div class="cssload-circle">
                    <div class="cssload-inner"></div>
                </div>
                <div class="cssload-circle">
                    <div class="cssload-inner"></div>
                </div>
                <div class="cssload-circle">
                    <div class="cssload-inner"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="page">
        <!-- Page Header-->
        <header class="section page-header header-creative-wrap context-dark">
            <!-- RD Navbar-->
            <div class="rd-navbar-wrap">
                <nav class="rd-navbar rd-navbar-creative rd-navbar-creative-2" data-layout="rd-navbar-fixed"
                    data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed"
                    data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static"
                    data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static"
                    data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static"
                    data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="100px"
                    data-xl-stick-up-offset="112px" data-xxl-stick-up-offset="132px" data-lg-stick-up="true"
                    data-xl-stick-up="true" data-xxl-stick-up="true">
                    <div class="rd-navbar-collapse-toggle rd-navbar-fixed-element-1"
                        data-rd-navbar-toggle=".rd-navbar-collapse"><span></span></div>
                    <div class="rd-navbar-aside-outer">
                        <div class="rd-navbar-aside">
                            <div class="rd-navbar-collapse">
                                <ul class="contacts-classic">
                                    <li><span class="contacts-classic-title"></span>
                                        <a href="tel:#"></a>
                                    </li>
                                    <li>
                                        <a href="mailto:#"></a>
                                    </li>
                                </ul><a class="rd-navbar-basket rd-navbar-basket-mobile fl-bigmug-line-shopping202"
                                    href="#"><span></span></a>
                            </div>
                            <!-- RD Navbar Panel-->
                            <div class="rd-navbar-panel">
                                <!-- RD Navbar Toggle-->
                                <button class="rd-navbar-toggle"
                                    data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                                <!-- RD Navbar Brand-->
                                <div class="rd-navbar-brand">
                                    <!--Brand-->
                                    <a class="brand" href="index.html"><img class="brand-logo-light"
                                            src="{{ url ('assets/images/site/Logo H Negativo Roxo.png')}}"
                                            alt="" /></a>
                                    <!-- <img class="brand-logo-dark" src="images/site/Logo_estilizado.png" alt="" width="157" height="35" /> -->
                                </div>
                            </div>
                            <div class="rd-navbar-aside-element">
                                <!-- RD Navbar Search-->
                                <div class="rd-navbar-search rd-navbar-search-2">
                                    <button class="rd-navbar-search-toggle rd-navbar-fixed-element-3"
                                        data-rd-navbar-toggle=".rd-navbar-search"><span></span></button>
                                    <form class="rd-search" action="search-results.html"
                                        data-search-live="rd-search-results-live" method="GET">
                                        <div class="form-wrap">
                                            <input class="rd-navbar-search-form-input form-input"
                                                id="rd-navbar-search-form-input" type="text" name="s"
                                                autocomplete="off" />
                                            <label class="form-label"
                                                for="rd-navbar-search-form-input">Search...</label>
                                            <div class="rd-search-results-live" id="rd-search-results-live"></div>
                                            <button class="rd-search-form-submit fl-bigmug-line-search74"
                                                type="submit"></button>
                                        </div>
                                    </form>
                                </div>
                                <!-- RD Navbar Basket-->
                                <div class="rd-navbar-basket-wrap">
                                    <button class="rd-navbar-basket fl-bigmug-line-shopping202"
                                        data-rd-navbar-toggle=".cart-inline"><span>2</span></button>
                                    <div class="cart-inline">
                                        <div class="cart-inline-header">
                                            <h5 class="cart-inline-title">In cart:<span> 2</span> Products</h5>
                                            <h6 class="cart-inline-title">Total price:<span> $42</span></h6>
                                        </div>
                                        <div class="cart-inline-body">
                                            <div class="cart-inline-item">
                                                <div class="unit unit-spacing-sm align-items-center">
                                                    <div class="unit-left">
                                                        <a class="cart-inline-figure" href="single-product.html"><img
                                                                src="{{ url('assets/images/product-mini-1-106x104.jpg') }}"
                                                                alt="" width="106" height="104" /></a>
                                                    </div>
                                                    <div class="unit-body">
                                                        <h6 class="cart-inline-name"><a
                                                                href="single-product.html">Forest Berry</a></h6>
                                                        <div>
                                                            <div class="group-xs group-middle">
                                                                <div class="table-cart-stepper">
                                                                    <input class="form-input" type="number"
                                                                        data-zeros="true" value="1" min="1"
                                                                        max="1000" />
                                                                </div>
                                                                <h6 class="cart-inline-title">$18.00</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cart-inline-item">
                                                <div class="unit unit-spacing-sm align-items-center">
                                                    <div class="unit-left">
                                                        <a class="cart-inline-figure" href="single-product.html"><img
                                                                src="{{ url('assets/images/product-mini-2-106x104.jpg') }}"
                                                                alt="" width="106" height="104" /></a>
                                                    </div>
                                                    <div class="unit-body">
                                                        <h6 class="cart-inline-name"><a
                                                                href="single-product.html">Carrots</a></h6>
                                                        <div>
                                                            <div class="group-xs group-middle">
                                                                <div class="table-cart-stepper">
                                                                    <input class="form-input" type="number"
                                                                        data-zeros="true" value="1" min="1"
                                                                        max="1000" />
                                                                </div>
                                                                <h6 class="cart-inline-title">$24.00</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cart-inline-footer">
                                            <div class="group-sm"><a
                                                    class="button button-default-outline-2 button-zakaria" href="#">Go
                                                    to cart</a><a class="button button-primary button-zakaria"
                                                    href="#">Checkout</a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="rd-navbar-fixed-element-2 select-inline"><a class="rd-nav-link"
                                        href="login.html">Login</a>
                                    <!-- <select data-dropdown-class="select-inline-dropdown">
                      <option value="en">en</option>
                      <option value="fr">fr</option>
                      <option value="es">es</option>
                    </select> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="rd-navbar-main-outer">
                        <div class="rd-navbar-main">
                            <div class="rd-navbar-nav-wrap">
                                <ul class="rd-navbar-nav">
                                    <li class="rd-nav-item active"><a class="rd-nav-link" href="index.html">Home</a>
                                    </li>
                                    <!-- <li class="rd-nav-item"><a class="rd-nav-link" href="#">Pages</a>
                                        <ul class="rd-menu rd-navbar-dropdown">
                                            <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="what-we-offer.html">What We Offer</a>
                                            </li>
                                            <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="our-team.html">Our Team</a>
                                            </li>
                                            <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="404-page.html">404 Page</a>
                                            </li>
                                            <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="coming-soon.html">Coming Soon</a>
                                            </li>
                                            <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="search-results.html">Search Results</a>
                                            </li>
                                        </ul>
                                    </li> -->
                                    <li class="rd-nav-item"><a class="rd-nav-link">Blog</a>
                                        <ul class="rd-menu rd-navbar-dropdown">
                                            <li class="rd-dropdown-item"><a class="rd-dropdown-link"
                                                    href="{{ url ('.. /pages/blog_post')}}">Blog Post</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="rd-nav-item"><a class="rd-nav-link"
                                            href="grid-gallery.html" >Galeria</a>
                                    </li>
                                    <li class="rd-nav-item"><a class="rd-nav-link"
                                            href="grid-shop.html" >ShopBox</a>
                                        <ul class="rd-menu rd-navbar-dropdown">
                                            <li class="rd-dropdown-item"><a class="rd-dropdown-link"
                                                    href="grid-shop.html">Box avulso</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="rd-nav-item"><a class="rd-nav-link" href="about-us.html">Sobre
                                            nós</a>
                                    </li>
                                    <li class="rd-nav-item"><a class="rd-nav-link"
                                            href="contact-us.html">Contato</a>
                                    </li>
                                    <li class="rd-nav-item"><a class="rd-nav-link"
                                            href="privacy-policy.html">Termos e Condições</a>
                                    </li>
                                    <li class="rd-nav-item"><a class="rd-nav-link" href="pricing-list.html"
                                            target="blank" style="color: #552b79;">Assinar</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <!-- Swiper-->
        <section class="section swiper-container swiper-slider swiper-slider-4" data-loop="true">
            <div class="swiper-wrapper context-dark">
                <div class="swiper-slide swiper-slide-1" data-slide-bg="{{ url ('assets/images/site/banner_bookbox.png')}}">
                    <div class="swiper-slide-caption section-md text-sm-left">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-8 col-md-7">
                                    <h2 class="swiper-title-1" data-caption-animate="fadeInLeft"
                                        data-caption-delay="100"> <br>
                                    </h2>
                                    <h5 class="swiper-title-2 text-width-medium" data-caption-animate="fadeInLeft"
                                        data-caption-delay="250"></h5>
                                    <div class="button-wrap" data-caption-animate="fadeInLeft"
                                        data-caption-delay="400"><a
                                            class="button button-lg button-shadow-4 button-secondary-2 button-zakaria"
                                            href="grid-shop.html">Assine</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide swiper-slide-2" data-slide-bg="{{ url ('assets/images/site/banner_bookbox.png')}}">
                    <div class="swiper-slide-caption section-md text-center">
                        <div class="container">
                            <h2 class="swiper-title-1" data-caption-animate="fadeInLeft" data-caption-delay="100"></h2>
                            <h5 class="swiper-title-2" data-caption-animate="fadeInRight" data-caption-delay="250"><br
                                    class="d-none d-md-block">
                            </h5>
                            <div class="button-wrap" data-caption-animate="fadeInUp" data-caption-delay="400"><a
                                    class="button button-lg button-shadow-4 button-secondary-2 button-zakaria"
                                    href="grid-shop.html">Assine</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Swiper Pagination-->
            <div class="swiper-pagination"></div>
            <!-- Swiper Navigation-->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </section>
        <!-- Services-->
        <section class="section section-xxl bg-image-1">
            <div class="container">
                <div class="row row-xl row-30 row-md-40 row-lg-50 align-items-center">
                    <div class="col-md-5 col-xl-4">
                        <div class="row row-30 row-md-40 row-lg-50 bordered-2">
                            <div class="col-sm-6 col-md-12">
                                <article
                                    class="box-icon-classic box-icon-nancy-right text-center text-lg-right wow fadeInLeft">
                                    <div class="unit flex-column flex-lg-row-reverse">
                                        <img src="{{ url ('assets/images/site/saudeFisica.png')}}"  width="120px" alt="" class="">
                                        <div class="unit-body">
                                            <h4 class="box-icon-classic-title"><a href="#">Saúde Física</a></h4>
                                            <p class="box-icon-classic-text">Escrito por médicos, especialistas e profissionais que têm experiências para compartilhar.</p>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <div class="col-sm-6 col-md-12">
                                <article
                                    class="box-icon-classic box-icon-nancy-right text-center text-lg-right wow fadeInLeft"
                                    data-wow-delay=".1s">
                                    <div class="unit flex-column flex-lg-row-reverse">
                                        <img src="{{ url ('assets/images/site/saudeMetal.png')}}"  width="120px" alt="" class="">
                                        <div class="unit-body">
                                            <h4 class="box-icon-classic-title"><a href="#">Saúde Mental</a></h4>
                                            <p class="box-icon-classic-text">Escrito por psiccólogos, psiquiatras e profissionais que tem muito para contribuir.</p>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-xl-4 d-none d-md-block wow fadeScale"><img
                            src="{{ url('assets/images/site/01.png') }}" alt="" width="400" height="600" />
                    </div>
                    <div class="col-md-5 col-xl-4">
                        <div class="row row-30 row-md-40 row-lg-50 bordered-2">
                            <div class="col-sm-6 col-md-12">
                                <article
                                    class="box-icon-classic box-icon-nancy-left text-center text-lg-left wow fadeInRigth" style="margin-top: 70px;">
                                    <div class="unit flex-column flex-lg-row">
                                        <img src="{{ url ('assets/images/site/saudeEspiritual.png')}}"  width="115px;" height="150px;" alt="" class="">
                                        <div class="unit-body">
                                            <h4 class="box-icon-classic-title"><a href="#"> Saúde espiritual</a></h4>
                                            <p class="box-icon-classic-text">Escrito por naturopatas, coaches e profissionais focados em alta performance com equilíbrio.</p>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <div class="col-sm-6 col-md-12">
                                <article
                                    class="box-icon-classic box-icon-nancy-left text-center text-lg-left wow fadeInRight"
                                    data-wow-delay=".1s">
                                    <div class="unit flex-column flex-lg-row">
                                        <img src="{{ url ('assets/images/site/saudeFinanceira.png')}}" style="width: 115px; height: 120px;"  alt="" class="">
                                        <div class="unit-body">
                                            <h4 class="box-icon-classic-title"><a href="#">Saúde Financeira</a></h4>
                                            <p class="box-icon-classic-text">Escrito por consultores, administradores de empresaas, advogados e gestores focados no sucesso e na liberdade financeira.</p>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- New Flavors-->
        <section class="section section-xxl bg-default">
            <div class="container">
                <h3 class="text-transform-capitalize wow fadeScale">Você merece una vida plena</h3>
                <h5 class="">Escolha o plano ideal</h5>
                <div class="row row-lg row-30 row-lg-50">
                    <div class="col-sm-6 col-md-4 col-lg-4">
                        <!-- Product-->
                        <article class="product wow fadeInRight">
                            <div class="product-body">
                                <img src="{{ url('assets/images/site/LogoMini Estilizada.png') }}" alt="" class="" style="width: 250px; margin-top: 16px;">
                                <h3 class="product-title" style="margin-top: 15px;"><a href="single-product.html">eBook</a></h3>
                                <div class="product-price-wrap">
                                    {{-- <div class="product-price product-price-old">R$30.00</div> --}}
                                    <div class="product-price" style="margin-bottom: 15px;"><h6 class="">R$ 39.90/mês</h6></div>
                                    <div class="product-price">Receba um link para download em seu</div>
                                    <div class="product-price"> e-mail.</div>
                                </div>
                                <div class="" style="margin-top: 15px;">
                                    <p class="">- Sem fidelidade: você pode cancelar sem multa.</p>
                                    <p class="">- Boleto bancário ou cartão de crédito.</p>
                                    <p class="">- Receba a versão digital dos dois livros, esta oção não contempla os brindes.</p>
                                </div>
                            </div><span class="product-badge product-badge-new">Novo</span>
                            <div class="product-button-wrap" style="margin-top: 50px;">
                                {{-- <div class="product-button">
                                    <a class="button button-secondary button-zakaria fl-bigmug-line-search74"
                                        href="single-product.html"></a>
                                </div> --}}
                                {{-- <div class="product-button">
                                    <a class="button button-primary button-zakaria fl-bigmug-line-shopping202"
                                        href="grid-shop.html"> Assine </a>
                                    </div> --}}
                                    <div class="button-wrap" data-caption-animate="fadeInUp" data-caption-delay="400"><a
                                        class="button button-lg button-shadow-4 button-secondary-2 button-zakaria"
                                        href="grid-shop.html">Assine Agora</a></div>
                            </div>
                        </article>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-4">
                        <!-- Product-->
                        <article class="product wow fadeInRight">
                            <div class="product-body">
                                <img src="{{ url('assets/images/site/01.png') }}" alt="" class="">
                                <h3 class="product-title" style="margin-top: 15px;"><a href="single-product.html">Anual</a></h3>
                                <div class="product-price-wrap">
                                    {{-- <div class="product-price product-price-old">R$30.00</div> --}}
                                    <div class="product-price" style="margin-bottom: 15px;"><h6 class="">R$ 76.90/mês</h6></div>
                                    <div class="product-price">Receba o seu box em casa.</div>
                                </div>
                                <div class="" style="margin-top: 15px;">
                                    <p class="">- Com fidelidade: 12 meses.</p>
                                    <p class="">- Cartão de crédito.</p>
                                </div>
                            </div><span class="product-badge product-badge-sale">Box</span>
                            <div class="product-button-wrap" style="margin-top: 50px;">
                                {{-- <div class="product-button">
                                    <a class="button button-secondary button-zakaria fl-bigmug-line-search74"
                                        href="single-product.html"></a>
                                </div> --}}
                                {{-- <div class="product-button">
                                    <a class="button button-primary button-zakaria fl-bigmug-line-shopping202"
                                        href="grid-shop.html"> Assine </a>
                                    </div> --}}
                                    <div class="button-wrap" data-caption-animate="fadeInUp" data-caption-delay="400"><a
                                        class="button button-lg button-shadow-4 button-secondary-2 button-zakaria"
                                        href="grid-shop.html">Assine Agora</a></div>
                            </div>
                        </article>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-4">
                        <!-- Product-->
                        <article class="product wow fadeInRight">
                            <div class="product-body">
                                <img src="{{ url('assets/images/site/01.png') }}" alt="" class="">
                                <h3 class="product-title" style="margin-top: 15px;"><a href="single-product.html">Semestral</a></h3>
                                <div class="product-price-wrap">
                                    {{-- <div class="product-price product-price-old">R$30.00</div> --}}
                                    <div class="product-price" style="margin-bottom: 15px;"><h6 class="">R$ 79.90/mês</h6></div>
                                    <div class="product-price">Receba o seu box em casa.</div>
                                </div>
                                <div class="" style="margin-top: 15px;">
                                    <p class="">- Com fidelidade: 6 meses.</p>
                                    <p class="">- Cartão de crédito.</p>
                                </div>
                            </div><span class="product-badge product-badge-sale">Box</span>
                            <div class="product-button-wrap" style="margin-top: 50px;">
                                {{-- <div class="product-button">
                                    <a class="button button-secondary button-zakaria fl-bigmug-line-search74"
                                        href="single-product.html"></a>
                                </div> --}}
                                {{-- <div class="product-button">
                                    <a class="button button-primary button-zakaria fl-bigmug-line-shopping202"
                                        href="grid-shop.html"> Assine </a>
                                    </div> --}}
                                    <div class="button-wrap" data-caption-animate="fadeInUp" data-caption-delay="400"><a
                                        class="button button-lg button-shadow-4 button-secondary-2 button-zakaria"
                                        href="grid-shop.html">Assine Agora</a></div>
                            </div>
                        </article>
                    </div>
                    {{-- <div class="col-sm-6 col-md-4 col-lg-3">
                        <!-- Product-->
                        <article class="product wow fadeInLeft" data-wow-delay=".3s">
                            <div class="product-body">
                                <div class="product-figure"><img
                                        src="{{ url('assest/images/product-4-95x175.png') }}" alt="" width="95"
                                        height="175" />
                                </div>
                                <h5 class="product-title"><a href="single-product.html">Guava</a></h5>
                                <div class="product-price-wrap">
                                    <div class="product-price">$12.00</div>
                                </div>
                            </div><span class="product-badge product-badge-new">New</span>
                            <div class="product-button-wrap">
                                <div class="product-button">
                                    <a class="button button-secondary button-zakaria fl-bigmug-line-search74"
                                        href="single-product.html"></a>
                                </div>
                                <div class="product-button">
                                    <a class="button button-primary button-zakaria fl-bigmug-line-shopping202"
                                        href="#"></a>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <!-- Product-->
                        <article class="product wow fadeInLeft" data-wow-delay=".2s">
                            <div class="product-body">
                                <div class="product-figure"><img
                                        src="{{ url('assets/images/product-5-95x175.png') }}" alt="" width="95"
                                        height="175" />
                                </div>
                                <h5 class="product-title"><a href="single-product.html">Grapes</a></h5>
                                <div class="product-price-wrap">
                                    <div class="product-price">$11.00</div>
                                </div>
                            </div><span class="product-badge product-badge-new">New</span>
                            <div class="product-button-wrap">
                                <div class="product-button">
                                    <a class="button button-secondary button-zakaria fl-bigmug-line-search74"
                                        href="single-product.html"></a>
                                </div>
                                <div class="product-button">
                                    <a class="button button-primary button-zakaria fl-bigmug-line-shopping202"
                                        href="#"></a>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <!-- Product-->
                        <article class="product wow fadeInLeft" data-wow-delay=".1s">
                            <div class="product-body">
                                <div class="product-figure"><img
                                        src="{{ url('assets/images/product-6-95x175.png') }}" alt="" width="95"
                                        height="175" />
                                </div>
                                <h5 class="product-title"><a href="single-product.html">Bananas</a></h5>
                                <div class="product-price-wrap">
                                    <div class="product-price">$15.99</div>
                                </div>
                            </div>
                            <div class="product-button-wrap">
                                <div class="product-button">
                                    <a class="button button-secondary button-zakaria fl-bigmug-line-search74"
                                        href="single-product.html"></a>
                                </div>
                                <div class="product-button">
                                    <a class="button button-primary button-zakaria fl-bigmug-line-shopping202"
                                        href="#"></a>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <!-- Product-->
                        <article class="product wow fadeInRight" data-wow-delay=".3s">
                            <div class="product-body">
                                <div class="product-figure"><img
                                        src="{{ url('assets/images/product-7-95x175.png') }}" alt="" width="95"
                                        height="175" />
                                </div>
                                <h5 class="product-title"><a href="single-product.html">Carrots</a></h5>
                                <div class="product-price-wrap">
                                    <div class="product-price product-price-old">$33.00</div>
                                    <div class="product-price">$24.00</div>
                                </div>
                            </div><span class="product-badge product-badge-sale">Sale</span>
                            <div class="product-button-wrap">
                                <div class="product-button">
                                    <a class="button button-secondary button-zakaria fl-bigmug-line-search74"
                                        href="single-product.html"></a>
                                </div>
                                <div class="product-button">
                                    <a class="button button-primary button-zakaria fl-bigmug-line-shopping202"
                                        href="#"></a>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <!-- Product-->
                        <article class="product wow fadeInLeft">
                            <div class="product-body">
                                <div class="product-figure"><img
                                        src="{{ url('assets/images/product-8-95x175.png') }}" alt="" width="95"
                                        height="175" />
                                </div>
                                <h5 class="product-title"><a href="single-product.html">Orange</a></h5>
                                <div class="product-price-wrap">
                                    <div class="product-price">$14.99</div>
                                </div>
                            </div>
                            <div class="product-button-wrap">
                                <div class="product-button">
                                    <a class="button button-secondary button-zakaria fl-bigmug-line-search74"
                                        href="single-product.html"></a>
                                </div>
                                <div class="product-button">
                                    <a class="button button-primary button-zakaria fl-bigmug-line-shopping202"
                                        href="#"></a>
                                </div>
                            </div>
                        </article>
                    </div> --}}
                </div>
                <h4 class="text-transform-none wow fadeScale" style="margin-top: 65px; color: #97cd9b;">Transformações de impacto no seu dia a dia.</h4>
                <h4 class="text-transform-none wow fadeScale" style="color: #97cd9b;">Sua felicidade depende da sua saúde e vitalidade.</h4>
                <div class="button-wrap" data-caption-animate="fadeInUp" data-caption-delay="400"><a
                    class="button button-lg button-shadow-4 button-secondary-2 button-zakaria"
                    href="grid-shop.html">Experimente adquirir o Box Avulso</a></div>
            </div>
        </section>
        <!-- Counter Modern-->
        <section class="section section-xxl bg-image-1">
            <div class="container">
                <div class="banner">
                    <h3 class="text-transform-none wow fadeScale">O que vem no seu box</h3>
                    <img  src="{{ url ('assets/images/site/bannerBox.webp')}}" alt="" class="">
                </div>
            </div>
        </section>
        {{-- <section class="container" data-img="{{ url ('assets/images/site/bannerBox.webp')}}">
            <div class="parallax-content section-xxl context-dark">
                <div class="container">
                    <div class="row row-30 justify-content-center">
                        <div class="col-6 col-sm-3">
                            <div class="counter-modern">
                                <h2 class="counter-modern-number"><span class="counter">245</span>
                                </h2>
                                <div class="counter-modern-decor"></div>
                                <h5 class="counter-modern-title">New drinks and<br class="d-none d-sm-block">
                                    smoothies</h5>
                            </div>
                        </div>
                        <div class="col-6 col-sm-3">
                            <div class="counter-modern">
                                <h2 class="counter-modern-number"><span class="counter">182</span>
                                </h2>
                                <div class="counter-modern-decor"></div>
                                <h5 class="counter-modern-title">Special<br class="d-none d-sm-block"> offers</h5>
                            </div>
                        </div>
                        <div class="col-6 col-sm-3">
                            <div class="counter-modern">
                                <h2 class="counter-modern-number"><span class="counter">1267</span>
                                </h2>
                                <div class="counter-modern-decor"></div>
                                <h5 class="counter-modern-title">Satisfied<br class="d-none d-sm-block"> clients</h5>
                            </div>
                        </div>
                        <div class="col-6 col-sm-3">
                            <div class="counter-modern">
                                <h2 class="counter-modern-number"><span class="counter">47</span>
                                </h2>
                                <div class="counter-modern-decor"></div>
                                <h5 class="counter-modern-title">Partners throughout<br class="d-none d-sm-block"> the
                                    USA</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- Section Product and Clients-->
        <section class="section section-xxl bg-default text-md-left">
            <div class="container">
                <div class="row row-30 row-md-60 row-lg-70 justify-content-center align-items-md-center">
                    <div class="col-sm-8 col-md-5 col-xl-6">
                        <div class="inset-xl-right-20">
                            <div class="product-wrap-1 bg-image-1 block-1">
                                <!-- Owl Carousel-->
                                <div class="owl-carousel owl-style-5" data-items="1" data-margin="30" data-dots="true"
                                    data-autoplay="true">
                                    <article class="product-creative">
                                        <div class="product-figure"><img
                                            src="{{ url('assets/images/site/LogoMini Estilizada.png') }}" alt="" class=""
                                                width="470" height="324" />
                                        </div>
                                        <h4 class="product-creative-title"><a href="single-product.html">eBook</a></h4>
                                        <div class="product-creative-price-wrap">
                                            {{-- <div class="product-creative-price product-creative-price-old">$20.00</div> --}}
                                            <div class="product-creative-price">R$39.90/mês</div>
                                        </div>
                                    </article>
                                    <article class="product-creative">
                                        <div class="product-figure"><img
                                            src="{{ url('assets/images/site/01.png') }}" alt=""
                                                width="470" height="324" />
                                        </div>
                                        <h4 class="product-creative-title"><a href="single-product.html">Anual</a></h4>
                                        <div class="product-creative-price-wrap">
                                            <div class="product-creative-price">R$76.90</div>
                                        </div>
                                    </article>
                                    <article class="product-creative">
                                        <div class="product-figure"><img
                                            src="{{ url('assets/images/site/01.png') }}" alt=""
                                                width="470" height="324" />
                                        </div>
                                        <h4 class="product-creative-title"><a href="single-product.html">Semestral</a></h4>
                                        <div class="product-creative-price-wrap">
                                            <div class="product-creative-price">R$79.90</div>
                                        </div>
                                    </article>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 col-xl-6">
                        <h3 class="text-transform-none wow text-align-center">Para quem são os box?</h3>
                        <!-- Bootstrap collapse-->
                        <div class="card-group-custom card-group-corporate" id="accordion1" role="tablist"
                            aria-multiselectable="false">
                            <!-- Bootstrap card-->
                            <article class="card card-custom card-corporate wow fadeInRight" data-wow-delay=".1s">
                                <div class="card-header" role="tab">
                                    <div class="card-title"><a id="accordion1-card-head-qteehppu"
                                            data-toggle="collapse" data-parent="#accordion1"
                                            href="#accordion1-card-body-unqfdlnh"
                                            aria-controls="accordion1-card-body-unqfdlnh" aria-expanded="true"
                                            role="button">Pessoas determinadas.
                                            <div class="card-arrow">
                                                <div class="icon"></div>
                                            </div>
                                        </a></div>
                                </div>
                                <div class="collapse show" id="accordion1-card-body-unqfdlnh"
                                    aria-labelledby="accordion1-card-head-qteehppu" data-parent="#accordion1"
                                    role="tabpanel">
                                    <div class="card-body">
                                        <p>Para todas as pessoas que desejam ter mais saude e uma vida equilibrada, aprendendo a organizar seus pilares e seu dia a dia.</p>
                                    </div>
                                </div>
                            </article>
                            <!-- Bootstrap card-->
                            <article class="card card-custom card-corporate wow fadeInRight" data-wow-delay=".2s">
                                <div class="card-header" role="tab">
                                    <div class="card-title"><a class="collapsed"
                                            id="accordion1-card-head-iebkfbxx" data-toggle="collapse"
                                            data-parent="#accordion1" href="#accordion1-card-body-eephkkca"
                                            aria-controls="accordion1-card-body-eephkkca" aria-expanded="false"
                                            role="button">Profissionais da saúde.
                                            <div class="card-arrow">
                                                <div class="icon"></div>
                                            </div>
                                        </a></div>
                                </div>
                                <div class="collapse" id="accordion1-card-body-eephkkca"
                                    aria-labelledby="accordion1-card-head-iebkfbxx" data-parent="#accordion1"
                                    role="tabpanel">
                                    <div class="card-body">
                                        <p>Para os profissionais que desejam potencializar os resultados de seus serviços de forma descomplicada e acessível. É como se fosse um curso novo todo mês na sua casa.</p>
                                    </div>
                                </div>
                            </article>
                            <!-- Bootstrap card-->
                            <article class="card card-custom card-corporate wow fadeInRight" data-wow-delay=".3s">
                                <div class="card-header" role="tab">
                                    <div class="card-title"><a class="collapsed"
                                            id="accordion1-card-head-crpnkjpm" data-toggle="collapse"
                                            data-parent="#accordion1" href="#accordion1-card-body-qbvvnoxx"
                                            aria-controls="accordion1-card-body-qbvvnoxx" aria-expanded="false"
                                            role="button">Pessoas que querem viver bem todos os dias.
                                            <div class="card-arrow">
                                                <div class="icon"></div>
                                            </div>
                                        </a></div>
                                </div>
                                <div class="collapse" id="accordion1-card-body-qbvvnoxx"
                                    aria-labelledby="accordion1-card-head-crpnkjpm" data-parent="#accordion1"
                                    role="tabpanel">
                                    <div class="card-body">
                                        <p>Para as pessoas que procuram um estilo e modo de vida saudáveis, em armonía com as energías terrenas e espirituais.
                                        </p>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <h4 class="text-transform-none wow" style="text-align: center;">Como funciona?</h4>
                        <div class="row row-30">
                            <div class="col-sm-6 col-lg-6 wow fadeInLeft" data-wow-delay=".2s">
                                <article class="box-icon-creative">
                                    <div
                                        class="unit flex-column flex-md-row flex-lg-column flex-xl-row align-items-md-center align-items-lg-start align-items-xl-center">
                                        <div class="unit-left">
                                            <div class="box-icon-creative-icon fl-bigmug-line-big104"></div>
                                        </div>
                                        <div class="unit-body">
                                            {{-- <h5 class="box-icon-creative-title"><a href="#">Free Shipping</a></h5> --}}
                                            <p class="box-icon-creative-text">As assinaturas são feitas até o último dia de cada mês, ou seja, para receber a caixa de março, você deve assinar até o último dia de fevereiro.</p>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <div class="col-sm-6 col-lg-6 wow fadeInLeft" data-wow-delay=".1s">
                                <article class="box-icon-creative">
                                    <div
                                        class="unit flex-column flex-md-row flex-lg-column flex-xl-row align-items-md-center align-items-lg-start align-items-xl-center">
                                        <div class="unit-left">
                                            <div class="box-icon-creative-icon fl-bigmug-line-chat55"></div>
                                        </div>
                                        <div class="unit-body">
                                            {{-- <h5 class="box-icon-creative-title"><a href="#">Customer care</a></h5> --}}
                                            <p class="box-icon-creative-text">A primeira cobrança é efetudada no dia da assinatura. A partir do mês seguinte, a cobrança será efetuada todo dia 15, e você receberá as informações dp pagamento por e-mail.</p>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <div class="banner">
                                <img  src="{{ url ('assets/images/site/linhaTempoBox.webp')}}" alt="" class="">
                            </div>
                            {{-- <div class="col-sm-6 col-lg-4 wow fadeInLeft">
                                <article class="box-icon-creative">
                                    <div
                                        class="unit flex-column flex-md-row flex-lg-column flex-xl-row align-items-md-center align-items-lg-start align-items-xl-center">
                                        <div class="unit-left">
                                            <div class="box-icon-creative-icon fl-bigmug-line-like51"></div>
                                        </div>
                                        <div class="unit-body">
                                            <h5 class="box-icon-creative-title"><a href="#">Healthy &amp; energetic</a>
                                            </h5>
                                            <p class="box-icon-creative-text">Our drinks are very nutritious.</p>
                                        </div>
                                    </div>
                                </article>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- What People Say-->
        <section class="section section-xxl bg-image-1">
            <div class="container">
                <h2 class="text-transform-capitalize wow fadeScale">Nossos Consultores</h2>
                <div class="row row-sm row-30 justify-content-center">
                    <div class="col-xl-9">
                        <div class="slick-quote">
                            <!-- Slick Carousel-->
                            <div class="slick-slider carousel-parent" id="carousel-parent" data-autoplay="true"
                                data-swipe="true" data-items="1" data-child="#child-carousel"
                                data-for="#child-carousel"  data-md-items="3"
                                data-lg-items="3" data-xl-items="3" data-xxl-items="3">
                                <div class="item">
                                    <div class="quote-minimal-figure"><img
                                            src="{{ url('assets/images/site/perfil/Ivana.png') }}" alt="" width="87"
                                            height="87" />
                                    </div>
                                    <div class="quote-minimal-author">Ivana Lavanda</div>
                                    <div class="quote-minimal-status">Nutricionista Funcional</div>
                                </div>
                                <div class="item">
                                    <div class="quote-minimal-figure"><img
                                            src="{{ url('assets/images/site/perfil/Rafael.png') }}" alt="" width="87"
                                            height="87" />
                                    </div>
                                    <div class="quote-minimal-author">Rafael Ibraim</div>
                                    <div class="quote-minimal-status">Fisioterapeuta</div>
                                </div>
                                <div class="item">
                                    <div class="quote-minimal-figure"><img
                                            src="{{ url('assets/images/site/perfil/Vanessa-Oliveira.png') }}" alt="" width="87"
                                            height="87" />
                                    </div>
                                    <div class="quote-minimal-author">Vanessa Oliveira</div>
                                    <div class="quote-minimal-status">Consultora Financeira</div>
                                </div>
                                <div class="item">
                                    <div class="quote-minimal-figure"><img
                                            src="{{ url('assets/images/site/perfil/Fernando.png') }}" alt="" width="87"
                                            height="87" />
                                    </div>
                                    <div class="quote-minimal-author">Fernando Zapparoli</div>
                                    <div class="quote-minimal-status">Uro-oncologista</div>
                                </div>
                                <div class="item">
                                    <div class="quote-minimal-figure"><img
                                            src="{{ url('assets/images/site/perfil/Lygia.png') }}" alt="" width="87"
                                            height="87" />
                                    </div>
                                    <div class="quote-minimal-author">Lygia Saad Rossi</div>
                                    <div class="quote-minimal-status">Gastróloga</div>
                                </div>
                                <div class="item">
                                    <div class="quote-minimal-figure"><img
                                            src="{{ url('assets/images/site/perfil/Ben.png') }}" alt="" width="87"
                                            height="87" />
                                    </div>
                                    <div class="quote-minimal-author">Ben Zruel</div>
                                    <div class="quote-minimal-status">Consultor Financeiro</div>
                                </div>
                                <div class="item">
                                    <div class="quote-minimal-figure"><img
                                            src="{{ url('assets/images/site/perfil/Caroline.png') }}" alt="" width="87"
                                            height="87" />
                                    </div>
                                    <div class="quote-minimal-author">Caroline Anselmi de Oliveira</div>
                                    <div class="quote-minimal-status">Odontologista</div>
                                </div>
                                <div class="item">
                                    <div class="quote-minimal-figure"><img
                                            src="{{ url('assets/images/site/perfil/Elaine.png') }}" alt="" width="87"
                                            height="87" />
                                    </div>
                                    <div class="quote-minimal-author">Elaine Quaglia</div>
                                    <div class="quote-minimal-status">Dermatologista</div>
                                </div>
                                <div class="item">
                                    <div class="quote-minimal-figure"><img
                                            src="{{ url('assets/images/site/perfil/Fernanda.png') }}" alt="" width="87"
                                            height="87" />
                                    </div>
                                    <div class="quote-minimal-author">Fernanda Bastieri</div>
                                    <div class="quote-minimal-status">Psicóloga</div>
                                </div>
                                <div class="item">
                                    <div class="quote-minimal-figure"><img
                                            src="{{ url('assets/images/site/perfil/Camila.png') }}" alt="" width="87"
                                            height="87" />
                                    </div>
                                    <div class="quote-minimal-author">Camila Ripamonte</div>
                                    <div class="quote-minimal-status">Infectologista</div>
                                </div>
                                <div class="item">
                                    <div class="quote-minimal-figure"><img
                                            src="{{ url('assets/images/site/perfil/Cristiane.png') }}" alt="" width="87"
                                            height="87" />
                                    </div>
                                    <div class="quote-minimal-author">Cristiane Ferreira</div>
                                    <div class="quote-minimal-status">Nutricionista</div>
                                </div>
                                <div class="item">
                                    <div class="quote-minimal-figure"><img
                                            src="{{ url('assets/images/site/perfil/Karla-Fabiana.png') }}" alt="" width="87"
                                            height="87" />
                                    </div>
                                    <div class="quote-minimal-author">Karla Fabiana Brasil Gomes</div>
                                    <div class="quote-minimal-status">Endocrinologista</div>
                                </div>
                                <div class="item">
                                    <div class="quote-minimal-figure"><img
                                            src="{{ url('assets/images/site/perfil/Fredy.png') }}" alt="" width="87"
                                            height="87" />
                                    </div>
                                    <div class="quote-minimal-author">Fredy Figner</div>
                                    <div class="quote-minimal-status">Psicoterapeuta e Coach</div>
                                </div>
                                <div class="item">
                                    <div class="quote-minimal-figure"><img
                                            src="{{ url('assets/images/site/perfil/Marta.png') }}" alt="" width="87"
                                            height="87" />
                                    </div>
                                    <div class="quote-minimal-author">Marta Corrêa</div>
                                    <div class="quote-minimal-status">Psicóloga</div>
                                </div>
                                <div class="item">
                                    <div class="quote-minimal-figure"><img
                                            src="{{ url('assets/images/site/perfil/Maria-Luiza.png') }}" alt="" width="87"
                                            height="87" />
                                    </div>
                                    <div class="quote-minimal-author">Maria Luiza Passaneri</div>
                                    <div class="quote-minimal-status">Farmácia e Bioquímica</div>
                                </div>
                                <div class="item">
                                    <div class="quote-minimal-figure"><img
                                            src="{{ url('assets/images/site/perfil/Maxwili.png') }}" alt="" width="87"
                                            height="87" />
                                    </div>
                                    <div class="quote-minimal-author">Maxwilli Siqueira</div>
                                    <div class="quote-minimal-status">Canal Maximize Despertar Humano</div>
                                </div>
                                <div class="item">
                                    <div class="quote-minimal-figure"><img
                                            src="{{ url('assets/images/site/perfil/Renata.png') }}" alt="" width="87"
                                            height="87" />
                                    </div>
                                    <div class="quote-minimal-author">Renata Martins</div>
                                    <div class="quote-minimal-status">Mentora de Mulheres, Coach e Head Trainer</div>
                                </div>
                                <div class="item">
                                    <div class="quote-minimal-figure"><img
                                            src="{{ url('assets/images/site/perfil/Rose.png') }}" alt="" width="87"
                                            height="87" />
                                    </div>
                                    <div class="quote-minimal-author">Rose Lourenço</div>
                                    <div class="quote-minimal-status">Meditação e Mentoria de Equilibrio</div>
                                </div>
                                <div class="item">
                                    <div class="quote-minimal-figure"><img
                                            src="{{ url('assets/images/site/perfil/Vanessa.png') }}" alt="" width="87"
                                            height="87" />
                                    </div>
                                    <div class="quote-minimal-author">Vanessa Dias</div>
                                    <div class="quote-minimal-status">Peronal Trainer</div>
                                </div>
                            </div>
                            <div class="slick-quote-nav">
                                <div class="slick-slider child-carousel" id="child-carousel" data-arrows="true"
                                    data-for="#carousel-parent" data-items="1" data-sm-items="1" data-md-items="3"
                                    data-lg-items="3" data-xl-items="3" data-xxl-items="3">
                                    {{-- <div class="item">
                                        <div class="quote-minimal-figure"><img
                                                src="{{ url('assets/images/user-7-87x87.jpg') }}" alt="" width="87"
                                                height="87" />
                                        </div>
                                        <div class="quote-minimal-author">Patrick Goodman</div>
                                        <div class="quote-minimal-status">Client</div>
                                    </div>
                                    <div class="item">
                                        <div class="quote-minimal-figure"><img
                                                src="{{ url('assets/images/user-8-87x87.jpg') }}" alt="" width="87"
                                                height="87" />
                                        </div>
                                        <div class="quote-minimal-author">Kate Smith</div>
                                        <div class="quote-minimal-status">Client</div>
                                    </div>
                                    <div class="item">
                                        <div class="quote-minimal-figure"><img
                                                src="{{ url('assets/images/user-9-87x87.jpg') }}" alt="" width="87"
                                                height="87" />
                                        </div>
                                        <div class="quote-minimal-author">Sam Wilson</div>
                                        <div class="quote-minimal-status">Client</div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Masonry Gallery-->
        <section class="section section-xxl bg-default">
            <div class="container">
                <h2 class="text-transform-capitalize wow fadeScale">Nossos Box Avulso</h2>
                <div class="isotope-wrap">
                    {{-- <div class="isotope-filters">
                        <button
                            class="isotope-filters-toggle button button-sm button-icon button-icon-right button-default-outline"
                            data-custom-toggle=".isotope-filters-list" data-custom-toggle-disable-on-blur="true"
                            data-custom-toggle-hide-on-blur="true"><span
                                class="icon mdi mdi-chevron-down"></span>Filter</button>
                        <div class="isotope-filters-list-wrap">
                            <ul class="isotope-filters-list">
                                <li><a class="active" href="#" data-isotope-filter="*">All</a></li>
                                <li><a href="#" data-isotope-filter="Type 1">Fruits</a></li>
                                <li><a href="#" data-isotope-filter="Type 2">Vegetables</a></li>
                            </ul>
                        </div>
                    </div> --}}
                    <div class="row row-30 isotope isotope-custom-1" data-lightgallery="group">
                        <div class="col-sm-6 col-lg-4 col-xl-3 isotope-item" data-filter="Type 1">
                            <!-- Thumbnail Classic-->
                            <article class="thumbnail-classic block-1">
                                <div class="thumbnail-classic-figure"><img
                                        src="{{ url('assets/images/site/boxAvulso/bannerBoxAgosto.png') }}" alt=""
                                        width="270" style="height: 180px;" />
                                </div>
                                <div class="thumbnail-classic-caption">
                                    <div>
                                        <h5 class="thumbnail-classic-title"><a href="single-product.html">Box Agosto/ 2021</a></h5>
                                        <div class="button-wrap" data-caption-animate="fadeInUp" data-caption-delay="400"><a
                                            class="button button-lg button-shadow-4 button-secondary-2 button-zakaria"
                                            href="grid-shop.html">Eu quero</a></div>
                                        {{-- <div class="thumbnail-classic-price">$12.99</div>
                                        <div class="thumbnail-classic-button-wrap">
                                            <div class="thumbnail-classic-button">
                                                <a class="button button-gray-6 button-zakaria fl-bigmug-line-search74"
                                                    href="images/grid-gallery-4-1200x800-original.jpg"
                                                    data-lightgallery="item"><img
                                                        src="{{ url('assets/images/masonry-gallery-1-270x250.jpg') }}"
                                                        alt="" width="270" style="height: 180px;" /></a>
                                            </div>
                                            <div class="thumbnail-classic-button">
                                                <a class="button button-primary button-zakaria fl-bigmug-line-shopping202"
                                                    href="#"></a>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </article>
                        </div>
                        <div class="col-sm-6 col-lg-4 col-xl-3 isotope-item" data-filter="Type 1">
                            <!-- Thumbnail Classic-->
                            <article class="thumbnail-classic block-1">
                                <div class="thumbnail-classic-figure"><img
                                        src="{{ url('assets/images/site/boxAvulso/boxJulho.png') }}" alt=""
                                        width="270" style="height: 180px;" />
                                </div>
                                <div class="thumbnail-classic-caption">
                                    <div>
                                        <h5 class="thumbnail-classic-title"><a href="single-product.html">Box Julio/ 2021</a></h5>
                                        <div class="button-wrap" data-caption-animate="fadeInUp" data-caption-delay="400"><a
                                            class="button button-lg button-shadow-4 button-secondary-2 button-zakaria"
                                            href="grid-shop.html">Eu quero</a></div>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <div class="col-sm-6 col-lg-4 col-xl-3 isotope-item" data-filter="Type 1">
                            <!-- Thumbnail Classic-->
                            <article class="thumbnail-classic block-1">
                                <div class="thumbnail-classic-figure"><img
                                        src="{{ url('assets/images/site/boxAvulso/boxJunho.png') }}" alt=""
                                        width="270" style="height: 180px;" />
                                </div>
                                <div class="thumbnail-classic-caption">
                                    <div>
                                        <h5 class="thumbnail-classic-title"><a href="single-product.html">Box Junho/ 2021</a></h5>
                                        <div class="button-wrap" data-caption-animate="fadeInUp" data-caption-delay="400"><a
                                            class="button button-lg button-shadow-4 button-secondary-2 button-zakaria"
                                            href="grid-shop.html">Eu quero</a></div>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <div class="col-sm-6 col-lg-4 col-xl-3 isotope-item" data-filter="Type 1">
                            <!-- Thumbnail Classic-->
                            <article class="thumbnail-classic block-1">
                                <div class="thumbnail-classic-figure"><img
                                        src="{{ url('assets/images/site/boxAvulso/boxMaio.png') }}" alt=""
                                        width="270" style="height: 180px;" />
                                </div>
                                <div class="thumbnail-classic-caption">
                                    <div>
                                        <h5 class="thumbnail-classic-title"><a href="single-product.html">Box Maio/ 2021</a></h5>
                                        <div class="button-wrap" data-caption-animate="fadeInUp" data-caption-delay="400"><a
                                            class="button button-lg button-shadow-4 button-secondary-2 button-zakaria"
                                            href="grid-shop.html">Eu quero</a></div>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <div class="col-sm-6 col-lg-4 col-xl-3 isotope-item" data-filter="Type 1">
                            <!-- Thumbnail Classic-->
                            <article class="thumbnail-classic block-1">
                                <div class="thumbnail-classic-figure"><img
                                        src="{{ url('assets/images/site/boxAvulso/boxAbril.png') }}" alt=""
                                        width="270" style="height: 180px;" />
                                </div>
                                <div class="thumbnail-classic-caption">
                                    <div>
                                        <h5 class="thumbnail-classic-title"><a href="single-product.html">Box Abril/ 2021</a></h5>
                                        <div class="button-wrap" data-caption-animate="fadeInUp" data-caption-delay="400"><a
                                            class="button button-lg button-shadow-4 button-secondary-2 button-zakaria"
                                            href="grid-shop.html">Eu quero</a></div>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <div class="col-sm-6 col-lg-4 col-xl-3 isotope-item" data-filter="Type 1">
                            <!-- Thumbnail Classic-->
                            <article class="thumbnail-classic block-1">
                                <div class="thumbnail-classic-figure"><img
                                        src="{{ url('assets/images/site/boxAvulso/boxMarço.png') }}" alt=""
                                        width="270" style="height: 180px;" />
                                </div>
                                <div class="thumbnail-classic-caption">
                                    <div>
                                        <h5 class="thumbnail-classic-title"><a href="single-product.html">Box Março/ 2021</a></h5>
                                        <div class="button-wrap" data-caption-animate="fadeInUp" data-caption-delay="400"><a
                                            class="button button-lg button-shadow-4 button-secondary-2 button-zakaria"
                                            href="grid-shop.html">Eu quero</a></div>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <div class="col-sm-6 col-lg-4 col-xl-3 isotope-item" data-filter="Type 1">
                            <!-- Thumbnail Classic-->
                            <article class="thumbnail-classic block-1">
                                <div class="thumbnail-classic-figure"><img
                                        src="{{ url('assets/images/site/boxAvulso/boxFevereiro.jpg') }}" alt=""
                                        width="270" style="height: 180px;" />
                                </div>
                                <div class="thumbnail-classic-caption">
                                    <div>
                                        <h5 class="thumbnail-classic-title"><a href="single-product.html">Box Fevereiro/ 2021</a></h5>
                                        <div class="button-wrap" data-caption-animate="fadeInUp" data-caption-delay="400"><a
                                            class="button button-lg button-shadow-4 button-secondary-2 button-zakaria"
                                            href="grid-shop.html">Eu quero</a></div>
                                    </div>
                                </div>
                            </article>
                        </div>
                        {{-- <div class="col-sm-6 col-lg-4 col-xl-3 isotope-item" data-filter="Type 2">
                            <!-- Thumbnail Classic-->
                            <article class="thumbnail-classic block-1">
                                <div class="thumbnail-classic-figure"><img
                                        src="{{ url('assets/images/masonry-gallery-2-270x530.jpg') }}" alt=""
                                        width="270" height="530" />
                                </div>
                                <div class="thumbnail-classic-caption">
                                    <div>
                                        <h5 class="thumbnail-classic-title"><a href="single-product.html">Avocado
                                                smoothie</a></h5>
                                        <div class="thumbnail-classic-price">$13.99</div>
                                        <div class="thumbnail-classic-button-wrap">
                                            <div class="thumbnail-classic-button">
                                                <a class="button button-gray-6 button-zakaria fl-bigmug-line-search74"
                                                    href="images/masonry-gallery-2-1200x800-original.jpg"
                                                    data-lightgallery="item"><img
                                                        src="{{ url('assets/images/masonry-gallery-2-270x530.jpg') }}"
                                                        alt="" width="270" height="530" /></a>
                                            </div>
                                            <div class="thumbnail-classic-button">
                                                <a class="button button-primary button-zakaria fl-bigmug-line-shopping202"
                                                    href="#"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <div class="col-sm-6 col-lg-4 col-xl-3 isotope-item" data-filter="Type 1">
                            <!-- Thumbnail Classic-->
                            <article class="thumbnail-classic block-1">
                                <div class="thumbnail-classic-figure"><img
                                        src="{{ url('assets/images/masonry-gallery-3-270x250.jpg') }}" alt=""
                                        width="270" height="250" />
                                </div>
                                <div class="thumbnail-classic-caption">
                                    <div>
                                        <h5 class="thumbnail-classic-title"><a href="single-product.html">Grapefruit
                                                smoothie</a></h5>
                                        <div class="thumbnail-classic-price">$10.99</div>
                                        <div class="thumbnail-classic-button-wrap">
                                            <div class="thumbnail-classic-button">
                                                <a class="button button-gray-6 button-zakaria fl-bigmug-line-search74"
                                                    href="images/masonry-gallery-3-1200x800-original.jpg"
                                                    data-lightgallery="item"><img
                                                        src="{{ url('assets/images/masonry-gallery-3-270x250.jpg') }}"
                                                        alt="" width="270" height="250" /></a>
                                            </div>
                                            <div class="thumbnail-classic-button">
                                                <a class="button button-primary button-zakaria fl-bigmug-line-shopping202"
                                                    href="#"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <div class="col-sm-6 col-lg-4 col-xl-3 isotope-item" data-filter="Type 2">
                            <!-- Thumbnail Classic-->
                            <article class="thumbnail-classic block-1">
                                <div class="thumbnail-classic-figure"><img
                                        src="{{ url('assets/images/masonry-gallery-4-270x250.jpg') }}" alt=""
                                        width="270" height="250" />
                                </div>
                                <div class="thumbnail-classic-caption">
                                    <div>
                                        <h5 class="thumbnail-classic-title"><a href="single-product.html">Raspberry
                                                smoothie</a></h5>
                                        <div class="thumbnail-classic-price">$8.99</div>
                                        <div class="thumbnail-classic-button-wrap">
                                            <div class="thumbnail-classic-button">
                                                <a class="button button-gray-6 button-zakaria fl-bigmug-line-search74"
                                                    href="images/masonry-gallery-4-1200x800-original.jpg"
                                                    data-lightgallery="item"><img
                                                        src="{{ url('assets/images/masonry-gallery-4-270x250.jpg') }}"
                                                        alt="" width="270" height="250" /></a>
                                            </div>
                                            <div class="thumbnail-classic-button">
                                                <a class="button button-primary button-zakaria fl-bigmug-line-shopping202"
                                                    href="#"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <div class="col-sm-6 col-lg-4 col-xl-3 isotope-item" data-filter="Type 1">
                            <!-- Thumbnail Classic-->
                            <article class="thumbnail-classic block-1">
                                <div class="thumbnail-classic-figure"><img
                                        src="{{ url('assets/images/masonry-gallery-5-270x250.jpg') }}" alt=""
                                        width="270" height="250" />
                                </div>
                                <div class="thumbnail-classic-caption">
                                    <div>
                                        <h5 class="thumbnail-classic-title"><a href="single-product.html">Kiwi &amp;
                                                avocado mix</a></h5>
                                        <div class="thumbnail-classic-price">$14.99</div>
                                        <div class="thumbnail-classic-button-wrap">
                                            <div class="thumbnail-classic-button">
                                                <a class="button button-gray-6 button-zakaria fl-bigmug-line-search74"
                                                    href="images/grid-gallery-2-1200x800-original.jpg"
                                                    data-lightgallery="item"><img
                                                        src="{{ url('assets/images/masonry-gallery-5-270x250.jpg') }}"
                                                        alt="" width="270" height="250" /></a>
                                            </div>
                                            <div class="thumbnail-classic-button">
                                                <a class="button button-primary button-zakaria fl-bigmug-line-shopping202"
                                                    href="#"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <div class="col-sm-6 col-lg-4 col-xl-6 isotope-item" data-filter="Type 2">
                            <!-- Thumbnail Classic-->
                            <article class="thumbnail-classic block-1">
                                <div class="thumbnail-classic-figure"><img
                                        src="{{ url('assets/images/masonry-gallery-6-570x530.jpg') }}" alt=""
                                        width="570" height="530" />
                                </div>
                                <div class="thumbnail-classic-caption">
                                    <div>
                                        <h5 class="thumbnail-classic-title"><a href="single-product.html">Green fruit
                                                mix</a></h5>
                                        <div class="thumbnail-classic-price">$16.99</div>
                                        <div class="thumbnail-classic-button-wrap">
                                            <div class="thumbnail-classic-button">
                                                <a class="button button-gray-6 button-zakaria fl-bigmug-line-search74"
                                                    href="images/grid-gallery-6-1200x800-original.jpg"
                                                    data-lightgallery="item"><img
                                                        src="{{ url('assets/images/masonry-gallery-6-570x530.jpg') }}"
                                                        alt="" width="570" height="530" /></a>
                                            </div>
                                            <div class="thumbnail-classic-button">
                                                <a class="button button-primary button-zakaria fl-bigmug-line-shopping202"
                                                    href="#"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <div class="col-sm-6 col-lg-8 col-xl-6 isotope-item" data-filter="Type 1">
                            <!-- Thumbnail Classic-->
                            <article class="thumbnail-classic block-1">
                                <div class="thumbnail-classic-figure"><img
                                        src="{{ url('assets/images/masonry-gallery-7-570x250.jpg') }}" alt=""
                                        width="570" height="250" />
                                </div>
                                <div class="thumbnail-classic-caption">
                                    <div>
                                        <h5 class="thumbnail-classic-title"><a href="single-product.html">Watermelon
                                                energy bowl</a></h5>
                                        <div class="thumbnail-classic-price">$10.99</div>
                                        <div class="thumbnail-classic-button-wrap">
                                            <div class="thumbnail-classic-button">
                                                <a class="button button-gray-6 button-zakaria fl-bigmug-line-search74"
                                                    href="images/grid-gallery-1-1200x800-original.jpg"
                                                    data-lightgallery="item"><img
                                                        src="{{ url('assets/images/masonry-gallery-7-570x250.jpg') }}"
                                                        alt="" width="570" height="250" /></a>
                                            </div>
                                            <div class="thumbnail-classic-button">
                                                <a class="button button-primary button-zakaria fl-bigmug-line-shopping202"
                                                    href="#"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div> --}}
                    </div>
                </div>
            </div>
        </section>
        <!-- Subscribe to Our Newsletter-->
        {{-- <section class="parallax-container" data-parallax-img="images/parallax-4.jpg">
            <div class="parallax-content section-xxl context-dark text-md-left">
                <div class="container">
                    <div class="row row-30 justify-content-center align-items-center align-items-md-end">
                        <div class="col-lg-3">
                            <h3 class="text-spacing-100 wow fadeInLeft">Stay <span
                                    class="font-weight-light">connected</span>
                            </h3>
                            <p class="wow fadeInLeft" data-wow-delay=".1s">Subscribe to our newsletter</p>
                        </div>
                        <div class="col-lg-9 inset-lg-bottom-10">
                            <!-- RD Mailform-->
                            <form class="rd-form rd-mailform rd-form-inline form-lg rd-form-text-center"
                                data-form-output="form-output-global" data-form-type="subscribe" method="post"
                                action="bat/rd-mailform.php">
                                <div class="form-wrap wow fadeInUp">
                                    <input class="form-input" id="subscribe-form-0-email" type="email" name="email"
                                        data-constraints="@Email @Required" />
                                    <label class="form-label" for="subscribe-form-0-email">Enter your e-mail
                                        address</label>
                                </div>
                                <div class="form-button wow fadeInRight">
                                    <button class="button button-shadow-2 button-zakaria button-lg button-primary"
                                        type="submit">Subscribe</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- Our Team-->
        {{-- <section class="section section-xxl bg-default">
            <div class="container">
                <h2 class="text-transform-capitalize wow fadeScale">Our Team</h2>
                <!-- Owl Carousel-->
                <div class="owl-carousel owl-style-9" data-items="1" data-sm-items="2" data-md-items="3"
                    data-lg-items="4" data-margin="30" data-dots="true" data-mouse-drag="false">
                    <article class="team-modern box-sm wow slideInUp">
                        <a class="team-modern-figure" href="#"><img
                                src="{{ url('assets/images/team-4-270x227.jpg') }}" alt="" width="270"
                                height="227" /></a>
                        <h5 class="team-modern-name"><a href="#">Rebecca Martinez</a></h5>
                        <p class="team-modern-text">Rebecca is the Founder and CEO of Livedrink</p>
                        <ul class="list-inline team-modern-list-social list-social-2 list-inline-sm">
                            <li>
                                <a class="icon mdi mdi-facebook" href="#"></a>
                            </li>
                            <li>
                                <a class="icon mdi mdi-twitter" href="#"></a>
                            </li>
                            <li>
                                <a class="icon mdi mdi-instagram" href="#"></a>
                            </li>
                            <li>
                                <a class="icon mdi mdi-google-plus" href="#"></a>
                            </li>
                        </ul>
                    </article>
                    <article class="team-modern box-sm wow slideInUp" data-wow-delay=".1s">
                        <a class="team-modern-figure" href="#"><img
                                src="{{ url('assets/images/team-5-270x227.jpg') }}" alt="" width="270"
                                height="227" /></a>
                        <h5 class="team-modern-name"><a href="#">Peter McMillan</a></h5>
                        <p class="team-modern-text">Peter is the Head of Livedrink’s Supply Chain</p>
                        <ul class="list-inline team-modern-list-social list-social-2 list-inline-sm">
                            <li>
                                <a class="icon mdi mdi-facebook" href="#"></a>
                            </li>
                            <li>
                                <a class="icon mdi mdi-twitter" href="#"></a>
                            </li>
                            <li>
                                <a class="icon mdi mdi-instagram" href="#"></a>
                            </li>
                            <li>
                                <a class="icon mdi mdi-google-plus" href="#"></a>
                            </li>
                        </ul>
                    </article>
                    <article class="team-modern box-sm wow slideInUp" data-wow-delay=".2s">
                        <a class="team-modern-figure" href="#"><img
                                src="{{ url('assets/images/team-6-270x227.jpg') }}" alt="" width="270"
                                height="227" /></a>
                        <h5 class="team-modern-name"><a href="#">Jane Smith</a></h5>
                        <p class="team-modern-text">Jane Smith is our leading Customer Care specialist.</p>
                        <ul class="list-inline team-modern-list-social list-social-2 list-inline-sm">
                            <li>
                                <a class="icon mdi mdi-facebook" href="#"></a>
                            </li>
                            <li>
                                <a class="icon mdi mdi-twitter" href="#"></a>
                            </li>
                            <li>
                                <a class="icon mdi mdi-instagram" href="#"></a>
                            </li>
                            <li>
                                <a class="icon mdi mdi-google-plus" href="#"></a>
                            </li>
                        </ul>
                    </article>
                    <article class="team-modern box-sm wow slideInUp" data-wow-delay=".3s">
                        <a class="team-modern-figure" href="#"><img
                                src="{{ url('assets/images/team-7-270x227.jpg') }}" alt="" width="270"
                                height="227" /></a>
                        <h5 class="team-modern-name"><a href="#">Sam Williams</a></h5>
                        <p class="team-modern-text">Sam is our #1 expert in domestic Sales Management.</p>
                        <ul class="list-inline team-modern-list-social list-social-2 list-inline-sm">
                            <li>
                                <a class="icon mdi mdi-facebook" href="#"></a>
                            </li>
                            <li>
                                <a class="icon mdi mdi-twitter" href="#"></a>
                            </li>
                            <li>
                                <a class="icon mdi mdi-instagram" href="#"></a>
                            </li>
                            <li>
                                <a class="icon mdi mdi-google-plus" href="#"></a>
                            </li>
                        </ul>
                    </article>
                </div>
            </div>
        </section> --}}
        <!-- Section Clients-->
        <section class="section section-xxl bg-image-1">
            <div class="container">
                <h2 class="text-transform-capitalize wow fadeScale">Blog Posts</h2>
                <!-- Owl Carousel-->
                <div class="owl-carousel owl-style-5" data-items="1" data-sm-items="2" data-lg-items="3" data-margin="30" data-dots="true" data-autoplay="true">

                    <!-- Post Classic-->
                    <article class="post post-classic box-md wow slideInDown">
                        <a class="post-classic-figure" href="blog-post.html"><img
                                src="{{ url('assets/images/site/blogPost/amamentacao.png') }}" alt="" width="370"
                                height="239" /></a>
                        <div class="post-classic-content">
                            <p class="" style="color: #95cc9b; margin-bottom: 10px;">Notícias</p>
                            <div class="post-classic-time">
                                <time datetime="2020-08-09">Agosto 9, 2020</time>
                            </div>
                            <h5 class="post-classic-title"><a href="blog-post.html">Amamentação & Covid-19</a></h5>
                            <p class="post-classic-text"  style="margin-bottom: 25px;">A pandemia do Covid-19, nos causa muitas dúvidas, aínda mais para gestantes e lactantes. É natural ...</p>
                            <a href="#" class="">Leia mais ></a>
                        </div>
                    </article>
                    <!-- Post Classic-->
                    <article class="post post-classic box-md wow slideInDown">
                        <a class="post-classic-figure" href="blog-post.html"><img
                                src="{{ url('assets/images/site/blogPost/amamentacao.png') }}" alt="" width="370"
                                height="239" /></a>
                        <div class="post-classic-content">
                            <p class="" style="color: #95cc9b; margin-bottom: 10px;">Notícias</p>
                            <div class="post-classic-time">
                                <time datetime="2020-08-09">Agosto 9, 2020</time>
                            </div>
                            <h5 class="post-classic-title"><a href="blog-post.html">Amamentação & Covid-19</a></h5>
                            <p class="post-classic-text"  style="margin-bottom: 25px;">A pandemia do Covid-19, nos causa muitas dúvidas, aínda mais para gestantes e lactantes. É natural ...</p>
                            <a href="#" class="">Leia mais ></a>
                        </div>
                    </article>
                    <!-- Post Classic-->
                    <article class="post post-classic box-md wow slideInDown">
                        <a class="post-classic-figure" href="blog-post.html"><img
                                src="{{ url('assets/images/site/blogPost/amamentacao.png') }}" alt="" width="370"
                                height="239" /></a>
                        <div class="post-classic-content">
                            <p class="" style="color: #95cc9b; margin-bottom: 10px;">Notícias</p>
                            <div class="post-classic-time">
                                <time datetime="2020-08-09">Agosto 9, 2020</time>
                            </div>
                            <h5 class="post-classic-title"><a href="blog-post.html">Amamentação & Covid-19</a></h5>
                            <p class="post-classic-text"  style="margin-bottom: 25px;">A pandemia do Covid-19, nos causa muitas dúvidas, aínda mais para gestantes e lactantes. É natural ...</p>
                            <a href="#" class="">Leia mais ></a>
                        </div>
                    </article>
                    <!-- Post Classic-->
                    <article class="post post-classic box-md wow slideInDown">
                        <a class="post-classic-figure" href="blog-post.html"><img
                                src="{{ url('assets/images/site/blogPost/amamentacao.png') }}" alt="" width="370"
                                height="239" /></a>
                        <div class="post-classic-content">
                            <p class="" style="color: #95cc9b; margin-bottom: 10px;">Notícias</p>
                            <div class="post-classic-time">
                                <time datetime="2020-08-09">Agosto 9, 2020</time>
                            </div>
                            <h5 class="post-classic-title"><a href="blog-post.html">Amamentação & Covid-19</a></h5>
                            <p class="post-classic-text"  style="margin-bottom: 25px;">A pandemia do Covid-19, nos causa muitas dúvidas, aínda mais para gestantes e lactantes. É natural ...</p>
                            <a href="#" class="">Leia mais ></a>
                        </div>
                    </article>
                    <!-- Post Classic-->
                    <article class="post post-classic box-md wow slideInDown">
                        <a class="post-classic-figure" href="blog-post.html"><img
                                src="{{ url('assets/images/site/blogPost/amamentacao.png') }}" alt="" width="370"
                                height="239" /></a>
                        <div class="post-classic-content">
                            <p class="" style="color: #95cc9b; margin-bottom: 10px;">Notícias</p>
                            <div class="post-classic-time">
                                <time datetime="2020-08-09">Agosto 9, 2020</time>
                            </div>
                            <h5 class="post-classic-title"><a href="blog-post.html">Amamentação & Covid-19</a></h5>
                            <p class="post-classic-text"  style="margin-bottom: 25px;">A pandemia do Covid-19, nos causa muitas dúvidas, aínda mais para gestantes e lactantes. É natural ...</p>
                            <a href="#" class="">Leia mais ></a>
                        </div>
                    </article>
                    <!-- Post Classic-->
                    <article class="post post-classic box-md wow slideInDown">
                        <a class="post-classic-figure" href="blog-post.html"><img
                                src="{{ url('assets/images/site/blogPost/amamentacao.png') }}" alt="" width="370"
                                height="239" /></a>
                        <div class="post-classic-content">
                            <p class="" style="color: #95cc9b; margin-bottom: 10px;">Notícias</p>
                            <div class="post-classic-time">
                                <time datetime="2020-08-09">Agosto 9, 2020</time>
                            </div>
                            <h5 class="post-classic-title"><a href="blog-post.html">Amamentação & Covid-19</a></h5>
                            <p class="post-classic-text"  style="margin-bottom: 25px;">A pandemia do Covid-19, nos causa muitas dúvidas, aínda mais para gestantes e lactantes. É natural ...</p>
                            <a href="#" class="">Leia mais ></a>
                        </div>
                    </article>
                    <!-- Post Classic-->
                    <article class="post post-classic box-md wow slideInDown">
                        <a class="post-classic-figure" href="blog-post.html"><img
                                src="{{ url('assets/images/site/blogPost/amamentacao.png') }}" alt="" width="370"
                                height="239" /></a>
                        <div class="post-classic-content">
                            <p class="" style="color: #95cc9b; margin-bottom: 10px;">Notícias</p>
                            <div class="post-classic-time">
                                <time datetime="2020-08-09">Agosto 9, 2020</time>
                            </div>
                            <h5 class="post-classic-title"><a href="blog-post.html">Amamentação & Covid-19</a></h5>
                            <p class="post-classic-text"  style="margin-bottom: 25px;">A pandemia do Covid-19, nos causa muitas dúvidas, aínda mais para gestantes e lactantes. É natural ...</p>
                            <a href="#" class="">Leia mais ></a>
                        </div>
                    </article>
                    <!-- Post Classic-->
                    <article class="post post-classic box-md wow slideInDown">
                        <a class="post-classic-figure" href="blog-post.html"><img
                                src="{{ url('assets/images/site/blogPost/amamentacao.png') }}" alt="" width="370"
                                height="239" /></a>
                        <div class="post-classic-content">
                            <p class="" style="color: #95cc9b; margin-bottom: 10px;">Notícias</p>
                            <div class="post-classic-time">
                                <time datetime="2020-08-09">Agosto 9, 2020</time>
                            </div>
                            <h5 class="post-classic-title"><a href="blog-post.html">Amamentação & Covid-19</a></h5>
                            <p class="post-classic-text"  style="margin-bottom: 25px;">A pandemia do Covid-19, nos causa muitas dúvidas, aínda mais para gestantes e lactantes. É natural ...</p>
                            <a href="#" class="">Leia mais ></a>
                        </div>
                    </article>
                    <!-- Post Classic-->
                    <article class="post post-classic box-md wow slideInDown">
                        <a class="post-classic-figure" href="blog-post.html"><img
                                src="{{ url('assets/images/site/blogPost/amamentacao.png') }}" alt="" width="370"
                                height="239" /></a>
                        <div class="post-classic-content">
                            <p class="" style="color: #95cc9b; margin-bottom: 10px;">Notícias</p>
                            <div class="post-classic-time">
                                <time datetime="2020-08-09">Agosto 9, 2020</time>
                            </div>
                            <h5 class="post-classic-title"><a href="blog-post.html">Amamentação & Covid-19</a></h5>
                            <p class="post-classic-text"  style="margin-bottom: 25px;">A pandemia do Covid-19, nos causa muitas dúvidas, aínda mais para gestantes e lactantes. É natural ...</p>
                            <a href="#" class="">Leia mais ></a>
                        </div>
                    </article>

                </div>
            </div>
        </section>
        <!-- Section Clients-->
        {{-- <section class="section section-lg bg-default">
            <div class="container">
                <div class="owl-carousel owl-style-2" data-items="2" data-sm-items="3" data-md-items="4"
                    data-lg-items="5" data-margin="30" data-dots="true">
                    <a class="clients-classic" href="#"><img src="{{ url('assets/images/clients-1-120x114.png') }}"
                            alt="" width="120" height="114" /></a>
                    <a class="clients-classic" href="#"><img src="{{ url('assets/images/clients-2-105x118.png') }}"
                            alt="" width="105" height="118" /></a>
                    <a class="clients-classic" href="#"><img src="{{ url('assets/images/clients-3-111x98.png') }}"
                            alt="" width="111" height="98" /></a>
                    <a class="clients-classic" href="#"><img src="{{ url('assets/images/clients-4-122x92.png') }}"
                            alt="" width="122" height="92" /></a>
                    <a class="clients-classic" href="#"><img src="{{ url('assets/images/clients-5-112x112.png') }}"
                            alt="" width="112" height="112" /></a>
                </div>
            </div>
        </section> --}}
        {{-- Section FAQ  --}}
        <section class="section section-xxl bg-default">
            <div class="container">
                <div class="col-md-12 col-xl-12">
                    <h3 class="text-transform-none wow text-align-center">Perguntas Frequentes</h3>
                    <!-- Bootstrap collapse-->
                    <div class="card-group-custom card-group-corporate" id="accordion1" role="tablist"
                        aria-multiselectable="false">
                        <!-- Bootstrap card-->
                        <article class="card card-custom card-corporate wow fadeInRight" data-wow-delay=".1s">
                            <div class="card-header" role="tab">
                                <div class="card-title"><a class="collapsed" id="accordion1-card-head-qteehppu"
                                        data-toggle="collapse" data-parent="#accordion1"
                                        href="#accordion1-card-body-unqfdlnh"
                                        aria-controls="accordion1-card-body-unqfdlnh" aria-expanded="false"
                                        role="button">O que é o bookbox?
                                        <div class="card-arrow">
                                            <div class="icon"></div>
                                        </div>
                                    </a></div>
                            </div>
                            <div class="collapse show" id="accordion1-card-body-unqfdlnh"
                                aria-labelledby="accordion1-card-head-qteehppu" data-parent="#accordion1"
                                role="tabpanel">
                                <div class="card-body">
                                    <p>Bookbox é o seu clube de assinatura de livros na área de saúde e bem-estar, com conteúdos baseados nos quatro principais pilares da vida, saúde física, mental, espiritual e financeira.</p>
                                </div>
                            </div>
                        </article>
                        <!-- Bootstrap card-->
                        <article class="card card-custom card-corporate wow fadeInRight" data-wow-delay=".2s">
                            <div class="card-header" role="tab">
                                <div class="card-title"><a class="collapsed" id="accordion1-card-head-iebkfbxx" data-toggle="collapse"
                                        data-parent="#accordion1" href="#accordion1-card-body-eephkkca"
                                        aria-controls="accordion1-card-body-eephkkca" aria-expanded="false"
                                        role="button">O que vou receber?
                                        <div class="card-arrow">
                                            <div class="icon"></div>
                                        </div>
                                    </a></div>
                            </div>
                            <div class="collapse" id="accordion1-card-body-eephkkca"
                                aria-labelledby="accordion1-card-head-iebkfbxx" data-parent="#accordion1"
                                role="tabpanel">
                                <div class="card-body">
                                    <p>Todo mês você vai receber uma caixa com dois livros inéditos e exclusivos para assinantes, um guia de leitura, um brinde especial, 2 marca páginas e 1 cartão postal colecionável. Os itens são exclusivos para assinantes e só poderão ser adquiridos no site.</p>
                                </div>
                            </div>
                        </article>
                        <!-- Bootstrap card-->
                        <article class="card card-custom card-corporate wow fadeInRight" data-wow-delay=".3s">
                            <div class="card-header" role="tab">
                                <div class="card-title"><a class="collapsed"
                                        id="accordion1-card-head-crpnkjpm" data-toggle="collapse"
                                        data-parent="#accordion1" href="#accordion1-card-body-qbvvnoxx"
                                        aria-controls="accordion1-card-body-qbvvnoxx" aria-expanded="false"
                                        role="button">Como posso assinar?
                                        <div class="card-arrow">
                                            <div class="icon"></div>
                                        </div>
                                    </a></div>
                            </div>
                            <div class="collapse" id="accordion1-card-body-qbvvnoxx"
                                aria-labelledby="accordion1-card-head-crpnkjpm" data-parent="#accordion1"
                                role="tabpanel">
                                <div class="card-body">
                                    <p>Para assinar, escolha um dos nossos planos, preencha os seus dados e inclua o endereço. Após concluir o pagamento espere a confirmação do pagamento por e-mail. Agora é só esperar o seu box chegar em sua casa.
                                    </p>
                                </div>
                            </div>
                        </article>
                        <!-- Bootstrap card-->
                        <article class="card card-custom card-corporate wow fadeInRight" data-wow-delay=".3s">
                            <div class="card-header" role="tab">
                                <div class="card-title"><a class="collapsed"
                                        id="accordion1-card-head-kgkjkjj" data-toggle="collapse"
                                        data-parent="#accordion1" href="#accordion1-card-body-sadasdas"
                                        aria-controls="accordion1-card-body-sadasdas" aria-expanded="false"
                                        role="button">Quais formas de pagamento?
                                        <div class="card-arrow">
                                            <div class="icon"></div>
                                        </div>
                                    </a></div>
                            </div>
                            <div class="collapse" id="accordion1-card-body-sadasdas"
                                aria-labelledby="accordion1-card-head-crpnkjpm" data-parent="#accordion1"
                                role="tabpanel">
                                <div class="card-body">
                                    <p>Todo plano padrão, o pagamento pode ser realizado no cartão de crédito ou no boleto. No plano anual, o pagamento é exclusivamente no cartão de crédito. Caso a assinatura seja realizada no boleto, você receberá por e-mail o documento com vencimento em até 3 dias corridos no dia 15 de cada mês. Caso a assinatura seja realizada no cartão de crédito, a cobrança será realizada automaticamente e você receberá as informações do pagamento no dia 15 de cada mês.
                                    </p>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </section>
        <!-- Page Footer-->
        <footer class="section footer-modern footer-modern-2">
            <div class="footer-modern-body section-xl context-dark">
                <div class="container">
                    <div class="row row-40 row-md-50 justify-content-xl-between">
                        <div class="col-sm-6 col-md-5 col-lg-4 col-xl-3 wow fadeInRight" data-wow-delay=".2s">
                            <h5 class="footer-modern-title">Contato</h5>
                            <ul class="contacts-creative">
                                <li>
                                    <div class="unit unit-spacing-sm flex-column flex-md-row">
                                        <div class="unit-left"><span class="icon mdi mdi-map-marker"></span>
                                        </div>
                                        <div class="unit-body"><a href="#">523 Sylvan Ave, 5th Floor<br />Mountain
                                                View, CA 94041 USA</a></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="unit unit-spacing-sm flex-column flex-md-row">
                                        <div class="unit-left"><span class="icon mdi mdi-phone"></span></div>
                                        <div class="unit-body"><a href="tel:#">+1 (844) 123 456 78</a></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="unit unit-spacing-sm flex-column flex-md-row">
                                        <div class="unit-left"><span class="icon mdi mdi-email-outline"></span>
                                        </div>
                                        <div class="unit-body"><a href="mailto:#">info@demolink.org</a></div>
                                    </div>
                                </li>
                            </ul>
                            <ul class="list-inline list-social-3 list-inline-sm">
                                <li>
                                    <a class="icon mdi mdi-facebook icon-xxs" href="#"></a>
                                </li>
                                <li>
                                    <a class="icon mdi mdi-twitter icon-xxs" href="#"></a>
                                </li>
                                <li>
                                    <a class="icon mdi mdi-instagram icon-xxs" href="#"></a>
                                </li>
                                <li>
                                    <a class="icon mdi mdi-google-plus icon-xxs" href="#"></a>
                                </li>
                                <li>
                                    <a class="icon mdi mdi-skype icon-xxs" href="#"></a>
                                </li>
                            </ul>
                        </div>
                        {{-- <div class="col-md-10 col-lg-3 col-xl-4 wow fadeInRight">
                            <div class="inset-xl-right-70 block-1">
                                <h5 class="footer-modern-title">Gallery</h5>
                                <div class="row row-10 gutters-10" data-lightgallery="group">
                                    <div class="col-4 col-sm-2 col-lg-4">
                                        <!-- Thumbnail Minimal-->
                                        <a class="thumbnail-minimal"
                                            href="images/grid-gallery-footer-1-1200x800-original.jpg"
                                            data-lightgallery="item"><img
                                                src="{{ url('assets/images/grid-gallery-1-93x93.jpg') }}" alt=""
                                                width="93" height="93" /></a>
                                    </div>
                                    <div class="col-4 col-sm-2 col-lg-4">
                                        <!-- Thumbnail Minimal-->
                                        <a class="thumbnail-minimal"
                                            href="images/masonry-gallery-4-1200x800-original.jpg"
                                            data-lightgallery="item"><img
                                                src="{{ url('assets/images/grid-gallery-2-93x93.jpg') }}" alt=""
                                                width="93" height="93" /></a>
                                    </div>
                                    <div class="col-4 col-sm-2 col-lg-4">
                                        <!-- Thumbnail Minimal-->
                                        <a class="thumbnail-minimal" href="images/grid-gallery-2-1200x800-original.jpg"
                                            data-lightgallery="item"><img
                                                src="{{ url('assets/images/grid-gallery-3-93x93.jpg') }}" alt=""
                                                width="93" height="93" /></a>
                                    </div>
                                    <div class="col-4 col-sm-2 col-lg-4">
                                        <!-- Thumbnail Minimal-->
                                        <a class="thumbnail-minimal" href="images/grid-gallery-1-1200x800-original.jpg"
                                            data-lightgallery="item"><img
                                                src="{{ url('assets/images/grid-gallery-4-93x93.jpg') }}" alt=""
                                                width="93" height="93" /></a>
                                    </div>
                                    <div class="col-4 col-sm-2 col-lg-4">
                                        <!-- Thumbnail Minimal-->
                                        <a class="thumbnail-minimal"
                                            href="images/grid-gallery-footer-5-1200x800-original.jpg"
                                            data-lightgallery="item"><img
                                                src="{{ url('assets/images/grid-gallery-5-93x93.jpg') }}" alt=""
                                                width="93" height="93" /></a>
                                    </div>
                                    <div class="col-4 col-sm-2 col-lg-4">
                                        <!-- Thumbnail Minimal-->
                                        <a class="thumbnail-minimal" href="images/grid-gallery-4-1200x800-original.jpg"
                                            data-lightgallery="item"><img
                                                src="{{ url('assets/images/grid-gallery-6-93x93.jpg') }}" alt=""
                                                width="93" height="93" /></a>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <div class="col-sm-6 col-md-7 col-lg-5 wow fadeInRight" data-wow-delay=".1s">
                            <h5 class="footer-modern-title">Links</h5>
                            <ul class="footer-modern-list footer-modern-list-2 d-sm-inline-block d-md-block">
                                <li><a href="grid-shop.html">ShopBox</a></li>
                                <li><a href="blog-list.html">Blog Post</a></li>
                                <li><a href="about-us.html">Sobre Nós</a></li>
                                <li><a href="#">Termos e Condições</a></li>
                                <li><a href="contact-us.html">Contato</a></li>
                                <li><a href="#">Assinar</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-6 col-md-5 col-lg-4 col-xl-3 wow fadeInRight" data-wow-delay=".2s">
                            <h5 class="footer-modern-title">Desenvolvido por: Gigapixel</h5>
                            <ul class="contacts-creative">
                                <li>
                                    <div class="unit unit-spacing-sm flex-column flex-md-row">
                                        <div class="unit-left"><span class="icon mdi mdi-map-marker"></span>
                                        </div>
                                        <div class="unit-body"><a href="#">523 Sylvan Ave, 5th Floor<br />Mountain
                                                View, CA 94041 USA</a></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="unit unit-spacing-sm flex-column flex-md-row">
                                        <div class="unit-left"><span class="icon mdi mdi-phone"></span></div>
                                        <div class="unit-body"><a href="tel:#">+1 (844) 123 456 78</a></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="unit unit-spacing-sm flex-column flex-md-row">
                                        <div class="unit-left"><span class="icon mdi mdi-email-outline"></span>
                                        </div>
                                        <div class="unit-body"><a href="mailto:#">info@demolink.org</a></div>
                                    </div>
                                </li>
                            </ul>
                            <ul class="list-inline list-social-3 list-inline-sm">
                                <li>
                                    <a class="icon mdi mdi-facebook icon-xxs" href="#"></a>
                                </li>
                                <li>
                                    <a class="icon mdi mdi-twitter icon-xxs" href="#"></a>
                                </li>
                                <li>
                                    <a class="icon mdi mdi-instagram icon-xxs" href="#"></a>
                                </li>
                                <li>
                                    <a class="icon mdi mdi-google-plus icon-xxs" href="#"></a>
                                </li>
                                <li>
                                    <a class="icon mdi mdi-skype icon-xxs" href="#"></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-modern-panel text-center">
                <div class="container">
                    <p class="rights"><span>&copy;&nbsp; </span><span
                            class="copyright-year"></span><span>&nbsp;</span><span>Livedrink</span><span>.&nbsp; All
                            rights reserved.</span><span>&nbsp;</span><a href="privacy-policy.html">Privacy
                            Policy</a><span>.</span></p>
                </div>
            </div>
        </footer>
    </div>
    <div class="snackbars" id="form-output-global"></div>
    <script src="{{ url('assets/js/core.min.js') }}"></script>
    <script src="{{ url('assets/js/script.js') }}"></script>
</body>

</html>
