{{ csrf_field() }}
<input type="hidden" name="scholarship_id"/>
<input type="hidden" name="student_id"/>
	<div class="ibox-title">
		<h3>Estado Civil</h3>
	</div>

	<div class="form-group">

		<label class="col-sm-2 control-label">Estado Civil*</label>
		<div class="col-sm-4">
			<select id="marital_status" name="marital_status" class="form-control" required>
				<option value="">Selecione...</option>
				<option value="1">Solteiro</option>
				<option value="2">Casado</option>
				<option value="3">União Estável/Amasiado</option>
				<option value="4">Separado/Divorciado</option>
				<option value="5">Viúvo</option>
			</select>
			<span class="help-block m-b-none">Selecione o Estado Civil</span>
		</div>

			<label class="col-sm-2 control-label">Profissão*</label>
			<div class="col-sm-4">
				<input type="text" id="profession" name="profession" class="form-control" required />
				<span class="help-block m-b-none">Digite sua profissão</span>
			</div>
	</div>

	<div class="ibox-title">
		<h3>Rendimentos Mensais</h3>
	</div>

	<div class="form-group">
		<label class="col-sm-2 control-label">Salário*</label>
		<div class="col-sm-4">
			<input type="number" id="salary" name="salary" class="form-control" min="0"
			{{-- step="{{ $payload->minimum_wage }}" --}}
				placeholder="R$..." required />
			<span class="help-block m-b-none">Digite sua renda fixa (salário)</span>
		</div>

		<label class="col-sm-2 control-label">Aluguel*</label>
		<div class="col-sm-4">
			<input type="number" id="rent" name="rent_income" class="form-control" min="0" step="0.01" placeholder="R$..." />
			<span class="help-block m-b-none">Digite seu rendimento com Aluguel</span>
		</div>

	</div>

	<div class="form-group">

		<label class="col-sm-2 control-label">Pensão Alimentícia*</label>
		<div class="col-sm-4">
			<input type="number" id="alimony" name="alimony" class="form-control" min="0" step="0.01" placeholder="R$..." />
			<span class="help-block m-b-none">Digite seu rendimento com Pensão Alimentícia</span>
		</div>

		<label class="col-sm-2 control-label">Investimentos*</label>
		<div class="col-sm-4">
			<input type="number" id="financial_investments" name="financial_investments" class="form-control" min="0" step="0.01" placeholder="R$..." />
			<span class="help-block m-b-none">Digite seu rendimento com Investimentos</span>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Renda Total dos Familiares*</label>
		<div class="col-sm-4">
			<input type="number" id="total_family_income" name="total_family_income" class="form-control" min="0" step="0.01" placeholder="R$..." />
			<span class="help-block m-b-none">Digite a renda total dos familiares (não incluir a sua)</span>
		</div>

		<label class="col-sm-2 control-label">Outras Rendas*</label>
		<div class="col-sm-4">
			<input type="number" id="others_income" name="others_income" class="form-control" min="0" step="0.01" placeholder="R$..." />
			<span class="help-block m-b-none">Digite seu rendimento com outras fontes</span>
		</div>

	</div>

	<div class="ibox-title">
		<h3>Despesas Mensais</h3>
	</div>

	<div class="form-group">

		<label class="col-sm-2 control-label">Alimentação*</label>
		<div class="col-sm-4">
			<input type="number" id="feeding" name="feeding" class="form-control" min="0" step="0.01" placeholder="R$..." required />
			<span class="help-block m-b-none">Digite suas despesas média mensal com Alimentação</span>
		</div>

		<label class="col-sm-2 control-label">Água*</label>
		<div class="col-sm-4">
			<input type="number" id="water" name="water" class="form-control" min="0" step="0.01" placeholder="R$..." required />
			<span class="help-block m-b-none">Digite suas despesas média mensal com Água</span>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Energia*</label>
		<div class="col-sm-4">
			<input type="number" id="energy" name="energy" class="form-control" min="0" step="0.01" placeholder="R$..." required />
			<span class="help-block m-b-none">Digite suas despesas média mensal com Energia</span>
		</div>

		<label class="col-sm-2 control-label">Telefone/Celular*</label>
		<div class="col-sm-4">
			<input type="number" id="phone_or_cell_phone" name="phone_or_cell_phone" class="form-control" min="0" step="0.01" placeholder="R$..." required />
			<span class="help-block m-b-none">Digite suas despesas média mensal com</span>
		</div>

	</div>

	<div class="form-group">

		<label class="col-sm-2 control-label">Internet*</label>
		<div class="col-sm-4">
			<input type="number" id="internet" name="internet" class="form-control" min="0" step="0.01" placeholder="R$..." />
			<span class="help-block m-b-none">Digite suas despesas média mensal com Internet</span>
		</div>

		<label class="col-sm-2 control-label">Gás*</label>
		<div class="col-sm-4">
			<input type="number" id="gas" name="gas" class="form-control" min="0" step="0.01" placeholder="R$..." required />
			<span class="help-block m-b-none">Digite suas despesas média mensal com Gás</span>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Transporte/Combustível*</label>
		<div class="col-sm-4">
			<input type="number" id="transport_or_fuel" name="transport_or_fuel" class="form-control" min="0" step="0.01"	placeholder="R$..." required />
			<span class="help-block m-b-none">Digite suas despesas média mensal com Transporte/Combustível</span>
		</div>

		<label class="col-sm-2 control-label">Financiamento/Consórcio*</label>
		<div class="col-sm-4">
			<input type="number" id="financing_or_consortium" name="financing_or_consortium" class="form-control" min="0" step="0.01" placeholder="R$..." />
			<span class="help-block m-b-none">Digite suas despesas média mensal com  Financiamento/Consórcio</span>
		</div>

	</div>

	<div class="form-group">

		<label class="col-sm-2 control-label">Plano de Saúde/Odontológico*</label>
		<div class="col-sm-4">
			<input type="number" id="health_or_dental_plan" name="health_or_dental_plan" class="form-control" min="0" step="0.01" placeholder="R$..." />
			<span class="help-block m-b-none">Digite suas despesas média mensal com Plano de Saúde/Odontológico</span>
		</div>

		<label class="col-sm-2 control-label">Funcionários Domésticos*</label>
		<div class="col-sm-4">
			<input type="number" id="domestic_workers" name="domestic_workers" class="form-control" min="0" step="0.01" placeholder="R$..." />
			<span class="help-block m-b-none">Digite suas despesas média mensal com Funcionários Domésticos</span>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Lazer*</label>
		<div class="col-sm-4">
			<input type="number" id="leisure" name="leisure" class="form-control" min="0" step="0.01" placeholder="R$..." required />
			<span class="help-block m-b-none">Digite suas despesas média mensal com Lazer</span>
		</div>

		<label class="col-sm-2 control-label">Vestuário*</label>
		<div class="col-sm-4">
			<input type="number" id="clothing" name="clothing" class="form-control" min="0" step="0.01" placeholder="R$..." />
			<span class="help-block m-b-none">Digite suas despesas média mensal com Vestuário</span>
		</div>

	</div>

	<div class="form-group">

		<label class="col-sm-2 control-label">Medicação*</label>
		<div class="col-sm-4">
			<input type="number" id="medication" name="medication" class="form-control" min="0" step="0.01" placeholder="R$..." />
			<span class="help-block m-b-none">Digite suas despesas média mensal com Plano de Medicação</span>
		</div>

		<label class="col-sm-2 control-label">Outras Dispesas*</label>
		<div class="col-sm-4">
			<input type="number" id="others_expenses" name="others_expenses" class="form-control" min="0" step="0.01" placeholder="R$..." />
			<span class="help-block m-b-none">Digite suas despesas média mensal com Outras Dispesas</span>
		</div>

	</div>

	<div class="ibox-title">
		<h3>Moradia</h3>
	</div>

	<div class="form-group">

		<label class="col-sm-2 control-label">Moradia*</label>
		<div class="col-sm-4">
			<select id="home" name="home" class="form-control" required onchange="enableInputs(this.value)">
				<option value="">Selecione...</option>
				<option value="1">Própria</option>
				<option value="2">Própria (financiada)</option>
				<option value="3">Alugada</option>
				<option value="4">Compartilhada</option>
				<option value="5">Outros</option>
			</select>
			<span class="help-block m-b-none">Selecione o Tipo de Moradia</span>
		</div>

		<label class="col-sm-2 control-label">Valor do Financiamento*</label>
		<div class="col-sm-4">
			<input type="number" id="house_financing" name="house_financing" class="form-control" min="0" step="0.01" placeholder="R$..." />
			<span class="help-block m-b-none">Digite suas despesas com Valor do Financiamento Imobiliário</span>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Valor do Aluguel*</label>
		<div class="col-sm-4">
			<input type="number" id="house_rent" name="house_rent" class="form-control" min="0" step="0.01" placeholder="R$..." required />
			<span class="help-block m-b-none">Digite suas despesas com Valor do Aluguel</span>
		</div>

		<label class="col-sm-2 control-label">IPTU*</label>
		<div class="col-sm-4">
			<input type="number" id="iptu" name="iptu" class="form-control" min="0" step="0.01" placeholder="R$..." required />
			<span class="help-block m-b-none">Digite suas despesas com IPTU</span>
		</div>

	</div>

	<div class="form-group">

		<label class="col-sm-2 control-label">Condomínio*</label>
		<div class="col-sm-4">
			<input type="number" id="condominium" name="condominium" class="form-control" min="0" step="0.01" placeholder="R$..." />
			<span class="help-block m-b-none">Digite suas despesas com Condomínio</span>
		</div>

	</div>

	<div class="ibox-title">
		<h3>Veículos</h3>
	</div>

	<div class="form-group">

		<label class="col-sm-2 control-label">Quantidade de Carros*</label>
		<div class="col-sm-4">
			<input type="number" id="amount_car" name="amount_car" class="form-control" min="0" step="0.01" placeholder="R$..." />
			<span class="help-block m-b-none">Digite a Quantidade de Carros</span>
		</div>

		<label class="col-sm-2 control-label">Preço Total dos Carros*</label>
		<div class="col-sm-4">
			<input type="number" id="price_total_cars" name="price_total_cars" class="form-control" min="0" step="0.01" placeholder="R$..." />
			<span class="help-block m-b-none">Digite o Preço Total dos Carros</span>
		</div>

	</div>

	<div class="form-group">

		<label class="col-sm-2 control-label">Quantidade de Motos*</label>
		<div class="col-sm-4">
			<input type="number" id="amount_motorcycles" name="amount_motorcycles" class="form-control" min="0" step="1" />
			<span class="help-block m-b-none">Digite a Quantidade de Motos</span>
		</div>

		<label class="col-sm-2 control-label">Preço Total das Motos*</label>
		<div class="col-sm-4">
			<input type="number" id="price_total_motorcycles" name="price_total_motorcycles" class="form-control" min="0" step="0.01" placeholder="R$..." />
			<span class="help-block m-b-none">Digite o Preço Total das Motos</span>
		</div>

	</div>

	<div class="form-group">

		<label class="col-sm-2 control-label">Quantidade de Outros Automóveis*</label>
		<div class="col-sm-4">
			<input type="number" id="amount_others" name="amount_others" class="form-control" min="0" step="1" />
			<span class="help-block m-b-none">Digite a Quantidade de Outros Automóveis</span>
		</div>

		<label class="col-sm-2 control-label">Preço Total dos Outros Automóveis*</label>
		<div class="col-sm-4">
			<input type="number" id="price_total_others" name="price_total_others" class="form-control" min="0" step="0.01"	placeholder="R$..." />
			<span class="help-block m-b-none">Digite o Preço Total dos Outros Automóveis</span>
		</div>

	</div>

	<div class="ibox-title">
		<h3>Dependentes de Sua Renda</h3>
	</div>

	<div class="form-group">

		<label class="col-sm-2 control-label">Quantidade de Adultos*</label>
		<div class="col-sm-4">
			<input type="number" id="amount_adults" name="amount_adults" class="form-control" min="0" step="1" />
			<span class="help-block m-b-none">Digite a Quantidade de Adultos</span>
		</div>

		<label class="col-sm-2 control-label">Quantidade de Crianças*</label>
		<div class="col-sm-4">
			<input type="number" id="amount_children" name="amount_children" class="form-control" min="0" step="1" />
			<span class="help-block m-b-none">Digite a Quantidade de Crianças</span>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Quantidade de Gestantes*</label>
		<div class="col-sm-4">
			<input type="number" id="amount_pregnant" name="amount_pregnant" class="form-control" min="0" step="1" />
			<span class="help-block m-b-none">Digite a Quantidade de Gestantes</span>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Quantidade de Idosos*</label>
		<div class="col-sm-4">
			<input type="number" id="amount_seniors" name="amount_seniors" class="form-control" min="0" step="1" />
			<span class="help-block m-b-none">Digite a Quantidade de Idosos</span>
		</div>

		<label class="col-sm-2 control-label">Quantidade de Pessoas com Necessidade Especiais*</label>
		<div class="col-sm-4">
			<input type="number" id="people_with_special_needs" name="people_with_special_needs" class="form-control" min="0" step="1" />
			<span class="help-block m-b-none">Digite a Quantidade de Pessoas com Necessidade Especiais</span>
		</div>

	</div>
