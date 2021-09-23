@if (isset($isAdmin) && $isAdmin)
	<div class="row form-group">
		<div class="col-sm-12">
			<label class="control-label">Aluno</label>
			<select name="student" class="form-control select2 js-example-data-ajax" onchange="onChangeStudent(this.value)"
				required></select>
		</div>
	</div>
@else
	<div class="row" data-login>
		<div class="col-lg-5">
			<h2 class="mb-4">Login</h2>
			<form name="formLogin">
				{{ csrf_field() }}
				<div class="form-group">
					<label>E-mail ou CPF*</label>
					<input name="identification" type="text" class="form-control required">
				</div>
				<div class="form-group">
					<label>Senha*</label>
					<input name="password" type="password" class="form-control required">
				</div>
				<small><a href="javascript:formShowReset()">Esqueci minha senha</a></small>
			</form>
			<div class="alert alert-warning m-t-sm">
				<b>Dicas para sempre acessar sua conta:</b><br>
				1 - A senha do site antigo não é a mesma do site novo.<br>
				2 - Digite seu CPF ou o seu e-mail cadastrado.<br>
				3 - Por padrão a sua senha de acesso é o seu CPF.<br>
				4 - Caso altere a senha após efetuar o login use uma senha segura e que seja fácil relembrar.<br>
			</div>
		</div>
		<div class="col-lg-2 m-auto">
			<div class="divider"><span>Ou</span></div>
		</div>
		<div class="col-lg-5">
			<h2 class="mb-4">Cadastro</h2>
			<form name="formRegister">
				{{ csrf_field() }}
				<div class="form-group">
					<label>Nome Completo*</label>
					<input name="name" type="text" class="form-control required">
				</div>
				<div class="form-group">
					<label>E-mail*</label>
					<input name="email" type="text" class="form-control required email">
				</div>
				<div class="form-group">
					<label>CPF*</label>
					<input name="cpf" type="text" class="form-control mask-cpf required">
				</div>
				<div class="form-group">
					<label>Senha*</label>
					<input name="password" type="password" class="form-control required">
				</div>
				<div class="form-group">
					<label>Confirme a senha*</label>
					<input name="confirm" type="password" class="form-control required">
				</div>
			</form>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-5">
			<h2 class="mb-4" data-reset style="display:none;">Resetar senha</h2>
			@include('student_area.components.formReset')
		</div>
	</div>
	<div id="msgAlertLogin" class="hide alert alert-danger">
		Você precisa inserir seus dados de login ou preencher os dados para uma nova inscrição.
	</div>
	<div id="msgPassword" class="hide alert alert-danger">
		Senhas digitadas precisam ser identicas. Por favor digite novamente!
	</div>
	<div id="msgErrorLogin" class="hide alert alert-danger">
		<span></span>
	</div>
@endif
