<div class="container">
	<h1 style="text-align:center;" class="my-5">Resultado para a pesquisa "{{$search}}"</h1>
	<h4 class="my-3">Curso(s) </h4>
	<div class="row">
		@if (count($pageData->content->course))
			@foreach ($pageData->content->course as $item)
				@include('site.cetcc.components.card_generico', [ 'payload' => [
					'title' => $item->title_pt,
					'img' => $item->img,
					'subtitle' => $item->subtitle_pt,
					// 'description' => $item->description_pt,
					'id' => "/course/{$item->id}"
				] ])
			@endforeach
		@else
				<p>Não foi encontrado nenhum curso relacionado com o termo "{{$search}}"</p>
		@endif
	</div>
	<h4 class="my-3">Blog(s)</h4>
	<div class="row">
		@if (count($pageData->content->blog))
			@foreach ($pageData->content->blog as $item)
			@include('site.cetcc.components.card_generico', [ 'payload' => [
				'title' => $item->title_pt,
				'img' => "/storage/blog/{$item->image}",
				'subtitle' => $item->subtitle_pt,
				// 'description' => $item->text_pt,
				'id' => "/blog/{$item->id}"
			] ])
			@endforeach
		@else
			<p>Não foi encontrado nenhum Blog relacionado com o termo "{{$search}}"</p>
		@endif
	</div>
	<h4 class="my-3">Artigo(s)</h4>
	<div class="row">
		@if (count($pageData->content->article))
			@foreach ($pageData->content->article as $item)
			@include('site.cetcc.components.card_generico', [ 'payload' => [
				'title' => $item->title_pt,
				'img' => "/storage/article/{$item->image}",
				'subtitle' => $item->subtitle_pt,
				// 'description' => $item->text_pt,
				'id' => "/article/{$item->id}"
			] ])
			@endforeach
		@else
			<p>Não foi encontrado nenhum Artigo relacionado com o termo "{{$search}}"</p>
		@endif
	</div>
</div>
