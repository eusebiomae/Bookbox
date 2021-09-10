<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Recibo</title>
	<link rel="stylesheet" href="{!! asset('font-awesome/css/font-awesome.css') !!}">
	<link rel="stylesheet" href="{!! asset('css/bootstrap.min.css')!!}" >
	<link rel="stylesheet" href="{!! asset('css/print.css')!!}" >
</head>
<body class="gp-bkg-gray">
	<div class="container gp-a4 gp-text-2 gp-mt-5 gp-p-5 gp-bkg-white">
		<div class="row">
			<div class="col-sm-6 ">
				<img src="/cetcc/img/logo_wide.png" width="400px" alt="">
			</div>
			<div class="col-sm-6 gp-text-right">
				{{ getValueByColumn($payload, 'company.name') }}<br />
				{{ getValueByColumn($payload, 'company.cnpj') }}<br />
				{{ getValueByColumn($payload, 'company.email') }}<br />
				{{ getValueByColumn($payload, 'company.fullAddress') }}<br />
			</div>
		</div>
		<div class="row gp-mt-5">
			<div class="col-sm-12 gp-bkg-gray gp-pb-1">
				<h2>Fatura {{ getValueByColumn($payload, 'order.code') }}</h2>
				Data da Fatura: {{ getValueByColumn($payload, 'order.payday') }} <br />
				{{-- Vencimento: 4th Feb 2020 --}}
			</div>
			<div class="col-sm-12 gp-pt-3">
				<span>Faturado para</span><br />
				<span>Nome</span><br />
				<span>Att.: {{ getValueByColumn($payload, 'student.name') }} </span> <br />
				<span>Address:
					{{ getValueByColumn($payload, 'student.address') }}
					{{ getValueByColumn($payload, 'student.n') }}
					{{ getValueByColumn($payload, 'student.neighborhood') }}
					{{ getValueByColumn($payload, 'student.city') }}
					{{ getValueByColumn($payload, 'student.state.abbreviation') }}
				</span>
			</div>
			<div class="col-sm-12">
				<table class="table table-bordered gp-my-5">
					<thead>
						<tr class="gp-bkg-gray gp-text-center">
							<th>Descrição</th>
							<th>Total</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							{{-- DATA INICAL E DATA FINAL --}}
							<td>{{ getValueByColumn($payload, 'courseFormPayment.course.title_pt') }}
								(
									{{ getValueByColumn($payload, 'courseFormPayment.course.courseCategoryType.title') }},
									{{ getValueByColumn($payload, 'courseFormPayment.course.courseCategory.description_pt') }},
									{{ getValueByColumn($payload, 'courseFormPayment.course.courseSubcategory.description_pt') }}
								)
							</td>
							<td> R$ {{ formatNumber(getValueByColumn($payload, 'order.value_paid')) }}</td>
						</tr>
						{{-- CASO HOUVER ATRAZO --}}
						{{-- <tr>
							<td>Juros por atrazo</td>
							<td> R$ 000,00 BRL</td>
						</tr> --}}
					</tbody>
					<tfoot class="gp-bkg-gray">
						{{-- <tr>
							<th class="gp-text-right">Subtotal</th>
							<th>R$ 000,00 BRL</th>
						</tr> --}}
						{{-- <tr>
							<th class="gp-text-right">Crédito</th>
							<th>R$ 000,00 BRL</th>
						</tr> --}}
						<tr>
							<th class="gp-text-right">Total</th>
							<th>R$ {{ formatNumber(getValueByColumn($payload, 'order.value_paid')) }}</th>
						</tr>
					</tfoot>
				</table>
			</div>
			<div class="col-sm-12">
				<h2>Transações</h2>
				<table class="table table-bordered gp-my-5">
					<thead class="gp-bkg-gray">
						<tr>
							<th>Data Transação</th>
							<th>Forma de Pagamento</th>
							<th>ID. Transação</th>
							<th>Valor</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>{{ getValueByColumn($payload, 'order.payday') }}</td>
							<td>{{ getValueByColumn($payload, 'order.formPayment.description') }}</td>
							<td>{{ getValueByColumn($payload, 'order.code') }}</td>
							<td>R$ {{ formatNumber(getValueByColumn($payload, 'order.value_paid')) }}</td>
						</tr>
					</tbody>
					<tfoot class="gp-bkg-gray">
						<tr>
							<th class="gp-text-right" colspan="3">Balanço</th>
							<th class="gp-text-center">R$ {{ formatNumber(getValueByColumn($payload, 'order.value_paid')) }}</th>
						</tr>
					</tfoot>
				</table>
			</div>
			<div class="col-sm-12 gp-text-center">
				Gerado em {{ getValueByColumn($payload, 'order.payday') }}
			</div>
		</div>
	</div>
</body>
</html>
