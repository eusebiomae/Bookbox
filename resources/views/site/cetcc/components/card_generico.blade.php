<div class="col-12">
	<div class="item ">
		<div class="gp-box_grid row">
			<figure class="col-3 gp-0">
				{{-- <a href="#0" class="wish_bt"></a> --}}
				<a href="/course/{{ $payload['id'] }}" class="">
					@if (isset( $payload['img']))
						<img src="{{ $payload['img'] }}"  class="m-1 img-fluid" alt="">
						@else
						<img src="{!! asset('cetcc/img/courses/exemplo.png') !!}"  class="m-1 img-fluid" alt="">
					@endif
				</a>
				{{-- <div class="price">{{ $course->value }}</div> --}}
			</figure>
			<div class="col-9 pl-4">
				<h5 class="mt-4">{{ $payload['title'] }}</h5>
				<small class="mt-3">{{ $payload['subtitle'] }}</small>
				@if (isset($payload['description']))
				<span class="mt-3">{!! $payload['description'] !!}</span>
				@endif
				<ul>
					<li><a class="mt-4 btn btn-info gp-btn-radius btn-sm" href="{{ $payload['id'] }}">Saiba mais</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
