<div class="row">
	<div class="col-sm-12">
		<h2 class="text-center mt-5">Depoimentos</h2>
		<div id="myCarousel" class="carousel slide" data-ride="carousel">

			<ol class="carousel-indicators">
				@for ($i = 0, $ii = ceil(count($testemonial) / 2); $i < $ii; $i++)
				<li data-target="#myCarousel" data-slide-to="{{ $i }}" class="{{ $i === 0 ? 'active' : '' }}"></li>
				@endfor
			</ol>

			<!-- Wrapper for carousel items -->
			<div class="carousel-inner">

				@foreach ($testemonial as $index => $item)
					@if ($index % 2 === 0)
						<div class="item carousel-item {{ $index === 0 ? 'active' : '' }}">
							<div class="row">
					@endif

								<div class="col-md-6 col-12">
									<div class="media row">
										<div class="col-12 mb-3 mb-md-none col-md-3 text-center">
											@if (empty($item->image))
											<img class="m-auto" src="images/user/user.png" alt="">
											@else
											<img class="m-auto" src="{{ Storage::url("testemonial/{$item->image}") }}" alt="">
											@endif
										</div>
										<div class="col-12 col-md-9">
											<div class="">
												<div class="text-center text-md-left">{!! $item->text_pt !!}</div>
												<p class="overview text-center text-md-left"><b>{{ $item->name }}</b>, {{ $item->office }}</p>
											</div>
										</div>
									</div>
								</div>

					@if ($index % 2 === 1)
							</div>
						</div>
					@endif
				@endforeach

				@if (count($testemonial) % 2 === 1)
						</div>
					</div>
				@endif

			</div>

		</div>
	</div>
</div>
