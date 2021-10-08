@foreach ($pageData->content as $item)
<section id="banner_generic" class="section swiper-container swiper-slider swiper-slider-4" data-loop="true" style="background-image: url('{{$item['image_bg']}}'); : center;">
	<div class="swiper-wrapper context-dark">
			<div class="swiper-slide swiper-slide-1">
				<div class="swiper-slide-caption section-md text-center">
						<div class="container">
								<h2 class="swiper-title-1" data-caption-animate="fadeInLeft" data-caption-delay="100" style="margin-top: 100px; color: #fff">{{$item['title_pt']}}</h2>
								<h5 class="swiper-title-2" data-caption-animate="fadeInRight" data-caption-delay="250">{!! $item['text_pt'] !!}<br class="d-none d-md-block">
								</h5>
								{{-- <div class="col-sm-4 col-md-5">
									<img src="{{$item['image']}}" alt="" class="img-home-banner" >
								</div> --}}
						</div>
				</div>
		</div>

	</div>
	<!-- Swiper Pagination-->
	<div class="swiper-pagination"></div>
	<!-- Swiper Navigation-->
	{{-- <div class="swiper-button-prev"></div> --}}
	{{-- <div class="swiper-button-next"></div> --}}
</section>
@endforeach
