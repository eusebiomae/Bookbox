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
						<li><a href="#">{{ trans('menu.beeHappy')}}</a></li>
						<li class="active">{{ trans('menu.aboutUs')}}</li>
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
								<p class="mb-0">{{ internation($results->history[0], 'subtitle') }}</p>
								<h2>{{ internation($results->history[0], 'title')}}</h2>
							</div>
						</div>
						<!-- .heading end -->
					</div>
				</div>
			</div>
			<!-- .col-md-12 end -->
			<div class="col-xs-12 col-sm-12 col-md-12">
				<?= internation($results->history[0], 'text') ?>
				<br>
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
				
				<div class="signiture">
					<p>{{ internation($results->pattern[0], 'subtitle')}}</p>
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

<!-- Shortcode #6 
============================================= -->
<section id="shortcode-6" class="shortcode-6 bg-gray text-center-xs">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="heading heading-4">
					<div class="heading-bg heading-right">
						<p class="mb-0">{{ internation($results->philosophy[0], 'subtitle') }}</p>
						<h2>{{ internation($results->philosophy[0], 'title')}}</h2>
					</div>
				</div>
				<!-- .heading end -->
			</div>
			<!-- .col-md-12 end -->
		</div>
		<!-- .row end -->
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<?= internation($results->philosophy[0], 'text') ?>
				
				{{--  <p class="mb-60">Ser cidadão é possuir direitos e deveres dentro de uma determinada sociedade/comunidade. Os indivíduos são orientados desde pequenos para que possam respeitar a Constituição e por ela serem respeitados. Instruímos nossas crianças para que elas sejam cidadãos baseados no amor e na ética, e que influenciem de forma positiva a comunidade ao seu redor. </p>
				<p class="mb-60">Educação é um conceito que se refere ao processo de desenvolvimento de capacidades e habilidades. Através desses processos formativos que ocorrem no ambiente escolar, os alunos adquirem os conhecimentos e são preparados para a vida em sociedade.</p>
				<p class="mb-60">Acreditamos que a escola é uma pequena sociedade, na qual os alunos aprendem e assimilam os conhecimentos de forma significativa e se desenvolvem integralmente, para isso, necessitam de regras de convivência, valores e aprendem a aceitar o outro e suas diferenças. Cremos que todos os valores e ensinamentos passados para as crianças dentro dessa sociedade escolar será levado pelos educandos por uma vida inteira. Por isso, existimos enquanto espaço de formação acadêmica, social e moral da criança, visando não apenas cumprir ou preencher o currículo regular, mas também informar e educar a criança para esta tornar-se um bom cidadão.</p>  --}}
			</div>
			<!-- .col-md-6 end -->
		</div>
		<!-- .row end -->
	</div>
	<!-- .container end -->
</section>

<!-- Shortcode #10 
============================================= -->
<section>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-6">
						<div class="heading heading-4">
							<div class="heading-bg heading-right">
								<p class="mb-0"></p>
								<h2>{{ internation($results->mission[0], 'content_section_description') }}</h2>
							</div>
						</div>
						<!-- .heading end -->
					</div>
				</div>
			</div>
			<!-- .col-md-12 end -->
			<div class="col-xs-12 col-sm-12 col-md-6">
				<div class="panel-group accordion" id="accordion02" role="tablist" aria-multiselectable="true">
					@foreach($results->mission as $item)
					<!-- Panel 01 -->
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="{{ $item->id}} ">
							<h4 class="panel-title">
								<a class="accordion-toggle" 
									role="button" 
									data-toggle="collapse" 
									data-parent="#accordion02" 
									href="#collapse02-{{ $item->id}}" 
									aria-expanded="true" 
									aria-controls="collapse02-{{ $item->id}}"> {{ internation($item, 'title') }}  
								</a>
								<span class="icon"></span>
							</h4>
						</div>
						<div id="collapse02-{{ $item->id}}" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="{{ $item->id}} ">
							<div class="panel-body">
								<?= internation($item, 'text') ?>
							</div>
						</div>
					</div>
					@endforeach
				</div>
				<!-- End .Accordion-->
			</div>
			<!-- .col-md-6 end -->
			<div class="col-xs-12 col-sm-12 col-md-6">
				<div id="testimonial-oc-5"  class="testimonial-slide testimonial testimonial-3">
					<div class="testimonial-item">
						<div class="testimonial-content">
							<p><?= internation($results->pattern[1], 'text') ?></p>
							<div class="testimonial-img">
								<!-- <img src="{!! asset('js/functions.js') !!}images/testimonial/3.png" alt="author"/> -->
							</div>
						</div>
						<div class="testimonial-meta">
							<!-- <strong>Begha</strong>, Art Director -->
						</div>
					</div>
					<!-- .testimonial-item end -->
				</div>
			</div>
			<!-- .col-md-6 end -->
		</div>
		<!-- .row end -->
	</div>
	<!-- .container end -->
</section>
@endsection