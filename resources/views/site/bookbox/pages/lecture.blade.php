@extends('site.cetcc.layout.layout')
@section('title', 'Palestras')

@section('content')
    {{-- BANNER --}}
		@include('site.cetcc.components.carrossel')
		{{-- FILTER MENU --}}
		@component('site.cetcc.components.filter_menu')
			@slot('switch')
					00
			@endslot
		@endcomponent

		<div class="container margin_60_35">
			<div class="row">
				{{-- FILTER SIDEBAR --}}
				@component('site.cetcc.components.filter_sidebar')
					{{-- @slot('star_5')
							5
					@endslot --}}
				@endcomponent

				<div class="col-lg-9">
					<div class="row">
						@for ($i = 0; $i < 6; $i++)
							@include('site.cetcc.components.card_g',[
								'link' => '/course_details',
								'img' => 'http://via.placeholder.com/800x533/ccc/fff/course__list_1.jpg',
								'type' => 'Palestra',
								'name' => 'Nome Palestra',
								'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Officiis
									exercitationem eveniet illo cumque repudiandae doloribus libero numquam iusto
									 quibusdam tenetur, modi vero ullam optio error
									 recusandae laborum rem similique eum.',
								'details' => 'Saber mais',
								// 'price' => 'R$50,00',
								// 'star' => '',
								'link_wish' =>'',
								'time' => '10h',
								'likes' => '100'
							])
						@endfor
					</div>
				</div>

			</div>
		</div>

@endsection

@section('scripts')
@parent

@endsection
