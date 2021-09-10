<script type="text/x-template" id="cardG">
	<div class="card mb-3" style="border: 4px solid" :style="{ borderColor: payload.color }">
		<div class="card-body wow p-0">
			<span class = "cta-card" v-if="payload.cta">@{{ payload.cta }}</span>

			<figure class="block-reveal">
				<a :href="payload.link">
					<div class="block-horizzontal"></div>
					<img v-if="payload.image" :src="payload.image" class="img-fluid" :alt="payload.title" />
					<img v-else src="{!! asset('cetcc/img/courses/exemplo.png') !!}" :alt="payload.title" class="img-fluid" />
				</a>
				<span class = "type-card" v-if="payload.type" :style="{ backgroundColor: payload.color }">@{{ payload.type }}</span>
			</figure>


			<div class="wrapper px-3 py-0">
				<a :href="payload.link" v-if = "payload.showTitle"><h6>@{{ payload.title }}</h6></a>
				<p class = "text-center text-secondary mb-2" style = "font-size: 0.85rem" v-else>@{{ payload.subcategory }}</p>

				<p class = "m-0 text-secondary" v-if = "payload.showTitle"><small>@{{ payload.subtitle }}</small></p>
				<a :href="payload.link" v-else><h6 class = "text-center text-wrap">@{{ payload.category }}</h6></a>

				<small v-if="payload.office">/ @{{ payload.office }}</small>
			</div>
		</div>

		<div class="text-center card-footer p-0 mt-2" style = "background-color: transparent;">
			<div class = "text-center" style = "background-color: #e9e9e9">
				<p class = "mb-0" v-if = "payload.certified"><small>Reconhecido pelo @{{ payload.certified }}</small></p>
				<p class = "mb-0" v-if = "payload.hoursLoad || payload.schoolClinic">
					<small v-if = "payload.hoursLoad">@{{ payload.hoursLoad > 1 ? payload.hoursLoad + ' horas' : payload.hoursLoad + ' hora' }}</small>
					<small v-if = "payload.schoolClinic">+ Clínica Escolar</small>
				</p>
				<p class = "mb-0" v-if = "payload.additionalInformation"><small>@{{ payload.additionalInformation }}</small></p>
			</div>

			<a class="btn btn_1 btn-primary btn-moreInfo my-2" :href="payload.link" role="button" style="font-size:12px; border-radius: 20px;" :style="{ '--hovercolor': payload.color }">
				Saiba Mais
			</a>
		</div>
	</div>
</script>
<script>
	Vue.component('card-g', {
		template: '#cardG',
		props: {
			payload: {
				type: Object,
				required: true
			}
		},
	});
</script>
