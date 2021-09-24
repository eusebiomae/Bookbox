@foreach ($pageData->content as $item)
<section id="single_box" class="section section-xxl swiper-slide-pilars" style="background-image: url('{{$item['image_bg']}}');">
	<div class="container">
	<h4 class="text-transform-none wow fadeScale" style="margin-top: 25px; color: #fff;">Transformações de impacto no seu dia a dia.</h4>
		<h4 class="text-transform-none wow fadeScale" style="color: #fff;">Sua felicidade depende da sua saúde e vitalidade.</h4>
		<div class="button-wrap" data-caption-animate="fadeInUp" data-caption-delay="400"><a
					class="button button-lg button-shadow-4 button-secondary-2 button-zakaria"
					href="grid-shop.html">Experimente adquirir o Box Avulso</a>
			</div>
	</div>
</section>
@endforeach
