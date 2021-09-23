<div class="container my-5">
	<div class="table-responsive">
		<h3>{{ empty($pageData->content) ? '' : $pageData->description_pt }}</h3>
		@foreach ($pageData->content as $date => $content)
			<table class="table table-striped table-bordered table-hover dataTables-example" style="font-size: 12px;" >
				<thead>
					<tr>
						<th colspan="5">
							<h4 class="text-center">
								{{ $date }}
							</h4>
						</th>
					</tr>
					<tr>
						<th>Data</th>
						<th>Categoria</th>
						<th>Prof. Responsável</th>
						<th>Ex-alunos do CETCC</th>
						<th>Avulso</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($content as $item)
					<tr>
						<th>{{ $item->date }}</th>
						<th>{{ implode(', ', $item->courses) }}</th>
						<th>{{ $item->teacher->name }}</th>
						<th><a href="/shopping_journey?supervision={{ $item->id }}&type=1" class="btn btn-info btn-sm" title="Inscrever">R$ {{ $item->value_1 }}</a></th>
						<th><a href="/shopping_journey?supervision={{ $item->id }}&type=2" class="btn btn-info btn-sm" title="Inscrever">R$ {{ $item->value_2 }}</a></th>
					</tr>
					@endforeach
				</tbody>
				<tfoot>
					<tr>
						<th>Data</th>
						<th>Categoria</th>
						<th>Prof. Responsável</th>
						<th>Ex-alunos do CETCC</th>
						<th>Avulsos</th>
					</tr>
				</tfoot>
			</table>
		@endforeach
	</div>
</div>
