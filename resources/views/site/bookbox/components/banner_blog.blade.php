@foreach ($pageData->content as $item)
<section id="banner_generic" class="section swiper-container swiper-slider swiper-slide-shopbox" data-loop="false" style="background-image: url('{{$item['image_bg']}}'); background-heigth: 100px;">
	{{-- style="background-image: url('{{$item['image_bg']}}'); : cover;" --}}
	<div class="swiper-wrapper context-dark">
			<div class="swiper-slide swiper-slide-1">
				<div class="swiper-slide-caption section-md text-center">
						<div class="container">
								<h2 class="swiper-title-1" data-caption-animate="fadeInLeft" data-caption-delay="100" style="margin-top: 225px; color: #37a4a9"></h2>
								<h5 class="swiper-title-2" data-caption-animate="fadeInRight" data-caption-delay="250" style="color: #37a4a9"><br class="d-none d-md-block">
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