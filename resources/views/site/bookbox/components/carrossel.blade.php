<div id="full-slider-wrapper">
	<div id="layerslider" style="width:100%;height:750px;">
		@foreach($carrossel as $slide)
		<div class="ls-slide" data-ls="slidedelay: 5000; transition2d:85;">
			<img src="{{ Storage::url("slides/{$slide->image}") }}" class="ls-bg" alt="Slide background">
				@if (isset($slide->pretitle_pt))
				<p class="ls-l slide_typo_2 gp-slide p1" data-ls="durationin:2000;delayin:1000;easingin:easeOutElastic;">
					{{ $slide->pretitle_pt }}
				</p>
				@endif
				<h3 class="ls-l slide_typo gp-slide p2" data-ls="offsetxin:0;durationin:2000;delayin:1000;easingin:easeOutElastic;rotatexin:90;transformoriginin:50% bottom 0;offsetxout:0;rotatexout:90;transformoriginout:50% bottom 0;">
					{{ $slide->title_pt }}
				</h3>
				<p class="ls-l slide_typo_2 gp-slide p3" data-ls="durationin:2000;delayin:1000;easingin:easeOutElastic;">
					{{ $slide->subtitle_pt }}
				</p>
				@if (isset($slide->link))
				<a target="_blank" class="ls-l btn_1 rounded p4 d-none d-md-block" style="white-space: nowrap;" data-ls="durationin:2000;delayin:1400;easingin:easeOutElastic;" href="{{ $slide->link }}">
					@if (isset($slide->label_link) && !empty($slide->label_link))
					{{ $slide->label_link }}
					@else
						Saiba Mais
					@endif
				</a>
				@endif
		</div>
		@endforeach

	</div>
</div>
