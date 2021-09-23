@if (isset($banner))
	<section id="hero_in" class="{{ isset($strip) ? 'general ' : ''}}contacts" style="background: url({{ Storage::url("slides/{$banner->image}") }}" }}) no-repeat center top fixed">
		<div class="wrapper">
			<div class="container">
				<h1 class="fadeInUp">
					<span></span>
					{{ $banner->title_pt }}
				</h1>
			</div>
		</div>
	</section>
@else
	<section class="gp-banner-0"></section>
@endif
