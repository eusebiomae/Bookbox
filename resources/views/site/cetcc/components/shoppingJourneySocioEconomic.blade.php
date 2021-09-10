<h2 class="mb-4">Perfil Socioeconômico</h2>

<form name="formSocioEconomic" class="form-row p-3">
	{{ csrf_field() }}
	<input type="hidden" name="scholarship_id" value="{{ $payload->scholarship->id }}" />
	<div class="border rounded w-100" style="border-color: silver;">
		<h3 class="p-2">Estado Civil e Rendimentos Mensais</h3>

		<div class="form-group col-md-3">
			<label for="marital_status">Estado Civil*</label>
			<select id="marital_status" name="marital_status" class="form-control" required>
				<option value="">Selecione...</option>
				<option value="1">Solteiro</option>
				<option value="2">Casado</option>
				<option value="3">União Estável/Amasiado</option>
				<option value="4">Separado/Divorciado</option>
				<option value="5">Viúvo</option>
			</select>
		</div>

		<div class="form-group col-md-3">
			<label for="profession">Profissão*</label>
			<input type="text" id="profession" name="profession" class="form-control" required />
		</div>

		<div class="form-group col-md-2">
			<label for="salary">Salário*</label>
			{{-- step="{{ $payload->minimum_wage }}" --}}
			<input type="number" id="salary" name="salary" class="form-control" min="0" placeholder="R$..." required />
		</div>

		<div class="form-group col-md-2">
			<label for="rent_income">Aluguel</label>
			<input type="number" id="rent" name="rent_income" class="form-control" min="0" step="0.01" placeholder="R$..." />
		</div>

		<div class="form-group col-md-2">
			<label for="alimony">Pensão Alimentícia</label>
			<input type="number" id="alimony" name="alimony" class="form-control" min="0" step="0.01" placeholder="R$..." />
		</div>

		<div class="form-group col-md-2">
			<label for="financial_investments">Investimentos</label>
			<input type="number" id="financial_investments" name="financial_investments" class="form-control" min="0"
				step="0.01" placeholder="R$..." />
		</div>

		<div class="form-group col-md-4">
			<label for="total_family_income">Renda Total dos Familiares <small>(Sem a sua)</small></label>
			<input type="number" id="total_family_income" name="total_family_income" class="form-control" min="0" step="0.01"
				placeholder="R$..." />
		</div>

		<div class="form-group col-md-2">
			<label for="others_income">Outros</label>
			<input type="number" id="others_income" name="others_income" class="form-control" min="0" step="0.01"
				placeholder="R$..." />
		</div>
	</div>

	<div class="border rounded w-100 mt-3" style="border-color: silver;">
		<h3 class="p-2">Despesas Mensais</h3>

		<div class="form-group col-md-2">
			<label for="feeding">Alimentação*</label>
			<input type="number" id="feeding" name="feeding" class="form-control" min="0" step="0.01" placeholder="R$..."
				required />
		</div>

		<div class="form-group col-md-2">
			<label for="water">Água*</label>
			<input type="number" id="water" name="water" class="form-control" min="0" step="0.01" placeholder="R$..."
				required />
		</div>

		<div class="form-group col-md-2">
			<label for="energy">Energia*</label>
			<input type="number" id="energy" name="energy" class="form-control" min="0" step="0.01" placeholder="R$..."
				required />
		</div>

		<div class="form-group col-md-2">
			<label for="phone_or_cell_phone">Telefone/Celular*</label>
			<input type="number" id="phone_or_cell_phone" name="phone_or_cell_phone" class="form-control" min="0" step="0.01"
				placeholder="R$..." required />
		</div>

		<div class="form-group col-md-2">
			<label for="internet">Internet</label>
			<input type="number" id="internet" name="internet" class="form-control" min="0" step="0.01" placeholder="R$..." />
		</div>

		<div class="form-group col-md-2">
			<label for="gas">Gás*</label>
			<input type="number" id="gas" name="gas" class="form-control" min="0" step="0.01" placeholder="R$..." required />
		</div>

		<div class="form-group col-md-3">
			<label for="transport_or_fuel">Transporte/Combustível*</label>
			<input type="number" id="transport_or_fuel" name="transport_or_fuel" class="form-control" min="0" step="0.01"
				placeholder="R$..." required />
		</div>

		<div class="form-group col-md-3">
			<label for="financing_or_consortium">Financiamento/Consórcio</label>
			<input type="number" id="financing_or_consortium" name="financing_or_consortium" class="form-control" min="0"
				step="0.01" placeholder="R$..." />
		</div>

		<div class="form-group col-md-3">
			<label for="health_or_dental_plan">Plano de Saúde/Odontológico</label>
			<input type="number" id="health_or_dental_plan" name="health_or_dental_plan" class="form-control" min="0"
				step="0.01" placeholder="R$..." />
		</div>

		<div class="form-group col-md-3">
			<label for="domestic_workers">Funcionários Domésticos</label>
			<input type="number" id="domestic_workers" name="domestic_workers" class="form-control" min="0" step="0.01"
				placeholder="R$..." />
		</div>

		<div class="form-group col-md-2">
			<label for="leisure">Lazer*</label>
			<input type="number" id="leisure" name="leisure" class="form-control" min="0" step="0.01" placeholder="R$..."
				required />
		</div>

		<div class="form-group col-md-2">
			<label for="clothing">Vestuário</label>
			<input type="number" id="clothing" name="clothing" class="form-control" min="0" step="0.01" placeholder="R$..." />
		</div>

		<div class="form-group col-md-2">
			<label for="medication">Medicação</label>
			<input type="number" id="medication" name="medication" class="form-control" min="0" step="0.01"
				placeholder="R$..." />
		</div>

		<div class="form-group col-md-2">
			<label for="others_expenses">Outras</label>
			<input type="number" id="others_expenses" name="others_expenses" class="form-control" min="0" step="0.01"
				placeholder="R$..." />
		</div>
	</div>

	<div class="border rounded w-100 mt-3" style="border-color: silver;">
		<h3 class="p-2">Residência e Veículos</h3>

		<div class="form-group col-md-3">
			<label for="home">Moradia*</label>
			<select id="home" name="home" class="form-control" required onchange="enableInputs(this.value)">
				<option value="">Selecione...</option>
				<option value="1">Própria</option>
				<option value="2">Própria (financiada)</option>
				<option value="3">Alugada</option>
				<option value="4">Compartilhada</option>
				<option value="5">Outros</option>
			</select>
		</div>

		<div class="form-group col-md-3 hide" id="divHouseFinancing">
			<label for="house_financing">Valor do Financiamento*</label>
			<input type="number" id="house_financing" name="house_financing" class="form-control" min="0" step="0.01"
				placeholder="R$..." />
		</div>

		<div class="form-group col-md-3 hide" id="divHouseRent">
			<label for="house_rent">Valor do Aluguel*</label>
			<input type="number" id="house_rent" name="house_rent" class="form-control" min="0" step="0.01"
				placeholder="R$..." required />
		</div>

		<div class="form-group col-md-2">
			<label for="iptu">IPTU*</label>
			<input type="number" id="iptu" name="iptu" class="form-control" min="0" step="0.01" placeholder="R$..."
				required />
		</div>

		<div class="form-group col-md-2">
			<label for="condominium">Condomínio</label>
			<input type="number" id="condominium" name="condominium" class="form-control" min="0" step="0.01"
				placeholder="R$..." />
		</div>

		<div class="form-group col-md-2">
			<label for="amount_car">Quantidade de Carros</label>
			<input type="number" id="amount_car" name="amount_car" class="form-control" min="0" step="1" />
		</div>

		<div class="form-group col-md-3">
			<label for="price_total_cars">Preço Total dos Carros</label>
			<input type="number" id="price_total_cars" name="price_total_cars" class="form-control" min="0" step="0.01"
				placeholder="R$..." />
		</div>

		<div class="form-group col-md-3">
			<label for="amount_motorcycles">Quantidade de Motos</label>
			<input type="number" id="amount_motorcycles" name="amount_motorcycles" class="form-control" min="0" step="1" />
		</div>

		<div class="form-group col-md-3">
			<label for="price_total_motorcycles">Preço Total das Motos</label>
			<input type="number" id="price_total_motorcycles" name="price_total_motorcycles" class="form-control" min="0"
				step="0.01" placeholder="R$..." />
		</div>

		<div class="form-group col-md-3">
			<label for="amount_others">Quantidade de Outros Automóveis</label>
			<input type="number" id="amount_others" name="amount_others" class="form-control" min="0" step="1" />
		</div>

		<div class="form-group col-md-3">
			<label for="price_total_others">Preço Total dos Outros Automóveis</label>
			<input type="number" id="price_total_others" name="price_total_others" class="form-control" min="0" step="0.01"
				placeholder="R$..." />
		</div>
	</div>

	<div class="border rounded w-100 mt-3" style="border-color: silver;">
		<h3 class="p-2">Dependentes de Sua Renda</h3>

		<div class="form-group col-md-3">
			<label for="amount_adults">Quantidade de Adultos</label>
			<input type="number" id="amount_adults" name="amount_adults" class="form-control" min="0" step="1" />
		</div>

		<div class="form-group col-md-3">
			<label for="amount_children">Quantidade de Crianças</label>
			<input type="number" id="amount_children" name="amount_children" class="form-control" min="0" step="1" />
		</div>

		<div class="form-group col-md-3">
			<label for="amount_pregnant">Quantidade de Gestantes</label>
			<input type="number" id="amount_pregnant" name="amount_pregnant" class="form-control" min="0" step="1" />
		</div>

		<div class="form-group col-md-3">
			<label for="amount_seniors">Quantidade de Idosos</label>
			<input type="number" id="amount_seniors" name="amount_seniors" class="form-control" min="0" step="1" />
		</div>

		<div class="form-group col-md-5">
			<label for="people_with_special_needs">Quantidade de Pessoas com Necessidade Especiais</label>
			<input type="number" id="people_with_special_needs" name="people_with_special_needs" class="form-control" min="0"
				step="1" />
		</div>
		<div>
</form>


@section('scripts')
	@parent

	<script>
		document.addEventListener('shoppingJourney:stepChanging', function(event) {
			var currentIndex = event.detail.currentIndex
			var newIndex = event.detail.newIndex
			var formSocioEconomic = document.forms.formSocioEconomic

			if (currentIndex == 1 && newIndex == 2) {
				populate(formSocioEconomic, APP.payload.studentSocioeconomic)

				if (!APP.payload.studentSocioeconomic?.id) {
					$.ajax({
						url: '/student_area/api/studentSocioeconomic/' + APP.payload.student.id,
						type: 'get',
					}).then(function(resp) {
						APP.payload.studentSocioeconomic = resp
						populate(formSocioEconomic, APP.payload.studentSocioeconomic)
					})
				}
			} else
			if (currentIndex == 2 && newIndex == 3) {
				var form = $(formSocioEconomic);
				if (validateForm(form)) {
					wizardFormNextStep.ajax = true
					$.ajax({
						url: '/student_area/api/saveStudentSocioeconomic',
						type: 'post',
						data: form.serialize(),
					})
					.then(function(resp) {
						wizardFormNextStep()

						APP.payload.studentSocioeconomic = resp

						var formPayment = {
							parcel: 1,
							value: APP.payload.scholarship.registration_fee,
						}

						APP.courseFormPayment = {
							"4": {
								"id": 4,
								"label": "Boleto Bancário",
								"formPayment": {
									"id": 4,
									"description": "Boleto Bancário",
									"flg_type": "bankSlip",
								},
								"parcelOpts": [
									{
										"id": "",
										"label": "x" + formPayment.parcel + " R$" + numberWithCommas(formPayment.value, 2),
										"parcel": formPayment.parcel,
										"value": formPayment.value,
										"full_value": formPayment.value * formPayment.parcel
									}
								]
							},
							"5": {
								"id": 5,
								"label": "Cartão de Crédito",
								"formPayment": {
									"id": 5,
									"description": "Cartão de Crédito",
									"flg_type": "card",
								},
								"parcelOpts": [
									{
										"id": "",
										"label": "x" + formPayment.parcel + " R$" + numberWithCommas(formPayment.value, 2),
										"parcel": formPayment.parcel,
										"value": formPayment.value / formPayment.parcel,
										"full_value": formPayment.value ,
									},
								]
							}
						}

						var courseFormPayment = Object.values(APP.courseFormPayment)
						var elemSpecialNegotiationFormPayment = document.querySelector('form[name="formFormPayment"] [data-specialNegotiation="0"] [name="formPayment"]')

						document.forms.formFormPayment.scholarship.value = APP.payload.scholarship.id
						populateSelectBox({
							list: courseFormPayment,
							target: elemSpecialNegotiationFormPayment,
							columnValue: "id",
							columnLabel: "label",
							selectBy: [ 4 ],
						})
						setFormPaymentParcel(4)

						$('[data-key="expiration_day"]').remove()
						$('[data-key="discount_coupon"]').remove()
					})
				}
			}

		})
	</script>
@endsection
