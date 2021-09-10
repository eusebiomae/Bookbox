<!DOCTYPE html>
<html dir="ltr" lang="pt-BR">
<head>
<!-- Document Meta
============================================= -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!--IE Compatibility Meta-->
<meta name="company" content="Bee Happy Bilingue - Araraquara/SP" />
<meta name="url" content="http://www.beehappybilingue.com.br" />
<!--palavras chaves para pesquisas (google, bing, yahoo, etc.)-->
<meta name="keywords" content="Bee Happy Bilingue, Bee Happy, bee, happy, escola, araraquara, Escola Araraquara, Escola, Escola infantil, escola ensino fundamental, berçário, bilinguismo, Bilingue, educação araraquara">
<!--Indica o que se trata o site, decrição do site, qual o assunto relacionado -->
<meta name="description" content="Bee Happy Bilingual Shool Group é referência na qualidade do ensino, reconhecida pelo pionerismo em ensino bilingue na região, sua liderança inovadora, responsabilidade com que conduz a formação integral de seus alunos (Berçário, Educação Infantil, Fundamental I), satisfação e realização profissional de seus colaboradores.">
<!-- Indexar a página e todos os links nela contida -->
<meta name="Robots" content="index, follow">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="author" content="GigaPixel -  Design & Technology" />

<link href="{!! asset('images/favicon/favicon2.ico') !!}" rel="icon">
<!-- Stylesheets
============================================= -->
<link rel="stylesheet" type="text/css" href="{!! asset('css/css_pleno/bootstrap.min.css') !!}">
<link rel="stylesheet" type="text/css" href="{!! asset('css/css_pleno/animate.css') !!}">
<link rel="stylesheet" type="text/css" href="{!! asset('css/css_pleno/meanmenu.css') !!}">
<link rel="stylesheet" type="text/css" href="{!! asset('css/css_pleno/magnific-popup.css') !!}">
<link rel="stylesheet" type="text/css" href="{!! asset('css/css_pleno/owl.carousel.min.css') !!}">
<link rel="stylesheet" type="text/css" href="{!! asset('css/css_pleno/font-awesome.min.css') !!}">
<link rel="stylesheet" type="text/css" href="{!! asset('css/css_pleno/et-line-icon.css') !!}">
<link rel="stylesheet" type="text/css" href="{!! asset('css/css_pleno/reset.css') !!}">
<link rel="stylesheet" type="text/css" href="{!! asset('css/css_pleno/ionicons.min.css') !!}">
<link rel="stylesheet" type="text/css" href="{!! asset('css/css_pleno/material-design-iconic-font.min.css') !!}">
<link rel="stylesheet" type="text/css" href="{!! asset('css/css_pleno/style.css') !!}">
<link rel="stylesheet" type="text/css" href="{!! asset('css/css_pleno/responsive.css') !!}">

<!-- Style CSS -->
@yield('css')

<script src="js/js_pleno/vendor/modernizr-2.8.3.min.js"></script>

<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
<!--[if lt IE 9]>
      <script src="{!! asset('js/html5shiv.js') !!}assets/js/html5shiv.js"></script>
      <script src="{!! asset('js/respond.min.js') !!}assets/js/respond.min.js"></script>
    <![endif]-->

<!-- Document Title
    ============================================= -->
<title>Pleno - @yield('title') </title>

@yield('styles')
</head>
<body>

  <!-- Wrapper-->
    <div id="wrapper">

        <!-- Navigation -->
        {{-- @include('layouts.site.navigation') --}}

        <!-- Page wraper -->
        <div id="page-wrapper" class="gray-bg">

            <!-- Page wrapper -->
            @include('layouts.site.topnavbar')

            <!-- Main view  -->
            @yield('content')

            <!-- Footer -->
            @include('layouts.site.footer')

        </div>
        <!-- End page wrapper-->

    </div>
    <!-- End wrapper-->

@show

<!-- Footer Scripts
============================================= -->
<script src="{!! asset('js/vendor/jquery-1.12.0.min.js') !!}"></script>
<script src="{!! asset('js/bootstrap.min.js') !!}"></script>
<script src="{!! asset('js/jquery.meanmenu.js') !!}"></script>
<script src="{!! asset('js/jquery.magnific-popup.js') !!}"></script>
<script src="{!! asset('js/ajax-mail.js') !!}"></script>
<script src="{!! asset('js/owl.carousel.min.js') !!}"></script>
<script src="{!! asset('js/jquery.mb.YTPlayer.js') !!}"></script>
<script src="{!! asset('js/jquery.nicescroll.min.js') !!}"></script>
<script src="{!! asset('js/plugins.js') !!}"></script>
<script src="{!! asset('js/main.js') !!}"></script>

<script src="{!! asset('js/menu_internationalization.js') !!}"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyAIpR_Z00lXTP4Etxzuh7cKH9M0l1hysio&sensor=true"></script>
<script type="text/javascript" src="{!! asset('js/jquery.gmap.min.js') !!}"></script>
<?php //print_r($results->contact[0]->address); die; ?>
@yield('scripts')
<script type="text/javascript">
    // console.log('{{ $results->contact[0]}}');
    selectLanguage('<?=Lang::locale()?>');
    $('#googleMap, #googleMapModal').gMap({
		address: "{{ $results->contact[0]->address }}, {{ $results->contact[0]->number }}, {{ $results->contact[0]->neighborhood }}, {{ $results->contact[0]->city }}, {{ $results->contact[0]->state_abbreviation }}, {{ $results->contact[0]->cep }}",
		zoom: 17,
		markers:[
			{
				address: "{{ $results->contact[0]->address }}, {{ $results->contact[0]->number }}, {{ $results->contact[0]->neighborhood }}, {{ $results->contact[0]->city }}, {{ $results->contact[0]->state_abbreviation }}, {{ $results->contact[0]->cep }}",
				maptype:'ROADMAP',
			}
		]
	});
</script>

</body>
</html>
