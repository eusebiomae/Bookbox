@extends('site.cetcc.layout.layout')
@section('css')
	@parent
	<link href="{!! asset('cetcc/css/blog.css') !!}" rel="stylesheet">

@endsection

@section('title', $title)

@section('content')
	{{-- BANNER --}}
	@include('site.cetcc.components.banner')

	{{-- MAIN --}}
	<div class="container margin_60_35">
		<div class="row">
			<div class="col-lg-9">
				<div class="bloglist singlepost" id="post">
					<p><img alt="" class="img-fluid" src="{{ Storage::url('blog/' . $post->image) }}"></p>
					<h1>{{ $post->title }}</h1>
					<div class="postmeta">
						<ul>
							<li><a href="#"><i class="icon_folder-alt"></i> {{ $post->category->description }}</a></li>
							<li><i class="icon_clock_alt"></i> {{ $post->created_at }}</li>
							<li>
								<i class="icon-user-outline"></i>
								{{ $post->author->name }}
							</li>
							<li><i class="icon_comment_alt"></i> ({{ $post->count_comments }}) Comentários</li>
						</ul>
					</div>
					<div class="post-content">
						<div class="dropcaps text-justify">
							{!! $post->text !!}
						</div>
					</div>
				</div>

				@include('site.cetcc.components.form_comment')

				<hr />

				@include('site.cetcc.components.comments_post', [
					'comments' => $comments,
				])

				<div class="row">
					{{-- <div class="col-lg-6">
					<div class="box_grid wow">
						<figure class="block-reveal">
							<div class="block-horizzontal"></div>
							@if (isset($link_wish))
								<a href="{{$link_wish}}" class="wish_bt"></a>
							@endif
							<a href="#"><img src="/cetcc/img/courses/course-young.jpg" class="img-fluid" alt=""></a>
							@if (isset($price))
								<div class="price gp-bkg-yellow">{{$price}}</div>
							@endif
							<div class="preview"><span>Ler mais</span></div>
						</figure>
						<div class="wrapper">
						<small>Type</small>
							<h3>Curso exemplo</h3>
							<p>Id placerat tacimates definitionem sea, prima quidam vim no. Duo nobis persecuti cu.</p>
							@if (isset($star))
								<div class="rating">
									<i class="icon_star voted"></i>
									<i class="icon_star voted"></i>
									<i class="icon_star voted"></i>
									<i class="icon_star"></i>
									<i class="icon_star"></i>
									<small>(145)</small>
								</div>
							@endif
						</div>
						@if (isset($details))
						<ul>
							@if (isset($time))
							<li><i class="icon_clock_alt"></i> {{$time}}</li>
							@endif
							@if (isset($likes))
							<li><i class="icon_like"></i> {{$likes}}</li>
							@endif
							<li><a href="{{$link}}">{{$details}}</a></li>
						</ul>
						@endif
					</div>
				</div> --}}
				</div>
			</div>

			<aside class="col-lg-3" id="filters_col" style="height:max-content;">

				<form method="get" action="/blog">
					{{-- Search --}}
					@include('site.cetcc.components.sidebar_search')

					{{-- FILTER_CATEGORY --}}
					@include('site.cetcc.components.filter_category')
				</form>

				{{-- SIDEBAR_CARD --}}
				@include('site.cetcc.components.sidebar_card', $sidebarCard['recentPosts'])
				@include('site.cetcc.components.sidebar_card', $sidebarCard['recommendedCourse'])

				{{-- SIDEBAR_POPULAR_TAGS --}}
				@include('site.cetcc.components.sidebar_popular_tags')

				<!-- /widget -->
			</aside>
		</div>
	</div>

	<!-- /container -->
@endsection

@section('scripts')
	@parent
	<script type="text/javascript" src="{!! asset('cetcc/js/mapmarker.jquery.js') !!}"></script>
	<script type="text/javascript" src="{!! asset('cetcc/js/mapmarker_func.jquery.js') !!}"></script>
	<script>
		function answerComment(to, idComment) {
			var formComment = document.forms.formComment;
			formComment.querySelector('[data-answer-from]').innerText = 'Responder a: ' + to;
			formComment.answer_from.value = idComment;

			var makeComment = document.getElementById('makeComment');
			if (makeComment) {
				document.documentElement.scrollTop += makeComment.getClientRects()[0].y - (document.querySelector('header.header')
					.clientHeight + 30);
			}
		}

		var currentBottom = 0;
		var offset = 10;
		var haveFetchComment = true

		function scrollComments() {
			var scrollBottom = document.body.offsetHeight - (window.pageYOffset + window.innerHeight)
			var footerHeight = document.querySelector('#page1 footer').offsetHeight

			if (haveFetchComment && currentBottom > scrollBottom && scrollBottom < (footerHeight + 100)) {
				haveFetchComment = false
				$.ajax({
					url: '/fetchComment',
					type: 'post',
					data: {
						offset: offset,
						blogId: $('#blog_id').val()
					},
					success: function(resp) {
						if (resp) {
							haveFetchComment = true
							offset += 10

							$('#comments ul').append(resp)
						} else {
							document.removeEventListener('scroll', scrollComments)
							$('#comments').append(`<div class="alert cetcc-alert-primary text-center mt-3" role="alert">
								<h5>Acabou os comentários!</h5>
								<h6><a href = "#post" style = "text-decoration: underline;">Voltar ao Topo</a></h6>
							</div>`)
						}
					}
				})
			}

			currentBottom = scrollBottom
		}

		document.addEventListener('scroll', scrollComments)
	</script>
@endsection
