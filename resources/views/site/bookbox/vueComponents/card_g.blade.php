<script type="text/x-template" id="cardG">
	<div>
		<div class="box_grid wow" style="min-height: 365px">
			<figure class="block-reveal">
				<a :href="payload.link">
					<div class="block-horizzontal"></div>
					<img v-if="payload.image" :src="payload.image" class="img-fluid" alt="Img">
					<img v-else src="{!! asset('cetcc/img/courses/exemplo.png') !!}" alt="Not Foound Img" class="img-fluid">
				</a>
			</figure>

			<div class="wrapper">
				<a :href="payload.link">
					<h6 class="text-wrap text-center">@{{ payload.title }}</h6>
				</a>

				<p class = "text-center m-0 p-0">
					<small>@{{ payload.subtitle }}</small>
					<small v-if="payload.office">/ @{{ payload.office }}</small>
				</p>
			</div>

			<div class="text-center">
				<a class="btn btn_1 btn-primary px-4 mt-3 mb-3" :href="payload.link" role="button" style="font-size:12px; border-radius: 20px;">Saiba Mais</a>
			</div>
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
