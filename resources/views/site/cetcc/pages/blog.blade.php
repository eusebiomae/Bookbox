<?php
	$lv = [
		'class' => 'row divBlogContent',
		'component' => 'site.cetcc.components.card',
		'active' => [
			'0' => 'active',
			'1' => '',
		]
	];

	if (isset($params['lv']) && $params['lv'] == 1) {
		$lv = [
			'class' => '',
			'component' => 'site.cetcc.components.card_wide',
			'active' => [
				'0' => '',
				'1' => 'active',
			]
		];
	}
?>

@extends('site.cetcc.layout.layout')
@section('css')
@parent
<link href="{!! asset('cetcc/css/blog.css') !!}" rel="stylesheet">

@endsection

@section('title', $title)

@section('content')
{{-- BANNER --}}
@include('site.cetcc.components.banner')

<!-- MENU FILTERS -->
<div class="filters_listing gp-bkg-yellow sticky_horizontal">
	<div class="container">
		<ul class="clearfix">
			<li>
				<div class="switch-field media-max-width-575">
					@if ($flgPage == 'scholarship')
						<input type="radio" id="all" name="listing_filter" value="all" {{ !isset($params['view']) ? 'checked' : '' }} >
						<label for="all" onclick="location.search = ''">Todos</label>

						@foreach ($courseCategoryType as $type)
							<input type="radio" id="{{ $type->flg }}" name="listing_filter" value="{{ $type->flg }}" {{ isset($params['view']) && $params['view'] == $type->flg ? 'checked' : '' }}>
							<label for="{{ $type->flg }}" onclick="location.search = 'view={{ $type->flg }}'">{{ $type->title }}</label>
						@endforeach
					@else
						<input type="radio" id="all" name="listing_filter" value="all" {{ !isset($params['view']) ? 'checked' : '' }} >
						<label for="all" onclick="location.search = ''">Todos</label>
						<input type="radio" id="views" name="listing_filter" value="views" {{ isset($params['view']) && $params['view'] == 'views' ? 'checked' : '' }}>
						<label for="views" onclick="location.search = 'view=views'">+<i class="icon-eye"></i> <span class="mmw-575-hide">Visualizados</span></label>
						<input type="radio" id="likes" name="listing_filter" value="likes" {{ isset($params['view']) && $params['view'] == 'likes' ? 'checked' : '' }}>
						<label for="likes" onclick="location.search = 'view=likes'"><i class="icon-heart"></i> <span class="mmw-575-hide">Preferidos</span></label>
					@endif
				</div>
			</li>
			<li>
				<div class="layout_view hide">
					<a href="javaScript: layout_view(0)" class="{{ $lv['active']['0'] }}"><i class="icon-th"></i></a>
					<a href="javaScript: layout_view(1)" class="{{ $lv['active']['1'] }}"><i class="icon-th-list"></i></a>
				</div>
			</li>
			<li>
				<select name="category" class="selectbox" onchange="onCategoryChange(event)">
					<option value="">Área</option>
					@foreach ($categories as $category)
						<option value="{{ $category->id }}">{{ $category->description }}</option>
					@endforeach
				</select>
			</li>
		</ul>
	</div>
	<!-- /container -->
</div>

{{-- MAIN --}}
<div class="container margin_60_35">
	<div class="row divBlogContent">
		<div class="col-lg-9">
			{{-- CONTEUDO --}}
			<div class="{{ $lv['class'] }}">
				@foreach ($posts->items() as $post)
					@component($lv['component'], [
						'data' => $post,
					])
						@slot('link')
							@if ($flgPage == 'scholarship')
								/shopping_journey?scholarship={{ $post->id }}
							@else
								/{{ getValueByColumn($post, 'category.flg_type') }}/{{ $post->id }}/{{ urlencode($post->title) }}
							@endif
						@endslot
						@slot('category')
							@if ($flgPage == 'scholarship')
								{{ $post->courseCategoryType->title.' - '.$post->courseSubcategory->description_pt.' - '.$post->courseCategory->description_pt }}
							@else
								{{ getValueByColumn($post, 'category.description') }}
							@endif
						@endslot
						@if ($flgPage != 'scholarship')
							@slot('author')
								{{ getValueByColumn($post, 'author.name') }}
							@endslot
							@slot('img_author')
								{{ getValueByColumn($post, 'author.image') }}
							@endslot
							@slot('img_card')
								{{ Storage::url("blog/{$post->image}") }}
							@endslot
						@endif
					@endcomponent
				@endforeach
			</div>
			{{-- PAGINATION --}}
			@include('site.cetcc.components.pagination', ['pagination' => $posts])
		</div>

		{{-- MENU LATERAL --}}
		<aside class="col-lg-3" id="filters_col" style="height:max-content;">

			<form method="get" action="{{ ($flgPage != 'scholarship') ? '/blog' : '/scholarship'}}">
				{{-- Search --}}
				@include('site.cetcc.components.sidebar_search')

				{{-- FILTER_CATEGORY --}}
				@include('site.cetcc.components.filter_category')
			</form>

			{{-- SIDEBAR_CARD --}}
			@if ($flgPage != 'scholarship')
				@include('site.cetcc.components.sidebar_card', $sidebarCard['recentPosts'])
				@include('site.cetcc.components.sidebar_card', $sidebarCard['recommendedCourse'])
			@endif

			{{-- SIDEBAR_POPULAR_TAGS --}}
			@if ($flgPage != 'article' && $flgPage != 'scholarship')
				@include('site.cetcc.components.sidebar_popular_tags')
			@endif

			<!-- /widget -->
		</aside>
	</div>
	<!-- /row -->
</div>

<!-- /container -->
@endsection

@section('scripts')
@parent
<script type="text/javascript" src="{!! asset('cetcc/js/mapmarker.jquery.js') !!}"></script>
<script type="text/javascript" src="{!! asset('cetcc/js/mapmarker_func.jquery.js') !!}"></script>
<script>
	function toggleLiked(event) {
		var target = event.target;
		if (target.dataset.liked) {
			var isLiked = !target.classList.contains('liked');

			if (isLiked) {
				target.classList.add('liked');
			} else {
				target.classList.remove('liked');
			}

			$.get('/blog/liked/' + target.dataset.liked + '/' + isLiked);
		}
	}

	document.querySelectorAll('[data-liked]').forEach(function(elem) {
		elem.removeEventListener('click', toggleLiked);
		elem.addEventListener('click', toggleLiked);
	});

	function layout_view(lv) {
		if ((/lv=/).test(location.search)) {
			location.search = location.search.replace(/(lv=)(\d)/, '$1' + lv);
		} else
		if (location.search) {
			location.search += '&lv=' + lv;
		} else {
			location.search = '?lv=' + lv;
		}
	}

	function onCategoryChange(event) {
		if (event.target.value) {
			location.search = 'categories[c][]=' + event.target.value;
		} else {
			location.search = '';
		}
	}
</script>
@endsection
