@extends('layouts.cetccMail')

@section('content')
<h2 style="text-align: center;">Resultados da bolsa "{{ $data->scholarship->title }}"</h2>

<p>Infelizmente não foi desta vez {{ $data->student->name }}!</p>
<p>Mas não desanime, clique no botão abaixo e veja várias outras bolsas nas quais você pode se inscrever.</p>

<div style="width: 100%; text-align: center; padding: 20px 0 0 0;">
	<a href="https://{{ request()->getHost() }}/scholarship"
		style="
		text-decoration: none;
		margin: 10px;
		padding: 10px;
		color:#022138;
		border-radius: 5px;
		font-weight: bold;
		border: 1px solid #27d4e1;
		background-color: #27f0ff;
		">Ver Outras Bolsas</a>
</div>
@endsection
