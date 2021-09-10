<!--
	O que faz:
	Paginas usadas:
	Dependências:
	Autor:
	Data:
-->
<div class="container margin_120_95">
	<div class="main_title_2">
		<span><em></em></span>
		<h2>{{ $pageData->description_pt }}</h2>
		<p>{{ $pageData->subtitle_pt }}</p>
	</div>
	<div class="row">

		@foreach($pageData->content as $item)
		<div class="col-sm-12 col-md-12 col-lg-12">
			<a class="box_feat" href="#">
				<div class="row">
					<div class="col-sm-2 col-md-2 col-lg-2">
						<i class="{{ $item->icon }}"></i>
					</div>
					<div class="col-sm-10 col-md-10 col-lg-10">
						<h3>{{ $item->title_pt }}</h3>
						<span class="font-italic">{{ $item->subtitle_pt }}</span>
						<p>{!! $item->text_pt !!}</p>
					</div>
				</div>
			</a>
		</div>
		@endforeach
	</div>
</div>
