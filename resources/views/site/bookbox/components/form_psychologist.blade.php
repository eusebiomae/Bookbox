<div class="row">
	<div class="col-12">
		<div class="container mt-3">
			<div class="row justify-content-between">
				<div class="col-lg-12">
					<h4>Cadastro de Psicólogo</h4>

					<div id="message-contact"></div>

					<form method="post" action="add_psychologist/save" name="formPsychologist" autocomplete="off">
						{{ csrf_field() }}
						<div class="row">
							<div class="col-md-6">
								<span class="input">
									<input class="input_field" type="text" name="name" maxlength="255" required />
									<label class="input_label">
										<span class="input__label-content">Nome Completo*</span>
									</label>
								</span>
							</div>
							<div class="col-md-3">
								<span class="input">
									<input class="input_field" type="text" data-mask="(99) 9999-9999" name="phone" maxlength="16" />
									<label class="input_label">
										<span class="input__label-content">Telefone</span>
									</label>
								</span>
							</div>
							<div class="col-md-3">
								<span class="input">
									<input class="input_field" type="text" name="whatsapp" required data-mask="(99) 9 9999-9999" maxlength="16" />
									<label class="input_label">
										<span class="input__label-content">WhatsApp*</span>
									</label>
								</span>
							</div>
						</div>
						<!-- /row -->
						<div class="row">
							<div class="col-md-3">
								<span class="input">
									<input class="input_field" type="email" name="email" maxlength="255" required />
									<label class="input_label">
										<span class="input__label-content">Email*</span>
									</label>
								</span>
							</div>
							<div class="col-md-3">
								<span class="input input--filled form-group">
									<label class="">
										<span class="input__label-content">Especialidade*</span>
									</label>
									<select class="input_field" name="specialties[]" multiple required>
										<option>Adulto</option>
										<option>Criança</option>
										<option>Casal</option>
										<option>Grupo</option>
									</select>
								</span>
							</div>
							<div class="col-md-3">
								<span class="input">
									<input class="input_field" type="text" name="met" maxlength="255" required />
									<label class="input_label">
										<span class="input__label-content">Como nos conheceu?*</span>
									</label>
								</span>
							</div>
							<div class="col-md-3">
								<span class="input">
									<input class="input_field" type="text" name="crp" maxlength="32" required>
									<label class="input_label">
										<span class="input__label-content">CRP*</span>
									</label>
								</span>
							</div>
						</div>
						<!-- /row -->
						{{-- START ADDRESS --}}
						<div class="row">
							<div class="col-md-2">
								<span class="input">
									<input class="input_field" type="text" data-mask="99999-999" name="zip_code" maxlength="10" />
									<label class="input_label">
										<span class="input__label-content">CEP</span>
									</label>
								</span>
							</div>
							<div class="col-md-2">
								<span class="input input--filled form-group">
									<label class="input_label">
										<span class="input__label-content">UF*</span>
									</label>
									<select class="input_field" name="state_id" required></select>
								</span>
							</div>
							<div class="col-md-4">
								<span class="input">
									<input class="input_field" type="text" name="city" maxlength="128" required />
									<label class="input_label">
										<span class="input__label-content">Cidade*</span>
									</label>
								</span>
							</div>
							<div class="col-md-4">
								<span class="input">
									<input class="input_field" type="text" name="neighborhood" maxlength="128" required/>
									<label class="input_label">
										<span class="input__label-content">Bairro*</span>
									</label>
								</span>
							</div>
						</div>
						<div class="row">
							<div class="col-md-7">
								<span class="input">
									<input class="input_field" type="text" name="address" maxlength="255" />
									<label class="input_label">
										<span class="input__label-content">Endereço</span>
									</label>
								</span>
							</div>
							<div class="col-md-2">
								<span class="input">
									<input class="input_field" type="number" name="number" maxlength="32" />
									<label class="input_label">
										<span class="input__label-content">Número</span>
									</label>
								</span>
							</div>
							<div class="col-md-3">
								<span class="input">
									<input class="input_field" type="text" name="complement" maxlength="255">
									<label class="input_label">
										<span class="input__label-content">Complemento</span>
									</label>
								</span>
							</div>
						</div>
						{{-- END ADDRESS --}}

						<div class="row mb-5">
							<div class="col-md-3">
								<div class="custom-control custom-switch">
									<input type="checkbox" class="custom-control-input" id="cetcc_student" name = "cetcc_student" value = "1" onchange = "(this.checked) ? $('#class_psychologist').removeClass('hide').prop('required', true) : $('#class_psychologist').addClass('hide')" />
									<label class="custom-control-label" for="cetcc_student">Sou aluno do CETCC</label>
								</div>
							</div>

							<div class="col-md-3">
								<input type = "text" class = "hide form-control" id = "class_psychologist" name = "class" placeholder = "Digite a Turma..." maxlength = "250" />
							</div>

							<div class="col-md-4">
								<div class="g-recaptcha" data-sitekey="6LfIZCQcAAAAAFcONLvww28s7xI4XgERWZG0gG4b" data-callback = "recaptchaCallback"></div>
							</div>

							<div class="col-md-2 text-right">
								<input id = "btnSubmit" type="submit" value="Cadastrar" class="btn_1 rounded" disabled />
							</div>
						</div>
					</form>
					@if (old('savedSuccessfully'))
						@if (old('savedSuccessfully') == 1)
							<div class="alert alert-success alert-dismissable">
								<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
								Parabéns! Seu Cadastro foi feito com sucesso.
							</div>
						@else
						<div class="alert alert-danger alert-dismissable">
							<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
							Erro! não foi possivel finalizar seu cadastro. Tente novamente mais tarde. <br>{{old('savedSuccessfully')}}
					</div>
						@endif
					@endif

				</div>
			</div> <!-- /row -->
		</div> <!-- /container -->
	</div>
</div>

@section('css')
@parent
<style>

</style>
@endsection

@section('scripts')
	@parent
	<script src="/js/captcha-math-equations.min.js"></script>
	<script src="{!! asset('js/jquery-3.1.1.min.js')!!}"></script>
	<script src="{!! asset('js/plugins/validate/jquery.validate.min.js') !!}"></script>
	<script src="{!! asset('js/plugins/jasny/jasny-bootstrap.min.js')!!}"></script>
	<script>
		APP.listSelectBox = {!! isset($listSelectBox) ? json_encode($listSelectBox) : null !!}

		if (APP.listSelectBox) {
			if (APP.listSelectBox.state) {
				populateSelectBox({
					list: APP.listSelectBox.state,
					target: document.forms.formPsychologist.state_id,
					selectBy: [25],
					columnValue: 'id',
					columnLabel: 'abbreviation',
				})
			}
		}

		function recaptchaCallback(){
			var btnSubmit = document.querySelector('#btnSubmit');
			btnSubmit.removeAttribute('disabled');
		}
	</script>
@endsection
