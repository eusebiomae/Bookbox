@foreach ($pageData->content as $item)
<section id="call_action" class="section section-xxl swiper-slide-call" style="background-image: url('{{$item['image_bg']}}');">
	<div class="container">
			<div class="banner">
					<h3 class="text-transform-uppercase wow fadeScale" style="color: #fff; margin-top: 100px;">{{$item['title_pt']}}</h3> <br/>
					<h5 class="" style="color: #fff">{!! $item['text_pt'] !!}</h5>
					{{-- <img  src="{{ url ('assets/images/site/bannerBox.webp')}}" alt="" class=""> --}}
			</div>
		</div>
	</section>
	@endforeach
