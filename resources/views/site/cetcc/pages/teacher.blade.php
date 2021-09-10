@extends('site.cetcc.layout.layout')
@section('title', $title)

@section('css')
@parent
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
@endsection

@section('content')
@include('site.cetcc.components.banner')
@include('site.cetcc.vueComponents.card_g')

<div id="app">

	<div class="container margin_60_35">
		<div class="row">
			{{-- <aside class="col-lg-3" id="sidebar">
				<filter-sidebar ref="filterSidebar" :payload="payloadFilterSidebar" />
			</aside> --}}

			<div class="col-lg-12">
				<div class="row">
					<card-g
						v-for="item in data"
						:key="item.id"
						:payload="nomalizeCardG(item)"
						class="col-md-3"
					/>
				</div>
			</div>

		</div>
	</div>

</div>

@endsection

@section('scripts')
@parent
<script>
	var app = new Vue({
		el: '#app',
		data: function() {
			return {
				data: {!! $teams !!},
			}
		},
		methods: {
			nomalizeCardG: function(data) {

				return {
					image: data.image,
					subtitle: data.graduation.description_pt,
					title: data.name,
					office: data.office ? data.office.description_pt : null,
					description: data.description_pt,
					link: '/teacher/' + data.id,
				}
			},
		}
	})
</script>
@endsection
