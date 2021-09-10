<div class="widget">
	<div class="widget-title">
		<h4>Popular Tags</h4>
	</div>
	<div class="tags">
		@foreach ($popularTags as $tag)
			<a href="/blog?tags[]={{ $tag->id }}">{{ $tag->description }}</a>
		@endforeach
	</div>
</div>
