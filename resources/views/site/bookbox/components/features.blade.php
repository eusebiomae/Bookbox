<div class="features clearfix">
	<div class="container">
		<ul>
			@foreach($features as $feature)
			<li>
				<i class="{{ $feature->icon }}"></i>
				<h4>
					{{ $feature->title }}
				</h4>
				<p>
					{{ $feature->description }}
				</p>
			</li>
			@endforeach
		</ul>
	</div>
</div>
