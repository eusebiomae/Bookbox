{{-- <section id="banner_home" class="section swiper-container swiper-slider swiper-slider-4" data-loop="true"  style="background-image: url('assets/images/site/home/last/pedidosCliente/banner3.png'); padding-bottom: 6%;">
	<div class="swiper-wrapper context-dark">
		@foreach ($pageData->content as $item)
		<div class="swiper-slide swiper-slide-1">
			<div class="swiper-slide-caption section-md text-sm-left">
				<div class="container">
					<div class="row col-sm-12 col-md-12">
						<div class="col-sm-8 col-md-7">
							<h4 class="swiper-title-1 text-uppercase" data-caption-animate="fadeInLeft"
							data-caption-delay="100" style="margin-top: 125px; color: #000">{{$item['title_pt']}}<br>
						</h4>
						<h6 class="swiper-title-2 text-width-large" data-caption-animate="fadeInLeft"
						data-caption-delay="250" style="text-color: #fff">{!! $item['text_pt'] !!}</h6>
						<div class="button-wrap" data-caption-animate="fadeInLeft"
						data-caption-delay="400" style="margin-top: 35px; margin-bottom: 70px;"><a
						class="button button-lg button-shadow-4 button-secondary-2 button-zakaria"
						href="/pricing-list">Eu Quero</a>
					</div>
				</div>
				<div class="col-sm-4 col-md-5">
					<img src="{{$item['image']}}" alt="" class="img-home-banner" style="display: block; width: 100%; max-height: 100%; margin-top: 5px;">
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
</section> --}}

<section id="banner_home" class="section swiper-container swiper-slider swiper-slider-4" data-loop="true" style="background-image: url('assets/images/site/home/last/pedidosCliente/banner3.png'); padding-bottom: 6%;">
	<div class="swiper-wrapper context-dark">
		@foreach ($pageData->content as $item)
		<div class="swiper-slide swiper-slide-1">
			<div class="swiper-slide-caption section-md text-sm-left">
				<div class="container">
					<div class="row col-sm-12 col-md-12">
						<div class="col-sm-4 col-md-5">
						<img src="{{$item['image']}}" alt="" class="img-home-banner" style="display: block; width: 100%; max-height: 150%; margin-top: 100px; margin-bottom: -150px; margin-left: 20px;">
						</div>
						<div class="col-sm-8 col-md-7">
							<h4 class="swiper-title-1 text-uppercase" data-caption-animate="fadeInLeft" data-caption-delay="100" style="margin-top: 125px; color: #000">{{$item['title_pt']}}<br>
							</h4>
							<h6 class="swiper-title-2 text-width-large" data-caption-animate="fadeInLeft" data-caption-delay="250" style="text-color: #fff">{!! $item['text_pt'] !!}</h6>

							<div class="button-wrap" data-caption-animate="fadeInLeft"
							data-caption-delay="400" style="margin-top: 35px; margin-bottom: 70px;"><a
							class="button button-lg button-shadow-4 button-secondary-2 button-zakaria"
							href="/pricing-list">Eu Quero</a>
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



