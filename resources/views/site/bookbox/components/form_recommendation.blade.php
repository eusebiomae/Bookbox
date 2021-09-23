<div class="row">
	<div class="col-12">
		<div class="container margin_120_95">
			<div class="row justify-content-between">
				<div class="col-lg-12">
					<h4>Receba clientes encaminhados pelo CETCC</h4>
					<p>Inscreva-se para receber encaminhamento de pacientes.
						A indicação é feita com base na especialidade, experiência e na região de atendimento</p>
					<div id="message-contact"></div>
					<form method="post" action="add_psychologist/save" name="formPsychologist" autocomplete="off">
						<div class="row">
							<div class="col-md-6">
								<span class="input">
									<input class="input_field" type="text" name="name" maxlength="255" />
									<label class="input_label">
										<span class="input__label-content">Nome Completo</span>
									</label>
								</span>
							</div>
							<div class="col-md-3">
								<span class="input">
									<input class="input_field" type="text" name="phone" maxlength="16" />
									<label class="input_label">
										<span class="input__label-content">Telefone</span>
									</label>
								</span>
							</div>
							<div class="col-md-3">
								<span class="input">
									<input class="input_field" type="text" name="whatsapp" maxlength="16" />
									<label class="input_label">
										<span class="input__label-content">WhatsApp</span>
									</label>
								</span>
							</div>
						</div>
						<!-- /row -->
						<div class="row">
							<div class="col-md-9">
								<span class="input">
									<input class="input_field" type="email" name="email" maxlength="255" />
									<label class="input_label">
										<span class="input__label-content">Email</span>
									</label>
								</span>
							</div>
							<div class="col-md-3">
								<span class="input form-group">
									<label class="input_label">
										<span class="input__label-content">Especialidade</span>
									</label>
									<select class="input_field" name="specialties">
										<option></option>
										<option>Adulto</option>
										<option>Criança</option>
										<option>Casal</option>
										<option>Grupo</option>
									</select>
								</span>
							</div>
						</div>
						<!-- /row -->
						{{-- START ADDRESS --}}
						<div class="row">
							<div class="col-md-10">
								<span class="input">
									<input class="input_field" type="text" name="address" maxlength="255" />
									<label class="input_label">
										<span class="input__label-content">Endereço</span>
									</label>
								</span>
							</div>
							<div class="col-md-2">
								<span class="input">
									<input class="input_field" type="type" name="number" maxlength="32" />
									<label class="input_label">
										<span class="input__label-content">CEP</span>
									</label>
								</span>
							</div>
							<div class="col-md-3">
								<span class="input">
									<input class="input_field" type="text" name="neighborhood" maxlength="128" />
									<label class="input_label">
										<span class="input__label-content">Bairro</span>
									</label>
								</span>
							</div>
							<div class="col-md-3">
								<span class="input">
									<input class="input_field" type="text" name="city" maxlength="128" />
									<label class="input_label">
										<span class="input__label-content">Cidade</span>
									</label>
								</span>
							</div>
							<div class="col-md-3">
								<span class="input input--filled form-group">
									<label class="input_label">
										<span class="input__label-content">UF</span>
									</label>
									<select class="input_field" name="state_id"></select>
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
							<div class="col-12">
								<span class="input" >
										<textarea class="input_field" id="message_contact" name="message_contact" style="height:150px;"></textarea>
										<label class="input_label">
												<span class="input__label-content">Observações:</span>
										</label>
								</span>
							</div>
						</div>
						{{-- END ADDRESS --}}
						{{ csrf_field() }}
						<p class="add_top_30"><input type="submit" value="Enviar" class="btn_1 rounded"></p>
					</form>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
</div>

@section('scripts')
	@parent
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
	</script>
@endsection
