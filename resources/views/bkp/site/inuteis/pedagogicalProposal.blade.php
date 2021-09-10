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
						<li class="active">{{ trans('menu.pedagogicalProposal')}}</li>
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
				{{--  <h3 class="color-heading mb-sm font-18">A proposta pedagógica da Bee Happy Bilingual School Group tem a preocupação de  desenvolver a formação integral da criança, buscando estimular o interesse do aluno, para que ele consiga trabalhar em grupo, buscar com naturalidade e de forma saudável a resolução de problemas, estimulando assim sua criatividade e autonomia. Nosso intuito é de formar pessoas criticas, autônomas e preparadas para os desafios e conquistas apresentadas pela sociedade.</h3>

				<p class="mb-60">A busca da Bee Happy é despertar e estimular o interesse e avanço das crianças, respeitando suas faixas etárias, promovendo um trabalho interativo e em equipe, capaz de promover a autonomia intelectual de seus alunos, por meio de uma abordagem sociointeracionista construtivista, sempre em um ambiente bilíngue.</p>
				<p class="mb-60">O propósito é levar a criança a construir o seu próprio conhecimento através da exploração do seu corpo, dos objetos, do espaço onde está inserida e das suas relações com o outro. Desta forma, ampliando sua capacidade de descoberta e construção de conhecimentos, as crianças vão ingressando, de modo consciente, na dinâmica da vida e se constituindo, como sujeitos históricos, críticos e participativos. O educador tem um papel fundamental nesse processo, pois é ele quem auxilia as crianças a desenvolverem suas habilidades, bem como a avançar em seu desenvolvimento. As atividades são programadas de forma a inserir o conteúdo a ser trabalhado dentro do objetivo a ser alcançado pela instituição, envolvendo a família e a comunidade.</p>  --}}
				<?= internation($results->content[0], 'text') ?>
			</div>
			<!-- .col-md-6 end -->
		</div>
		<!-- .row end -->
	</div>
	<!-- .container end -->
</section>

<section>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="panel-group accordion" id="accordion02" role="tablist" aria-multiselectable="true">
					@foreach($results->benefits as $item)
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
					{{--  <!-- Panel 01 -->
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingOne">
							<h4 class="panel-title">
								<a class="accordion-toggle" role="button" data-toggle="collapse" data-parent="#accordion02" href="#collapse02-1" aria-expanded="true" aria-controls="collapse02-1"> ARRUMAR – AMBIENTES EDUCATIVOS</a>
								<span class="icon"></span>
							</h4>
						</div>
						<div id="collapse02-1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
							<div class="panel-body">
								Na FourC, todos os ambientes estão projetados para um espaço de aprendizagem. Para isso, adotamos o VISUAL LEARNING, onde o processo de aprendizagem pode ser visualizado nas paredes da sala, através de cartazes, exposição de desenhos e fotos. Assim, o aluno pode acompanhar o próprio desenvolvimento como um processo, além de buscar o seu aprendizado, exercitando a autonomia. 
							</div>
						</div>
					</div>
					
					<!-- Panel 02 -->
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingTwo">
							<h4 class="panel-title">
								<a class="accordion-toggle collapsed" role="button" data-toggle="collapse" data-parent="#accordion02" href="#collapse02-2" aria-expanded="false" aria-controls="collapse02-2"> DESENVOLVIMENTO DE PROJETOS </a>
							</h4>
						</div>
						<div id="collapse02-2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
							<div class="panel-body">
								Na FourC, parte da avaliação é feita por meio da apresentação de projetos dos alunos, estimulando a habilidade de pesquisar, estudar e buscar respostas. Assim, a AVALIAÇÃO é feita por competências desenvolvidas e objetivos alcançados. Vale destacar que, na FourC, a avaliação é processual, progressiva e contínua. O projeto permite níveis mais profundos de pensamentos e o processo de criação e análise torna a aprendizagem contrata, divertida e para sempre.
							</div>
						</div>
					</div>
					
					<!-- Panel 03 -->
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingThree">
							<h4 class="panel-title">
								<a class="accordion-toggle collapsed" role="button" data-toggle="collapse" data-parent="#accordion02" href="#collapse02-3" aria-expanded="false" aria-controls="collapse02-3"> TEMAS TRIMESTRAIS E A INTERDISCIPLINARIDADE </a>
							</h4>
						</div>
						<div id="collapse02-3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
							<div class="panel-body">
								A FourC trabalha de modo interdisciplinar, voltada para projetos e para a criação do aluno. Assim, trimestralmente é estudado um tema central em toda a escola, e todas as disciplinas abordam esse tema. Os temas proporcionam a convergência da INTERDISCIPLINARIDADE de trabalho das grandes áreas de conhecimento. Assim, as disciplinas de ciências naturais e sociais, se fundem com Matemática, Português/Inglês, Geografia, Artes, História, Música e etc. Os alunos trabalham conteúdos sugeridos pelos Parâmetros Curriculares Nacionais baseados no tema do trimestre.

							</div>
						</div>
					</div>

					<!-- Panel 03 -->
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingThree">
							<h4 class="panel-title">
								<a class="accordion-toggle collapsed" role="button" data-toggle="collapse" data-parent="#accordion02" href="#collapse02-3" aria-expanded="false" aria-controls="collapse02-3"> PRÁTICAS COLABORATIVAS</a>
							</h4>
						</div>
						<div id="collapse02-3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
							<div class="panel-body">
								No período integral, o aluno aprende com AUTONOMIA E COLABORAÇÃO, desenvolvendo suas potencialidades, e ao mesmo tempo, recebe o estímulo à curiosidade natural. A discussão de ideias de forma profunda deve desdobrar-se em conhecimento capaz de ampliar as escolhas e a capacidade de decisão.<br><br>A FourC entende que os resultados necessários para um aluno estar bem preparado e feliz, só serão alcançados quando ele consegue ter visão, disposição e pensamento crítico que o torne capaz de entender as escolhas e oportunidade da vida.
							</div>
						</div>
					</div>  --}}

				</div>
				<!-- End .Accordion-->
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
				<h3>{{ internation($results->pattern[0], 'title') }}</h3>
				<?= internation($results->pattern[0], 'text') ?>
				{{--  <h3>Cidadania, Pensamento Crítico, Cultura e Colaboração.</h3>
				<p>“Não se pode esperar resultados diferentes, fazendo as coisas da mesma forma.”</p>  --}}
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