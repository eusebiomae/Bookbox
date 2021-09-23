<?php $dataTable = $pageData->content ?>
<div class="container my-5">
	<div class="table-responsive">
		<table class="table table-striped table-bordered table-hover dataTables-site" style="font-size: 12px;" >
			<thead>
				<tr>
					@foreach($dataTable->header as $header)
					<th>{{ $header->label }}</th>
					@endforeach
				</tr>
			</thead>
			<tbody>
				@foreach($dataTable->data as $data)
				<tr>
					@foreach($dataTable->header as $header)
					<td data-edit-row-key="{{ $header->column }}" class="">{!! getValueByColumn($data, $header->column) !!}</td>
					@endforeach
				</tr>
				@endforeach
			</tbody>
			<tfoot>
				<tr>
					@foreach($dataTable->header as $header)
					<th>{{ $header->label }}</th>
					@endforeach
				</tr>
			</tfoot>
		</table>
	</div>
</div>

@section('css')
@parent
<link rel="stylesheet" href="{!! asset('css/vendor.css') !!}" />
<link rel="stylesheet" href="{!! asset('css/plugins/dataTables/datatables.min.css') !!}" />
@endsection

@section('scripts')
@parent
<script src="{!! asset('js/plugins/dataTables/datatables.min.js') !!}" type="text/javascript"></script>
<script>
	$(document).ready(function() {
		$('.dataTables-site').DataTable({
			searching: false,
			language: {
		// 		processing: "Processando ...",
		// 		search: "Pesquisar",
				lengthMenu: "Mostrar _MENU_ elementos",
				info: "Mostrando item _START_ à _END_ de _TOTAL_ elementos",
				// infoEmpty: "Mostrando item 0 à 0 de 0 elementos",
				infoFiltered: "(filtro de _MAX_ elementos ao total)",
		// 		infoPostFix: "",
		// 		loadingRecords: "Carregando ...",
		// 		zeroRecords: "Não há nenhum elemento a ser exibido",
		// 		emptyTable: "Nenhum dado disponível na tabela",
				paginate: {
					first: "Primeiro",
					previous: "Anterior",
					next: "Próximo",
					last: "Último"
				},
				aria: {
					sortAscending:  ": ativar para classificar a coluna em ordem crescente",
					sortDescending: ": ativar para classificar a coluna em ordem decrescente"
				}
			}
		});
	});

</script>
@endsection
