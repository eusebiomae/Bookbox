<section id="teachers">
		<div class="intro_title">
			<h2>{{$title}}</h2>
		</div>
		<p>{{$text}}</p>
		<div class="row add_top_20 add_bottom_30">
			@foreach ($teacher as $item)
			<div class="col-lg-6">
				<ul class="list_teachers">
					<li>
						<a href="teacher-detail.html">
						<figure><img src="{{$item['img']}}" alt="{{$item['name']}}"></figure>
							<h5>{{$item['name']}}</h5>
							<p>{{$item['matter']}}</p><i class="pe-7s-angle-right-circle"></i></a>
					</li>
				</ul>
			</div>
			@endforeach
		</div>
		<!-- /row -->
	</section>
