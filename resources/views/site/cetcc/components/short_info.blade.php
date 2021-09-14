<ul id="grid_home" class="clearfix">
	@isset($contentsSection)
	@foreach($contentsSection->content as $content)
	<li class="img_container">
		<img src="{{ $content->image_bg }}" alt="{{ $content->title_pt }}">
		<div class="short_info gp-px">
			@if (isset($content->image))
			<figure class="gp-figure">
				<img src="{{ $content->image }}" alt=".">
			</figure>
			@endif
			<a href="{{ $content->link }}">
				<h3>
					<strong class="mb-none mb-md-2">{{ $content->title_pt }}</strong>
				</h3>
			</a>
			<span class="d-none d-md-block">
				{!! $content->text_pt !!}
			</span>
			<div>
				<a href="/add_psychologist" class="btn btn-light gp-btn-radius mr-2">
					<span class="d-none d-md-block">Inscrição de Psicólogos</span>
				</a>

				<a href="{{ $content->link }}" class="btn btn-light gp-btn-radius">
					<span class="d-none d-md-block">Inscrição de Pacientes</span>
				</a>
			</div>
		</div>
	</li>
	@endforeach
	@endisset
</ul>
