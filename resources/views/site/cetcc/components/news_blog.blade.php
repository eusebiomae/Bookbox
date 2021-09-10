<div class="bg_color_1">
	<div class="container margin_120_95">
		<div class="main_title_2">
			<span><em></em></span>
			<h2>Posts Recentes</h2>
			{{-- <p></p> --}}
		</div>
		<div class="row">

			@foreach($blogPosts as $blogPost)
			<div class="col-lg-6">
				<span class="box_news">
					<figure>
						<img src="{{ Storage::url("blog/{$blogPost->image}") }}" alt="">
						<figcaption class="d-none d-md-block">{{ $blogPost->category->description_pt }}</figcaption>
					</figure>
					<ul>
						<li>{{ $blogPost->author->name }}</li>
						<li>{{ $blogPost->created_at }}</li>
					</ul>
					<a href="/blog/{{$blogPost->id}}">
						<h4>{{ $blogPost->title_pt }}</h4>
					</a>
					<div style="max-height: 200px;overflow: hidden;text-overflow: clip ellipsis;">{!! $blogPost->text_pt !!}</div>
					<a href="/blog/{{$blogPost->id}}" class="btn_2 rounded mt-3">Ler mais</a>
				</span>
			</div>
			@endforeach

		</div>
		<p class="btn_home_align"><a href="/blog" class="btn_1 rounded">Ver todos os posts do blog</a></p>
	</div>
</div>
