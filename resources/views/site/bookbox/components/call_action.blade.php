<section id="call_action" class="section section-xxl" style="background-color: #f7af69">
	<div class="container">
		@foreach ($pageData->content as $item)
			<div class="banner">
					<h3 class="text-transform-uppercase wow fadeScale" style="color: #fff">{{$item['title_pt']}}</h3> <br/>
					<h5 class="" style="color: #fff">{!! $item['text_pt'] !!}</h5>
					{{-- <img  src="{{ url ('assets/images/site/bannerBox.webp')}}" alt="" class=""> --}}
			</div>
			@endforeach
	</div>
</section>
