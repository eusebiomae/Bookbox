<div class="widget">
	<div class="widget-title">
		<h4>{{ $title }}</h4>
	</div>
	<ul class="comments-list">
		@foreach ($cards as $card)
		<li>
			<div class="alignleft">
				<a href="{{ $card->link }}"><img src="{{ $card->image }}" alt=""></a>
			</div>
			<small>{{ $card->date }}</small>
			<h3><a href="{{ $card->link }}" title="">{{ $card->title }}</a></h3>
		</li>
		@endforeach
	</ul>
</div>
