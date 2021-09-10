<div class="wrapper wrapper-content animated fadeInRight">
	<div class="">
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<h5>Meus Cursos <small>Visualização dos dados de cursos</small></h5>
			</div>
			<div class="ibox-content">
				<div class="row">
					<div class="col-lg-12">
						<div class="tabs-container">
							<ul class="nav nav-tabs">
								<li class="active"><a data-toggle="tab" href="#tab-1"> <i class="fa fa-square-o"></i>Ativo</a></li>
								<li class=""><a data-toggle="tab" href="#tab-2"> <i class="fa fa-check-square-o"></i>Finalizado</a></li>
							</ul>
							<div class="tab-content">
								<div id="tab-1" class="tab-pane active">
									<div class="panel-body container-fluid">
										<div class="row">

											@foreach ($payload['active'] as $item)
											<div class="col-sm-6 col-md-4 col-lg-3">
												<div class="text-center gp-card">
													<h3 style="min-height: 70px;">{{ getValueByColumn($item, 'course.title_pt') }}</h3>
													@if (empty(getValueByColumn($item, 'course.img')))
														<img src="{{ url('cetcc/img/courses/exemplo.png') }}"  class="m-1 img-fluid bg-img-circle" style="width: auto;" alt="">
													@else
														<div class="m-b-sm bg-img-circle" style="background-image: url('{{ getValueByColumn($item, 'course.img') }}')"></div>
														{{-- <div class="m-b-sm" style="background-image: url('/cetcc/img/courses/exemplo.png')"></div> --}}
													@endif
													<p class="font-bold" style="min-height: 55px">{{ getValueByColumn($item, 'class.name') }}</p>
													<div class="text-center">
														<a href="/student_area/order/{{ getValueByColumn($item, 'id') }}" class="btn btn-sm btn-success">
															<i class="fa fa-info"></i> Acessar Curso
														</a>
													</div>
													<div>
														@switch($item->status)
															@case('AP')
																<i class="fa fa-circle text-green" title="{{$item->statusLabel}}"></i>
															@break
															@case('PE')
																<i class="fa fa-circle text-warning" title="{{$item->statusLabel}}"></i>
															@break
															@case('CA')
																<i class="fa fa-circle text-danger" title="{{$item->statusLabel}}"></i>
															@break
															@case('IN')
																<i class="fa fa-circle text-muted" title="{{$item->statusLabel}}"></i>
															@break
															@case('TR')
																<i class="fa fa-circle text-success" title="{{$item->statusLabel}}"></i>
															@break
														@endswitch
													{{ $item->statusLabel }}</div>
												</div>
											</div>
											@endforeach

										</div>
									</div>
								</div>
								<div id="tab-2" class="tab-pane">
									<div class="panel-body">

										@foreach ($payload['finished'] as $item)
										<div class="col-sm-3">
											<div class="text-center gp-card">
												<h3 style="min-height: 70px">{{ getValueByColumn($item, 'course.title_pt') }}</h3>
												@if (empty(getValueByColumn($item, 'course.img')))
													<img src="{!! url('cetcc/img/courses/exemplo.png') !!}"  class="m-1 img-fluid bg-img-circle" style="width: auto;" alt="">
												@else
													<div class="m-b-sm bg-img-circle" style="background-image: url('{{ getValueByColumn($item, 'course.img') }}')"></div>
												{{-- <div class="m-b-sm" style="background-image: url('/cetcc/img/courses/exemplo.png')"></div> --}}
												@endif
												<p class="font-bold" style="min-height: 55px">{{ getValueByColumn($item, 'class.name') }}</p>
												<div class="text-center">
													<a href="/student_area/order/{{ getValueByColumn($item, 'id') }}" class="btn btn-sm btn-success">
														<i class="fa fa-info"></i> Acessar Curso
													</a>
												</div>
												<div>
													@switch($item->status)
														@case('AP')
															<i class="fa fa-circle text-green" title="{{$item->statusLabel}}"></i>
														@break
														@case('PE')
															<i class="fa fa-circle text-warning" title="{{$item->statusLabel}}"></i>
														@break
														@case('CA')
															<i class="fa fa-circle text-danger" title="{{$item->statusLabel}}"></i>
														@break
														@case('IN')
															<i class="fa fa-circle text-muted" title="{{$item->statusLabel}}"></i>
														@break
														@case('TR')
															<i class="fa fa-circle text-success" title="{{$item->statusLabel}}"></i>
														@break
													@endswitch
												{{ $item->statusLabel }}</div>
											</div>
										</div>
										@endforeach
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
