<aside class="col-lg-3" id="filters_col">

	<form method="get" action="/blog">
		{{-- Search --}}
		@include('site.cetcc.components.sidebar_search')

		{{-- FILTER_CATEGORY --}}
		@include('site.cetcc.components.filter_category')
	</form>

	{{-- SIDEBAR_CARD --}}
	@include('site.cetcc.components.sidebar_card', $sidebarCard)

	{{-- SIDEBAR_POPULAR_TAGS --}}
	@include('site.cetcc.components.sidebar_popular_tags')

	<!-- /widget -->
</aside>
