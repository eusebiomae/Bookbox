@foreach ($pageData->content as $item)
{{-- <section id="banner_home" class="section swiper-container swiper-slider swiper-slider-4" data-loop="false"> --}}
<section id="blog" class="section swiper-slide-blog" style="background-image: url('{{$item['image_bg']}}');">
	<div class="container">
		<!-- Owl Carousel-->
		<div class="row row-30 row-lg-50">

			<div class="col-sm-2 col-md-2 col-lg-2 col-xl-2" style="padding: 45px;">
				<div class="aside row row-30 row-md-50 justify-content-md-between">
					<div class="aside-item col-sm-6 col-md-5 col-lg-12">
						<h6 class="aside-title">Categorias</h6>
						<ul class="list-shop-filter">
							<li>
								<label class="checkbox-inline">
									<input name="input-group-radio align-center" value="checkbox-1" type="checkbox">{{$item->category}} Saúde Física
								</label>
							</li>
							<li>
								<label class="checkbox-inline">
									<input name="input-group-radio" value="checkbox-2" type="checkbox">{{$item->category}} Saúde Mental
								</label>
							</li>
							<li>
								<label class="checkbox-inline">
									<input name="input-group-radio" value="checkbox-3" type="checkbox">{{$item->category}} Saúde Emocional
								</label>
							</li>
							<li>
								<label class="checkbox-inline">
									<input name="input-group-radio" value="checkbox-4" type="checkbox">{{$item->category}} Saúde Financeira
								</label>
							</li>
						</ul>
					</div>
					{{-- <div class="aside-item col-sm-6 col-md-5 col-lg-12">
						<h6 class="aside-title">Buscar</h6>
						<ul class="list-shop-filter">
							<button class="rd-navbar-search-toggle rd-navbar-fixed-element-3" data-rd-navbar-toggle=".rd-navbar-search"><span></span></button>
							<form class="rd-search" action="search-results.html" data-search-live="rd-search-results-live" method="GET">
								<div class="form-wrap">
									<input class="rd-navbar-search-form-input form-input" id="rd-navbar-search-form-input" type="text" name="s" autocomplete="on" />
									<label class="form-label" for="rd-navbar-search-form-input">Buscar...</label>
									<div class="rd-search-results-live" id="rd-search-results-live"></div>
									<button class="rd-search-form-submit fl-bigmug-line-search74" type="submit"></button>
								</div>
							</form>
						</ul>
					</div> --}}
				</div>
			</div>
			<!-- Post Classic-->
			<div class="row col-sm-10 col-md-10 col-lg-10 col-xl-10">
				@foreach ($blogs as $blog)
				<article class="post post-classic box-md wow slideInDown" style="margin-top: 25px; margin-left: 25px; display: block;">
					<a class="post-classic-figure" href="blog_post_details/{{$blog->id}}"><img src="{{$blog->image}}" alt="" width="370" height="239"/></a>
					<div class="post-classic-content">
						<div class="post-classic-time">
							<time datetime="2020-08-09">{{$blog->scheduling_date}}</time>
						</div>
						<h5 class="post-classic-title">{{$blog->title_pt}}</h5>
						<p class="post-classic-text">{{$blog->subtitle_pt}}</p>

						<a class="entry-more" href="blog_post_details/{{$blog->id}}"><br/>
							<i class="fa fa-plus" style="margin: 5px;"></i><span>Ler mais</span>
						</a>
					</div>
				</article>
				@endforeach
			</div>
		</div>
	</div>
</div>
{{-- Deixe um Comentario section  --}}
{{-- <div class="col-md-12 col-sm-12" style="padding: 100px;">
	<h6 class="single-post-title">Deixe um comentário</h6>
	<form class="rd-form rd-mailform" data-form-output="form-output-global" data-form-type="contact" method="post" action="bat/rd-mailform.php">
		<div class="row row-20 row-md-30">
			<div class="col-sm-6">
				<div class="form-wrap">
					<input class="form-input" id="contact-first-name-2" type="text" name="name" data-constraints="@Required">
					<label class="form-label" for="contact-first-name-2">Nome</label>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-wrap">
					<input class="form-input" id="contact-last-name-2" type="text" name="name" data-constraints="@Required">
					<label class="form-label" for="contact-last-name-2">Sobrenome</label>
				</div>
			</div>
			<div class="col-12">
				<div class="form-wrap">
					<label class="form-label" for="contact-message-2">Mensagem</label>
					<textarea class="form-input textarea-lg" id="contact-message-2" name="phone" data-constraints="@Required"></textarea>
				</div>
			</div>
		</div>
		<button class="button button-lg button-secondary button-zakaria" type="submit">Enviar</button>
	</form>
</div> --}}
{{-- Fim de deixe um comentario  --}}
</section>
<script>
	<script src="js/core.min.js"></script>
	<script src="js/script.js"></script>
</script>
@endforeach
