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
						<li class="active">{{ trans('menu.team')}}</li>
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

<!-- Team
============================================= -->
<section id="team" class="team pb-0">
	<div class="container">
		<div class="row">
			@foreach($results->team as $item)
			<!-- Member #1 -->
			<div class="col-xs-12 col-sm-6 col-md-3 member">
				<div class="member-img">
					<img src="{!! asset('storage/team/' . $item->image) !!}" alt="{{ $item->name }}"/>
					<div class="member-bg">
					</div>
					<div class="member-overlay">
						{{--  <a href="#"><i class="fa fa-facebook"></i></a>
						<a href="#"><i class="fa fa-twitter"></i></a>
						<a href="#"><i class="fa fa-linkedin"></i></a>  --}}
						<h5>{{ $item->name }}</h5>
						{{--  <p>{{ internation($item, 'function_description') }} - {{ $item->school_information_name }}</p>  --}}
						<p>{{ internation($item, 'function_description') }}</p>
						{{--  <p>{{ internation($item, 'graduation_description') }}</p>
						<p>{{ internation($item, 'english_level_description') }}</p>  --}}
					</div>
				</div>
				<!-- .member-img end -->
				<div class="member-bio">
					<h3>{{ $item->name }}</h3>
					<p>{{ internation($item, 'function_description') }}</p>
				</div>
				<!-- <p>Graduada em Administração de Empresas com especialização em Gestão Financeira e pós-graduada em Gestão Escolar e Coordenação Pedagógica pela UNIARA.</p> -->
				<!-- .member-bio end -->
			</div>
			<!-- .member end -->
			@endforeach
			
		</div>
		<!-- .row end -->
	</div>
	<!-- .container end -->
</section>
@endsection