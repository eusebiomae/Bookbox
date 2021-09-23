<div class="container margin_30_95">
	<div class="main_title_2">
		<span class="mt-4 mt-md-0"><em></em></span>
		<h2>Tipos de Cursos</h2>
		<p>Pensamos em tudo para você, aproveite!</p>
	</div>

	<div class="row">

		@foreach($categoriesCourseType as $categoryCourseType)

		{!! (count($categoriesCourseType) > 2) ? '<div class="col-lg-4 col-md-6 wow" data-wow-offset="150">' : '<div class="col-lg-6 col-md-6 wow" data-wow-offset="150">' !!}
			<div class="gp-card2">
				<a href="/{{ $categoryCourseType->flg }}" class="grid_item">
					<figure class="block-reveal">
						<img src="{{ Storage::url("courseCategoryType/{$categoryCourseType->image}") }}" class="img-fluid" alt="">
					</figure>
					<div class="info">
						{{-- <small><i class="ti-book"></i>{{ $categoryCourseType->courses }} Cursos</small> --}}
						<h3>{{ $categoryCourseType->title }}</h3>
					</div>
				</a>
			</div>
		</div>

		@endforeach
	</div>
</div>
