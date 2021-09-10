<nav id="pagination" aria-label="...">
	<ul class="pagination pagination-sm">
		<li class="page-item">
			<a class="page-link" href="{{ $pagination->url(1) }}">Primeira</a>
		</li>
		<li class="page-item">
			<a class="page-link" href="{{ $pagination->previousPageUrl() }}">Anterior</a>
		</li>
		<?php
			$numPage = $pagination->currentPage() - 2;
			$numPage = $numPage < 1 ? 1 : $numPage;
			$lastNumPage = $numPage + 4;
			$nextPage = true;
		?>
		@while ($nextPage)
			<li class="page-item"><a class="page-link" href="{{ $pagination->url($numPage) }}">{{ $numPage }}</a></li>
			<?php
				$numPage++;
				$nextPage = $numPage <= $lastNumPage && $numPage <= $pagination->lastPage();
			?>
		@endwhile
		<li class="page-item">
			<a class="page-link" href="{{ $pagination->nextPageUrl() }}">Próximo</a>
		</li>
		<li class="page-item">
			<a class="page-link" href="{{ $pagination->url($pagination->lastPage()) }}">Última</a>
		</li>
	</ul>
</nav>
<script>
	if ((/search|view|tag/).test(location.search)) {
		document.getElementById('pagination').querySelectorAll('a.page-link').forEach(function(elem) {
			if (elem.getAttribute('href')) {
				elem.href += '&' + location.search.substr(1).replace(/page=\d+&?/, '');
			}
		});
	}
</script>
