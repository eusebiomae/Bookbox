@extends('site.cetcc.layout.layout')
@section('title', 'Home')
@section('content')
	@include('site.cetcc.components.carrossel')
	@include('site.cetcc.components.features', [ 'features' => $features ])
	@include('site.cetcc.components.categories_courses', [ 'categoriesCourseType' => $categoriesCourseType ])
	@if (isset($contentsSection[3]))
		@include('site.cetcc.components.home_about', $contentsSection[3]->content[0] )
	@endif
	@include('site.cetcc.components.gallery_couse', [ 'courseCategories' => $courseCategories ])

	@include('site.cetcc.components.course_pop', [ 'courses' => $courses ])

	@if (isset($event) && !empty($event))
		@include('site.cetcc.components.home_about', $event)
	@endif

	@include('site.cetcc.components.news_blog', [ 'blogPosts' => $blogPosts ])

	@include('site.cetcc.components.short_info', [ 'contentsSection' => $contentsSection[1] ])

	@include('site.cetcc.components.testemunial', [ 'testemonial' => $testemonial ])

	<div class="clearfix" style = "background-color: #27F0FF; color: #022138; padding: 15px 0; text-align: center;">
		<div class="container">
			@include('site.cetcc.components.newsletter')
		</div>
	</div>

@endsection

@section('scripts')
@parent

<!-- SPECIFIC SCRIPTS -->
<script src="{!! asset('cetcc/layerslider/js/greensock.js') !!}"></script>
<script src="{!! asset('cetcc/layerslider/js/layerslider.transitions.js') !!}"></script>
<script src="{!! asset('cetcc/layerslider/js/layerslider.kreaturamedia.jquery.js') !!}"></script>
<script type="text/javascript">
	'use strict';
	$('#layerslider').layerSlider({
		autoStart: true,
		navButtons: false,
		navStartStop: false,
		showCircleTimer: false,
		responsive: true,
		// responsiveUnder: 1280,
		responsiveUnder: 430,
		layersContainer: 1200,
		skinsPath: '/cetcc/layerslider/skins/'
		// Please make sure that you didn't forget to add a comma to the line endings
		// except the last line!
	});
	$(document).ready(function(){
		$("#reccomended").owlCarousel({
		});
	});
</script>
<!-- comentario -->

@endsection
