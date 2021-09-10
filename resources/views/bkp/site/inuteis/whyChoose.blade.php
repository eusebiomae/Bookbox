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
						<li>
							<a href="/home">{{ trans('menu.home')}}</a>
						</li>
						<li>
							<a href="#">{{ trans('menu.bilingualTeaching')}}</a>
						</li>
						<li class="active">{{ trans('menu.whyChoose')}}</li>
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
								<p class="mb-0">{{ internation($results->title[0], 'subtitle') }}</p>
								<h2>{{ internation($results->title[0], 'description')}}</h2>
							</div>
						</div>
						<!-- .heading end -->
					</div>
				</div>
			</div>
			<!-- .col-md-12 end -->
			<div class="col-xs-12 col-sm-12 col-md-12">
				<?= internation($results->content[0], 'text') ?>
				{{--  <h3 class="color-heading mb-sm font-18">Porque escolher a Bee Happy para a formação educacional do seu filho?</h3>
				<p class="mb-60">•	A Bee Happy é a única escola bilíngue de imersão em Araraquara, ou seja, aqui o as crianças “mergulham” no segundo idioma tornando o aprendizado significativo.</p>
				<p class="mb-60">•	A equipe pedagógica respeita o tempo de cada criança, estimulando-as em todas as suas inteligências.</p>
				<p class="mb-60">•	Acreditamos que as crianças devem ser livres para brincar, pois é a partir do lúdico que elas aprendem e desenvolvem habilidades importantes para seu desenvolvimento global!</p>
				<p class="mb-60">•	Na Bee Happy as crianças aprendem sobre a cultura, sociedade e culinária de diferentes países do mundo, incentivando a generosidade, flexibilidade e tolerância, formando crianças mais abertas ao mundo e aos demais.</p>
				<p class="mb-60">•	Refeições balanceadas e saudáveis são oferecidas pela escola incentivando as crianças a terem uma alimentação saudável, pois acreditamos que ela é a base para um bom desenvolvimento físico e emocional.</p>
				<p class="mb-60">•	Somos uma escola brasileira bilíngue e seguimos a estrutura curricular estipulada pelo MEC.</p>
				  --}}
				<a class="btn btn-secondary mb-30-xs" href="/pedagogicalProposal" style="width: 200px;">{{ trans('menu.pedagogicalProposal')}}</a>
			</div>
			<!-- .col-md-6 end -->
		</div>
		<!-- .row end -->
	</div>
	<!-- .container end -->
</section>

<!-- Call To Action #3
============================================= -->
<section id="cta-3" class="cta cta-3 bg-overlay bg-overlay-theme text-center">
	<div class="bg-section" >
		{{--  <img src="{!! asset('images/call/2.jpg') !!}" alt="Background"/>  --}}
	</div>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">
				<h2>{{ internation($results->pattern[0], 'title')}}</h2>
				<p class="mb-0">{{ internation($results->pattern[0], 'text') }}</p>
				<br>
				<div class="signiture">
					<p>{{ internation($results->pattern[0], 'subtitle') }}</p>
					<!-- <img src="{!! asset('images/call/sign.png') !!}" alt="signiture"/> -->
				</div>
			</div>
			<!-- .col-md-8 end -->
		</div>
		<!-- .row end -->
	</div>
	<!-- .container end -->
</section>
<!-- #cta-3 end -->


@endsection