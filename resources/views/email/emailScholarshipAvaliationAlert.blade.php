@extends('layouts.cetccMail')

@section('content')
<h2 style="text-align: center;">Confirmação de Inscrição de Bolsa</h2>

<p>{{ $data->student->name }}!</p>
<p>A Prova da sua inscrição para a bolsa <strong>"{{ $data->scholarship->title }}"</strong> foi liberada.</p>

<div style="width: 100%; text-align: center; padding: 20px 0 0 0;">
	<a href="https://{{ request()->getHost() }}/student_area/scholarship/proofProficiency/{{$data->scholarship->avaliation_id}}"
		style="
		text-decoration: none;
		margin: 10px;
		padding: 10px;
		color:#022138;
		border-radius: 5px;
		font-weight: bold;
		border: 1px solid #27d4e1;
		background-color: #27f0ff;
		">Fazer Prova</a>
</div>
@endsection
