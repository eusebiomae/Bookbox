{{-- @foreach ($pageData->content as $item)
<section id="blog_details" class="section section-xxl swiper-slide-blog" style="background-image: url('{{$item['image_bg']}}');">
	<div class="container">
		<!-- Owl Carousel-->
		<div class="owl-carousel" data-items="1" data-sm-items="2" data-lg-items="3" data-margin="30" data-dots="true" data-mouse-drag="false">


			<!-- Post Classic-->
			<article class="post post-classic box-md wow slideInDown">
				<a class="post-classic-figure" href="blog-post.html"><img src="{{$blog->image}}" alt="" width="370" height="239"/></a>
				<div class="post-classic-content">
					<div class="post-classic-time">
						<time datetime="2020-08-09">{{$blog->scheduling_date}}</time>
					</div>
					<h5 class="post-classic-title">{{$blog->title_pt}}</h5>
					<p class="post-classic-text">{{!! $blog->text_pt !!}}</p>

					<a class="entry-more" href="blog_post_details/{{$blog->id}}" data-toggle="modal" data-target="#model-quote{{ $blog->id }}" id="modelquote{{ $blog->id }}"><i class="fa fa-plus"></i>
						<span>Ler mais</span>
					</a>
				</div>
			</article>
		</div>
	</div>
</div>
</section>
@endforeach --}}

@foreach ($pageData->content as $item)
<section class="section section-xl bg-default text-md-left">
	<div class="container">
		<div class="row row-50 row-md-60">
			<div class="col-lg-12 col-xl-12">
				<div class="inset-xl-right-100">
					<div class="row row-50 row-md-60 row-lg-80">
						<div class="col-sm-12 col-md-12 col-xl-12">
							<article class="post post-modern-1 box-xxl">
								<div class="post-modern-panel">
									<div>{{$blog->status}}</div>
									<div>
										<time class="post-modern-time" datetime="2020-09-08">{{$blog->scheduling_date}}</time>
									</div>
								</div>
								<h3 class="post-modern-title">{{$blog->title_pt}}</h3>
								<div class="post-modern-figure"><img src="{{$blog->image}}" alt="" width="800" height="394"/>
								</div>
								<p class="post-modern-text">{!! $blog->text_pt !!}</p>
							</article>
							<!-- Quote Classic-->
							<article class="quote-classic quote-classic-2">
								<div class="quote-classic-text">
									<div class="q">{{$blog->tags}}</div>
								</div>
							</article>
							<div class="single-post-bottom-panel">
								<div class="group-sm group-justify">
									<div>
										<div class="group-xs group-middle"><span class="list-social-title">Compartilhar em: </span>
											<div>
												<ul class="list-inline list-social list-inline-sm">
													<li><a class="icon mdi mdi-facebook" data-size="small" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fsite.bookbox.com.br%2Fblog_post_details%2Fid&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore"></a></li>
													{{-- <li><a class="icon mdi mdi-twitter" href="#"></a></li>
													<li><a class="icon mdi mdi-instagram" href="#"></a></li>
													<li><a class="icon mdi mdi-google-plus" href="#"></a></li> --}}
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endforeach


