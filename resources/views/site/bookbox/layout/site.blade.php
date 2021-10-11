<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>
	<title>Bookbox - Saúde Integrada</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="icon" href="{{ url ('assets/images/site/LogoMini Negativo Roxo.png')}}" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700%7CLato%7CKalam:300,400,700">
	<link rel="stylesheet" href="{{ url('assets/css/bootstrap.css') }}">
	<link rel="stylesheet" href="{{ url('assets/css/fonts.css') }}">
	<link rel="stylesheet" href="{{ url('assets/css/style.css') }}">

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

	@yield('styles')
</head>

<body>
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

		<header class="section page-header header-creative-wrap context-dark">
			<div class="rd-navbar-wrap">
				<nav class="rd-navbar rd-navbar-creative rd-navbar-creative-2" data-layout="rd-navbar-fixed"
				data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed"
				data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static"
				data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static"
				data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static"
				data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="100px"
				data-xl-stick-up-offset="112px" data-xxl-stick-up-offset="132px" data-lg-stick-up="true"
				data-xl-stick-up="true" data-xxl-stick-up="true">
				{{-- <div class="rd-navbar-collapse-toggle rd-navbar-fixed-element-1"
				data-rd-navbar-toggle=".rd-navbar-collapse"><span></span></div> --}}
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
							</ul>
							<a class="rd-navbar-basket rd-navbar-basket-mobile fl-bigmug-line-shopping202"
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
								<a id="logo" class="brand" href="/"><img class="brand-logo-light"
									src="{{ url ('assets/images/site/Logo_saude.png')}}"
									alt="" style="display: block; width: 200px; max-height: 200px; margin-left: 75px; text-align: center;"/></a>
									{{-- <img class="brand-logo-dark" src="images/site/Logo_estilizado.png" alt="" width="157" height="35" /> --}}
								</div>
							</div>
							<div class="rd-navbar-aside-element">
							</div>
						</div>
					</div>
					<div class="rd-navbar-main-outer" style="background-color: #8571a2;">
						<div class="rd-navbar-main">
							<div class="rd-navbar-nav-wrap">
								<ul class="rd-navbar-nav">
									<li class="rd-nav-item active"><a class="rd-nav-link" href="/">Home</a>
									</li>
									<li class="rd-nav-item"><a href="/#whats_in" class="rd-nav-link">O Que Vem No Box</a>
									</li>
									<li class="rd-nav-item"><a class="rd-nav-link"
										href="/#how_works" >Como Funciona</a>
									</li>
									<li class="rd-nav-item"><a class="rd-nav-link"
										href="/#boxes" >Planos</a>
									</li>
									{{-- <li class="rd-nav-item"><a href="/box_blog" class="rd-nav-link">ShopBox</a>
									</li> --}}
									{{-- <li class="rd-nav-item"><a class="rd-nav-link" href="/about">Sobre
										nós</a>
									</li> --}}
									{{-- <li class="rd-nav-item"><a class="rd-nav-link"
										href="/contact">Contato</a>
									</li> --}}
									{{-- <li class="rd-nav-item"><a class="rd-nav-link"
										href="/privacy-policy">Termos e Condições</a>
									</li> --}}
									<li class="rd-nav-item"><a class="rd-nav-link button button-lg button-shadow-4 button-secondary-3 button-zakaria" href="/pricing-list"
										target="blank" style="color: #fff;">Assine já</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</nav>
			</div>
		</header>

		@yield('content')
	</div>
	<div class="snackbars" id="form-output-global"></div>
	<script src="{{ url('assets/js/core.min.js') }}"></script>
	<script src="{{ url('assets/js/script.js') }}"></script>
	<script src="{{ url('js/gp-ays.js') }}"></script>

	@include('site.bookbox.layout.footer')
	@yield('scripts')
</body>

</html>

							{{-- <div class="button-wrap" data-caption-animate="fadeInLeft"
								data-caption-delay="400" style="margin-top: 35px; margin-bottom: 70px;"><a
								class="button button-lg button-shadow-4 button-secondary-2 button-zakaria"
								href="/pricing-list">Eu Quero</a>
							</div> --}}
