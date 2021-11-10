<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>
	<title>Bookbox - Saúde Integrada</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="icon" href="{{ url('assets/images/site/LogoMini Negativo Roxo.png') }}" type="image/x-icon">
	{{-- <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Bellota&display=swap" rel="stylesheet"> --}}

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Lobster+Two&display=swap" rel="stylesheet">
	{{-- <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Zen+Loop&display=swap" rel="stylesheet"> --}}

	{{-- <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700%7CLato%7CKalam:300,400,700"> --}}
	<link rel="stylesheet" href="{{ url('assets/css/bootstrap.css') }}">
	<link rel="stylesheet" href="{{ url('assets/css/fonts.css') }}">
	<link rel="stylesheet" href="{{ url('assets/css/style.css') }}">
	{{-- <link rel="stylesheet" media="screen" href="https://fontlibrary.org//face/orkney" type="text/css"/> --}}

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

	<!-- Facebook Pixel Code -->
	<script>
		! function(f, b, e, v, n, t, s) {
			if (f.fbq) return;
			n = f.fbq = function() {
				n.callMethod ?
				n.callMethod.apply(n, arguments) : n.queue.push(arguments)
			};
			if (!f._fbq) f._fbq = n;
			n.push = n;
			n.loaded = !0;
			n.version = '2.0';
			n.queue = [];
			t = b.createElement(e);
			t.async = !0;
			t.src = v;
			s = b.getElementsByTagName(e)[0];
			s.parentNode.insertBefore(t, s)
		}(window, document, 'script',
		'https://connect.facebook.net/en_US/fbevents.js');
		fbq('init', '450305199516924');
		fbq('track', 'PageView');
	</script>
	<noscript><img height="1" width="1" style="display:none"
		src="https://www.facebook.com/tr?id=450305199516924&ev=PageView&noscript=1" />
	</noscript>
	<!-- End Facebook Pixel Code -->

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-186701844-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());

		gtag('config', 'UA-186701844-1');
	</script>

</head>

<body id="AppGP">
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
							<button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
							<!-- RD Navbar Brand-->
								<div class="rd-navbar-brand">
								<!--Brand-->
								<a id="logo" class="brand" href="/"><img class="brand-logo-light"
									src="{{ url('assets/images/site/Logo_saude.png') }}" alt=""
									style="display: block; width: 200px; max-height: 200px; margin-left: 75px; text-align: center;" /></a>
									{{-- <img class="brand-logo-dark" src="images/site/Logo_estilizado.png" alt="" width="157" height="35" /> --}}
								</div>
							</div>
							@include('site.bookbox.components.dropdownCart')
						</div>

						<div class="rd-navbar-main-outer" style="background-color: #8571a2;">
							<div class="rd-navbar-main">
								<div class="rd-navbar-nav-wrap">
									<ul class="rd-navbar-nav">
										<li class="rd-nav-item active"><a class="rd-nav-link" href="/">Home</a></li>
										<li class="rd-nav-item"><a href="/#whats_in" class="rd-nav-link">O Que Vem No Box</a></li>
										<li class="rd-nav-item"><a class="rd-nav-link" href="/#how_works">Como Funciona</a></li>
										<li class="rd-nav-item"><a class="rd-nav-link" href="/#boxes">Planos</a></li>
										<li class="rd-nav-item"><a href="/blog_post" class="rd-nav-link">Blog</a></li>
										<li class="rd-nav-item"><a href="/box_blog" class="rd-nav-link">Loja</a></li>
										{{-- <li class="rd-nav-item"><a class="rd-nav-link" href="/about">Sobre
											nós</a>
										</li> --}}
										{{-- <li class="rd-nav-item"><a class="rd-nav-link"
											href="/contact">Contato</a>
										</li> --}}
										{{-- <li class="rd-nav-item"><a class="rd-nav-link"
											href="/privacy-policy">Termos e Condições</a>
										</li> --}}
										<li class="rd-nav-item">
											<a class="rd-nav-link button button-lg button-shadow-4 button-secondary-3 button-zakaria" href="/pricing-list" target="blank" style="color: #fff;">Assine</a>
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

		<script src="https://unpkg.com/vue@next"></script>
		<script src="https://unpkg.com/vuex@4"></script>
		<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
		<script src="https://cdn.jsdelivr.net/npm/v-mask/dist/v-mask.min.js"></script>
		<script>
			// AppGP
			// Vue.withDirectives('mask', VueMask.VueMaskDirective)
		</script>

		@yield('scripts')
	</body>

	</html>
