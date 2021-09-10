@section('css')
@parent
<link href="{!! asset('cetcc/css/plugins/check/check.css') !!}" rel="stylesheet">
@endsection
<script type="text/x-template" id="vueFilterMenu">
	<div class="container">
		<ul class="clearfix">
			<li>
				<div class="switch-field">
					<template v-for="field in payload.menuField">
						<input
							type="radio"
							:id="field.key"
							name="listing_filter"
							:value="field.key"
							:checked="field.checked"
							v-on:click="$emit('onFilterMenuField', field)"
						/>
						<label :for="field.key">@{{ field.label }}</label>
					</template>
				</div>
				{{-- <div class="select d-md-none d-block">
					<select name="listing_filter" class="selectbox" v-on:change="$emit('onFilterMenuSelectbox', $event)">
						<option v-for="field in payload.menuField" :value="field.key">@{{ field.label }}</option>
					</select>
					<div class="select__arrow"></div>
				</div> --}}
			</li>

			<li>
				<div class="layout_view">
					<a v-on:click="$emit('onFilterMenuLayoutView', 'card')" :class="{active: payload.layoutView === 'card'}"><i class="icon-th"></i></a>
					<a v-on:click="$emit('onFilterMenuLayoutView', 'list')" :class="{active: payload.layoutView === 'list'}"><i class="icon-th-list"></i></a>
				</div>
			</li>

			<li>
				<div class="select d-none d-md-block">
					<select name="orderby" class="selectbox" v-on:change="$emit('onFilterMenuSelectbox', $event)">
						<option v-for="field in payload.selectbox" :value="field.value">@{{ field.label }}</option>
					</select>
					<div class="select__arrow"></div>
				</div>
			</li>
		</ul>
	</div>
</script>

<script>
	Vue.component('filter-menu', {
		template: '#vueFilterMenu',
		props: {
			payload: {
				type: Object,
			}
		}
	});
</script>
