<div class="container-fluid margin_120_0">
	<div class="main_title_2">
		<span><em></em></span>
		<h2>Cursos em Destaques</h2>
		<p>Veja os cursos que tem maior procura por nossos alunos</p>
	</div>
	<div id="reccomended" class="owl-carousel owl-theme">
		@foreach($courses as $course)
			@php
				$color = $course->courseCategory->color ? $course->courseCategory->color : '#a9a9a9';
			@endphp

			<div class="item">
				<div class="box_grid" style = "border: 4px solid {{ $color }}">
					<figure>
						{{-- <a href="#0" class="wish_bt"></a> --}}

						{!! $course->cta ? '<div class="cta-card mt-1">'.$course->cta.'</div>' : '' !!}

						<a href="/course/{{ $course->id }}">
							@if (isset($course->img))
								<img src="{{ $course->img }}" class="img-fluid" alt="" />
							@else
								<img src="{!! asset('cetcc/img/courses/exemplo.png') !!}"  class="m-1 img-fluid" alt="" />
							@endif
						</a>

						{!! $course->value ? '<div class="price">'.$course->value.'</div>' : '' !!}

						{!! $course->courseCategoryType->title ? '<div class="type-card" style = "background-color: '.$color.'">'.$course->courseCategoryType->title.'</div>' : '' !!}
					</figure>

					<div class="wrapper pb-2">
						@if ($course->show_title)
							<small>{{ $course->courseCategory->description_pt }}</small>
							<h5>{{ $course->title_pt }}</h5>
						@else
							<p class = "text-center text-secondary mb-2" style = "font-size: 1rem">{{ mb_strtoupper($course->courseSubcategory->description_pt, 'utf-8') }}</p>
							<h5 class = "text-center text-wrap">{{ $course->courseCategory->description_pt }}</h5>
						@endif

						<ul>
							<li><a href="/course/{{ $course->id }}" style = "--color-hover: {{ $color }}">Saiba mais</a></li>
						</ul>
					</div>
				</div>
			</div>
		@endforeach
	</div>
	<div class="container">
		<p class="btn_home_align"><a href="/course" class="btn_1 rounded">Ver todos os cursos</a></p>
	</div>
	<hr>
</div>
