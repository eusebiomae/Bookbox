<section id="banner_home" class="section swiper-container swiper-slider swiper-slider-4" data-loop="true">
	<div class="swiper-wrapper context-dark">
		@foreach ($pageData->content as $item)
		<div class="swiper-slide swiper-slide-1" data-slide-bg="{{$item['image_bg']}}">
					<div class="swiper-slide-caption section-md text-sm-left">
							<div class="container">
									<div class="row">
											<div class="col-sm-8 col-md-7">
													<h4 class="swiper-title-1 text-uppercase" data-caption-animate="fadeInLeft"
															data-caption-delay="100" style="margin-top: 125px;">{{$item['title_pt']}}<br>
													</h4>
													<h6 class="swiper-title-2 text-width-medium" data-caption-animate="fadeInLeft"
															data-caption-delay="250" style="text-color: #fff">{!! $item['text_pt'] !!}</h6>
													<div class="button-wrap" data-caption-animate="fadeInLeft"
															data-caption-delay="400" style="margin-top: 35px; margin-bottom: 70px;"><a
																	class="button button-lg button-shadow-4 button-secondary-2 button-zakaria"
																	href="grid-shop.html">Assine Agora</a>
													</div>
											</div>
									</div>
							</div>
					</div>
			</div>
	@endforeach

	</div>
	<!-- Swiper Pagination-->
	<div class="swiper-pagination"></div>
	<!-- Swiper Navigation-->
	<div class="swiper-button-prev"></div>
	<div class="swiper-button-next"></div>
</section>
