<form name="formFormPayment">
	<input type="hidden" name="scholarship">
	<input type="hidden" name="scholarshipStudent">
	<input type="hidden" name="formPaymentParcel">
	<input type="hidden" name="formPaymentValue">
	@if (isset($isAdmin) && $isAdmin)
		<div class="row">
			<div class="col-md-3">
				<div class="form-group">
					<label>Responsável pela venda</label>
					<select class="form-control" name="responsible_id"></select>
				</div>
			</div>

			<div class="col-sm-9 text-right">
				<button type="button" class="btn btn-default" onclick="specialNegotiation()" data-btn-special-negotiation>Negociação especial</button>
			</div>
		</div>
	@endif

	<div class="row">
		<div class="col-sm-9">
			<div class="row">
				<div class="col-md-5" data-specialNegotiation="0">
					<div class="form-group">
						<label>Forma de Pagamento</label>
						<select class="form-control m-b" name="formPayment" onchange="setFormPaymentParcel(this.value)"></select>
					</div>
				</div>
				<div class="col-md-4" data-specialNegotiation="0">
					<label>Nº de Parcela</label>
					<select class="form-control m-b" name="course_form_payment_id" onchange="changeFormPaymentParcel(this)"></select>
				</div>

				<div class="col-sm-3 hide" data-specialNegotiation="1">
					<div class="form-group">
						<label>Forma de Pagamento</label>
						<select class="form-control m-b" name="formPayment" disabled onchange="setFormPaymentParcel(this.value)"></select>
					</div>
				</div>
				<div class="col-sm-2 hide" data-specialNegotiation="1">
					<label class="control-label">Parcelas</label>
					<input type="number" name="specialNegotiation[parcel]" class="form-control" value="0" maxlength="5" disabled onkeyup="specialNegotiationRecalcValues('parcel')" onchange="specialNegotiationRecalcValues('parcel')">
				</div>
				<div class="col-sm-3 hide" data-specialNegotiation="1">
					<label class=" control-label">Valor da Parcela</label>
					<input type="tel" name="specialNegotiation[value]" class="form-control mask-currency" value="0" disabled onkeyup="specialNegotiationRecalcValues('value')">
				</div>

				<div class="col-md-3" title="Selecione o melhor dia para pagamento" data-key="expiration_day">
					<label>Dia de vencimento</label>
					<select class="form-control m-b" name="expiration_day">
						<option value="5">5</option>
						<option value="10">10</option>
						<option value="15">15</option>
						<option value="20">20</option>
						<option value="25">25</option>
					</select>
				</div>
			</div>

			<div class="row">
				@if (isset($payload->courseScholarship))
					<div class="col-md-3" data-specialNegotiation="0">
						<h4>% Desconto da Bolsa: {{$payload->courseScholarship->discount_percentage}}</h4>
					</div>
				@else
					{{-- Cupom de Desconto --}}
					<div class="col-md-3" data-specialNegotiation="0" data-key="discount_coupon">
						<label>Cupom de desconto</label>
						<div data-btn-apply-discount>
							<input type="text" name="discount_coupon" id="discountCoupon" class="form-control">
							<button class="btn btn-light" type="button" onclick="applyDiscount(event)">Aplicar</button>
						</div>
					</div>
					{{-- / Cupom de Desconto --}}
				@endif

			</div>
		</div>
		<div id="valueParcel" class="col-md-3 text-right"></div>
	</div>

	{{-- CREDITO --}}
	<div id="creditCard" class="hide">
		<div class="row mt-5">
			<div class="col-lg-4">
				<div class="form-group">
					<label>Nome do Titular*</label>
					<input type="text" name="cardholder" placeholder="" class="gp-w form-control required">
				</div>
			</div>
			<div class="col-lg-4">
				<div class="form-group">
					<label>Nº do Cartão*</label>
					<input type="text" name="number_card" placeholder="" class="gp-w form-control required">
				</div>
			</div>
			<div class="col-lg-2">
				<div class="form-group">
					<label>Cod. de Seg.*</label>
					<input type="text" name="security_code" placeholder="" class="gp-w form-control required">
				</div>
			</div>
			<div class="col-lg-2">
				<div class="form-group">
					<label>Validade*</label>
					<input type="text" name="shelf_life" placeholder=""
						class="gp-w form-control required mask-creditcard-shelf_life">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4">
				<div class="form-group">
					<label>CPF do Titular*</label>
					<input type="text" name="cpf" placeholder="" class="gp-w form-control required mask-cpf">
				</div>
			</div>
			<div class="col-lg-4">
				<div class="form-group">
					<label>Data de Nascimento*</label>
					<div class="input-group date">
						<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
						<input type="text" name="birth_date" placeholder="" class="gp-w form-control required" readonly>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="form-group">
					<label>Telefone*</label>
					<input type="text" name="phone" placeholder="" class="gp-w form-control required mask-cellphone">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4">
				<div class="form-group">
					<label>E-mail do Titular*</label>
					<input type="text" name="email" placeholder="E-mail do Titular" class="gp-w form-control required">
				</div>
			</div>
			<div class="col-lg-4">
				<div class="form-group">
					<label>CEP*</label>
					<input type="text" name="zip_code" placeholder="" class="gp-w form-control required mask-cep">
				</div>
			</div>
			<div class="col-lg-4">
				<div class="form-group">
					<label>Nº*</label>
					<input type="text" name="address_number" placeholder="" class="gp-w form-control required">
				</div>
			</div>
		</div>
	</div>

	{{-- Boleto // Debito --}}
	<div id="billetDebit" class="row my-5 mx-3"></div>
</form>


@section('scripts')
@parent

	<script>
		@if (isset($payload->courseScholarship))
			APP.discount = {
				percentage: {{ $payload->courseScholarship->discount_percentage }},
			}

			document.forms.formFormPayment.scholarshipStudent.value = {{ $payload->courseScholarship->id }};
		@endif
	</script>

@endsection
