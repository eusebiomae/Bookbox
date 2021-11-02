@extends('site.bookbox.layout.site')

@section('content')
<section class="section section-xxl swiper-slide-how text-md-left" >
	<div class="card">
		<div class="card-body">
			<form name="formResetPassword" action="/student_area/login/resetPassword" method="POST">
				{{ csrf_field() }}
				<input type="hidden" id="resetPasswordCode" name="resetPasswordCode" value="{{ $resetPasswordCode }}">
				<div class="form-group mt-5">
					<div class="col-md-12 form-group">
						<label> Senha </label>
						<input class="form-control required" type="password" autocomplete="off" name="password" maxlength="255" onkeyup="pressPassword()">
					</div>

					<div class="col-md-12 form-group">
						<label> Confirmar Senha </label>
						<input class="form-control required" type="password" autocomplete="off" name="password2" maxlength="255" onkeyup="pressPassword()">
					</div>
				</div>
				<div class="alert alert-warning">
					<b>Dicas para sempre acessar sua conta:</b><br>
					1 - Use uma senha que contenha caracteres alfanuméricos, letras maiúscula e caracteres especiais.<br>
					2 - Use uma senha segura e que seja fácil relembrar.<br>
					3 - Marque sua senha em um lugar seguro caso precise no futuro.<br>
				</div>
				<button type="submit" class="btn_1 rounded full-width add_top_60" disabled>Salvar</button>
			</form>
		</div>
	</div>
</section>
<script>
	function pressPassword() {
		var formResetPassword = document.forms.formResetPassword
		var btnSubmit = formResetPassword.querySelector('button[type="submit"]')
		console.log(formResetPassword.password.value, formResetPassword.password2.value);
		if (formResetPassword.password.value == formResetPassword.password2.value) {
			btnSubmit.removeAttribute('disabled')
		} else {
			btnSubmit.setAttribute('disabled', true)
		}
	}
</script>
@endsection
