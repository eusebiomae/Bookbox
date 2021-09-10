{{ csrf_field() }}
<input type="hidden" name="id">
<input type="hidden" name="scholarship_id">
<div class="form-group">
	<label class="col-sm-2 control-label">Nome*</label>
	<div class="col-sm-4">
		<input type="text" name="name" class="form-control" maxlength="128" autofocus required>
		<span class="help-block m-b-none">Digite o Nome</span>
	</div>
	<label class="col-sm-1 control-label">E-mail*</label>
	<div class="col-sm-5">
		<input type="text" name="email" class="form-control" maxlength="255" autofocus required placeholder="exemplo@contato.com.br">
		<span class="help-block m-b-none">Digite o E-mail</span>
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label">Data de Nascimento*</label>
	<div class="col-sm-4">
		<div class="input-group date">
			<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
			<input type="text" name="birth_date" class="form-control" readonly>
		</div>
		<span class="help-block m-b-none">Selecione sua Data de Nascimento</span>
	</div>
	<label class="col-sm-1 control-label">Telefone*</label>
	<div class="col-sm-2">
		<input type="text" name="phone" class="form-control mask-phone" maxlength="16" autofocus required placeholder="(00) 0000-0000">
		<span class="help-block m-b-none">Digite o Telefone</span>
	</div>
	<label class="col-sm-1 control-label">Celular*</label>
	<div class="col-sm-2">
		<input type="text" name="cell_phone" class="form-control mask-cell" maxlength="16" autofocus required placeholder="(00) 0 0000-0000">
		<span class="help-block m-b-none">Digite o Celular</span>
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label">Genêro*</label>
	<div class="col-sm-4">
		<div class="btn-group btn-group-toggle" data-toggle="buttons">
			<label class="btn btn-white">
				<input type="radio" name="gender" value="male"> Masculino
			</label>
			<label class="btn btn-white">
				<input type="radio" name="gender" value="feminine"> Feminino
			</label>
			<label class="btn btn-white">
				<input type="radio" name="gender" value="others"> Outros
			</label>
		</div>
		<span class="help-block m-b-none">Selecione o Genero</span>
	</div>
	<label class="col-sm-1 control-label">CPF*</label>
	<div class="col-sm-2">
		<input type="text" name="cpf" class="form-control mask-cpf" maxlength="14" autofocus required readonly>
		<span name="help-cpf" class="help-block m-b-none">Digite o CPF</span>
	</div>
	<label class="col-sm-1 control-label">RG*</label>
	<div class="col-sm-2">
		<input type="text" name="rg" class="form-control mask-rg" required disabled>
		<span class="help-block m-b-none">Digite o RG</span>
	</div>
</div>
<div class="ibox-title">
	{{-- <h5>Endereço</h5> --}}
</div>
<div class="form-group">
	<label class="col-sm-2 control-label">CEP*</label>
	<div class="col-sm-2">
		<div class="btn-group-toggle" data-toggle="buttons">
			<input type="text" name="zip_code" class="form-control mask-cep" maxlength="10" autofocus required>
		</div>
		<span class="help-block m-b-none">Digite o CEP</span>
	</div>
	<label class="col-sm-1 control-label">Estado*</label>
	<div class="col-sm-2">
		<select class="form-control m-b" name="state_id"></select>
		<span class="help-block m-b-none">Selecione o Estado</span>
	</div>
	<label class="col-sm-1 control-label">Cidade*</label>
	<div class="col-sm-4">
		<div class="btn-group-toggle" data-toggle="buttons">
			<input type="text" name="city" class="form-control" maxlength="45" autofocus required>
		</div>
		<span class="help-block m-b-none">Digite a Cidade</span>
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label">Bairro*</label>
	<div class="col-sm-2">
		<div class="btn-group-toggle" data-toggle="buttons">
			<input type="text" name="neighborhood" class="form-control" maxlength="450" autofocus required>
		</div>
		<span class="help-block m-b-none">Digite o Bairro</span>
	</div>
	<label class="col-sm-1 control-label">Endereço*</label>
	<div class="col-sm-2">
		<div class="btn-group-toggle" data-toggle="buttons">
			<input type="text" name="address" class="form-control" maxlength="450" autofocus required>
		</div>
		<span class="help-block m-b-none">Digite o Endereço</span>
	</div>
	<label class="col-sm-1 control-label">Nº*</label>
	<div class="col-sm-1">
		<div class="btn-group-toggle" data-toggle="buttons">
			<input type="number" name="n" class="form-control" maxlength="32" autofocus required>
		</div>
		<span class="help-block m-b-none">Digite o número da residência</span>
	</div>
	<label class="col-sm-1 control-label">Complemento</label>
	<div class="col-sm-2">
		<div class="btn-group-toggle" data-toggle="buttons">
			<input type="text" name="complement" class="form-control" maxlength="450" autofocus>
		</div>
		<span class="help-block m-b-none">Digite o Endereço</span>
	</div>
</div>
<div class="ibox-title">
	{{-- <h5>Conta</h5> --}}
</div>
<div class="form-group m-b-md">
	<div class="row m-b-md m-r-xxs">
		<label class="col-sm-2 control-label">Experiência. com TCC?</label>
		<div class="col-sm-2">
			<div class="switch">
				<div class="onoffswitch m-sm">
					<input type="checkbox" name="tcc_experience" class="onoffswitch-checkbox" id="tcc_experience" value="1">
					<label class="onoffswitch-label" for="tcc_experience">
						<span class="onoffswitch-inner"></span>
						<span class="onoffswitch-switch"></span>
					</label>
				</div>
			</div>
		</div>
		<label class="col-sm-2 control-label">Formação em Psicologia?*</label>
		<div class="col-sm-1">
			<div class="switch">
				<div class="onoffswitch m-sm">
					<input type="checkbox" class="onoffswitch-checkbox" id="example1" onchange="document.getElementById('formation').style.display = this.checked ? 'none' : null" checked>
					<label class="onoffswitch-label" for="example1">
						<span class="onoffswitch-inner"></span>
						<span class="onoffswitch-switch"></span>
					</label>
				</div>
			</div>
		</div>
		<div id="formation" style="display:none;">
			<label class="col-sm-2 control-label">Qual sua Formação?*</label>
			<div class="col-sm-3">
				<input name="formation" type="text" class="form-control mt-3" >
			</div>
		</div>

	</div>
	<div class="row m-r-xxs">
		<div class="col-sm-2"></div>

		<div class="col-sm-4">
			<div class="fileinput fileinput-new input-group" data-provides="fileinput">
				<div class="form-control" data-trigger="fileinput">
					<i class="glyphicon glyphicon-file fileinput-exists"></i>
					<span class="fileinput-filename"></span>
				</div>
				<span class="input-group-addon btn btn-default btn-file">
					<span class="fileinput-new">Selecionar Imagem</span>
					<span class="fileinput-exists">Trocar</span>
					<input type="file" name="fileImage" accept="image/*"/>
				</span>
				<a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remover</a>
			</div>
			<img id="image" height="100px">
		</div>

		{{-- @if (isset($isAdmin)) --}}
		<div class="col-sm-6">
			<div class="row" style="margin-top:20px;">
				<label class="col-sm-4 control-label">Senha</label>
				<div class="col-sm-8">
					<div class="btn-group-toggle" data-toggle="buttons">
						<input type="password" name="password" class="form-control" maxlength="32" onkeyup="newPassword()">
					</div>
					<span class="help-block m-b-none">Digite a nova senha</span>
				</div>
			</div>
			<div class="row" style="margin-top:20px;">
				<label class="col-sm-4 control-label">Confirmar Senha</label>
				<div class="col-sm-8">
					<div class="btn-group-toggle" data-toggle="buttons">
						<input type="password" name="password_conf" class="form-control" maxlength="32" onkeyup="newPassword()">
					</div>
					<span class="help-block m-b-none">Digite a senha novamente</span>
				</div>
			</div>
		</div>
		{{-- @endif --}}
	</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label">Mais Informação</label>
	<div class="col-sm-10">
		<textarea name="complement" id="plus_information" class="form-control" rows="3"></textarea>
	</div>
</div>
<div class="hr-line-dashed"></div>

@section('scripts')
@parent
{{-- <script src="{!! asset('js/plugins/jasny/jasny-bootstrap.min.js') !!}" type="text/javascript"></script> --}}
<script src="{!! asset('js/plugins/datapicker/bootstrap-datepicker.js') !!}"></script>
<script src="{!! asset('js/plugins/switchery/switchery.js') !!}"></script>
<script>
	// $payload['student']->image

	function newPassword(form) {
		var password = form.password.value.trim()
		var passwordConf = form.password_conf.value.trim()

		if ((password || passwordConf) && password != passwordConf) {
			form.querySelector('[type=submit]').setAttribute('disabled', null)
		} else {
			form.querySelector('[type=submit]').removeAttribute('disabled')
		}
	}

	function setDatePicker() {
		$('.input-group.date').datepicker({
			todayBtn: "linked",
			keyboardNavigation: false,
			forceParse: false,
			calendarWeeks: true,
			autoclose: true,
			format: "dd/mm/yyyy",
		})
	}

	var APP = {}
	APP.payload = {!! isset($payload) ? json_encode($payload) : '{}' !!}
	document.addEventListener('DOMContentLoaded', function() {

		if (APP.payload) {
			populateSelectBox({
				list: APP.payload.states,
				target: document.forms.formAccount.state_id,
				columnValue: "id",
				columnLabel: "abbreviation",
				selectBy: [ ],
				emptyOption: {
					label: ""
				}
			})

			if (APP.payload.student) {
				populate(document.forms.formAccount, APP.payload.student)

				if (APP.payload.student.gender) {
					var elemGender = document.forms.formAccount.querySelector('[name="gender"][value="'+ APP.payload.student.gender +'"]')

					elemGender.checked = true
					elemGender.closest('label').classList.add('active')
				}

				document.getElementById('image').src = APP.payload.student.image
			}
		}

		// var elem = document.querySelector('.js-switch');
		// var switchery = new Switchery(elem, { color: '#007FB8' });

		// var elem_2 = document.querySelector('.js-switch_2');
		// var switchery_2 = new Switchery(elem_2, { color: '#007FB8' });

		setDatePicker();

		document.forms.formAccount.fileImage.addEventListener('change', function(event) {
			document.getElementById('image').src = URL.createObjectURL(event.target.files[0])
		})

	})
</script>

<script>
	$(document).ready(function() {
		var cpf = document.querySelector('[name="cpf"]');
		var save = document.querySelector("button");
		console.log(cpf);

		if(cpf) {
			cpf.addEventListener("blur", function( event ) {
				save.setAttribute("readonly", "readonly");
				$.ajax({
					url: '/api/validate/cpf_exist',
					type: 'post',
					data: {
						cpf: cpf.value,
					},
				})
				.then(function(resp) {
					var cpf_label = document.querySelector('[name="help-cpf"]');
					switch (resp) {
						case '-3':
							cpf_label.innerHTML = '<b style="color:red;">Campo Vazio</b>';
							console.log(-3)
							break;

						case '-1':
							cpf_label.innerHTML = '<b style="color:red;">CPF Inválido</b>';
							console.log(-1)
							break;

						case '1':
							cpf_label.innerHTML = '<b style="color:red;">Já Cadastrado</b>';
							console.log(1)
							break;

						case '0':
							cpf_label.innerHTML = '<b style="color:blue;">Válido</b>';
							console.log(1)
							save.removeAttribute('readonly');
							break;

						default:
							break;
					}
					console.log(resp);
				})
				// event.target.style = "display:none;";
			}, true);
		}
	});
</script>

@if (isset($isAdmin))
<script>
	document.forms.formAccount.rg.removeAttribute('readonly');
	document.forms.formAccount.cpf.removeAttribute('readonly');
</script>
@else
<script>
	if (APP.payload.student) {
		if (!APP.payload.student.rg) {
			document.forms.formAccount.rg.removeAttribute('readonly')
			document.forms.formAccount.cpf.removeAttribute('readonly')
		}
	}
</script>
@endif
@endsection
