<div class="bg_color_1">
	<div class="container margin_120_95">
		@foreach ($certification as $item)

		@endforeach
		<div class="main_title_2">
			<span><em></em></span>
			<h2>{{$item->title_pt}}</h2>
		</div>
		<div class="row justify-content-between">
			<div class="col-lg-6 wow" data-wow-offset="150">
				<figure class="block-reveal text-center">
					<div class="block-horizzontal d-none d-md-block"></div>
					<img src="{{ $item->image }}" class="img-fluid" alt="">
				</figure>
			</div>
			<div class="col-lg-5">
				{!! $item->description_pt !!}
			</div>
		</div>
	</div>
</div>
