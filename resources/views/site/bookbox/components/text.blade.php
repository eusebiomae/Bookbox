<?php $content = $pageData->content[0]; ?>

<div class="container">
	<div class="row mt-5">
		<div class="col-12">
			<h1 class="h3">
				@if (isset($content->icon))
					<i class="{{ $content->icon }} m-3"></i>
				@endif
				{{ $content->title_pt }}
			</h1>
			<p style="line-height:20px;">{!! $content->text_pt !!}</p>
		</div>
	</div>
</div>
