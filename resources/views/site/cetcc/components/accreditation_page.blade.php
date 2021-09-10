<div>
	<h1>Hello Word!!</h1>
</div>
{{-- <div class="container margin_60_35">
	@if ($photoGalery)
		<div class="main_title_2">
			<h2>{{ $photoGalery->title_pt }}</h2>
		</div>

		<div>{!! $photoGalery->description_pt !!}</div>

		<br>

		<div class="grid">
			<ul class="magnific-gallery">
				@foreach($photoGalery->photoGalery as $photos)
				<li>
					<figure>
						<img src="{{ $photos->file }}" alt="{{ $photos->title_pt }}">
						<figcaption>
							<div class="caption-content">
								<a href="{{ $photos->file }}" title="Photo title" data-effect="mfp-zoom-in">
									<i class="pe-7s-albums"></i>
									<p>{{ $photos->title_pt }}</p>
								</a>
							</div>
						</figcaption>
					</figure>
				</li>
				@endforeach
			</ul>
		</div>
	@else
		<div class="grid">
			<ul class="magnific-gallery">
				@foreach($pageData->galery as $galery)
					<li>
						<figure>
							<img src="{{ $galery->image }}" alt="{{ $galery->title_pt }}">
							<figcaption>
								<div class="caption-content">
									<a href="#" title="Photo title" onclick="location = '/photos/{{ $galery->id }}'">
										<i class="pe-7s-albums"></i>
										<p>{{ $galery->title_pt }}</p>
									</a>
								</div>
							</figcaption>
						</figure>
					</li>
				@endforeach
			</ul>
		</div>
	@endif
</div> --}}
