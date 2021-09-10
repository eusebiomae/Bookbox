@foreach ($classClasses as $classes)
<div class="panel">

	<a class="btn btn-block btn-outline b-r-sm p-sm row m-n" style="border: 1px solid #ccc; margin-bottom: 20px !important" data-toggle="collapse" data-parent="#accordion_{{ $keyId }}" href="#collapseclasses{{ $classes->id }}">
		<div class="col-sm-9 text-left">
			<small>
				@if($classes->sequence != '0' )
					<b>Módulo: {{ $classes->sequence }}</b>
				@else
					<b>Módulo: Bônus</b>
				@endif
			</small>
		</div>
		<div class="col-sm-12 text-left">
			@if(isset($order->course))
				@if (getValueByColumn($order, 'course.courseCategoryType.flg') == 'ead')
					@if(isset($classes->studentClassControl))
						@if(!empty($classes->start_date))
							<small class="b-r-sm p-xxs"><b>Início: {{ $classes->studentClassControl->start_date }}</b> </small><br>
						@endif
						<sub>Disponível até: {{ $classes->studentClassControl->end_date }}</sub>
					@endif
				@else
					@if(!empty($classes->start_date))
						<small	small><b>Início: {{ $classes->start_date }} @if(!empty($classes->end_date)) - {{ $classes->end_date }}@endif </b> </small><br>
					@endif
					<sub>Disponível até: {{ getValueByColumn($classes, 'studentClassControl.end_date') }}</sub>
					@endif
			@endif
		</div>
		<div id="" class="text-left col-sm-12 modules_aux">
			<h5 id="" class="panel-title space_initial">
				@if (isset($classes->contentCourse))
					{{ $classes->contentCourse->title_pt }}
				@elseif (isset($classes->avaliation))
					{{ $classes->avaliation->title }}
				@else
					Não foi especificado o Módulo
				@endif
			</h5>

			@if (isset($classes->team))
			<sub>Docente: {{ $classes->team->name }}</sub>
			@endif
		</div>
	</a>

</div>
@endforeach
