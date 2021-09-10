@extends('layouts.site.site')

@section('title', 'Home')

@section('content')
<!-- Page Title ============================================= -->
<section class=" bg-overlay bg-overlay-gradient pb-0">
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
						<li><a href="#">{{ trans('menu.bilingualTeaching')}}</a></li>
						<li class="active">{{ trans('menu.blogNews')}}</li>
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

<section class="blog">
	<div class="container">
		<div class="row">
			<div class="articles col-xs-12 col-sm-12 col-md-8">
				<div id="blogArticle" class="row">

					<!-- Entry Article -->

					<!-- .entry end -->

				</div>
				<div class="col-xs-12 col-sm-12 col-md-12 text-center" onclick="loadMore(event)">
					<a class="btn btn-secondary" href="#">{{ trans('blog.more')}}</a>
				</div>
				<!-- .row end -->

			</div>
			<!-- entry articles end -->

			<div class=" col-xs-12 col-sm-12 col-md-4">
				<div class="sidebar">
					<!-- Search ============================================= -->
					<div class="widget widget-search">
						<div class="widget-content">
							<div class="input-group">
								<input type="text" id="searchBlogText" class="form-control" placeholder="{{ trans('blog.search')}}">
								<span class="input-group-btn">
									<button class="btn" type="button" onclick="searchBlog()"><i class="fa fa-search"></i></button>
								</span>
							</div>
						</div>
					</div>

					<!-- Categories ============================================= -->
					<div class="widget widget-categories">
						<div class="widget-title">
							<h3>{{ trans('blog.categories')}}</h3>
						</div>
						<div class="widget-content">
							<ul id="filterCategory" class="list-unstyled">
								@foreach($results->category as $item)
								<li>
									<a href="javascript:false" data-id="{{ $item->id }}">{{ internation($item, 'description') }}</a>
								</li>
								@endforeach

							</ul>
						</div>
					</div>

				</div>
			</div>
			<!-- sidebar end -->

		</div>
		<!-- .row end -->
	</div>
	<!-- .container end -->
</section>
@endsection

@section('scripts')
<script>
	var BLOG = {
		request: {
			search: '',
			category: null,
			limit: 0
		}
	};

	$('#filterCategory').on('click', 'a', function(event) {
		event.preventDefault();
		var val = event.target.dataset.id;

		BLOG.request.category = val;
		BLOG.request.limit = 0;

		listAjax();
	});

	function searchBlog() {
		var val = document.getElementById('searchBlogText').value;

		BLOG.request.search = val;
		BLOG.request.limit = 0;

		listAjax();
	}

	function loadMore(event) {
		event.preventDefault();

		BLOG.request.limit++;

		listAjax();
	}

	function listAjax() {
		BLOG.request._token = document.getElementById('_token').value;

		$(".preloader").css('opacity', '.7');
		$(".preloader").fadeIn("slow");

		return $.ajax({
			url: '/blog/ajaxList',
			method: "post",
			data: BLOG.request
		}).then(function(data) {
			$(".preloader").fadeOut("slow");

			if (BLOG.request.limit) {
				$('#blogArticle').append(data);
			} else {
				$('#blogArticle').html(data);
			}
		});
	}

	listAjax();
</script>
@endsection
