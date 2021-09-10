@extends('layouts.site.site')

@section('title', 'Home')

@section('styles')
<style type="text/css">
	#corteIframe {
		position: absolute;
		clip: rect(600px,750px,2650px,0px); 
		width: 750px; /* pode colocar o mesmo valor do segundo parâmetro */
		margin-top: -600px;
	}

	#prattinhus {
		min-height: 2300px;
	}

	.footer-iframe {
		position: absolute;
		height: 45px;
		width: 100%;
		bottom: 0;
		background: #ffffff;
	}
</style>
@endsection

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
						<li class="active">{{ trans('menu.healthyEating')}}</li>
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
				{{--  <h3 class="color-heading mb-sm font-18">A Bee Happy Bilingual School Group, não só se preocupa com todas as questões pedagógicas, mas também se responsabiliza com a alimentação de cada criança, pois sabemos que é nessa fase que se inicia os bons hábitos alimentares. </h3>

				<p class="mb-60">A BEE HAPPY oferece almoço, lanches e jantar com foco em uma dieta balanceada, incentivando os alunos a experimentarem novos alimentos, visando sua nutrição e saúde.</p>
				<p class="mb-60">Prezamos por uma dieta saudável e equilibrada, com ingredientes selecionados, ingestão moderada de açúcar, para que os pais fiquem despreocupados com a alimentação de seus filhos na escola! </p>
				<p class="mb-60">Sucos naturais e frutas da estação são oferecidos em todas as refeições. Nosso cardápio é variado e compõe-se de arroz integral, feijão, carnes magras, legumes e verduras cozidos e frescos. Não servimos frituras de imersão, embutidos ou carne de porco.</p>

				<h3 class="color-heading mb-sm font-18">Crianças com alergias alimentares:</h3>

				<p class="mb-60">Seguir à risca as orientações do médico é imprescindível pois as reações graves e fatais podem ocorrer em qualquer idade, mesmo na primeira exposição conhecida ao alimento. </p>

				<p class="mb-60">A Bee Happy possui atendimento individualizado aos alunos que apresentam intolerância ou alergia a algum alimento. Além disso, a escola possui uma política alimentar inclusiva, onde a escola procura se adequar às restrições alimentares de seus alunos alérgicos.</p>  --}}
				<?= internation($results->content[0], 'text') ?>
			</div>
			<!-- .col-md-6 end -->
		</div>
		<!-- .row end -->
	</div>
	<!-- .container end -->
</section>

<section id="prattinhus" class="">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="heading heading-4">
							<div class="heading-bg heading-right">
								<p class="mb-0">{{ trans('healthyEating.feeding')}}</p>
								<h2>{{ trans('healthyEating.menu')}}</h2>
							</div>
						</div>
						<!-- .heading end -->
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div id="corteIframe" class="col-xs-12 col-sm-12 col-md-12">
							<iframe src="http://prattinhus.com.br/bee-happy/" width="1024px" height="2650px" style=" border: none;" scrolling="no"></iframe>
							<div class="footer-iframe"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection

@section('scripts')

@endsection