<article class="box_list wow fadeIn">
	<div class="row no-gutters">
		<div class="col-lg-3">
			<figure>
				<a href="#0" class="wish_bt" data-liked="{{ $data->id }}"></a>
				<a href="{{ $link }}">
					<img src="{{ $img_card }}" alt="">
					<div class="preview"><span>Ler mais</span></div>
				</a>
			</figure>
		</div>
		<div class="col-lg-9">
			<div class="wrapper">
				<span>{{ $category }}</span>
				<h3>{{ $data->title }}</h3>
				<p class="blog-subtitle">{{ $data->subtitle }}</p>
				<div class="post_info">
					<ul style="margin-bottom: 10px;">
						<li><img src="{{ $img_author }}" class="thumb"> {{ $author }}</li>
						<li><i class="icon-calendar-empty"></i>{{ $data->created_at }}</li>
					</ul>
				</div>
				<ul>
					<li><i class="icon_heart_alt"></i> {{ $data->count_likes }}</li>
					<li><i class="icon-eye"></i> {{ $data->count_views }}</>
					<li><i class="icon_comment_alt"></i> {{ $data->count_comments }}</>
					<li><a href="{{ $link }}">Ler mais</a></li>
				</ul>
			</div>
		</div>
	</div>
</article>
