@extends('student_area.layouts.app')

@section('title', $title)

@section('css')
@parent

<link rel="stylesheet" href="{!! asset('css/plugins/iCheck/custom.css') !!}">
{{-- <link rel="stylesheet" href="{!! asset('css/animate.css') !!}"> --}}
<link href="{!! asset('css/plugins/switchery/switchery.css') !!}" rel="stylesheet">
<link rel="stylesheet" href="{!! asset('css/plugins/radio-button-group/radio-button-group.css') !!}" />
<link rel="stylesheet" href="{!! asset('css/plugins/dataTables/datatables.min.css') !!}" />
@endsection

@section('content')
<div id="courseDetails" class="wrapper wrapper-content animated fadeInRight">
	<div class="">
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<h5>Curso:
					<em>{{ isset($order->course) ? getValueByColumn($order, 'course.title_pt') : 'Curso não encontrado' }}</em>
					<br> Turma:
					<em>{{ isset($order->class) ? getValueByColumn($order, 'class.name') : 'Não foi inscrito em nenhuma turma' }}</em>
				</h5>
				<div style="clear: both"></div>
			</div>
			<div class="ibox-content">
				<div class="row">
					<div class="col-lg-12">
						<div class="tabs-container">
							<ul class="nav nav-tabs">
								<li><a data-toggle="tab" href="#tabSchedule"> <i class="fa fa-calendar-o"></i>Cronograma</a></li>
								<li><a data-toggle="tab" href="#tabOrientative"> <i class="fa fa-calendar-o"></i>Orientações</a></li>
								<li class="active"><a data-toggle="tab" href="#tabClasses"> <i class="fa fa-calendar-o"></i>Módulos</a></li>
								<li><a data-toggle="tab" href="#tabFile"> <i class="fa fa-archive"></i>Arquivos Disponiveis</a></li>
								<li><a data-toggle="tab" href="#tabValue"> <i class="fa fa-dollar"></i>Financeiro</a></li>
							</ul>
							<div class="tab-content">

								{{-- Cronograma Novo --}}
								<div id="tabSchedule" class="tab-pane">
									<div class="panel-body p-0">
										<div role="tablist" class="add_bottom_45">
											<div class="col-lg-12 p-0">
												<div class="ibox-content">
													<div class="panel-group" id="accordion_module">

														@if (in_array($order->status, ['AP', 'BL']))
															@if ($order->days_delay < 90)
																@if (!empty($classes['module']))
																	@include('student_area.components.schedule', [
																		'keyId' => 'module',
																		'classClasses' => $classes['module'],
																	])
																@else
																	<div class="alert alert-danger">
																		Não foi inscrito em nenhuma turma
																	</div>
																@endif
															@else
																<div class="alert alert-warning">
																	Fatura atrasada a mais de {{ $order->days_delay }} dias
																</div>
															@endif
														@elseif($order->status == 'TR')
															<div class="alert alert-info">Curso transferido</div>
														@elseif($order->status == 'CA')
															<div class="alert alert-danger">Cancelado</div>
														@else
															<div class="alert alert-danger">
																Aguarde aprovação da sua inscrição para acessar os modulos do seu curso
															</div>
														@endif

													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								{{-- Orientações --}}
								<div id="tabOrientative" class="tab-pane">
									<div class="panel-body p-0">
										<div role="tablist" class="add_bottom_45">
											<div class="col-sm-12 p-0">
												<div class="ibox-content">
													<div class="col-md-8 display-max-md">
														<h3 data-iframeModule="title"></h3>
														{{-- Reprodução de video e exibição de PDF --}}
														<div data-iframeModule="content" class="boxVideo table-responsived"></div>
													</div>

													<div class="panel-group col-md-4 p-0" id="accordion_orientative">

														@if (in_array($order->status, ['AP', 'BL']))
															@if ($order->days_delay < 90)
																@if (isset($order->class))
																	@if (count($classes['orientative']))
																		@include('student_area.components.modulesCourseDetails', [
																			'keyId' => 'orientative',
																			'classClasses' => $classes['orientative'],
																		])
																	@else
																		<div class="alert alert-warning">
																			Nenhuma orientação cadastrada para essa turma
																		</div>
																	@endif
																@else
																	<div class="alert alert-danger">Não foi inscrito em nenhuma turma</div>
																@endif
															@else
																<div class="alert alert-warning">Fatura atrasada a mais de {{ $order->days_delay }}
																	dias</div>
															@endif
														@elseif($order->status == 'TR')
															<div class="alert alert-info">Curso transferido</div>
														@elseif($order->status == 'CA')
															<div class="alert alert-danger">Cancelado</div>
														@else
															<div class="alert alert-danger">Aguarde aprovação da sua inscrição</div>
														@endif

													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								{{-- Cronograma antigo / Módulos --}}
								<div id="tabClasses" class="tab-pane active">
									<div class="panel-body p-0">
										<div role="tablist" class="add_bottom_45">
											<div class="col-sm-12 p-0">
												<div class="ibox-content">
													<div class="col-md-8 display-max-md">
														<h3 data-iframeModule="title"></h3>
														{{-- Reprodução de video e exibição de PDF --}}
														<div data-iframeModule="content" class="boxVideo table-responsived"></div>
													</div>
													<div class="panel-group col-md-4 p-0" id="accordion_module">

														@if (in_array($order->status, ['AP', 'BL']))
															@if ($order->days_delay < 90)
																@if (isset($order->class))
																	@include('student_area.components.modulesCourseDetails', [
																		'keyId' => 'module',
																		'classClasses' => $classes['module'],
																	])
																@else
																	<div class="alert alert-danger">
																		Não foi inscrito em nenhuma turma
																	</div>
																@endif
															@else
																<div class="alert alert-warning">
																	Fatura atrasada a mais de {{ $order->days_delay }} dias
																</div>
															@endif
														@elseif($order->status == 'TR')
															<div class="alert alert-info">Curso transferido</div>
														@elseif($order->status == 'CA')
															<div class="alert alert-danger">Cancelado</div>
														@else
															<div class="alert alert-danger">Aguarde aprovação da sua inscrição para acessar os modulos
																do seu curso</div>
														@endif

													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								{{-- Arquivos Disponiveis --}}
								<div id="tabFile" class="tab-pane">
									<div class="panel-body p-0">
										<div class="row p-w-sm m-b-md">

											@if (in_array($order->status, ['AP', 'BL']))
												@if ($order->days_delay < 90)

													@foreach ($classes['module'] as $module)
														@foreach ($module->fileContentCourse as $fileContentCourse)
															@if ($module->studentClassControl && $module->studentClassControl->status)
																<div class="col-md-6">
																	@if (isset($fileContentCourse->file))
																		<a class="btn btn-default p-xs m-xs" href="{{ $fileContentCourse->file->link }}" target="_blank">
																			<i class="fa {{ $fileContentCourse->file->icon }} fa-1x"></i>
																			<small>{{ $fileContentCourse->file->title }}</small>
																		</a>
																	@else
																		<span data-file-id="{{ $fileContentCourse->file_id }}">
																			Arquivo não encontrado
																		</span>
																	@endif
																</div>
															@endif
														@endforeach
													@endforeach

												@else
													<div class="alert alert-warning">Fatura atrasada a mais de {{ $order->days_delay }} dias</div>
												@endif

											@elseif($order->status == 'TR')
												<div class="alert alert-info">Curso transferido</div>
											@elseif($order->status == 'CA')
												<div class="alert alert-danger">Cancelado</div>
											@else
												<div class="alert alert-danger">
													Aguarde aprovação da sua inscrição para acessar os arquivos do seu curso
												</div>
											@endif
										</div>
									</div>
								</div>

								{{-- Financeiro --}}
								<div id="tabValue" class="tab-pane ">
									<div class="panel-body p-0">
										<div class="row">
											<div class="col-12 text-right" style="margin-right:15px;">
												<div class="radio-group">
													<input data-display-mobile="hide" type="radio" id="1" name="opt" value="list"
														onchange="document.getElementById('time_line').style.display = this.checked ? null : 'none' , document.getElementById('list').style.display = this.checked ? 'none' : null "
														checked>
													<label data-display-mobile="hide" class="text-uppercase" for="1">TimeLine</label>
													<input data-display-mobile="hide" type="radio" id="2" name="opt" value="time"
														onchange="document.getElementById('list').style.display = this.checked ? null : 'none' , document.getElementById('time_line').style.display = this.checked ? 'none' : null ">
													<label data-display-mobile="hide" class="text-uppercase" for="2">Lista</label>
												</div>
											</div>
										</div>

										<div class="row" id="time_line">
											<div id="vertical-timeline" class="vertical-container dark-timeline center-orientation">
												<div class="vertical-timeline-block">
													<div class="vertical-timeline-icon navy-bg">
														<i class="fa fa-file-pdf-o"></i>
													</div>

													<div class="vertical-timeline-content">
														<h4>Contrato</h4>
														<p>
															<b>Nome: </b>
															{{ isset($order->course) ? getValueByColumn($order, 'course.title_pt') : 'Curso não encontrado' }}
															<br>
															<b>Valor Fatura: </b> R$ {{ formatNumber($order->value) }}<br>
															<b>Forma de Pagamento: </b> {{ getValueByColumn($order, 'formPayment.description') }}<br>
														</p>
														{{-- <a href="#" target="_blank" class="btn btn-sm btn-primary" title="Dowloading Doc"> <i class="fa fa-file-pdf-o"></i> Contrato</a> --}}
														<span class="vertical-date">
															{{ $order->created_at }}
														</span>
													</div>
												</div>

												@foreach ($order->orderParcel as $orderParcel)
													<div class="vertical-timeline-block">
														@switch($orderParcel->status)
															@case('At')
																<div class="vertical-timeline-icon btn-circle btn-danger" title="Atrasado">
																	<i class="fa fa-times-circle"></i>
																</div>
															@break
															@case('Ab')
																<div class="vertical-timeline-icon btn-circle btn-success" title="Aberto">
																	<i class="fa fa-clock"></i>
																</div>
															@break
															@case('Pd')
																<div class="vertical-timeline-icon btn-circle btn-warning" title="Pendente">
																	<i class="fa fa-exclamation-circle"></i>
																</div>
															@break
															@case('Pg')
																<div class="vertical-timeline-icon btn-circle gp-btn-green" title="Pago">
																	<i class="fa fa-check-circle"></i>
																</div>
															@break
															@case('Ca')
																<div class="vertical-timeline-icon btn-circle" title="Cancelado"
																	style="background: #f1f1f1">
																	<i class="fa fa-ban"></i>
																</div>
															@break
														@endswitch

														<div class="vertical-timeline-content">
															<h4>{{ $orderParcel->n }} / {{ $order->number_parcel }}</h4>
															<p>
																<b>Código da parcela: </b> {{ $orderParcel->code }}<br>
																<b>Valor Fatura: </b> R$ {{ formatNumber($orderParcel->value) }}<br>
																<b>Data de Vencimento: </b> {{ $orderParcel->due_date }}<br>
																<b>Data de Pagamento: </b> {{ $orderParcel->payday }}<br>
															</p>
															{{-- <h3>Status: Aberto</h3> --}}

															<div>
																@if (isset($orderParcel->asaas_json))
																	<a href="{{ $orderParcel->asaas_json->bankSlipUrl }}" target="_blank" title="Boleto" class="btn btn-sm {{ in_array($orderParcel->status, ['At', 'Ab', 'Pd']) ? 'btn-info"' : 'btn-default" disabled' }}>
																		<i class="fa fa-dollar"></i>
																	</a>
																@endif

																<a href="/bill/orderParcel/{{ $orderParcel->id }}" target="_blank" title="Recibo" class="btn btn-sm {{ in_array($orderParcel->status, ['Pg']) ? 'btn-ciano"' : 'btn-default" disabled' }}>
																	<i class="fa fa-file-text"></i>
																</a>
															</div>

															<span class="vertical-date">
																{{ $orderParcel->due_date }} <br />
															</span>
														</div>
													</div>
												@endforeach

											</div>
										</div>

										<div class="row" id="list" style="display:none;">
											<div id="vertical-timeline2" class="vertical-container dark-timeline center-orientation">
												<div class="vertical-timeline-block">
													<div class="vertical-timeline-icon navy-bg">
														<i class="fa fa-file-pdf-o"></i>
													</div>
													<div class="vertical-timeline-content">
														<h4>Contrato</h4>
														<p>
															<b>Nome: </b> {{ getValueByColumn($order, 'course.title_pt') }} <br>
															<b>Valor Fatura: </b> R$ {{ formatNumber($order->value) }}<br>
														</p>

														<span class="vertical-date">{{ $order->created_at }} <br /></span>
													</div>
												</div>
												<table class="table table-bordered">
													<thead>
														<tr>
															<th title="Numero da Parcela">Nº</th>
															<th>Código</th>
															<th>Valor da Fatura</th>
															<th title="Data Vencimento">Vencimento</th>
															<th title="Data de Pagamentos">Data de Pag.</th>
															<th width="50px">Status</th>
															<th width="120px" title="Opções"></th>
														</tr>
													</thead>
													<tbody>
														@foreach ($order->orderParcel as $orderParcel)
															<tr>
																<td>{{ $orderParcel->n }}</td>
																<td>{{ $orderParcel->code }}</td>
																<td>R$ {{ formatNumber($orderParcel->value) }}</td>
																<td>{{ $orderParcel->due_date }}</td>
																<td>{{ $orderParcel->payday }}</td>
																<td class="center">
																	@switch($orderParcel->status)
																		@case('At')
																			<div class="btn btn-sm btn-circle btn-danger" title="Atrasado">
																				<i class="fa fa-times-circle"></i>
																			</div>
																		@break
																		@case('Ab')
																			<div class="btn btn-sm btn-circle btn-success" title="Aberto">
																				<i class="fa fa-clock"></i>
																			</div>
																		@break
																		@case('Pd')
																			<div class="btn btn-sm btn-circle btn-warning" title="Pendente">
																				<i class="fa fa-exclamation-circle"></i>
																			</div>
																		@break
																		@case('Pg')
																			<div class="btn btn-sm btn-circle gp-btn-green" title="Pago">
																				<i class="fa fa-check-circle"></i>
																			</div>
																		@break
																		@case('Ca')
																			<div class="btn btn-sm btn-circle" title="Cancelado" style="background: #f1f1f1">
																				<i class="fa fa-ban"></i>
																			</div>
																		@break
																	@endswitch
																</td>
																<td>
																	@if (isset($orderParcel->asaas_json))
																		<a href="{{ $orderParcel->asaas_json->bankSlipUrl }}" target="_blank" title="Boleto" class="btn btn-sm {{ in_array($orderParcel->status, ['At', 'Ab', 'Pd']) ? 'btn-info"' : 'btn-default" disabled' }}>
																			<i class="fa fa-dollar"></i>
																		</a>
																	@endif

																	<a href="/bill/orderParcel/{{ $orderParcel->id }}" target="_blank" title="Recibo" class="btn btn-sm {{ in_array($orderParcel->status, ['Pg']) ? 'btn-ciano"' : 'btn-default" disabled' }}>
																		<i class="fa fa-file-text"></i>
																	</a>

																</td>
															</tr>
														@endforeach

													</tbody>
												</table>
											</div>
										</div>

									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@include('student_area.avaliation.index')

@endsection

@section('scripts')
@parent
<!-- Mainly scripts -->
<script src="{!! asset('lib/bootstrap-4.5.0/js/bootstrap.min.js') !!}"></script>

<script src="{!! asset('js/plugins/metisMenu/jquery.metisMenu.js') !!}"></script>
<script src="{!! asset('js/plugins/slimscroll/jquery.slimscroll.min.js') !!}"></script>

<!-- Custom and plugin javascript -->
{{-- <script src="{!! asset('js/inspinia.js')!!}"></script> --}}
<script src="{!! asset('js/plugins/pace/pace.min.js') !!}"></script>
{{-- <script src="{!! asset('js/plugins/flot/jquery.flot.pie.js')!!}"></script> --}}
<script src="{!! asset('js/plugins/switchery/switchery.js') !!}"></script>
<script src="{!! asset('js/plugins/dataTables/datatables.min.js') !!}" type="text/javascript"></script>
<script src="{!! asset('js/viewAvaliation.js?13') !!}"></script>
<script>
	var APP = {
		order: {!! $order !!},
		classes: {!! isset($classes) ? json_encode($classes) : 'null' !!},
		lastVideoWatched: {!! isset($lastVideoWatched) ? json_encode($lastVideoWatched) : 'null' !!},
	}

	$(document).ready(function() {
		//scroll da tela para retornar ao topo
		$(".back-to-top").click(function() {
			$("html, body").animate({
				scrollTop: 0
			}, 800);
		});

		//alterar background do botão selecionado
		$(".btn-w").click(function() {
			$(".btn-w")
				.removeClass("btn-primary"); // remove a classe de todos
			$(this)
				.addClass("btn-primary"); // adiciona a classe ao botão clicado
		});

		$('.dataTables-example').DataTable({
			searching: false,
			language: {
				processing: "Processando ...",
				search: "Pesquisar",
				lengthMenu: "Mostrar _MENU_ elementos",
				info: "Mostrando item _START_ à _END_ de _TOTAL_ elementos",
				infoEmpty: "Mostrando item 0 à 0 de 0 elementos",
				infoFiltered: "(filtro de _MAX_ elementos ao total)",
				infoPostFix: "",
				loadingRecords: "Carregando ...",
				zeroRecords: "Não há nenhum elemento a ser exibido",
				emptyTable: "Nenhum dado disponível na tabela",
				paginate: {
					first: "Primeiro",
					previous: "Anterior",
					next: "Próximo",
					last: "Último"
				},
				aria: {
					sortAscending: ": ativar para classificar a coluna em ordem crescente",
					sortDescending: ": ativar para classificar a coluna em ordem decrescente"
				}
			}
		});
	});

	function getKeyBoxContent(classes) {
		return classes.orientative == "yes" ? '#tabOrientative' : '#tabClasses'
	}

	function getNextClassesRelease(orderId, classesId) {
		return $.ajax({
			method: "GET",
			url: "/student_area/order/getNextClassesRelease/" + orderId + (classesId ? '/' + classesId : ''),
		}).then(function(resp) {
			for (key in resp) {
				$('#classes_' + key).replaceWith(resp[key])
			}
		})
	}

	function getModuleClasses(orderId, classesId) {
		return $.ajax({
			method: "GET",
			url: "/student_area/order/getModuleClasses/" + orderId + '/' + classesId,
		}).then(function(resp) {
			for (key in resp) {
				$('#classes_' + key).replaceWith(resp[key])
			}

			return resp
		})
	}

	function sendHistoricVideo(historicVideo) {
		return $.ajax({
			method: "POST",
			url: "/student_area/historic_video/save",
			data: historicVideo,
		})
	}

	function eventPlayVideoLesson(data) {
		clearInterval(APP.playerInterval)

		APP.playerInterval = setInterval(function() {
			APP.player.getCurrentTime().then(function(seconds) {
				APP.historicVideo.timer = seconds

				sendHistoricVideo(APP.historicVideo)
			})
		}, 5500)
	}

	function eventPauseVideoLesson(data) {
		clearInterval(APP.playerInterval)

		if (data.seconds < data.duration) {
			APP.historicVideo.timer = data.seconds
			sendHistoricVideo(APP.historicVideo)
		}
	}

	function eventEndedVideoLesson(data) {
		APP.historicVideo.timer = data.seconds
		APP.historicVideo.ended = 1

		sendHistoricVideo(APP.historicVideo)

		clearInterval(APP.playerInterval)

		getNextClassesRelease(APP.historicVideo.order_id, APP.historicVideo.classes_id)
	}

	function eventCloseVideoLesson() {
		if (APP.player) {
			clearInterval(APP.playerInterval)
			APP.player.destroy()
		}

		$('[data-iframeModule]')
			.html('')
			.addClass('remove')
			.removeClass('boxVideo')

		$('#wrapperAvaliation').addClass('remove')
	}

	function openVideoLesson(classes, videoLesson) {
		if (!videoLesson || (classes.student_class_control?.status ?? null) != 1) {
			return
		}

		var order = APP.order

		APP.historicVideo = {
			order_id: order.id,
			student_id: order.student_id,
			course_id: order.course_id,
			class_id: order.class_id,
			classes_id: classes.id,
			content_course_id: classes.content_course_id,
			video_lesson_id: videoLesson.id,
		}

		var keyBoxContent = getKeyBoxContent(classes)

		$iframeModule = $(keyBoxContent).find('[data-iframeModule="content"]')

		eventCloseVideoLesson()
		$iframeModule.removeClass('remove').addClass('boxVideo')

		APP.player = new Vimeo.Player($iframeModule[0], {
			url: videoLesson.linkVimeo,
		})

		if (videoLesson.historic_video && videoLesson.historic_video.ended != 1) {
			APP.player.setCurrentTime(videoLesson.historic_video.timer || 0)
		}

		$(keyBoxContent).find('[data-iframeModule="title"]').text(videoLesson.title)

		APP.player.getDuration().then(function(duration) {
			APP.historicVideo.duration = duration

			sendHistoricVideo(APP.historicVideo)
		})

		APP.player.on('play', eventPlayVideoLesson)
		APP.player.on('pause', eventPauseVideoLesson)
		APP.player.on('ended', eventEndedVideoLesson)
	}

	if (APP.lastVideoWatched) {
		openVideoLesson(APP.lastVideoWatched.classes, APP.lastVideoWatched.videoLesson)
	}

	function openPDF(file, classes) {
		eventCloseVideoLesson()

		var keyBoxContent = getKeyBoxContent(classes)

		$(keyBoxContent)
			.find('[data-iframeModule="content"]')
			.removeClass('remove')
			.addClass('boxVideo')
			.html('<iframe />')
			.find('iframe')
			.addClass('max-height')
			.attr('src', file.link)
	}

	function openAvaliation(data) {
		var avaliationId = data.avaliation_id

		if (data.avaliation.avaliation_student.length) {
			avaliationId = data.avaliation.recuperation.id
		}

		return $.ajax({
			url: '/student_area/avaliation/' + avaliationId,
			method: 'get',
		}).then(function(resp) {
			eventCloseVideoLesson()

			initAvaliation(resp, {
				order_id: APP.order.id,
				student_id: APP.order.student_id,
				classes_id: data.id,
			})
		})
	}

	function viewAvaliation(avaliation, classes) {
		eventCloseVideoLesson()

		$iframeModule = $(getKeyBoxContent(classes)).find('[data-iframeModule="content"]')

		$(getKeyBoxContent(classes)).find('[data-iframeModule="content"]').removeClass('remove');

		AjaxViewAvaliation('/student_area/avaliation/student/' + APP.order.id + '/' + avaliation.id + '/0', $iframeModule);
	}

	function submitAvaliationFile(event) {
		event.preventDefault()

		var fd = new FormData(document.forms.avaliation)

		showLoading()
		return $.ajax({
			url: '/student_area/avaliation/finalize',
			type: 'POST',
			data: fd,
			cache: false,
			contentType: false,
			processData: false,
		}).then(function(resp) {
			return getModuleClasses(fd.get('order_id'), fd.get('classes_id')).then(function() {
				hideLoading()

				$(`#classes_${fd.get('classes_id')} [data-view-avaliation]`).click()
			})
		}).catch(hideLoading)
	}

	function openContentCard(id) {
		$('.panel-collapse').collapse('hide');
		$('#collapseclasses' + id).collapse('show');
	}
</script>
@endsection
