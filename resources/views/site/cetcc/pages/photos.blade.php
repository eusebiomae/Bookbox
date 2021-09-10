@extends('site.cetcc.layout.layout')

@section('title', 'Galeria')

@section('content')
    {{-- BANNER --}}
		@include('site.cetcc.components.carrossel')

		{{-- GALLERY --}}
		@component('site.cetcc.components.gallery', [
			'numberOfSlot' => 8,
			])
			@slot('title')
				Here some pictures ...
			@endslot
			@slot('subtitle')
				Cum doctus civibus efficiantur in imperdiet deterruisset.
			@endslot

			@for ($i = 0; $i < 8; $i++)
				@slot("img{$i}")
					http://via.placeholder.com/400x300/ccc/fff/pic_4.jpg
				@endslot
				@slot("link{$i}")
					http://via.placeholder.com/800x533/ccc/fff/pic_4.jpg
				@endslot
				@slot("name{$i}")
					Your caption {{$i}}
				@endslot
			@endfor
		@endcomponent

@endsection

@section('scripts')
@parent

@endsection
