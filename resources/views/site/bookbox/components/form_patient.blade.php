<div class="row">
	<div class="col-12">
		<div class="container mt-3">
			<div class="row justify-content-between">
				<div class="col-lg-12">
					<h4>Cadastro de Paciente</h4>
					<form method="post" action="/add_patient/save" name="formPatient" autocomplete="off">
						<div class="row">
							<div class="col-md-6">
								<span class="input">
									<input class="input_field" type="text" name="name" maxlength="255" required>
									<label class="input_label">
										<span class="input__label-content">Nome Completo*</span>
									</label>
								</span>
							</div>
							<div class="col-md-3">
								<span class="input">
									<input class="input_field" type="text" data-mask="(99) 9999-9999" name="phone" maxlength="16" required>
									<label class="input_label">
										<span class="input__label-content">Telefone*</span>
									</label>
								</span>
							</div>
							<div class="col-md-3">
								<span class="input">
									<input class="input_field" type="text" data-mask="(99) 9 9999-9999" name="whatsapp" maxlength="16" required>
									<label class="input_label">
										<span class="input__label-content">WhatsApp*</span>
									</label>
								</span>
							</div>
						</div>
						<!-- /row -->
						<div class="row">
							<div class="col-md-4">
								<span class="input">
									<input class="input_field" type="email" name="email" maxlength="255" required>
									<label class="input_label">
										<span class="input__label-content">Email*</span>
									</label>
								</span>
							</div>
							<div class="col-md-8">
								<span class="input">
									<input class="input_field" type="text" name="recommendation" maxlength="255" required>
									<label class="input_label">
										<span class="input__label-content">Quem indicou?*</span>
									</label>
								</span>
							</div>
						</div>
						<div class="row">
							<div class="col-12">
								<span class="input">
									<textarea class="input_field" name="initial_complaint" style="height:100px;" required></textarea>
									<label class="input_label">
										<span class="input__label-content">Queixa inicial*</span>
									</label>
								</span>
							</div>
						</div>
						<!-- /row -->
						{{-- START ADDRESS --}}
						<div class="row mb-3">
							<div class="col-md-4">
								<span class="input">
									<input class="input_field" type="text" name="neighborhood" maxlength="128" required/>
									<label class="input_label">
										<span class="input__label-content">Bairro*</span>
									</label>
								</span>
							</div>
							<div class="col-md-4">
								<span class="input">
									<input class="input_field" type="text" name="city" maxlength="128" value="São Paulo" required/>
									<label class="input_label">
										<span class="input__label-content">Cidade*</span>
									</label>
								</span>
							</div>
							<div class="col-md-4">
								<span class="input input--filled form-group">
									<label class="input_label">
										<span class="input__label-content">UF*</span>
									</label>
									<select class="input_field" name="state_id" required></select>
								</span>
							</div>

							<div class="col-md-9">
								<div class="g-recaptcha" data-sitekey="6LfIZCQcAAAAAFcONLvww28s7xI4XgERWZG0gG4b" data-callback = "recaptchaCallback"></div>
							</div>

							<div class="col-md-3 text-right">
								<input id = "btnSubmit" type="submit" value="Cadastrar" class="btn_1 rounded" disabled />
							</div>
						</div>
						{{ csrf_field() }}
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
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
</div>

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
					target: document.forms.formPatient.state_id,
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
