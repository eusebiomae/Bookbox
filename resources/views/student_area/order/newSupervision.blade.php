@extends('student_area.layouts.app')

@section('title', $title)

@section('css')
@parent

@endsection

@section('content')

<div class="wrapper wrapper-content animated fadeInRight">
	<div class="">
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<h5>Nova inscrição para Supervisão <small></small></h5>
			</div>
			<div class="ibox-content">

				<div class="container my-5">
					<h3>Supervisões</h3>
					<table class="table table-striped table-bordered table-hover" style="width: 100%" >
						<thead>
							<tr>
								<th>Data</th>
								<th>Categoria de Curso</th>
								<th>Prof. Responsável</th>
								<th>Inscrição</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($courseSupervision as $item)
							<tr>
								<th>{{ $item->date }}</th>
								<th>{{ getValueByColumn($item, 'courseCategory.description_pt') }}</th>
								<th>{{ $item->teacher->name }}</th>

								@if (count($item->order) || in_array($item->course_category_id, $courseCategories))
								<th><span class="btn btn-sm" title="Já possui inscrição" disabled>Paticipando</span></th>
								@else
								<th><a href="/student_area/order/makeSupervision/{{ $item->id }}" class="btn btn-info btn-sm" title="Inscrever">Fazer inscrição</a></th>
								@endif

							</tr>
							@endforeach
						</tbody>
						<tfoot>
							<tr>
								<th>Data</th>
								<th>Categoria de Curso</th>
								<th>Prof. Responsável</th>
								<th>Inscrição</th>
							</tr>
						</tfoot>
					</table>
				</div>

			</div>
		</div>
	</div>
</div>

@endsection
