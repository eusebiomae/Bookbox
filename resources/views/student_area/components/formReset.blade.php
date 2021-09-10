<form name="formReset" action="/student_area/login/resetSendEmail" method="POST" style="display:none;">
	{{ csrf_field() }}

	<div class="form-group mt-5">
		<span class="input">
			<label>
				CPF ou E-mail
			</label>
			<input class="form-control required" type="text" autocomplete="off" name="identification" maxlength="255" onkeyup="validEmailCPF(event, document.forms.formReset)">
		</span>
		<small>Um e-mail de redefinição de senha será enviado para seu e-mail cadastrado</small>
		<div class="alert alert-warning m-t-sm">
			<b>ATENÇÃO:</b><br>
			Caso você não visualize o e-mail de redefinição de senha na sua caixa de entrada, verifique se não está na caixa de SPAM.<br>
		</div>
		@if (old('codeResponse') == 201)
		<div class="alert alert-success alert-dismissable m-t-sm">
			<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
			Sucesso! E-mail de redefinição de senha foi enviado.
		</div>
		@elseif (old('codeResponse') == 401)
			<div class="alert alert-danger alert-dismissable m-t-sm">
				<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
				CPF ou E-mail incorreto ou não cadastrado!
			</div>
		@endif
	</div>
	<button type="submit" class="btn_1 rounded full-width add_top_60" disabled>Enviar</button>
	<div class="text-center add_top_10"><strong><a href="javascript:formLogin()">Voltar para Login</a></strong></div>
</form>
<script src="/js/validateAys.js"></script>
<script>
	function validEmailCPF(event, form) {
		var val = event.target.value

		var buttonSubmit = form.querySelector('button[type="submit"]')

		if (validateCpfCnpj(val) || validateEmail(val)) {
			buttonSubmit.removeAttribute('disabled')
		} else {
			buttonSubmit.setAttribute('disabled', '')
		}
	}
</script>
