@extends('site.cetcc.layout.footer')
@extends('site.cetcc.layout.site')

@section('content')

	{{-- $banner --}}
	@if (isset($banner))
		@include('site.components.banner-home')
	@endif

	{{-- SECTION about --}}
	@if(isset($pageComponents))
			@foreach ($pageComponents->contentSection as $contentSection)
				@include("site.components.{$contentSection->component}", [ 'pageData' => $contentSection ])
			@endforeach
	@endif

@endsection
