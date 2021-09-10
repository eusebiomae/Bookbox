<div class="container margin_60_35">
	<div class = "row">
		@if ($photoGalery)
			<div class="main_title_2 col-sm-12">
				<h2>{{ $photoGalery->title_pt }}</h2>
			</div>

			<div class = "col-sm-12 text-center">{!! $photoGalery->description_pt !!}</div>

			@foreach($photoGalery->photoGalery as $photos)
				<div class="col-md-3 col-sm-6 col-xs-12 galery mb-4">
					<figure>
						<img src="{{ $photos->file }}" alt="{{ $photos->title_pt }}" />
					</figure>
				</div>
			@endforeach
		@else
			<div class="main_title_2 col-sm-12">
				<h2>Álbuns</h2>
			</div>

			@foreach($pageData->galery as $galery)
				<div class="col-md-3 col-sm-6 col-xs-12 galery mb-4">
					<figure>
						<img src="{{ $galery->image }}" alt="{{ $galery->title_pt }}" />
						<figcaption>
							<div class="caption-content">
								<a href="#" title="Photo title" onclick="location = '/photos/{{ $galery->id }}'">
									<i class="pe-7s-albums"></i>
									<p>{{ $galery->title_pt }}</p>
								</a>
							</div>
						</figcaption>
					</figure>
					{{-- <div class="text-center d-block d-md-none pt-3 pb-4">{{ $galery->title_pt }}</div> --}}
				</div>
			@endforeach
		@endif
	</div>
</div>
