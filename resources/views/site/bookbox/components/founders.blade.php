<div class="container">
	<div class="main_title_2">
		<span><em></em></span>
		<h2>Fundadores</h2>
	</div>

	<div class="row">
		@foreach($teamMapData['Fundador'] as $item)
			<div class="col-md-3 col-sm-12 mb-3 mb-md-none gp-founders">
				<a href="/team/{{ $item->id }}">
					<img src="{{ $item->image }}" width = "100%" />

					<div class="gp-title">
						<h4>
							{{ $item->name }}
							{{-- <em>{!! $item->graduation->description_pt !!}</em> --}}
						</h4>
					</div>
				</a>
			</div>
		@endforeach

		@foreach($teamMapData['Co-fundador'] as $item)
			<div class="col-md-3 col-sm-12 mb-3 mb-md-none gp-founders">
				<a href="/team/{{ $item->id }}">
					<img src="{{ $item->image }}" width = "100%" />

					<div class="gp-title">
						<h4>
							{{ $item->name }}
							{{-- <em>{!! $item->graduation->description_pt !!}</em> --}}
						</h4>
					</div>
				</a>
			</div>
		@endforeach
	</div>
</div>
