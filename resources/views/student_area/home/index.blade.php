@extends('student_area.layouts.app')

@section('title', 'Home')

@section('content')
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-lg-12">
			<div class="text-center m-t-lg">
				<h1>
					Olá {{  Auth::user()->name }}
				</h1>
				<h2>Bem vindo à Área do Aluno CETCC</h2>
				<small>
					Neste painel, você tem todos os recursos de forma prática e fácil.
				</small>
			</div>
		</div>
	</div>

	<div class="row" style="padding-top: 30px">

		{{-- @if (Auth::user()->admin === 'S' || Auth::user()->consultant === 'S') --}}
			<a href="{{ url('/student_area/account_data') }}">
				<div class="col-md-6">
					<div class="ibox-content text-center">
						<div class="m-b-sm">
							<i class="fa fa-address-card fa-5x"></i>
						</div>
						<h1>Meus dados</h1>
						<p class="font-bold">Editar dados pessoais</p>
					</div>
				</div>
			</a>
		{{-- @endif --}}

		{{-- @if (Auth::user()->admin === 'S' || Auth::user()->consultant === 'S') --}}
			<a href="{{ url('/student_area/order/course') }}">
				<div class="col-md-6">
					<div class="ibox-content text-center">
						<div class="m-b-sm">
							<i class="fa fa-graduation-cap fa-5x"></i>
						</div>
						<h1>Meus cursos</h1>
						<p class="font-bold">Visualizar ou/e pagar</p>
					</div>
				</div>
			</a>
		{{-- @endif --}}
	</div>
	<div class="row">
		@include('student_area.components.list_course')
	</div>

	@if (GigaGetData::hasScholarship())
		<div class="row">
			@include('student_area.components.list_scholarship')
		</div>
	@endif

	<div class="row">
		@include('student_area.components.list_supervision', [ 'payload' => ['order' => $payload['supervision'] ] ])
	</div>
</div>
@endsection
