@extends('site.cetcc.layout.layout')

@section('title', $pageComponents['description_pt'])

@section('content')
	@if (isset($banner))
		@include('site.cetcc.components.banner')
	@elseif(isset($carrossel))
		@include('site.cetcc.components.carrossel')
	@endif

	@if(isset($pageComponents))
		@foreach ($pageComponents->contentSection as $contentSection)
			@include("site.cetcc.components.{$contentSection->component}", [ 'pageData' => $contentSection ])
		@endforeach
	@endif

@endsection

@section('scripts')
@parent

@endsection
