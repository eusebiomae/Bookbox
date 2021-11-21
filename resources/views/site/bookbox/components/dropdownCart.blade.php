<div id="appBoxDropdownCart" class="rd-navbar-aside-element">
	<!-- RD Navbar Basket-->
	<div class="rd-navbar-basket-wrap">
		<button class="rd-navbar-basket fl-bigmug-line-shopping202" data-rd-navbar-toggle=".cart-inline" style="color: black"><span>@{{amountItens}}</span></button>
		<div class="cart-inline">
			<div class="cart-inline-header">
				<h5 class="cart-inline-title">Há <span> @{{amountItens}}</span> produtos no carrinho</h5>
				<h6 class="cart-inline-title" style="color: #76aa6f">Valor Total:<span> $@{{priceTotal}}</span></h6>
			</div>
			<div class="cart-inline-body">
				<div class="cart-inline-item border pa-2" v-for="(data, idProduct) in shoppingCart">
					<div class="unit unit-spacing-sm align-items-center">
						<div class="unit-left">
							<span class="cart-inline-figure"><img :src="data.item.img" alt="" style="max-width: 100px; margin: 15px;" /></span>
						</div>
						<div class="unit-body" style="text-align: center; margin-top: 15px;">
							<h6 class="cart-inline-name">@{{ data.item.title_pt }}</h6>

							<div class="group-xs group-middle align-items-center">
								<div class="cart-inline-title">Qtd: @{{ data.amount }}</div>
								<div class="cart-inline-title">R$ @{{ itemPriceMain(idProduct) }}</div>
								<div class="cart-inline-title">Total: R$ @{{ itemPriceMainTotal(idProduct) }}</div>
							</div>
						</div>
					</div>
					<div class="unit-spacing-sm" style="margin-top: 25px; margin-bottom: 10px; text-align: center;">
						<button type="button" class="btn btn-secondary" @click="incDecAmount(idProduct, -1)">-</button>
						<button type="button" class="btn btn-secondary" @click="removeItem(idProduct)">Remover</button>
						<button type="button" class="btn btn-primary" @click="incDecAmount(idProduct, 1)">+</button>
					</div>
				</div>
			</div>
			<div class="cart-inline-footer">
				<div class="group-sm">
					<a class="button button-default-outline-2 button-zakaria"  href="/shopping_journey">Comprar</a>
					{{-- <a class="button button-primary button-zakaria" href="#">Checkout</a> --}}
				</div>
			</div>
		</div>
	</div>
</div>

@section('scripts')
@parent
	<script>
		const boxCartStore = new Vuex.Store({
			state: {
				shoppingCart: JSON.parse(localStorage.getItem('shoppingCart') ?? '{}'),
			},
			mutations: {
				saveShoppingCart: function(state) {
					localStorage.setItem('shoppingCart', JSON.stringify(state.shoppingCart))
				},
				add: function (state, payload) {
					if (!state.shoppingCart[payload.id]) {
						state.shoppingCart[payload.id] = {
							item: payload.data,
							amount: 0,
						}
					}

					state.shoppingCart[payload.id].amount++
					this.commit('saveShoppingCart')
				},
				incDecAmount: function(state, playload) {
					state.shoppingCart[playload.idx].amount += playload.incDec
					if (state.shoppingCart[playload.idx].amount < 1) {
						state.shoppingCart[playload.idx].amount = 1
					}
					this.commit('saveShoppingCart')
				},
				removeItem: function(state, idx) {
					delete state.shoppingCart[idx]
					this.commit('saveShoppingCart')
				},
				clear: function(state) {
					for (const key in state.shoppingCart) {
						if (Object.hasOwnProperty.call(state.shoppingCart, key)) {
							this.commit('removeItem', key)
						}
					}
				},
			},
			actions: {
				add: function(context, idProduct) {
					if (context.state.shoppingCart[idProduct]) {
						context.commit('add', { id: idProduct })
					} else {
						return axios({
							method: 'get',
							url: '/api/product/' + idProduct,
						}).then(resp => {
							context.commit('add', { id: idProduct, data: resp.data })
						})
					}
				},
			},
		})

		Vue.createApp({
			data: function() {
				return {
					shoppingCart: boxCartStore.state.shoppingCart,
				}
			},
			computed: {
				amountItens: function() {
					let amount = Object.keys(boxCartStore.state.shoppingCart).length

					// for (const key in ) {
					// 	if (Object.hasOwnProperty.call(boxCartStore.state.shoppingCart, key)) {
					// 		const payload = boxCartStore.state.shoppingCart[key]

					// 		amount += payload.amount
					// 	}
					// }

					return amount
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
				incDecAmount: function(idx, incDec) {
					boxCartStore.commit('incDecAmount', { idx: idx, incDec: incDec })
				},
				removeItem: function(idx) {
					boxCartStore.commit('removeItem', idx)
				},
				addBoxCard(idProduct) {
					boxCartStore.dispatch('add', idProduct)
				},
				itemPriceMain: function(idx) {
					const payload = boxCartStore.state.shoppingCart[idx]

					return payload ? payload.item.form_payment[0]?.course_form_payment[0]?.full_value ?? 0 : 0
				},
				itemPriceMainTotal: function(idx) {
					const payload = boxCartStore.state.shoppingCart[idx]

					return payload ? payload.amount * (payload.item.form_payment[0]?.course_form_payment[0]?.full_value ?? 0) : 0
				},
			},
		}).mount('#appBoxDropdownCart')
	</script>
@endsection
