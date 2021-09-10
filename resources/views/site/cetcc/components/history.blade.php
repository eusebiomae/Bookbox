<?php $content = $pageData['content'][0] ?>

<div class="bg_color_1">
	<div class="container margin_120_95">
		<div class="main_title_2">
			<span><em></em></span>
			<h2>{{$content['title_pt']}}</h2>
			<p>{{$content['subtitle_pt']}}</p>
		</div>

		<div class="row justify-content-between">
			<div class="col-lg-3 wow" data-wow-offset="150">
				<figure class="block-reveal">
					<div class="block-horizzontal d-none d-md-block"></div>
					<img src="{{ $content['image'] }}" class="img-fluid" alt="">
				</figure>
			</div>

			<div class="col-lg-9 text-justify">
				{!! $content['text_pt'] !!}
			</div>
		</div>
	</div>
</div>
