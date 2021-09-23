<script type="text/x-template" id="cardWide">
	<article class="box_list fadeIn" style="border: 4px solid" :style="{ borderColor: payload.color }">
		<div class="row no-gutters">
			<div class="col-lg-4">
				<span class = "cta-card" v-if="payload.cta" style="color: #022138; font-size: 14px">@{{ payload.cta }}</span>
				<figure>
					<a :href="payload.link">
						<img v-if="payload.image" :src="payload.image" :alt="payload.title" :title="payload.title" >
						<img v-else src="{!! asset('cetcc/img/courses/exemplo.png') !!}" class="img-fluid" alt="@{{ payload.title }}" title="@{{ payload.title }}" >
					</a>

					<span class = "type-card" v-if="payload.type" style="color: #022138; font-size: 16px" :style="{ backgroundColor: payload.color }">@{{ payload.type }}</span>
				</figure>
			</div>

			<div class="col-lg-8">
				<div class="wrapper px-3 py-0" style="min-height: 0px">
					<a :href="payload.link">
						<h6 class="text-wrap" style="padding-top: 10px" v-if = "payload.showTitle">@{{ payload.title }}</h6>
						<h6 class="text-wrap text-center" style="padding-top: 15px; padding-bottom: 25px" v-else >@{{ payload.subcategory }} @{{ payload.category }}</h6>
					</a>

					<p class = "text-justify m-0" style = "color: #686868;" v-if = "payload.showTitle"><small>@{{ payload.subtitle }}</small></p>
					{{-- <p class = "text-center m-0" style = "color: #686868;" v-else><small>@{{ payload.category }}</small></p> --}}

					<small v-if="payload.office">/ @{{ payload.office }}</small>
				</div>


			<div class="text-center card-footer p-0 mt-2" style = "background-color: transparent;">
				<div class = "text-center" style = "background-color: #e9e9e9">
					<p class = "mb-0">
						<small v-if = "payload.certified">Reconhecido pelo @{{ payload.certified }} | </small>
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
		</div>
	</article>
</script>
<script>
	Vue.component('card-wide', {
		template: '#cardWide',
		props: {
			payload: {
				type: Object,
				required: true
			}
		}
	})
</script>
