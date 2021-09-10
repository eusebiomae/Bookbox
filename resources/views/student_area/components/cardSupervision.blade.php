@if (isset($payload))
	@foreach ($payload as $item)
		<div class="col-sm-3">
			<div class="text-center gp-card">
				<h3>{{ getValueByColumn($item, 'date') }}</h3>
				<p class="font-bold">{{ getValueByColumn($item, 'teacher.name') }}</p>
				<p>{{ getValueByColumn($item, 'course_category.description_pt') }}</p>
				<p>R$ {{ formatNumber(getValueByColumn($item, 'order.value')) }}</p>
				<div class="text-center">
					@if (getValueByColumn($item, 'link'))
						<a target="_blank" href="{{ getValueByColumn($item, 'link') }}" class="btn btn-sm btn-success">
							<i class="fa fa-info"></i> Acessar Supervisão
						</a>
					@endif
				</div>
			</div>
		</div>
	@endforeach
@endif
