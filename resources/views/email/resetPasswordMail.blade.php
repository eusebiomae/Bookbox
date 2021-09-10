@extends('layouts.cetccMail')

@section('content')
<h2 style="text-align: center;">Redefinir senha</h2>

<div style="width: 100%; text-align: center; padding: 20px 0 0 0;">
	<a href="https://{{ request()->getHost() }}/resetPassword/{{ $data['reset_password_code'] }}" title = "Clique aqui!"
		style="
		text-decoration: none;
		margin: 10px;
		padding: 10px;
		color:#022138;
		border-radius: 20px;
		font-weight: bold;
		border: 1px solid #27d4e1;
		background-color: #27f0ff;
	">
		Redefinir Minha Senha!
	</a>
</div>
@endsection
