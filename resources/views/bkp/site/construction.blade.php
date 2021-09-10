@extends('layouts.site.site')

@section('title', 'Home')

@section('content')

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
						<li class="active">{{ trans('menu.ourSpace')}}</li>
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

<!-- Projects
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
				<?= internation($results->content[0], 'text') ?>
			</div>
			<!-- .col-md-6 end -->
		</div>
		<!-- .row end -->
	</div>
	<!-- .container end -->
</section>

<section id="projects" class="projects-grid projects-4col">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="heading heading-3 mb-0 text-center">
					<div class="heading-bg">
						<p class="mb-0">{{ trans('construction.specialEnvironments')}}</p>
						<h2>{{ trans('construction.environments')}}</h2>
					</div>
				</div>
				<!-- .heading end -->
			</div>
			<!-- .col-md-12 end -->
		</div>
		<!-- .row end -->
		<div class="row">
			
			<!-- Projects Filter
					============================================= -->
			<div class="col-xs-12 col-sm-12 col-md-12 projects-filter">
				<ul class="list-inline">
					<li>
						<a class="active-filter" href="#" data-filter="*">{{ trans('construction.allEnvironments')}}</a>
					</li>
					@foreach($results->category as $item)
					<li>
						<a href="#" data-filter=".{{ $item->id }}">{{ internation($item, 'description') }}</a>
					</li>
					@endforeach
				</ul>
			</div>
			<!-- .projects-filter end -->
		</div>
		<!-- .row end -->
		
		<!-- Projects Item
			============================================= -->
		<div id="projects-all" class="row">
			@foreach($results->construction as $item)
			<div class="col-xs-12 col-sm-6 col-md-3 project-item {{ $item->construction_category_id }}">
				<div class="project-img">
					<img class="img-responsive" src="{!! asset('storage/construction/' . $item->image) !!}" alt="{{ internation($item, 'description') }}"/>
					<div class="project-hover">
						<div class="project-meta">
							{{--  <h6>{{ internation($item, 'description') }}</h6>  --}}
							<h4>
								<a class="img-popup" href="{!! asset('storage/construction/' . $item->image) !!}" title="{{ internation($item, 'name') }} - {{ internation($item, 'description') }}">{{ internation($item, 'name') }}</a>
							</h4>
						</div>
						<div class="project-zoom">
							<a class="img-popup" href="{!! asset('storage/construction/' . $item->image) !!}" title="{{ internation($item, 'name') }} - {{ internation($item, 'description') }}"><i class="fa fa-plus"></i></a>
						</div>
					</div>
					<!-- .project-hover end -->
				</div>
				<!-- .project-img end -->
			</div>
			@endforeach
			
		</div>
		<!-- .row end -->
		
	</div>
	<!-- .container end -->
	
</section>

<!-- Call To Action #1
============================================= -->
<section id="cta-1" class="cta pb-0">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="cta-1 bg-theme">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-1 hidden-xs">
							<div class="cta-img">
								<!-- <img src="{!! asset('images/call/cta-1.png') !!}" alt="cta"> -->
							</div>
						</div>
						<!-- .col-md-2 end -->
						<div class="col-xs-12 col-sm-12 col-md-7 cta-devider text-center-xs">
							<div class="cta-desc">
								<p>{{ trans('construction.like')}}</p>
								<h5>{{ trans('construction.agende')}}</h5>
							</div>
						</div>
						<!-- .col-md-7 end -->
						<div class="col-xs-12 col-sm-12 col-md-2 pull-right pull-none-xs">
							<div class="cta-action">
								<a class="btn btn-secondary" href="{{ url('/scheduleVisit') }}">{{ trans('construction.schedule')}}</a>
							</div>
						</div>
						<!-- .col-md-2 end -->
					</div>
				</div>
				<!-- .cta-1 end -->
			</div>
			<!-- .col-md-12 end -->
		</div>
		<!-- .row end -->
	</div>
	<!-- .container end -->
</section>
@endsection