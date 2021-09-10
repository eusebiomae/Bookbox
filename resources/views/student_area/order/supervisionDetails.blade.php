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
				<h5>Minhas Supervisões <small>Visualização dos dados de Supervisão</small></h5>
			</div>
			<div class="ibox-content">
				<div class="row">

					<table class="table table-bordered">
						<thead>
							<tr>
								<th width="100px">Código</th>
								<th width="100px">Status</th>
								<th width="100px">Data</th>
								<th width="120px">Valor da Fatura</th>
								<th>Responsável</th>
								<th>Categoria</th>
								<th>Link</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>{{ $order->code }}</td>
								<td class="center">{{ $order->statusLabel }}</td>
								<td class="center">{{ $order->supervision->date }}</td>
								<td>R$ {{ formatNumber($order->value) }}</td>
								<td>{{ getValueByColumn($order, 'supervision.teacher.name') }}</td>
								<td>
									{{ getValueByColumn($order, 'supervision.courseCategory.description_pt') }}
									{{-- <ul>
										@foreach ($order->supervision->course as $course)
											<li>{{ $course->title_pt }}</li>
										@endforeach
									</ul> --}}
								</td>
								<td>{{ getValueByColumn($order, 'supervision.link') }}</td>
							</tr>
						</tbody>
					</table>

				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
@parent

@endsection
