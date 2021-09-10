@foreach ($classClasses as $classes)
<?php $keyId = isset($keyId) ? $keyId : ($classes->orientative == 'yes' ? 'orientative' : 'module') ?>
<div id="classes_{{ $classes->id }}" class="panel border-at-all">
	<?php
	$studentClassControl = [ 'btnClass' => 'disabled', 'enableClasses' => false ];
	// $studentClassControl = [ 'btnClass' => 'btn-success', 'enableClasses' => true ];

	if (isset($classes->studentClassControl)) {
		if ($classes->studentClassControl->presence) {
			$studentClassControl = [ 'btnClass' => 'btn-primary', 'enableClasses' => !!($classes->studentClassControl->status) ];
		} else
		if ($classes->studentClassControl->status) {
			$studentClassControl = [ 'btnClass' => 'btn-success', 'enableClasses' => true ];
		}
	}
	?>
	{{-- mod --}}
	<a class="btn btn-block btn-outline b-r-sm p-sm row m-n {{ $studentClassControl['btnClass'] }}" data-toggle="collapse" data-parent="#accordion_{{ $keyId }}" id = "{{ $classes->id }}" onclick = "openContentCard(this.id)">
		<div class="col-sm-9 text-left">
			<small>
				@if($classes->sequence != '0' )
					<b>Módulo: {{ $classes->sequence }}</b>
				@else
					<b>Módulo: Bônus</b>
				@endif
			</small>
		</div>

		<div class="col-sm-3 text-right">
			@if ($classes->type == 'online')
				<i class="fa fa-play-circle" title="{{ $classes->typeLabel }}" style = "font-size: 1.5em;"></i>
			@else
				<i class="fa fa-building" title="{{ $classes->typeLabel }}" style = "font-size: 1.5em;"></i>
			@endif
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

		<div class="col-sm-12 text-right">
			@if(isset($classes->avaliation) && count($classes->avaliation->avaliationStudent))
				Média: {{ $classes->avaliation->_average }}
			@endif
			{{-- <small class="bg-sucess b-r-sm p-xxs">{{ $classes->typeLabel }}</small> --}}
		</div>
	</a>

	<div id="collapseclasses{{ $classes->id }}" class="panel-collapse collapse">
		@if ($studentClassControl['enableClasses'])
		<div class="p-sm">
			@if (isset($classes->team))
			<h4>Docente: {{ $classes->team->name }}</h4>
			@endif

			<div class = "mb-1">
				@if (isset($classes->contentCourse))
					<span class="font-bold">{{ $classes->contentCourse->title_pt }}</span>
					{!! $classes->contentCourse->description_pt !!}
				@elseif (isset($classes->avaliation))
					@if (count($classes->avaliation->avaliationStudent))
						<button class="btn gp-btn-green btn-block back-to-top" type="button" data-view-avaliation onclick="viewAvaliation({{ json_encode($classes->avaliation) }}, {{ $classes }})">
							<i class="fa fa-check-circle"></i> <small>Visualizar avaliação</small>
						</button>

						@if ($classes->avaliation->recuperation && $classes->avaliation->_average < GigaGetData::getConfigApp()->average)
							@if (count($classes->avaliation->recuperation->avaliationStudent))
								<button class="btn gp-btn-green btn-block back-to-top" type="button" data-view-avaliation onclick="viewAvaliation({{ json_encode($classes->avaliation->recuperation) }}, {{ json_encode($classes) }})">
									<i class="fa fa-check-circle"></i>
									<small>Visualizar recuperação</small>
								</button>
							@else
								<button class="btn btn-primary btn-block back-to-top" type="button" onclick="openAvaliation({{ json_encode($classes) }})">
									<i class="fa fa-check-circle"></i>
									<small>Recuperação</small>
								</button>
							@endif
						@endif
					@else
						<button class="btn gp-btn-green btn-block back-to-top" type="button" onclick="openAvaliation({{ json_encode($classes) }})">
							<i class="fa fa-check-circle"></i>
							<small>Iniciar avaliação</small>
						</button>
					@endif
				@else
					Não foi especificado o Módulo
				@endif
			</div>

			<div class="text-muted row" style = "display: flex; flex-flow: row wrap;">
				@if (isset($classes->link_live) && !empty($classes->link_live))
					<div class="col-12">
						<a class="btn gp-btn-green btn-block" href="{{ $classes->link_live }}" target="_blank" onclick="getNextClassesRelease({{ $order->id }}, {{ $classes->id }})">
							<i class="fa fa-play-circle"></i>
							<small>Aula ao Vivo</small>
						</a>
					</div>
				@endif

				@foreach ($classes->videoLesson as $indexVideoLesson => $videoLesson)
					<div class="col-md-6 col-sm-6 col-xs-12 divButtonContent">
						<button class="btn gp-btn-green btn-block back-to-top" style = "white-space: normal; height: 100%" type="button" onclick="openVideoLesson({{ json_encode($classes) }}, {{ json_encode($videoLesson) }})">
							<i class="fa fa-play-circle"></i>
							<small>{{ $videoLesson->title }}</small>
						</button>
					</div>
				@endforeach

				@foreach ($classes->fileContentCourse as $indexFileCourse => $fileContentCourse)
					@if (isset($fileContentCourse->file))
						<div class="col-md-6 col-sm-6 col-xs-12 divButtonContent">
							<button class="btn btn-default btn-block back-to-top" style = "white-space: normal; height: 100%" onclick="openPDF({{ json_encode($fileContentCourse->file) }}, {{ json_encode($classes) }});{{ count($classes->videoLesson) && empty($classes->link_live) ? '' : "getNextClassesRelease({$order->id}, {$classes->id})" }}">
								<i class="fa {{ $fileContentCourse->file->icon }} m-auto"></i>
								<small class = "m-auto">
									{{ $fileContentCourse->file->title }}
								</small>
							</button>
						</div>
					@endif
				@endforeach
			</div>
		</div>
		@else
		<div class="p-sm">
			Conteúdo da aula não está liberado
		</div>
		@endif
	</div>

</div>
@endforeach
