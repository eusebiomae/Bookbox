@foreach ($pageData->content as $item)
<section class="parallax-container" data-parallax-img="assets/images/site/parallax/parallax4.jpg">
	<div class="parallax-content section-xxl context-dark">
{{-- <section id="single_box" class="section section-xxl swiper-slide-pilars" style="background-image: url('{{$item['image_bg']}}');">
	<div class="parallax"> --}}
	<div class="container">
		<h4 class="text-transform-none wow fadeScale" style="margin-top: 25px; color: #95cc9b;">Transformações de impacto no seu dia a dia.</h4>
		<h4 class="text-transform-none wow fadeScale" style="color: #95cc9b;">Sua felicidade depende da sua saúde e vitalidade.</h4>
		<div class="button-wrap" data-caption-animate="fadeInUp" data-caption-delay="400"><a
					class="button button-lg button-shadow-4 button-secondary-2 button-zakaria"
					href="grid-shop.html">Experimente adquirir o Box Avulso</a>
		</div>
	</div>
	</div>
</section>

<style>
	.parallax {
		/* The image used */
		background-image: url("assets/images/parallax-2.jpg");

		/* Set a specific height */
		min-height: 500px;

		/* Create the parallax scrolling effect */
		background-attachment: fixed;
		background-position: center;
		background-repeat: no-repeat;
		background-size: cover;
	}
	</style>
@endforeach
