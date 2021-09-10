<form name="filters" action="" method="get">
	<div class="container mt-5">
		<div class="row justify-content-start">
			<div class="col-2 form-group gp-0" >
				<select name="search[year]" class="form-control" style="padding:0;" title="Ano"></select>
			</div>
			<div class="col-2 form-group" >
				<select name="search[author]" class="form-control" style="padding:0;"></select>
			</div>
			{{-- <div class="col-2 form-group" >
				<select name="search[category]" class="form-control" style="padding:0;"></select>
			</div> --}}
			<div class="col-2 form-group">
				<input class="form-control" type="text" name="search[text]" placeholder="Pesquisar">
			</div>
			<div class="col-2 form-group">
				<button type="submit" class="btn btn-info gp-btn-radius">Pesquisar</button>
			</div>
		</div>
	</div>
</form>

@section('scripts')
@parent
<script>
	APP.search = {!! json_encode($search) !!}
	APP.filters = {!! json_encode($filters) !!}

	populateSelectBox({
		list: APP.filters.author,
		target: document.forms.filters['search[author]'],
		selectBy: [ (APP.search.author || null) ],
		columnValue: 'id',
		columnLabel: 'name',
		emptyOption: {
			label: "Autor"
		}
	})

	var option = document.createElement('option');

	option.value = '';
	option.innerText = 'Ano';

	document.forms.filters['search[year]'].options.add(option)

	for (key in APP.filters.years) {
		var year = APP.filters.years[key]

		var option = document.createElement('option');

		option.value = year;
		option.innerText = year;

		if ((APP.search.year || null) == year) {
			option.selected = true
		}

		document.forms.filters['search[year]'].options.add(option)
	}

	document.forms.filters['search[text]'].value = (APP.search.text || '')
</script>
@endsection
