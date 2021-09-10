<div class="container margin_60_35">
		<div class="main_title_2">
			{{-- <h2>{{ $galery->title_pt }}</h2> --}}
			<h2>Categorias de Cursos</h2>
		</div>

		{{-- <div>{!! $galery->description_pt !!}</div> --}}

		<br>

		<div class="grid">
			<ul class="magnific-gallery">
				@foreach($courseCategories as $category)
				<li>
					<figure class="my-3 my-md-2">
						@if (isset($category->file))
							<img src="{{ $category->file }}" alt="{{ $category->description_pt }}">
							@else
							<img src="{{ empty($category->image) ? 'cetcc/img/courses/course-young.jpg' : $category->image }}" alt="{{ $category->description_pt }}">
						@endif
						<figcaption onclick="window.location = 'course#%7B%22categoryTypes%22:%22all%22,%22categories%22:%5B{{ $category->id }}%5D%7D'">
							<div class="caption-content">
								<i class="pe-7s-info"></i>
								<p>{{  $category->description_pt }}</p>
							</div>
						</figcaption>
					</figure>
				</li>
				@endforeach
			</ul>
		</div>
</div>
