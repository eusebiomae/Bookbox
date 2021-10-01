
@foreach ($pageData->content as $item)
<section id="how_works" class="section section-xxl swiper-slide-how  text-md-left" style="background-image: url('{{$item['image_bg']}}');">
	<div class="card">
		<div class="card-body">
			<div id="shoppingJourney" class="row">
				<div class="col-12 my-5">
					<nav>
						<div ref="tabsShoppingJourney" class="nav nav-tabs">
							<button class="nav-item nav-link active" @click="selectNavTab('payment')" data-select-tab="payment" style="cursor: pointer">Pagamento</button>
							<button class="nav-item nav-link disabled" @click="selectNavTab('finalization')" data-select-tab="finalization" style="cursor: pointer">Finalização</button>
						</div>
					</nav>
					<div ref="tabsContentShoppingJourney" class="tab-content">
						<div class="tab-pane fade show active" data-select-tab="payment">
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label>Forma de Pagamento</label>
										<select class="form-control m-b" v-model="orderData.formPayment">
											<option v-for="(option, indx) in formPayment" :value="option.value">@{{ option.label }}</option>
										</select>
									</div>
								</div>
								<div class="col-md-12 form-group">
									<label>E-mail*</label>
									<input type="text" v-model="orderData.email" class="form-control required">
								</div>

								<div id="creditCard" class="col-md-12" v-if="orderData.formPayment == 'bankSlip'">
									<div class="row mt-5">
										<div class="col-md-6 form-group">
											<label>Nome do Titular*</label>
											<input type="text" v-model="orderData.cardholder" class="form-control required">
										</div>
										<div class="col-md-6 form-group">
											<label>CPF do Titular*</label>
											<input type="text" v-model="orderData.cpf" class="form-control required mask-cpf">
										</div>
									</div>
								</div>
								<div id="creditCard" class="col-md-12" v-if="orderData.formPayment == 'creditCard'">
									<div class="row mt-5">
										<div class="col-md-4">
											<div class="form-group">
												<label>Nome do Titular*</label>
												<input type="text" v-model="orderData.cardholder" class="form-control required">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Nº do Cartão*</label>
												<input type="text" v-model="orderData.number_card" class="form-control required">
											</div>
										</div>
										<div class="col-md-2">
											<div class="form-group">
												<label>Cod. de Seg.*</label>
												<input type="text" v-model="orderData.security_code" class="form-control required">
											</div>
										</div>
										<div class="col-md-2">
											<div class="form-group">
												<label>Validade*</label>
												<input type="text" v-model="orderData.shelf_life" placeholder=""
													class="form-control required mask-creditcard-shelf_life">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label>CPF do Titular*</label>
												<input type="text" v-model="orderData.cpf" class="form-control required mask-cpf">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Data de Nascimento*</label>
												<div class="input-group date">
													<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
													<input type="text" v-model="orderData.birth_date" class="form-control required" readonly>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Telefone*</label>
												<input type="text" v-model="orderData.phone" class="form-control required mask-cellphone">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label>E-mail do Titular*</label>
												<input type="text" v-model="orderData.holder_email" class="form-control required">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>CEP*</label>
												<input type="text" v-model="orderData.zip_code" class="form-control required mask-cep">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Nº*</label>
												<input type="text" v-model="orderData.address_number" class="form-control required">
											</div>
										</div>
									</div>
								</div>

								<div class="col-md-12 align-right">
									<button class="btn" @click="confirmOrder">Confirmar</button>
								</div>
							</div>
						</div>
						<div class="tab-pane fade show" data-select-tab="finalization">..2..</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endforeach

<script type="x-template"></script>

@section('styles')
@parent
@endsection

@section('scripts')
@parent
<script src="https://unpkg.com/vue@next"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
	var appShoppingJourney = Vue.createApp({
		data: function() {
			return {
				orderData: {
					formPayment: 'bankSlip',
				},
				tabSelected: 'payment',
				formPayment: [
					{
						label: 'Boleto Bancário',
						value: 'bankSlip',
					},
					{
						label: 'Cartão de Crédito',
						value: 'creditCard',
					},
				],
			}
		},
		methods: {
			selectNavTab: function(targetKey) {
				this.$refs.tabsShoppingJourney.querySelectorAll('[data-select-tab]').forEach(elemTab => elemTab.classList.remove('active'))
				this.$refs.tabsContentShoppingJourney.querySelectorAll('[data-select-tab]').forEach(elemTab => elemTab.classList.remove('active'))
				this.$refs.tabsShoppingJourney.querySelector('[data-select-tab="'+ targetKey +'"]').classList.add('active')
				this.$refs.tabsContentShoppingJourney.querySelector('[data-select-tab="'+ targetKey +'"]').classList.add('active')
			},
			confirmOrder: function() {
				console.log(JSON.stringify(this.orderData, null, 2))
				axios({
					url: '/confirm_payment',
					method: 'post',
					data: this.orderData,
				}).then(resp => {
					console.log(resp)
				})
			},
		},
	}).mount('#shoppingJourney')
</script>
@endsection
