
@foreach ($pageData->content as $item)
<section id="signature" class="section section-xxl swiper-slide-how  text-md-left" style="margin-top: 225px;">
	{{-- style="background-image: url('{{$item['image_bg']}}');" --}}
	<div class="card">
		<div class="card-body">
			<div id="shoppingJourney" class="row">
				<div class="col-12 my-5">
					<nav>
						<div ref="tabsShoppingJourney" class="nav nav-tabs">
							<button class="nav-item nav-link active" @click="selectNavTab('login')" data-select-tab="login" v-if="!student.id">Login</button>
							<button class="nav-item nav-link disabled" @click="selectNavTab('shoppingCart')" data-select-tab="shoppingCart" v-if="!product">Carrinho</button>
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
									<input type="email" v-model="student.email" class="form-control required">
								</div>

								<div class="col-md-12 form-group" v-if="formLogin.showPassword">
									<label>Senha*</label>
									<input type="password" v-model="student.password" class="form-control required">
									<a @click="resetPassword" style="color: #76aa6f; cursor: pointer">Esqueci minha senha</a>
								</div>

								<div class="col-md-12 form-group" v-if="formLogin.showFormCreate">
									<div class="row">

										<div class="col-md-4 form-group">
											<label>Nome*</label>
											<input type="text" v-model="student.name" class="form-control required">
										</div>

										<div class="col-md-4 form-group">
											<label>CPF*</label>
											<input type="text" v-model="student.cpf" class="form-control required">
										</div>

										<div class="col-md-4 form-group">
											<label>Senha*</label>
											<input type="password" v-model="student.password" class="form-control required">
										</div>

									</div>
								</div>

								<div class="col-md-12 text-right">
									<button class="btn btn-primary" @click="nextLogin">Avançar</button>
								</div>
							</div>
						</div>

						<div class="tab-pane fade show" data-select-tab="delivery">
							<div class="row">
								<div class="col-md-4 form-group">
									<label>CEP*</label>
									<input type="text" v-model="orderData.address.zip_code" v-mask="'#####-###'" class="form-control required" @blur="getZipCode(orderData.address)">
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
								<div class="col-md-4 form-group">
									<label>Telefone*</label>
									<input type="text" v-model="orderData.address.phone" v-mask="'(##) ####-####'" class="form-control required" maxlength="128">
								</div>
								<div class="col-md-4 form-group">
									<label>Celular*</label>
									<input type="text" v-model="orderData.address.cellphone" v-mask="'(##) # ####-####'" class="form-control required" maxlength="128">
								</div>
							</div>
							{{-- <button type="button" @click="calculadorFrete">Calcular Frete</button> --}}
							<div class="col-md-12 text-right">
								<button class="btn btn-primary" @click="saveDelivery">Avançar</button>
							</div>
						</div>

						<div class="tab-pane fade show" data-select-tab="shoppingCart">
							<div class="">
								<div class="cart-inline-header">
									<h5 class="cart-inline-title">Há <span> @{{amountItens}}</span> produtos carrinho</h5>
									<h6 class="cart-inline-title" style="color: #76aa6f">Valor Total:<span> $@{{priceTotal}}</span></h6>
								</div>
								<div class="cart-inline-body">
									<div class="cart-inline-item border" v-for="(data, idProduct) in shoppingCart">
										<div class="unit unit-spacing-sm align-items-center">
											<div class="col-md-12">
												<div class="media align-items-center">
													<ul class="flex-column align-items-start col-md-4">
														<span class="cart-inline-figure"><img :src="data.item.img" alt="" style="max-width: 225px; margin: 25px;" /></span>
													</ul>

													<ul class="flex-column align-items-start item col-md-4">
														<h6 class="mb-0 font-weight-bold" style="margin-left: 40px; margin-top: 20px;">
															@{{ data.item.title_pt }}
														</h6>
													</ul>

													<ul class="flex-column align-items-start col-md-4">
														<label for="" class=""> </label>
														<div class="input-group mb-3">
															<div class="cart-inline-title" style="margin: 5px;">Qtd: @{{ data.amount }} - Preço:</div>
															<div class="cart-inline-title" style="margin: 5px;">R$ @{{ itemPriceMain(idProduct) }} = </div>
															<div class="cart-inline-title" style="margin: 5px; color: #000">Total: R$ @{{ itemPriceMainTotal(idProduct) }}</div>
														</div>
														<div class="unit-spacing-sm">
															<button type="button" class="btn btn-secondary" @click="incDecAmount(idProduct, -1)">-</button>
															<button type="button" class="btn btn-secondary" @click="removeItem(idProduct)">Remover</button>
															<button type="button" class="btn btn-primary" @click="incDecAmount(idProduct, 1)">+</button>
														</div>
													</ul>
												</div>
											</div>
										</div>
										{{-- <div class="unit-spacing-sm">
											<button type="button" class="btn btn-secondary" @click="incDecAmount(idProduct, -1)">-</button>
											<button type="button" class="btn btn-secondary" @click="removeItem(idProduct)">Remover</button>
											<button type="button" class="btn btn-primary" @click="incDecAmount(idProduct, 1)">+</button>
										</div> --}}
									</div>
								</div>
								<div class="cart-inline-footer">
									<div class="group-sm text-right">
										<button class="btn btn-primary" @click="selectNavTab('delivery', 1)">Confirmar</button>
									</div>
								</div>
							</div>
						</div>

						<div class="tab-pane fade show" data-select-tab="payment">
							<div class="row" v-if="product">
								<div class="col-md-4 form-group">
									<label>Cupom de desconto</label>
									<div class="input-group">
										<input type="text" v-model="discount.code" class="form-control">
										<div class="input-group-prepend">
											<button class="btn btn-primary form-control fl-bigmug-line-checkmark14" @click="getDiscount" ></button>
										</div>
									</div>
									<div v-if="discount.id">
										Desconto de @{{ numberWithCommas(discount.percentage, 2) }}%
									</div>
								</div>

								<div class="col-md-4 form-group">
									<label>Forma de Pagamento</label>
									<select class="form-control m-b" v-model="orderData.formPayment">
										<option v-for="(option) in formPayment" :value="option.value">@{{ option.label }}</option>
									</select>
								</div>

								<div class="col-md-4 form-group" v-if="formPayment[orderData.formPayment] && formPayment[orderData.formPayment].values">
									<label>Parcelas</label>
									<select class="form-control m-b" v-model="formPaymentOpts">
										<option v-for="(option) in formPayment[orderData.formPayment].values" :value="option">
											@{{ formatFormPaymentParcel(option) }}
										</option>
									</select>
									<div v-if="discount.id">
										Desconto de R$ @{{ numberWithCommas((formPaymentOpts.full_value || 0) * discount.percentage / 100, 2) }}
									</div>
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
											<input type="text" v-model="orderData.cpf" v-mask="'###.###.###-##'"  class="form-control required">
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
												<input type="text" v-model="orderData.shelf_life" v-mask="'##/##'" placeholder="MM/AA" class="form-control required">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label>CPF do Titular*</label>
												<input type="text" v-model="orderData.cpf" v-mask="'###.###.###-##'" class="form-control required">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Data de Nascimento*</label>
												<div class="input-group date">
													<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
													<input type="text" v-model="orderData.birth_date" v-mask="'##/##/####'" placeholder="DD/MM/AAAA" class="form-control required" >
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Telefone*</label>
												<input type="text" v-model="orderData.phone" v-mask="'(##) # ####-####'"  class="form-control required">
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
												<input type="text" v-model="orderData.zip_code" v-mask="'#####-###'" class="form-control required">
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
							</div>
							<div class="row" v-else>
								<div class="col-md-4 form-group">
									<label>Cupom de desconto</label>
									<div class="input-group">
										<input type="text" v-model="discount.code" class="form-control">
										<div class="input-group-prepend">
											<button class="btn btn-primary form-control fl-bigmug-line-checkmark14" @click="getDiscount" ></button>
										</div>
									</div>
									<div v-if="discount.id">
										Desconto de @{{ numberWithCommas(discount.percentage, 2) }}%
									</div>
								</div>

								<div class="col-md-4 form-group">
									<label>Forma de Pagamento</label>
									<select class="form-control m-b" v-model="orderData.form_payment_id" @change="onChangeformPaymentCart">
										<option v-for="(option, indx) in formPaymentCart" :value="option.formPayment.id">@{{ option.formPayment.description }}</option>
									</select>
								</div>

								<div class="col-md-4 form-group" v-if="formPaymentCart[orderData.form_payment_id]">
									<label>Parcelas</label>
									<select class="form-control m-b" v-model="formPaymentOpts">
										<option v-for="option in formPaymentCart[orderData.form_payment_id].parcels" :value="option">
											@{{ formatFormPaymentParcel(option) }}
										</option>
									</select>
									<div v-if="discount.id">
										Desconto de R$ @{{ numberWithCommas(formPaymentOpts.full_value * discount.percentage / 100, 2) }}
									</div>
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
											<input type="text" v-model="orderData.cpf" v-mask="'###.###.###-##'" class="form-control required mask-cpf">
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
												<input type="text" v-model="orderData.security_code" v-mask="'###'" class="form-control required">
											</div>
										</div>
										<div class="col-md-2">
											<div class="form-group">
												<label>Validade*</label>
												<input type="tel" v-model="orderData.shelf_life" v-mask="'##/##'" placeholder="MM/AA" class="form-control required">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label>CPF do Titular*</label>
												<input type="text" v-model="orderData.cpf" v-mask="'###.###.###-##'" class="form-control required mask-cpf">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Data de Nascimento*</label>
												<div class="input-group date">
													<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
													<input type="text" v-model="orderData.birth_date" v-mask="'##/##/####'" placeholder="DD/MM/AAAA" class="form-control required">
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Telefone*</label>
												<input type="text" v-model="orderData.phone" v-mask="'(##) # ####-####'" class="form-control required mask-cellphone">
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
												<input type="text" v-model="orderData.zip_code" v-mask="'#####-###'" class="form-control required">
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
							</div>

							<div class="col-md-12 text-right">
								<button v-if="!wasRequest" class="btn btn-primary" @click="confirmOrder">Confirmar</button>
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
<script>
	var appShoppingJourney = Vue.createApp({
		data: function() {
			return {
				discount: {
					code: '',
				},
				shoppingCart: boxCartStore.state.shoppingCart,
				student: @json(Auth::guard('studentArea')->user() ?? new stdClass),
				product: @json($product ?? null),
				orderData: {
					formPayment: 'bankSlip',
					address: {},
				},
				tabSelected: 'payment',
				formPayment: {},
				formPaymentOpts: {},
				formPaymentCart: {},
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
		computed: {
			amountItens: function() {
				return Object.keys(boxCartStore.state.shoppingCart).length
			},
			priceTotal: function() {
				let priceTotal = 0

				for (const key in boxCartStore.state.shoppingCart) {
					if (Object.hasOwnProperty.call(boxCartStore.state.shoppingCart, key)) {
						const payload = boxCartStore.state.shoppingCart[key]

						if (payload.item.form_payment[0]?.course_form_payment[0]?.full_value) {
							priceTotal += payload.amount * payload.item.form_payment[0].course_form_payment[0].full_value
						}
					}
				}

				return priceTotal
			},
		},
		methods: {
			nextLogin: function() {
				if (!this.formLogin.showPassword && !this.formLogin.showFormCreate) {
					return this.validEmail()
				} else
				if (this.formLogin.showFormCreate) {
					return this.newStudent()
				}

				return this.login()
			},
			validEmail: function() {
				showPreloader()

				return axios({
					method: 'post',
					url: '/confirm_email',
					data: {
						email: this.student.email,
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
						email: this.student.email,
					},
				}).then(resp => {
					hidePreloader()
					Swal.fire({
						icon: 'success',
						title: 'Olhe sua caixa de e-mail',
						text: 'Um e-mail de recuperação de senha foi enviado para: ' + this.student.email,
					})
				})
			},
			newStudent: function() {
				return axios({
					method: 'post',
					url: '/api/save',
					headers: {
						method: 'student'
					},
					data: this.student,
				}).then(resp => {
					if (resp.data) {
						this.student = resp.data
						this.orderData.student_id = resp.data.id
						this.orderData.email = resp.data.email
						this.orderData.cardholder = resp.data.name

						this.selectNavTab('delivery', 1)
					}

					return resp.data
				})
			},
			login: function() {
				showPreloader()

				return axios({
					method: 'post',
					url: '/login',
					data: {
						email: this.student.email,
						password: this.student.password,
					},
				}).then(resp => {
					hidePreloader()
					if (resp.data.errors) {
						this.showError = resp.data.errors
					} else
					if (resp.data.id) {
						this.student = resp.data
						this.orderData.student_id = resp.data.id
						this.orderData.email = resp.data.email
						this.orderData.cardholder = resp.data.name
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

				switch (targetKey) {
					case 'delivery':
						this.getDelivery().then(data => {
							if (data) {
								this.orderData.address = data
								this.getCity(data.state_id)
							}
						})
					break
					case 'payment':
						if (!this.product) {
							this.renderFormPaymentShoppingCart()
						}
					break
				}
			},
			confirmOrder: function() {
				if (!this.formPaymentOpts.form_payment_id) {
					return
				}

				if (!this.product) {
					this.orderData.shoppingCart = []

					for (const idItem in this.shoppingCart) {
						if (Object.hasOwnProperty.call(this.shoppingCart, idItem)) {
							const itemCart = this.shoppingCart[idItem];

							this.orderData.shoppingCart.push({
								item_id: idItem,
								amount: itemCart.amount,
							})
						}
					}
				}

				if (this.discount.id) {
					this.orderData.discount_id = this.discount.id
					this.orderData.discount_value = this.discount.value
					this.orderData.discount_percentage = this.discount.percentage
				}

				this.orderData.number_parcel = this.formPaymentOpts.parcel

				const data = Object.assign({}, this.orderData, this.formPaymentOpts)

				showPreloader()
				axios({
					url: '/confirm_payment',
					method: 'post',
					data: data,
				}).then(resp => {
					hidePreloader()
					if (resp.data.payments) {
						this.orderPayments = resp.data

						this.selectNavTab('finalization', 1)
						this.showError = []
						boxCartStore.commit('clear')
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
				if (address.zip_code && address.zip_code.length == 9) {
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
			getDelivery: function() {
				return axios({
					method: 'get',
					url: '/api/get',
					headers: {
						method: 'address'
					},
					params: {
						studentId: this.student.id,
					},
				}).then(resp => {
					return resp.data
				})
			},
			getDiscount: function() {
				return axios({
					method: 'get',
					url: '/api/get',
					headers: {
						method: 'discount'
					},
					params: {
						code: this.discount.code,
					},
				}).then(resp => {
					if (resp.data) {
						this.discount = resp.data
					} else {
						this.discount = {}
					}

					return resp.data
				})
			},
			saveDelivery: function() {
				this.orderData.address.student_id = this.orderData.student_id
				return axios({
					url: '/api/save',
					method: 'post',
					headers: {
						method: 'address'
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
			incDecAmount: function(idx, incDec) {
				boxCartStore.commit('incDecAmount', { idx: idx, incDec: incDec })
			},
			removeItem: function(idx) {
				boxCartStore.commit('removeItem', idx)
			},
			itemPriceMain: function(idx) {
				const payload = boxCartStore.state.shoppingCart[idx]

				return payload?.item?.form_payment[0]?.course_form_payment[0]?.full_value ?? 0
			},
			itemPriceMainTotal: function(idx) {
				const payload = boxCartStore.state.shoppingCart[idx]

				return payload ? payload.amount * (payload.item.form_payment[0]?.course_form_payment[0]?.full_value ?? 0) : 0
			},
			renderFormPaymentShoppingCart: function() {
				const shoppingCart = JSON.parse(JSON.stringify(boxCartStore.state.shoppingCart))
				const formPaymentCart = {}
				let amountItens = 0
				let formPaymentOpts = {}

				for (let key in shoppingCart) {
					amountItens++
					const itemCart = shoppingCart[key]

					for (let i = 0; i < itemCart.item.form_payment.length; i++) {
						const formPayment = itemCart.item.form_payment[i]

						if (!Object.hasOwnProperty.call(formPaymentCart, formPayment.id)) {
							formPaymentCart[formPayment.id] = {
								formPayment: {
									id: formPayment.id,
									description: formPayment.description,
									flg_type: formPayment.flg_type,
								},
								parcels: {},
							}
						}

						for (let j = 0; j < formPayment.course_form_payment.length; j++) {
							const courseFormPayment = formPayment.course_form_payment[j]

							courseFormPayment.value *= itemCart.amount
							courseFormPayment.full_value *= itemCart.amount

							if (!Object.hasOwnProperty.call(formPaymentCart[formPayment.id].parcels, courseFormPayment.parcel)) {
								formPaymentCart[formPayment.id].parcels[courseFormPayment.parcel] = []
							}

							formPaymentCart[formPayment.id].parcels[courseFormPayment.parcel].push(courseFormPayment)
						}
					}
				}

				for (const idFormPayment in formPaymentCart) {
					if (Object.hasOwnProperty.call(formPaymentCart, idFormPayment)) {
						const formPaymentParcel = formPaymentCart[idFormPayment]
						for (const keyParcel in formPaymentParcel.parcels) {
							if (Object.hasOwnProperty.call(formPaymentParcel.parcels, keyParcel)) {
								const parcels = formPaymentParcel.parcels[keyParcel]
								if (amountItens == parcels.length) {
									if (!Object.hasOwnProperty.call(formPaymentOpts, idFormPayment)) {
										formPaymentOpts[idFormPayment] = {
											formPayment: formPaymentParcel.formPayment,
											parcels: {},
										}
									}

									for (let i = 0; i < parcels.length; i++) {
										const parcel = parcels[i]

										if (!Object.hasOwnProperty.call(formPaymentOpts[idFormPayment].parcels, keyParcel)) {
											formPaymentOpts[idFormPayment].parcels[keyParcel] = {
												form_payment_id: parcel.form_payment_id,
												parcel: parcel.parcel,
												value: 0,
												full_value: 0,
											}
										}

										formPaymentOpts[idFormPayment].parcels[keyParcel].value += +parcel.value
										formPaymentOpts[idFormPayment].parcels[keyParcel].full_value += +parcel.full_value
									}
								}
							}
						}
					}
				}

				const formPaymentIds = Object.keys(formPaymentOpts)
				if (formPaymentIds.length) {
					this.orderData.form_payment_id = formPaymentOpts[formPaymentIds[0]].formPayment.id
					this.orderData.formPayment = formPaymentOpts[formPaymentIds[0]].formPayment.flg_type
				}

				this.formPaymentCart = formPaymentOpts
				this.onChangeformPaymentCart()
			},
			onChangeformPayment: function() {
			},
			onChangeformPaymentCart: function() {
				this.orderData.formPayment = this.formPaymentCart[this.orderData.form_payment_id].formPayment.flg_type

				this.formPaymentOpts = Object.values(this.formPaymentCart[this.orderData.form_payment_id].parcels)[0]
			},
			formatFormPaymentParcel: function(parcel) {
				const optParcel = {
					parcel: parcel.parcel,
					value: +parcel.value,
					full_value: +parcel.full_value,
				}

				if (this.discount.id) {
					optParcel.value -= optParcel.value * this.discount.percentage / 100
					optParcel.full_value -= optParcel.full_value * this.discount.percentage / 100
				}

				return `${ optParcel.parcel } x ${ numberWithCommas(optParcel.value, 2) } (${ numberWithCommas(optParcel.full_value, 2) })`
			},
		},
		mounted: function() {
			if (this.product) {
				this.renderFormPaymentByCourse(this.product.course_form_payment)
			}

			if (this.student.id) {
				this.orderData.student_id = this.student.id
				this.orderData.email = this.student.email
				this.orderData.cardholder = this.student.name
				if (this.product) {
					this.selectNavTab('delivery', 1)
				} else {
					this.selectNavTab('shoppingCart', 1)
				}
			}

			this.getState().then(allState => this.allState = allState)

		},
	})
	.directive('mask', {
		beforeMount: VueMask.VueMaskDirective.bind,
		updated: VueMask.VueMaskDirective.componentUpdated,
		unmounted: VueMask.VueMaskDirective.unbind
	})
	.mount('#shoppingJourney')
</script>
@endsection
