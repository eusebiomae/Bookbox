@extends('layouts.site.site')

@section('title', 'Home')

@section('content')

<!-- Page Title
============================================= -->
<section class="bg-overlay bg-overlay-gradient pb-0">
	<div class="bg-section" >
			<img src="{!! asset('storage/slides/' . $results->slide[0]->image) !!}" alt="Background"/>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="page-title title-1 text-center">
					<div class="title-bg">
							<h2>{{ internation($results->slide[0], 'title')}}</h2>
					</div>
					<ol class="breadcrumb">
						<li><a href="/home">{{ trans('menu.home')}}</a></li>
						<li><a href="#">{{ trans('menu.methodology')}}</a></li>
						<li class="active">{{ trans('menu.learningPlayful')}}</li>
					</ol>
				</div>
				<!-- .page-title end -->
			</div>
			<!-- .col-md-12 end -->
		</div>
		<!-- .row end -->
	</div>
	<!-- .container end -->
</section>

<!-- Shortcode #1 
============================================= -->
<section id="shotcode-1" class="shotcode-1 text-center-xs text-center-sm">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="heading heading-4">
							<div class="heading-bg heading-right">
								<p class="mb-0">{{ internation($results->content[0], 'subtitle') }}</p>
								<h2>{{ internation($results->content[0], 'title')}}</h2>
							</div>
						</div>
						<!-- .heading end -->
					</div>
				</div>
			</div>
			<!-- .col-md-12 end -->
			<div class="col-xs-12 col-sm-12 col-md-12">
				{{--  <h3 class="color-heading mb-sm font-18">Entendemos que o brincar e as interações lúdicas são a linguagem que a criança usa para compreender o mundo. Portanto, nossa metodologia proporciona e facilita a brincadeira. Nosso alicerce configura-se no aprendizado através da experiência, convidamos as crianças a manipular, explorar e experimentar objetos de diferente texturas, cores, cheiros. Durante as brincadeiras elas falam, movimentam-se, fazem gestos, aprendendo novas palavras, novos significados e ideias.</h3>

				<p class="mb-60">Estimulamos a imaginação e a criatividade, promovendo, assim, o desenvolvimento emocional, físico e social. Como consequência as crianças aprendem a lidar com sentimentos, a interagir com outras crianças e adultos, a respeitar o próximo, e encarar desafios com habilidade, minorando sofrimento ou estresse. </p>
				<p class="mb-60">A equipe da Bee Happy valoriza a individualidade de cada criança e utiliza atividades e brincadeiras que se ajustam à fase de desenvolvimento de cada uma. Ainda, realizamos atividades em grupos de diferentes idades, pois acreditamos que os mais novos aprendem a partir da observação e os mais velhos se beneficiam do cuidado com os menores.</p>  --}}
				<?= internation($results->content[0], 'text') ?>
			</div>
			<!-- .col-md-6 end -->
		</div>
		<!-- .row end -->
	</div>
	<!-- .container end -->
</section>


@endsection