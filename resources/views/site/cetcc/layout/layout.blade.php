<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<?php $metaTags = [
		'url' => 'http://www.cetcc.com.br',
		'company' => 'Centro de Estudo em Terapia Cognitivo-Comportamental - São Paulo/SP',
		'keywords' => 'CETCC, psicologia, terapia comportamental, tcc, Terapia Cognitivo Comportamental, escola, são paulo, escola são paulo, pós-graduacao, especialização, psicólogo, beck, tcc do beck, especilização São Paulo',
		'description' => 'O CETCC é a Escola de Pós-graduacão em Terapia Cognitivo-comportamental de Beck que mais forma especialistas na abordagem, atualmente.',
		'Robots' => 'index, follow',
		'viewport' => 'width=device-width, initial-scale=1.0',
		'author' => 'GigaPixel -  Design & Technology',
	] ?>

	@if (isset($pageComponents))
		@foreach ($pageComponents->metaTag as $metaTag)
			<?php $metaTags[$metaTag->name] = $metaTag->content ?>
		@endforeach
	@endif

	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<!--IE Compatibility Meta-->

	@foreach ($metaTags as $name => $content)
		<meta name="{{ $name }}" content="{{ $content }}" />
	@endforeach

	<!-- Favicons-->
	<link rel="shortcut icon" href="{!! asset('cetcc/img/logo_small.png') !!}" type="image/x-icon">
	<link rel="apple-touch-icon" type="image/x-icon" href="{!! asset('cetcc/img/logo_small.png') !!}">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="{!! asset('cetcc/img/logo_small.png') !!}">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="{!! asset('cetcc/img/logo_small.png') !!}">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="{!! asset('cetcc/img/logo_small.png') !!}">

	<!-- GOOGLE WEB FONT -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800" rel="stylesheet">

	<!-- BASE CSS -->
	<link href="{!! asset('lib/bootstrap-4.5.0/css/bootstrap.min.css') !!}" rel="stylesheet">
	<link href="{!! asset('cetcc/css/vendors.css') !!}" rel="stylesheet">
	<link href="{!! asset('cetcc/css/icon_fonts/css/all_icons.min.css') !!}" rel="stylesheet">
	<link href="/font-awesome/css/font-awesome.css" rel="stylesheet">
	<!-- SPECIFIC CSS -->
	<link href="{!! asset('cetcc/layerslider/css/layerslider.css') !!}" rel="stylesheet">

	<!-- YOUR CUSTOM CSS -->
	@yield('css')
	<link href="{!! asset('cetcc/css/style.css') !!}" rel="stylesheet">
	<link href="{!! asset('cetcc/css/custom.css') !!}" rel="stylesheet">
	<link href="{!! asset('cetcc/css/plugins/toastr/toastr.min.css') !!}" rel="stylesheet">
	<title>CETCC - @yield('title') </title>
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0], j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-WMGKHBP');</script>
	<!-- End Google Tag Manager -->

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-146580573-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-146580573-1');
	</script>

	{{-- reCAPTCHA --}}
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
	<!-- Wrapper-->
	<div id="wrapper1">

		<!-- Page wraper -->
		<div id="page-wrapper1" class="gray-bg">
			<div id="page1">
				<!-- Page wrapper -->
				@include('site.cetcc.layout.topnavbar')
				<main>
					<!-- Main view  -->
					@yield('content')
				</main>

				<!-- Footer -->
				@include('site.cetcc.layout.footer')
			</div>
		</div>
		<!-- End page wrapper-->
	</div>

<!-- End wrapper-->
@show
<!-- Footer Scripts
	============================================= -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="{!! asset('lib/bootstrap-4.5.0/js/bootstrap.bundle.min.js') !!}"></script>
	{{-- <script src="{!! asset('js/jquery-3.1.1.min.js') !!}"></script> --}}
	<script src="{!! asset('cetcc/js/common_scripts.js') !!}"></script>
	<script src="{!! asset('cetcc/js/main.js') !!}"></script>
	{{-- <script src="{!! asset('cetcc/assets/validate.js') !!}"></script> --}}
	<script src="{!! asset('js/gp-ays.js') !!}"></script>
	<script src="{!! asset('js/app.js') !!}" type="text/javascript"></script>

	{{-- <script src="https://widget.flowxo.com/embed.js" data-fxo-widget="eyJ0aGVtZSI6InJnYigwLCA3MCwgMTM4KSIsIndlYiI6eyJib3RJZCI6IjVjZDJmNTFmYjkyYzAwMDA0NDc3NTljMiIsInRoZW1lIjoicmdiKDAsIDcwLCAxMzgpIiwibGFiZWwiOiJGYWxlIGNvbm9zY28ifSwicG9wdXBIZWlnaHQiOiI3MCUifQ==" async defer></script> --}}
	<link href="/font-awesome/css/font-awesome.css" rel="stylesheet">
	<script>
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		var APP = {}
	</script>

	<script src="{!! asset('js/plugins/toastr/toastr.min.js') !!}" type="text/javascript"></script>
	<script src="{!! asset('js/app.js') !!}" type="text/javascript"></script>
	<script>
		toastr.options = {
			closeButton: true,
			progressBar: true,
			preventDuplicates: false,
			showMethod: 'slideDown',
			positionClass: "toast-top-right",
			showDuration: "400",
			hideDuration: "1000",
			timeOut: "7000",
			extendedTimeOut: "1000",
			showEasing: "swing",
			hideEasing: "linear",
			showMethod: "slideDown",
			hideMethod: "slideUp"
		}

		var feedbackMessages = {!! old('feedbackMessages') ? json_encode(old('feedbackMessages')) : '[]' !!}

		for (var i = 0; i < feedbackMessages.length; i++) {
			toastr[feedbackMessages[i].type](feedbackMessages[i].body, feedbackMessages[i].title);
		}
	</script>
	@yield('scripts')

	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WMGKHBP" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->

</body>
</html>
