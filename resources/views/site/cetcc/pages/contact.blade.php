@extends('site.cetcc.layout.layout')

@section('title', 'Contato')

@section('content')
    {{-- BANNER --}}
    @include('site.cetcc.components.banner')

    {{-- FEATURES --}}
    @include('site.cetcc.components.features', [ 'features' => $features ])


    @component('site.cetcc.components.form_contact')

    @endcomponent
	@if (isset($content[0]))
		@include('site.cetcc.components.home_about', $content[0])
	@endif

    {{-- @component('site.cetcc.components.home_about')
        @slot('img')
        BANNER_CETCC.jpg
        @endslot
        @slot('title')
        titulo exemplo
        @endslot
        @slot('component')
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sunt nihil natus iusto. Esse, assumenda! Veniam sed, blanditiis distinctio commodi quaerat accusantium non, cupiditate magnam molestiae saepe nulla voluptas iste nesciunt?
        @endslot
    @endcomponent --}}
@endsection

@section('scripts')
@parent
@endsection
