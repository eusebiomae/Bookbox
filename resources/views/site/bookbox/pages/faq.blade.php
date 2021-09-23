@extends('site.cetcc.layout.layout')

@section('title', 'FAQ')

@section('content')
	@include('site.cetcc.components.banner')

	<div class="container margin_60_35">

		<div class="accordion row" id="accordion">
			@foreach ($contentPage as $index => $faq)
				<div class="col-sm-12">
					<button
						class="btn btn-info text-left gp-btn-radius pl-4 mb-2 gp-btn-accordion {{$index == 0 ? 'collapsed': ''}}"
						type="button" data-toggle="collapse"
						data-target="#accordion_class_{{$index}}"
						aria-expanded="true"
						aria-controls="accordion_class_{{$index}}"
					>
						{{ $faq->question }}
					</button>
					<div id="accordion_class_{{$index}}" class="collapse {{$index == 0 ? 'show': ''}}" aria-labelledby="headingOne" data-parent="#accordion">
						<div class="card">
							<div class="card-body">{!! $faq->answer !!}</div>
						</div>
					</div>
				</div>
			@endforeach
		</div>
	</div>
@endsection

@section('scripts')
@parent

@endsection
