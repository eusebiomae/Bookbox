<h2 class="mb-4">Meus dados</h2>
<form name="formProfile">
	{{ csrf_field() }}
	<input type="hidden" name="scholarship_id"
		value="{{ isset($payload->scholarship->id) ? $payload->scholarship->id : '' }}" />
	<input type="hidden" name="id" />
	<div class="row">
		<div class="col-lg-4 col-md-6">
			<div class="form-group">
				<label>Nome Completo*</label>
				<input name="name" type="text" class="form-control required" readonly>
			</div>
		</div>
		<div class="col-lg-4 col-md-6">
			<div class="form-group">
				<label>E-mail*</label>
				<input name="email" type="text" class="form-control required" readonly>
			</div>
		</div>
		<div class="col-lg-4 col-md-12">
			<div class="form-group">
				<label>CPF*</label>
				<input name="cpf" type="text" class="form-control mask-cpf required" readonly>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-4 col-md-12">
			<div class="form-group">
				<label>Genero*</label>
				<div class="btn-group btn-group-toggle" data-toggle="buttons">
					<label class="btn btn-white gp-genero">
						<input type="radio" name="gender" value="male"> Masculino
					</label>
					<label class="btn btn-white gp-genero">
						<input type="radio" name="gender" value="feminine"> Feminino
					</label>
					<label class="btn btn-white gp-genero">
						<input type="radio" name="gender" value="others"> Outros
					</label>
				</div>
			</div>
		</div>
		<div class="col-lg-4 col-md-6">
			<div class="form-group">
				<label>RG*</label>
				<input type="text" name="rg" class="form-control mask-rg" maxlength="14">
			</div>
		</div>
		<div class="col-lg-4 col-md-6">
			<div class="form-group">
				<label>CEP*</label>
				<input name="zip_code" type="text" class="form-control required mask-cep">
			</div>
		</div>

		<div class="col-lg-3 col-md-8">
			<div class="form-group">
				<label>Endereço*</label>
				<input name="address" type="text" class="form-control required">
			</div>
		</div>
		<div class="col-lg-2 col-md-4">
			<div class="form-group">
				<label>Nº*</label>
				<input type="text" name="n" class="form-control" maxlength="32" autofocus required placeholder="">
			</div>
		</div>
		<div class="col-lg-3 col-md-6 col-12 ">
			<div class="form-group">
				<label>Bairro*</label>
				<input type="text" name="neighborhood" class="form-control" maxlength="450" autofocus required placeholder="">
			</div>
		</div>
		<div class="col-lg-2 col-md-6">
			<div class="form-group">
				<label>Cidade*</label>
				<input name="city" type="text" class="form-control required">
			</div>
		</div>
		<div class="col-lg-2">
			<div class="form-group">
				<label>Estado*</label>
				<select name="state_id" type="text" class="form-control required"></select>
			</div>
		</div>
		<div class="col-lg-auto col-md-6">
			<div class="form-group">
				<label>Telefone</label>
				<input name="phone" type="text" class="form-control mask-phone">
			</div>
		</div>
		<div class="col-lg-auto col-md-6">
			<div class="form-group">
				<label>Celular *</label>
				<input name="cell_phone" type="text" class="form-control mask-cell required">
			</div>
		</div>
		<div class="col-lg-auto col-md-12">
			<div class="form-group">
				<label>Formação em Psicologia?</label>
				<div class="switch">
					<div class="onoffswitch">
						<input type="checkbox" class="onoffswitch-checkbox hide" id="example1"
							onchange="document.getElementById('formation').style.display = this.checked ? 'none' : null" checked>
						<label class="onoffswitch-label" for="example1">
							<span class="onoffswitch-inner"></span>
							<span class="onoffswitch-switch" style="height: 20px;"></span>
						</label>
					</div>
				</div>
				<div id="formation" style="display:none;">
					<label>Qual sua Formação?</label>
					<input name="formation" type="text" class="form-control mt-3">
				</div>
			</div>
		</div>
		<div class="col-lg-2 col-md-12">
			{{-- <div class="form-group">
										<label>Experiencia com TCC?*</label>
										<select class="form-control m-b" name="account">
											<option>Sim</option>
											<option>Não</option>
										</select>
									</div> --}}
			<label>Exp. com TCC?*</label>
			<div class="switch">
				<div class="onoffswitch">
					<input type="checkbox" class="onoffswitch-checkbox hide" name="tcc_experience" id="example2">
					<label class="onoffswitch-label" for="example2">
						<span class="onoffswitch-inner"></span>
						<span class="onoffswitch-switch" style="height: 20px;"></span>
					</label>
				</div>
			</div>
		</div>
		<div class="col-lg-2">
			<div class="form-group">
				<label class="font-normal">Data de Nasc.</label>
				<div class="input-group date">
					<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
					<input type="text" name="birth_date" class="form-control" readonly>
				</div>
			</div>
		</div>
		<div class="col-12">
			<div class="form-group">
				<label for="plus_information">Mais Informação</label>
				<textarea name="complement" class="form-control" id="plus_information" rows="3"></textarea>
			</div>
		</div>
	</div>
</form>
