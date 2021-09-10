<div class="call_section"
	style="background: url('{{ isset($image_bg) ? $image_bg : '' }}') no-repeat top fixed; background-size:cover;">
	<div class="container clearfix">
		<div class="row justify-content-end gp-wrap-reverse">
			<div class="col-lg-5 col-md-6 float-right wow" data-wow-offset="250">
				<div class="block-reveal">
					<div class="block-vertical"></div>
					<div class="box_1" style="background-color: #022138c0">
						<h3>{{ isset($title_pt) ? $title_pt : '' }}</h3>
						<div>{!! isset($text_pt) ? $text_pt : '' !!}</div>
						@if (isset($link))
							<a href="{{ $link }}" class="btn_1 rounded mt-3"
								target="_blank">{{ isset($link_label) ? $link_label : 'Clique aqui' }}</a>
						@endif
					</div>
				</div>
			</div>

			@if (isset($image))
				<div class="col-lg-5 col-md-6" style = "display: table">
					<div style = "display: table-cell; vertical-align: middle;">
						<img class="p-md-0 px-5 pb-4" src="{{ $image }}" alt="{{ $title_pt }}" width="{{ isset($link_label) && $link_label == 'Visitar Site' ? '100%' : '50%' }}">
					</div>
				</div>
			@endif
		</div>
	</div>
</div>
