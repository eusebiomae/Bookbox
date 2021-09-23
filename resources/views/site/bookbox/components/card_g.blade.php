<div class="col-md-6">
	<div class="box_grid wow">
		<figure class="block-reveal">
			<div class="block-horizzontal"></div>
			@if (isset($link_wish))
				<a href="{{$link_wish}}" class="wish_bt"></a>
			@endif
		<a href="{{$link}}"><img src="{{$img}}" class="img-fluid" alt=""></a>
			@if (isset($price))
				<div class="price gp-bkg-yellow">{{$price}}</div>
			@endif
			<div class="preview"><span>Ler mais</span></div>
		</figure>
		<div class="wrapper">
		<small>{{$type}}</small>
			<h3>{{$name}}</h3>
			<p>{{$description}}Id placerat tacimates definitionem sea, prima quidam vim no. Duo nobis persecuti cu.</p>
			@if (isset($star))
				<div class="rating">
					<i class="icon_star voted"></i>
					<i class="icon_star voted"></i>
					<i class="icon_star voted"></i>
					<i class="icon_star"></i>
					<i class="icon_star"></i>
					<small>(145)</small>
				</div>
			@endif
		</div>
		@if (isset($details))
		<ul>
			@if (isset($time))
			<li><i class="icon_clock_alt"></i> {{$time}}</li>
			@endif
			@if (isset($likes))
			<li><i class="icon_like"></i> {{$likes}}</li>
			@endif
			<li><a href="{{$link}}">{{$details}}</a></li>
		</ul>
		@endif
	</div>
</div>
