<div class="container margin_120_95">
	<div class="main_title_2">
		<span><em></em></span>
		<h2>Fundadores</h2>
	</div>
	<div id="carousel" class="owl-carousel owl-theme">
		@foreach($pageData['content'] as $founder)
		<div class="item">
			<a href="{{ $founder['link'] }}">
				<div class="title">
					<h4>{{ $founder['title_pt'] }}<em>{{ $founder['subtitle_pt'] }}</em></h4>
				</div><img src="{{ Storage::url("content/{$founder['image']}") }}" alt="">
			</a>
		</div>
		@endforeach

	</div>
</div>
