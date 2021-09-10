<div class="container margin_60_35">
	@foreach($pageData->galery as $galery)
		<div class="main_title_2">
			<h2>Galeria</h2>
		</div>
		<div class="grid">
			<ul class="magnific-gallery">
				<li>
					<figure>
						<img src="{{ $galery->photoGalery->file }}" alt="{{ $galery->photoGalery->title_pt }}">
						<figcaption>
							<div class="caption-content">
								<a href="{{ $photoGalery->file }}" title="Photo title" data-effect="mfp-zoom-in">
									<i class="pe-7s-albums"></i>
									<p>{{ $galery->title_pt }}</p>
								</a>
							</div>
						</figcaption>
					</figure>
				</li>
			</ul>
		</div>
	@endforeach
</div>
