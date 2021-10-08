
@foreach ($pageData->content as $item)
<section id="signature" class="section section-xxl swiper-slide-how  text-md-left" style="background-image: url('{{$item['image_bg']}}');">
	<div class="card">
		<div class="card-body">
			<div id="shoppingJourney" class="row">
				<div class="col-12 my-5">
					<nav>
						<div ref="tabsShoppingJourney" class="nav nav-tabs">
							<button class="nav-item nav-link active" @click="selectNavTab('login')" data-select-tab="login" v-if="!student">Login</button>
							<button class="nav-item nav-link disabled" @click="selectNavTab('delivery')" data-select-tab="delivery">Entrega</button>
							<button class="nav-item nav-link disabled" @click="selectNavTab('payment')" data-select-tab="payment">Pagamento</button>
							<button class="nav-item nav-link disabled" @click="selectNavTab('finalization')" data-select-tab="finalization">Finalização</button>
						</div>
					</nav>
					<div ref="tabsContentShoppingJourney" class="tab-content">
						<div class="tab-pane fade show active" data-select-tab="login">
							<div class="row">
								<div class="col-md-12 form-group">
									<label>E-mail*</label>
									<input type="email" v-model="orderData.email" class="form-control required">
								</div>
								<div class="col-md-12 form-group" v-if="formLogin.showPassword">
									<label>Senha*</label>
									<input type="password" v-model="orderData.password" class="form-control required">
									<a @click="resetPassword" style="color: #76aa6f; cursor: pointer">Esqueci minha senha</a>
								</div>

								<div class="col-md-12 form-group" v-if="formLogin.showFormCreate">
									showFormCreate
								</div>

								<div class="col-md-12 text-right">
									<button class="btn" @click="nextLogin">Avançar</button>
								</div>
							</div>
						</div>

						<div class="tab-pane fade show" data-select-tab="delivery">
							<div class="row">
								<div class="col-md-4 form-group">
									<label>CEP*</label>
									<input type="text" v-model="orderData.address.zip_code" class="form-control required" maxlength="8" @blur="getZipCode(orderData.address)">
								</div>
								<div class="col-md-4 form-group">
									<label>Estado*</label>
									<select v-model="orderData.address.state_id" class="form-control m-b" @change="getCity(orderData.address.state_id)">
										<option v-for="(option, indx) in allState" :value="option.id">@{{ option.initials }}</option>
									</select>
								</div>
								<div class="col-md-4 form-group">
									<label>Cidade*</label>
									<select v-model="orderData.address.city_id" class="form-control m-b">
										<option v-for="(option, indx) in allCity" :value="option.id">@{{ option.name }}</option>
									</select>
								</div>
								<div class="col-md-5 form-group">
									<label>Bairro*</label>
									<input type="text" v-model="orderData.address.neighborhood" class="form-control required" maxlength="128">
								</div>
								<div class="col-md-5 form-group">
									<label>Rua*</label>
									<input type="text" v-model="orderData.address.street" class="form-control required" maxlength="128">
								</div>
								<div class="col-md-2 form-group">
									<label>Nº*</label>
									<input type="text" v-model="orderData.address.number" class="form-control required" maxlength="128">
								</div>
							</div>
							{{-- <button type="button" @click="calculadorFrete">Calcular Frete</button> --}}
							<div class="col-md-12 text-right">
								<button class="btn" @click="saveDelivery">Avançar</button>
							</div>
						</div>

						<div class="tab-pane fade show" data-select-tab="payment">
							<div class="row">
								<div class="col-md-4 form-group">
									<label>Forma de Pagamento</label>
									<select class="form-control m-b" v-model="orderData.formPayment">
										<option v-for="(option, indx) in formPayment" :value="option.value">@{{ option.label }}</option>
									</select>
								</div>
								<div class="col-md-4 form-group" v-if="formPayment[orderData.formPayment] && formPayment[orderData.formPayment].values">
									<label>Parcelas</label>
									<select class="form-control m-b" v-model="formPaymentOpts">
										<option v-for="(option, indx) in formPayment[orderData.formPayment].values" :value="option">
											@{{ option.parcel }} x @{{ numberWithCommas(option.value, 2) }} (@{{ numberWithCommas(option.full_value, 2) }})
										</option>
									</select>
								</div>
								<div class="col-md-12 form-group">
									<label>E-mail*</label>
									<input type="email" v-model="orderData.email" class="form-control required">
								</div>

								<div class="col-md-12" v-if="orderData.formPayment == 'bankSlip'">
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
								<div class="col-md-12" v-if="orderData.formPayment == 'creditCard'">
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

								<div class="col-md-12 text-right">
									<button v-if="!wasRequest" class="btn" @click="confirmOrder">Confirmar</button>
								</div>
							</div>
						</div>

						<div class="tab-pane fade show" data-select-tab="finalization">
							<div v-if="orderPayments.payments" class="alert alert-primary" role="alert">
								<h4 class="alert-heading">Compra feita com sucesso!</h4>
								<p v-html="orderPayments.msg"></p>
							</div>
						</div>
					</div>
					<div class="alert alert-danger" v-for="error in showError" v-html="error.description"></div>
				</div>
			</div>
		</div>
	</div>
</section>
@endforeach

<script type="x-template"></script>

@section('styles')
@parent

<style>
	button[data-select-tab] {
		cursor: pointer;
	}

	button[data-select-tab].disabled {
		cursor: not-allowed;
	}
</style>
@endsection

@section('scripts')
@parent
<script src="https://unpkg.com/vue@next"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
	var appShoppingJourney = Vue.createApp({
		data: function() {
			return {
				student: @json(Auth::guard('studentArea')->user()),
				product: @json($product),
				orderData: {
					formPayment: 'bankSlip',
					address: {},
				},
				tabSelected: 'payment',
				formPayment: {},
				formPaymentOpts: {},
				orderPayments: {},
				showError: [],
				wasRequest: false,
				formLogin: {
					showPassword: false,
					showFormCreate: false,
				},
				allState: [],
				allCity: [],
			}
		},
		methods: {
			nextLogin: function() {
				if (!this.formLogin.showPassword) {
					return this.validEmail()
				}

				this.login()
			},
			validEmail: function() {
				showPreloader()

				return axios({
					url: '/confirm_email',
					method: 'post',
					data: {
						email: this.orderData.email,
					},
				}).then(resp => {
					hidePreloader()
					if (resp.data.valid) {
						this.formLogin.showPassword = true
					} else {
						this.formLogin.showFormCreate = true
					}
				})
			},
			resetPassword: function() {
				showPreloader()

				return axios({
					url: '/reset_password',
					method: 'post',
					data: {
						email: this.orderData.email,
					},
				}).then(resp => {
					hidePreloader()
					Swal.fire({
						icon: 'success',
						title: 'Olhe sua caixa de e-mail',
						text: 'Um e-mail de recuperação de senha foi enviado para: ' + this.orderData.email,
					})
				})
			},
			login: function() {
				showPreloader()

				return axios({
					url: '/login',
					method: 'post',
					data: {
						email: this.orderData.email,
						password: this.orderData.password,
					},
				}).then(resp => {
					hidePreloader()
					if (resp.data.errors) {
						this.showError = resp.data.errors
					} else
					if (resp.data.id) {
						this.student = resp.data
						this.orderData.student_id = resp.data.id
						this.selectNavTab('delivery', 1)
					}
				})
			},
			selectNavTab: function(targetKey, removeDisabled = false) {
				var tabTarget = this.$refs.tabsShoppingJourney.querySelector('[data-select-tab="'+ targetKey +'"]')

				if (removeDisabled) {
					tabTarget.classList.remove('disabled')
				}

				if (tabTarget.classList.contains('disabled')) {
					return
				}

				this.$refs.tabsShoppingJourney.querySelectorAll('[data-select-tab]').forEach(elemTab => elemTab.classList.remove('active'))
				this.$refs.tabsContentShoppingJourney.querySelectorAll('[data-select-tab]').forEach(elemTab => elemTab.classList.remove('active'))
				tabTarget.classList.add('active')
				this.$refs.tabsContentShoppingJourney.querySelector('[data-select-tab="'+ targetKey +'"]').classList.add('active')
			},
			confirmOrder: function() {
				if (!this.formPaymentOpts.form_payment_id) {
					return
				}

				showPreloader()
				axios({
					url: '/confirm_payment',
					method: 'post',
					data: Object.assign({}, this.orderData, this.formPaymentOpts),
				}).then(resp => {
					hidePreloader()
					if (resp.data.payments) {
						this.orderPayments = resp.data

						this.selectNavTab('finalization')
					} else {
						this.showError = resp.data.showError ? resp.data.showError.errors : []
					}
				})
			},
			renderFormPaymentByCourse: function(courseFormPayment) {
				const formPayment = courseFormPayment.reduce((carry, item) => {
					const flgType = item.form_payment.flg_type

					if (!carry.hasOwnProperty(flgType)) {
						carry[flgType] = {
							label: item.form_payment.description,
							value: flgType,
							values: [],
						}
					}

					carry[flgType].values.push({
						parcel: item.parcel,
						value: item.value,
						full_value: item.full_value,
						form_payment_id: item.form_payment.id,
					})

					return carry
				}, {})

				this.formPayment = formPayment
			},
			calculadorFrete: function() {
				showPreloader()

				return axios({
					url: 'http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx',
					method: 'get',
					data: {
						'nCdEmpresa': '',
						'sDsSenha': '',
						'sCepOrigem': '74380150',
						'sCepDestino': '43810040',
						'nVlPeso': '5',
						'nCdFormato': '1',
						'nVlComprimento': '16',
						'nVlAltura': '5',
						'nVlLargura': '15',
						'nVlDiametro': '0',
						'sCdMaoPropria': 's',
						'nVlValorDeclarado': '200',
						'sCdAvisoRecebimento': 'n',
						'StrRetorno': 'xml',
						'nCdServico': '40010,41106'
					},
				}).then(resp => {
					hidePreloader()
					console.log(resp.data)
				})
			},
			getState: function() {
				return axios({
					url: '/api/state',
					method: 'get',
				}).then(resp => {
					return resp.data
				})
			},
			getCity: function(stateId) {
				return axios({
					url: '/api/city',
					method: 'get',
					params: {
						stateId: stateId,
					},
				}).then(resp => {
					this.allCity = resp.data
					return resp.data
				})
			},
			getZipCode: function(address) {
				if (address.zip_code.length == 8) {
					return axios({
						url: 'https://viacep.com.br/ws/'+ address.zip_code +'/json',
						method: 'get',
					}).then(resp => {
						if (resp.data) {
							var state = this.allState.find(item => item.initials == resp.data.uf)

							if (state) {
								address.state_id = state.id

								this.getCity(state.id).then(() => {
									var city = this.allCity.find(item => item.name.toLowerCase() == resp.data.localidade.toLowerCase())
									if (city) {
										address.city_id = city.id
									}
								})
							}

							address.neighborhood = resp.data.bairro
							address.street = resp.data.logradouro
						}
					})
				}
			},
			saveDelivery: function() {
				this.orderData.address.student_id = this.orderData.student_id
				return axios({
					url: '/api/save',
					method: 'post',
					headers: {
						method: 'delivery'
					},
					data: this.orderData.address,
				}).then(resp => {
					if (resp.data) {
						this.selectNavTab('payment', 1)

						this.orderData.student_address_id = resp.data.id
					}

					return resp.data
				})
			},
			numberWithCommas: numberWithCommas,
		},
		mounted: function() {
			if (this.product) {
				this.renderFormPaymentByCourse(this.product.course_form_payment)
			}

			if (this.student) {
				this.orderData.student_id = this.student.id
				this.orderData.email = this.student.email
				this.orderData.cardholder = this.student.name
				this.selectNavTab('delivery', 1)
			}

			this.getState().then(allState => this.allState = allState)
		},
	}).mount('#shoppingJourney')
</script>
@endsection
