@extends('site.bookbox.layout.site')

@section('content')

	{{-- $banner --}}
	@if (isset($carrossel))
		@include('site.bookbox.components.blog_details', ['banner' => $carrossel])
	@endif

	{{-- SECTION about --}}
	@if(isset($pageComponents))
			@foreach ($pageComponents->contentSection as $contentSection)
				@include("site.bookbox.components.{$contentSection->component}", [ 'pageData' => $contentSection ])
			@endforeach
	@endif

@endsection
