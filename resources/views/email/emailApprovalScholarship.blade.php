@extends('layouts.cetccMail')

@section('content')
<h2 style="text-align: center;">Resultados da bolsa "{{ $data->scholarship->title }}"</h2>

<p>Parabéns {{ $data->student->name }}!</p>
<p>Você passou em nosso processo seletivo de bolsistas ganhando {{ $data->discount_percentage }}% de desconto!</p>
<p>Antes de começar o curso, termine sua inscrição clicando no botão abaixo.</p>

<div style="width: 100%; text-align: center; padding: 20px 0 0 0;">
	<a href="https://{{ request()->getHost() }}/shopping_journey?course={{$data->scholarship->course_id}}&scholarshipStudent={{$data->id}}"
		style="
		text-decoration: none;
		margin: 10px;
		padding: 10px;
		color:#022138;
		border-radius: 5px;
		font-weight: bold;
		border: 1px solid #27d4e1;
		background-color: #27f0ff;
		">Finalizar Inscrição</a>
</div>
@endsection
