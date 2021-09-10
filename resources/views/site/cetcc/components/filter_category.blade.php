<?php
	$count = 0;

	ob_start();
?>
@foreach ($categories as $category)
<?php $count += isset($category->count_blogs) ? $category->count_blogs : $category->count_scholarship ?>
<li class="display-table">
	<label class="display-table-row">
		<div class="display-table-cell">
			<input type="checkbox" name="categories[c][]" class="icheck" data-item value="{{ $category->id }}">
		</div>
		<div class="display-table-cell">
			{{ $category->description }}
			<small>
				({{ isset($category->count_blogs) ? $category->count_blogs : $category->count_scholarship }})
			</small>
		</div>
	</label>
</li>
@endforeach
<?php $listCategories = ob_get_contents(); ob_end_clean(); ?>

<!-- SPECIFIC CSS -->
@section('css')
@parent
<link href="{!! asset('cetcc/css/skins/square/grey.css') !!}" rel="stylesheet">
@endsection

<div class="collapse show" id="collapseFilters">
	<div class="filter_type">
		<h6>Área</h6>
		<ul>
			<li>
				<label>
					<input type="checkbox" name="categories[all]" class="icheck" checked data-all>Todos <small>({{ $count }})</small>
				</label>
			</li>
			{!! $listCategories !!}
		</ul>
	</div>
	<div class="form-group center">
		<button type="submit" value="Submit" class="btn bg-blue"><i class="icon-search-1"></i>Filtrar área</button>
	</div>
</div>
<script>
	var categoriesCheckbox = document.getElementById('collapseFilters').querySelectorAll('input[type="checkbox"][name^="categories"]');

	function checkCategory(event) {
		var target = event.target;

		if(target.dataset.hasOwnProperty('item')) {
			checkCategory.all.checked = false;
		} else {
			checkCategory.item.forEach(function(elem) {
				elem.checked = true;
			});
		}

		$('.icheck').iCheck('update');
	}

	checkCategory.item = [];
	checkCategory.all = null;

	document.addEventListener('DOMContentLoaded', function () {
		categoriesCheckbox.forEach(function (elem) {
			if (elem.dataset.hasOwnProperty('item')) {
				checkCategory.item.push(elem);
			} else {
				checkCategory.all = elem;
			}

			$(elem).off('ifChecked ifUnchecked', checkCategory);
			$(elem).on('ifChecked ifUnchecked', checkCategory);
		});
	})

</script>
