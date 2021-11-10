@foreach ($pageData->content as $item)
<section id="free_chip" class="swiper-slide-call" style="background-color: #ffcc9c; margin-top: -80px;">
	<div class="container">
		<div class="banner">
				<h3 class="text-transform-none wow fadeScale" style="color: #fff; margin-top: 100px;">{{$item['title_pt']}}</h3> <br/>
				<h5 class="" style="color: #fff">{!! $item['text_pt'] !!}</h5>
		</div>
	</div>
</section>
@endforeach
