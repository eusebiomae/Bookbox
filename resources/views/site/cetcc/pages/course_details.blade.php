@extends('site.cetcc.layout.layout')
@section('title', 'Curso | Details')

@section('content')
@include('site.cetcc.components.banner')

@section('css')
@parent
	<style>
		li[name="bonus_course_list"]:nth-child(n+4) {
			display: none;
		}
	</style>
@endsection

<div class="bg_color_1">
	{{-- SUB MENU --}}
	<nav class="secondary_nav sticky_horizontal">
		<div class="container">
			<div class="d-md-none d-block">
				<div class="dropdown">
					<button class="btn-lg btn btn-link gp-link-none text-white dropdown-toggle" style="width:100%;font-size:1.1em;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Submenu
					</button>
					<div name="" class="dropdown-menu">
						<a href="#description" class="dropdown-item">Descrição</a>
						<a href="#benefits" class="dropdown-item">Vantagens do Curso</a>
						<a href="#values" class="dropdown-item">Investimento</a>
						<a href="#coordinator" class="dropdown-item">Coordenador(a)</a>
						<a href="#class" class="dropdown-item">Turma(s)</a>
					</div>
				</div>
				{{-- <div class="select__arrow"></div> --}}
			</div>
			<ul class="clearfix d-md-block d-none">
				<li><a href="#description" class="text-uppercase active">Descrição</a></li>
				<li><a href="#benefits" class="text-uppercase ">Vantagens do Curso</a></li>
				<li><a href="#values" class="text-uppercase ">Investimento</a></li>
				{{-- <li><a href="#modules">Módulos do Curso</a></li> --}}
				<li><a href="#coordinator" class="text-uppercase ">Coordenador(a)</a></li>
				<li><a href="#class" class="text-uppercase ">Turma(s)</a></li>
				{{-- <li><a href="#teachers">Professores</a></li> --}}
			</ul>
		</div>
	</nav>

	<div class="container margin_60_35">
		<div class="row">
			<div class="col-lg-8">
				<div class="row">
					<div class="col-12">
						<h4 class="h5 h4-md mt-3 mt-md-none">{{ $course->title_pt }}</h4>
						@if (isset($course->subtitle_pt))
						<span><i>{{ $course->subtitle_pt }}</i></span>
						@endif
					</div>
				</div>
				<div class="row mt-3">
					{{-- START --}}
					<div class="col-12">
						<div class="box_highlight">
							<ul class="row">
								@if (isset($course->hours_load) && !empty($course->hours_load))
									<li class="col-md col-sm-6 col-12 text-center gp-features"><i class="pe-7s-clock"></i>Carga Horária
										<strong>{{ is_numeric($course->hours_load) ? ($course->hours_load > 1 ? $course->hours_load.' horas' : $course->hours_load.' hora') : $course->hours_load }}</strong>
									</li>
								@endif

								@if (isset($course->certified) && !empty($course->certified))
									<li class="col-md col-sm-6 col-12 text-center gp-features"><i class="pe-7s-file"></i>Reconhecido <strong>{{ $course->certified}}</strong></li>
								@endif
								@if (isset($course->number_modules) && !empty($course->number_modules))
									<li class="col-md col-sm-6 col-12 text-center gp-features"><i class="pe-7s-notebook"></i>Módulos<strong>{{ $course->number_modules }}</strong></li>
								@endif
								@if (isset($course->duration) && !empty($course->duration))
									<li class="col-md col-sm-6 col-12 text-center gp-features"><i class="pe-7s-timer"></i>Duração
										<strong>{{ is_numeric($course->duration) ? ($course->duration > 1 ? $course->duration.' meses' : $course->duration.' mês') : $course->duration }}</strong>
									</li>
								@endif
								</ul>
						</div>
					</div>
					{{-- END --}}
					{{-- @include('admin._components.dataTables', [ 'dataTable' => $mapDataTableValues['data'][$class->id] ]) --}}
				</div>
				<div class="row">
					<div class="col-12">
						<section id="description" class="pt-2">
							<h5>Descrição</h5>
							<div class = "text-justify listWithBall">{!! $course->description_pt !!}</div>
							<div class="row text-right">
								<div class="col-12">
									<a href="/shopping_journey?course={{ $course->id }}" class="btn btn_2 mb-3 btn-sm" target="_blank">Fazer Inscrição</a>
								</div>
							</div>

							{{-- Other Information Type --}}
							@foreach ($course->otherInfType as $otherInfType)
								<div class="row mb-3 text-justify">
									<div class="col-12">
										<h5>{{$otherInfType->description_pt}}</h5>
									</div>
									@foreach ($otherInfType->otherInf as $otherInf)
										@switch($otherInfType->flg)
											{{-- ALERTA --}}
											@case('ale')
												<div class="col-12">
													<div class="alert alert-warning" role="alert">
														<b>{{$otherInf->title }}</b>
														<div>{!! $otherInf->description !!}</div>
													</div>
												</div>
											@break

											{{-- PUBLICO ALVO --}}
											@case('pub')
												<div class="col-sm-4">
													<img style="width: 100%" class="p-3" src="{!! $otherInf->img !!}" alt="{{$otherInfType->description_pt}}">
													<div class="text-center">
														<b class="m-3 h6">{{$otherInf->title }}</b>
													</div>
												</div>
											@break

											{{-- CERTIFICADO --}}
											@case('cer')
												@if (!empty($otherInf->img))
													<div class="col-md-3">
														<img style="width: 100%" src="{!! $otherInf->img !!}" alt="{!! $otherInf->title !!}">
													</div>
													<div class="col-md-9">
														<div class="mb-3">{!! $otherInf->description !!}</div>
													</div>
												@else
													<div class="col-md-12">
														<div class="mb-3">{!! $otherInf->description !!}</div>
													</div>
												@endif

											@break

											{{-- MATERIAL --}}
											@case('mat')
												@if (!empty($otherInf->img))
													<div class="col-md-5">
														<img style="width: 100%" src="{!! $otherInf->img !!}" alt="{!! $otherInf->title !!}">
													</div>
													<div class="col-md-7">
														<div class="mb-3">{!! $otherInf->description !!}</div>
													</div>
													@else
													<div class="col-md-12">
														<div class="mb-3">{!! $otherInf->description !!}</div>
													</div>
												@endif
											@break

											{{-- SOBRE --}}
											@case('abo')
												@if (!empty($otherInf->img))
												<div class="col-md-7">
													<b>{{$otherInf->title}}</b>
														<div class="mb-3">{!! $otherInf->description !!}</div>
													</div>
													<div class="col-md-5">
														<img style="width: 100%" src="{!! $otherInf->img !!}" alt="{!! $otherInf->title !!}">
													</div>
												@else
												<div class="col-12">
													<b>{{$otherInf->title}}</b>
													<div class="mb-3">{!! $otherInf->description !!}</div>
												</div>
												@endif

											@break

											{{-- CREDENCIAMENTO --}}
											@case('cre')
												@if (!empty($otherInf->img))
													<div class="col-sm-6">
														<div class="mb-3">{!! $otherInf->description !!}</div>
													</div>
													<div class="col-sm-6">
														<img style="width: 100%" src="{!! $otherInf->img !!}" alt="{!! $otherInf->title !!}">
													</div>
												@else
												<div class="col-sm-12">
													<div class="mb-3">{!! $otherInf->description !!}</div>

												</div>
												@endif

											@break

											{{-- METODOLOGIA --}}
											{{-- OBJETIVO --}}
											@default
												<div class="col-12">
													<div class="mb-3">{!! $otherInf->description !!}</div>
												</div>
										@endswitch
									@endforeach
								</div>
							@endforeach
							<div class="row text-right">
								<div class="col-12">
									<a href="/shopping_journey?course={{ $course->id }}" class="btn btn_2 mb-3 btn-sm" target="_blank">Fazer Inscrição</a>
								</div>
							</div>

							{{-- Contato --}}
							<h5>Fale com Consultores:</h5>
							<div class="row mb-4">
								@foreach ($course->user as $contact)
								<div class="col-sm-4">
									<div class="card bg-light">
										<div class="mx-2">
											@if (empty($contact->image))
												<img src="/cetcc/img/user/user.png" class="card-img-top py-2 my-2 bg-white rounded-circle" alt="{{$contact->name}}">
											@else
												<img src="{{$contact->image}}" class="card-img-top py-2 my-2 bg-white rounded-circle" alt="{{$contact->name}}">
											@endif
										</div>
										<div class="card-body">
											<b class="card-title">{{$contact->name}}</b>
											<ul>
												<li><a href="tel://{{ $contact->phone }}">{{$contact->phone}}</a></li>
												<li><a href="https://api.whatsapp.com/send?phone=55{{$contact->cellphone}}&text=Ola!%20Tenho%20interesse%20no%20curso%20de" target="_black">{{$contact->cellphone}}</a></li>
												<li><a href="mailto://{{ $contact->email }}">{{$contact->email}}</a></li>
											</ul>
										</div>
									</div>
								</div>
								@endforeach
							</div>

							{{-- Vantagens --}}
							<h5 id="benefits" class="pt-2">Vantagens do Curso</h5>
							<ul class="list_ok">
								@foreach ($course->bonusCourse as $item)
								<li class="" name="bonus_course_list text-justify">
									<h6>{{ $item['title_pt'] }}</h6>
									<span class="my-2"><b>{{ $item['subtitle_pt'] }}</b></span>
									<div>{!! $item['description_pt'] !!}</div>
								</li>
								@endforeach
								<button class="btn btn-outline-cian mb-3 btn-block collapsed" onclick="showBonusCourse()"  target="_blank">Ver Mais</button>
							</ul>
							{{-- Adicionais --}}
							<h5>Adicionais</h5>
							<div class="row" id="additional"></div>

							{{-- Tabela de Investimento --}}

							@if (!$hasFree)
								<h5 id="values" class="pt-none pt-md-5">Tabela de Investimento:</h5>
								<div class="table-responsive">

									<table class="table table-striped table-bordered table-hover dataTables-example" style="font-size: 12px;">
										<thead>
											<tr>
												<th>Valores até:</th>
												@foreach ($mapDataTableValues['header'] as $header)
												<th>{{ $header['label'] }}</th>
												@endforeach
											</tr>
										</thead>
										<tbody>
											@php
												$hasEnabled = null;
											@endphp
											@foreach ($mapDataTableValues['data'] as $date => $data)
											<tr>
												<td>{{ $date }}</td>
												@foreach ($mapDataTableValues['header'] as $header)
													@if (isset($data[$header['column']]))
														<td>
															@foreach ($data[$header['column']] as $index => $cell)
																@php
																	if (!$hasEnabled && $cell['sneezed'] == 0) {
																		$hasEnabled = $date;
																	}
																@endphp

																@if ($course->doesRegistre && $hasEnabled == $date)
																	<a href="/shopping_journey?course={{ $course->id }}&formPayment={{ $cell['id'] }}" class="btn m-1 btn_1 p-2 btn-sm">
																	{{ $cell['parcel'] }} x {{ number_format($cell['value'], 2, ',', '.') }}
																	</a>
																@else
																<span class="btn m-1 btn-secondary disabled btn-sm">
																	{{ $cell['parcel'] }} x {{ number_format($cell['value'], 2, ',', '.') }}
																</span>
																@endif
															@endforeach
														</td>
													@else
													<td></td>
													@endif
												@endforeach
											</tr>
											@endforeach
										</tbody>
										<tfoot>
											<tr>
												<th>Valores até:</th>
												@foreach ($mapDataTableValues['header'] as $header)
												<th>{{ $header['label'] }}</th>
												@endforeach
											</tr>
										</tfoot>
									</table>

								</div>
								<b class="mb-3">Clique na opção desejada para fazer inscrição</b>
							@else
								<a href="/shopping_journey?course={{ $course->id }}" class="btn btn_2 p-2 mb-3 btn-block" target="_blank">Fazer Inscrição</a>
							@endif


							<div class="mb-4 mb-md-none d-block d-md-none font-weight-bold text-center text-secondary">
								<i class="arrow_carrot-left h3 align-text-bottom"></i>
								<span style="vertical-align: super">
									Deslize para mais preços
								</span>
								<i class="arrow_carrot-right h3 align-text-bottom"></i>
							</div>

						</section>

					</div>

					{{-- Coordenador(a) --}}
					@if (!empty(getValueByColumn($course, 'team')))
						<div class="col-lg-12 ">
							<h5 id="coordinator" class="pt-none pt-md-5">Coordenador(a):</h5>
							<div class="media">
								<div class="media-left d-flex mr-3">
									<img class="gp-img-carousel" src="{{ getValueByColumn($course, 'team.image') }}" alt="">
								</div>
								<div class="media-body">
									<div class="testimonial">
										<h6>{{ getValueByColumn($course, 'team.name') }}</h6>
										<p class="m-0">
											<b>{{ getValueByColumn($course, 'team.graduation.description_pt') }}</b><br>
											<span><b>CRP:</b>  {{ getValueByColumn($course, 'team.crp') }}</span>
										</p>

										<a class="btn btn_1 p-2 btn-sm" href="/teacher/{{ getValueByColumn($course, 'team.id') }}" target="_black" >Ver Mais</a>
									</div>
								</div>
							</div>
						</div>
					@endif

					{{-- Professores  --}}
					{{-- <section class="pt-5">
						<div class="intro_title">
							<h5>Professor(a)</h5>
						</div>
						<div class="row add_top_20 add_bottom_30">
							@foreach ($course->teacher as $index => $teacher)
								@foreach ($teacher->classTeacher as $classTeacher)
									<div class="col-lg-6">
										<ul class="list_teachers">
											<li>
												<a>
													<figure>
														<img src="{{ getValueByColumn($teacher, 'image') }}" alt="{{ getValueByColumn($teacher, 'teacher.name') }}" />
													</figure>
													<h5>{{ getValueByColumn($teacher, 'name') }}</h5>
													<div>{{ getValueByColumn($teacher, 'teacher.graduation.description_pt') }}</div>
													<div>{{ getValueByColumn($teacher, 'description') }}</div>
												</a>
											</li>
										</ul>
									</div>
								@endforeach
							@endforeach
						</div>
					</section> --}}

					{{-- <section class="col-lg-12">
						<div id="" class="intro_title mb-4 pt-5">
							<h5>Módulos do Curso</h5>
						</div>

						<div id="accordion_courseModule" role="tablist" class="add_bottom_45">
							@foreach ($course->courseModule as $courseModule)
								<div class="card container">
									<button
										class="btn btn-outline-danger mb-2 gp-btn-accordion row {{ $index == 0 ? '' : 'collapsed' }}"
										data-toggle="collapse"
										href="#accordionCourseModule_{{ $courseModule->contentCourse->id }}"
										aria-expanded="{{ $index == 0 ? 'true' : 'false' }}"
										aria-controls="accordionCourseModule_{{ $courseModule->contentCourse->id }}"
										style="text-overflow: ellipsis"
									>
										<div class="col-11" style="align-self:center;">
											{{ $courseModule->contentCourse->title_pt }}
										</div>
										<div class="col-1" style="align-self:end; font-size:40px;">
											@if ($courseModule->type == 'online')
												<i class="pe-7s-play" title="Online"></i>
											@else
												<i class="pe-7s-users" title="Presencial"></i>
											@endif
											<small style="font-size: 8px; position:absolute; bottom:4px;">{{ $courseModule->typeLabel }}</small>
										</div>
									</button>
									<div
										id="accordionCourseModule_{{ $courseModule->contentCourse->id }}"
										class="collapse row"
										aria-expanded="{{ $index == 0 ? 'show' : '' }}"
										role="tabpanel"
										aria-labelledby="accordionCourseModule_{{ $courseModule->contentCourse->id }}"
									>
										<div class="card-body col-12">
											<h6>{{ $courseModule->contentCourse->title_pt }}</h6>
											<div>{!! $courseModule->contentCourse->description_pt !!}</div>
										</div>
									</div>
								</div>
							@endforeach
						</div>
					</section> --}}

					<div class="col-lg-12">
						<h5 id="class" class="pt-5">Turma(s):</h5>
						<nav>
							<div class="nav nav-tabs" id="nav-tab" role="tablist">
								<a
									class="nav-item nav-link active gp-tab"
									data-toggle="tab"
									href="#type_{{ getValueByColumn($course, 'courseCategory.courseCategoryType.type') }}"
									role="tab"
									aria-controls="type_{{ getValueByColumn($course, 'courseCategory.courseCategoryType.type') }}"
									aria-selected="true"
								>
									{{ getValueByColumn($course, 'courseCategory.courseCategoryType.title') }}
								</a>
							</div>
						</nav>

						<div class="tab-content pt-3" id="nav-tabContent">
							@foreach ($course->class as $index => $class)
								<div
									class="fade show {{ $index == 0 ? 'active' : '' }}"
									id="type_{{ getValueByColumn($course, 'courseCategory.courseCategoryType.type') }}_{{ $class->id }}"
									role="tabpanel"
									aria-labelledby="#type_{{ getValueByColumn($course, 'courseCategory.courseCategoryType.type') }}"
								>
									<div class="accordion" id="accordion_{{ $class->id }}">
										<div class="card">
											<button
												class="btn btn_1 row p-3 gp-btn-radius tooltip-test pl-4 mb-2 gp-btn-accordion {{ $index == 0 ? '' : 'collapsed' }}"
												type="button" data-toggle="collapse"
												data-target="#accordion_class_{{ $class->id }}"
												aria-expanded="false"
												aria-controls="accordion_class_{{ $class->id }}"
												title="Clique para ver mais informações!"
												style="display:grid; align-items:center;"
											>
												<span class="col-md-9 pl-0 text-justify">
													{{ $class->name }}
													@if ($course->courseCategoryType->flg != 'ead')
														- Data início {{ $class->start_date }}
													@endif
												</span>
												<div class="col-md-3 text-center pl-0 font-weight-bold" style="font-size: 14px;">Mais Informações</div>
											</button>
											<div id="accordion_class_{{ $class->id }}" class="collapse" aria-labelledby="headingOne" data-parent="#accordion_{{ $class->id }}">
												<div class="card-body">
													<div class="row">
														{{-- START --}}
														<div class="col-12">

															@if ($class->does_registre == '1')
															<a href="/shopping_journey?course={{ $course->id }}&class={{ $class->id }}" class="btn btn_2 p-2 mb-3" target="_blank">Fazer Inscrição</a>
															@endif

															<div class="box_highlight">
																<ul class="row">
																	@if (isset($class->start_date) && !empty($class->start_date) && ($course->courseCategoryType->id != 3))
																		<li class="col-md col-sm-6 col-12 text-center gp-features-2"><i class="pe-7s-date"></i>Início do Curso<strong>{{ $class->start_date }}</strong></li>
																	@endif
																	@if (isset($class->end_date) && !empty($class->end_date) && ($course->courseCategoryType->id != 3))
																		<li class="col-md col-sm-6 col-12 text-center gp-features-2"><i class="pe-7s-date"></i>Final do Curso <strong>{{ $class->end_date }}</strong></li>
																	@endif
																	@if (isset($course->category_type) && !empty($class->category_type))
																		<li class="col-md col-sm-6 col-12 text-center gp-features-2"><i class="pe-7s-airplay"></i>Este curso é <strong>{{ $class->category_type }} Presencial</strong></li>
																	@endif
																	@if (isset($class->days_week) && !empty($class->days_week))
																		<li class="col-md col-sm-6 col-12 text-center gp-features-2"><i class="pe-7s-pin"></i>Todas as(os) <strong>{{ $class->days_week }}</strong></li>
																	@endif
																	@if (isset($class->start_hours) && !empty($class->start_hours))
																		<li class="col-md col-sm-6 col-12 text-center gp-features-2"><i class="pe-7s-clock"></i>Começa as <strong>{{ $class->start_hours }}</strong></li>
																	@endif
																</ul>
																{{-- <ul class="additional_info">
																	<li><i class="pe-7s-date"></i>Início do Curso<strong>{{ $class->start_date }}</strong></li>
																	<li><i class="pe-7s-date"></i>Final do Curso<strong>{{ $class->end_date }}</strong></li>
																	<li><i class="pe-7s-clock"></i>Dia das semana<strong></strong></li>
																	<li><i class="pe-7s-clock"></i>Hora de Encontro<strong></strong></li>
																</ul> --}}
															</div>
														</div>
														{{-- END --}}
														{{-- @include('admin._components.dataTables', [ 'dataTable' => $mapDataTableValues['data'][$class->id] ]) --}}
													</div>

													{{-- Descrilção da turma --}}
													@if (!empty($class->description_pt))
														<div>
															<h5>Descrição Turma</h5>
															<div class = "text-justify">{!!$class->description_pt!!}</div>
														</div>
													@endif

													{{-- Coordenador(a) da turma --}}
													@if (!empty($class->team))
														<div class="col-lg-12 ">
																<h5 id="coordinator" class="pt-none pt-md-5">Coordenador(a):</h5>
																<div class="media">
																	<div class="media-left d-flex mr-3">
																		<img class="gp-img-carousel" src="{{$class->team->image}}" alt="{{$class->team->name}}">
																	</div>
																	<div class="media-body">
																		<div class="testimonial">
																			<h6>{{$class->team->name}}</h6>
																			<p class="m-0">
																				<span><b>CRP:</b>  {{$class->team->crp}}</span>
																			</p>
																			<a class="btn btn_1 p-2 btn-sm" href="/teacher/{{$class->team->id}}" target="_black" >Ver Mais</a>

																		</div>
																	</div>
																</div>
														</div>
													@endif

													{{-- Professores da turma --}}
													@if (!empty($class->classTeacher))
														<div class="row">
															<div class="col-sm-12">
																<h5 id="coordinator" class="pt-none pt-md-5">Professores</h5>
															</div>
															@foreach ($class->classTeacher as $teacher)
																<div class="col-lg-6 ">
																	<div class="media">
																		<div class="media-left d-flex mr-3">
																			<img class="gp-img-carousel" src="{{$teacher->team->image}}" alt="{{$teacher->team->name}}">
																		</div>
																		<div class="media-body">
																			<div class="testimonial">
																				<h6>{{$teacher->team->name}}</h6>
																				<p class="m-0">
																					<span><b>CRP:</b>  {{$teacher->team->crp}}</span><br>
																					<span>{{$teacher->description}}</span>
																				</p>
																				<a class="btn btn_1 p-2 btn-sm" href="/teacher/{{$teacher->team->id}}" target="_black" >Ver Mais</a>
																			</div>
																		</div>
																	</div>
																</div>
															@endforeach
														</div>
													@endif


													{{-- Módulos Específicos --}}
													@if (isset($class->courseModule) && count($class->courseModule))
														<section id="lessons">
															<div id="" class="intro_title mb-4 pt-5">
																<h5>Módulos</h5>
															</div>

															<div id="accordion_lessons" role="tablist" class="add_bottom_45">
																@foreach ($class->courseModule as $courseModule)
																	<div class="card container">
																		<button
																			class="btn btn-outline-cian mb-2 gp-btn-accordion row {{ $index == 0 ? '' : 'collapsed' }}"
																			data-toggle="collapse"
																			href="#accordionContentCourse_{{ $courseModule->contentCourse->id }}"
																			aria-expanded="{{ $index == 0 ? 'true' : 'false' }}"
																			aria-controls="accordionContentCourse_{{ $courseModule->contentCourse->id }}"
																			style="text-overflow: ellipsis"
																		>
																		@if(isset($courseModule->start_date))
																			<div class="col-3 gp-accordion-date">
																				{{ $courseModule->start_date }}
																				{{-- @if (isset($courseModule->end_date))
																					<br>{{ $courseModule->end_date }}
																				@endif --}}
																			</div>
																			<div class="col-8" style="align-self:center;">
																		@elseif(isset($courseModule->sequence) && !empty($courseModule->sequence))
																			<div class="col-1 gp-accordion-date">
																				{{ $courseModule->sequence }}
																			</div>
																			<div class="col-10" style="align-self:center;">
																		@else
																			<div class="col-1 gp-accordion-date">
																				-
																			</div>
																			<div class="col-10" style="align-self:center;">
																		@endif
																				{{ $courseModule->contentCourse->title_pt }}
																			</div>
																			<div class="col-1" style="align-self:end; font-size:40px;">
																				@if ($courseModule->type == 'online')
																					<i class="pe-7s-play" title="Online"></i>
																				@else
																					<i class="pe-7s-users" title="Presencial"></i>
																				@endif
																				<small style="font-size: 8px; position:absolute; bottom:4px;">{{ $courseModule->typeLabel }}</small>
																			</div>
																		</button>
																		<div
																			id="accordionContentCourse_{{ $courseModule->contentCourse->id }}"
																			class="collapse row"
																			aria-expanded="{{ $index == 0 ? 'show' : '' }}"
																			role="tabpanel"
																			aria-labelledby="accordionContentCourse_{{ $courseModule->contentCourse->id }}"
																		>
																			<div class="card-body col-12">
																				<h6>{{ $courseModule->contentCourse->title_pt }}</h6>
																				<div>{!! $courseModule->contentCourse->description_pt !!}</div>
																			</div>
																		</div>
																	</div>
																@endforeach
															</div>
														</section>
													@endif

												</div>
											</div>
										</div>
									</div>
								</div>
							@endforeach
						</div>
					</div>

				</div>
			</div>

			<aside class="col-lg-4" id="sidebar">
				<div class="box_detail">
					<h5>{{ $course->title_pt }}</h5>
					<figure>
						@if (isset($course->video_link))
						<a href="{{ $course->video_link}}" class="video">
							<i class="arrow_triangle-right"></i>
							<img src="{{ $course->img }}" alt="" class="img-fluid">
							<span>Previa do Curso</span>
						</a>
						@else
						<img src="{{ $course->img }}" alt="" class="img-fluid">
						@endif
					</figure>
					<div class="price">
						@if (isset($course->courseFormPaymentMain))
							<span style="font-size: 13px">a partir de</span> {{ $course->courseFormPaymentMain->parcel }}x R${{ $course->courseFormPaymentMain->value }}
							<br />
							<span class="original_price">{{ $course->courseFormPaymentMain->formPayment->description }}</span>
							<a href="/shopping_journey?course={{ $course->id }}" class="btn btn_2 my-3 btn-block" target="_blank">Fazer inscrição</a>
						@endif
					</div>
					{{-- <a href="#0" class="btn_1 full-width">Inscrever</a> --}}
					<div id="list_feat">
						<h3>O que está incluso?</h3>
						<ul>
							@foreach ($course->IncludedItems as $item)
								<li><i class="icon-check-1"></i> {{$item['title_pt']}}</li>
							@endforeach
						</ul>
					</div>
					<div id="list_feat">
						<h3>Onde Temos esses cursos?</h3>
						<ul>
							<div class="tags-course">
								@foreach ($course->cities as $city)
									<li>
										<i class="icon-check-1"></i> {{ $city->name }}
									</li>
								@endforeach
							</div>
						</ul>
					</div>
				</div>
			</aside>

		</div>
	</div>
</div>

@endsection

@section('scripts')
@parent
	<script>
		function showBonusCourse(){
			if ($('[name="bonus_course_list"].d-block').length) {
				$('[name="bonus_course_list"]').removeClass('d-block')
				$('[onclick="showBonusCourse()"]').text('Ver Mais')
			} else{
				$('[name="bonus_course_list"]').addClass('d-block')
				$('[onclick="showBonusCourse()"]').text('Ver Menos')
			}
		}
		function listAdditional(additionals) {
			var elemAdditional = document.getElementById('additional')
			var innerHTML = '';

			if (additionals && additionals.length) {
				var payload = additionals.reduce(function(carry, item) {
					if (!carry.additionals[item.additional_id]) {
						carry.additionals[item.additional_id] = {
							title: item.title,
							additional_id: item.additional_id,
							payload: [],
						}
					}

					carry.additionals[item.additional_id].payload.push(item)

					if (!carry.formPayment[item.form_payment_id]) {
						carry.formPayment[item.form_payment_id] = item.form_payment
					}

					return carry
				}, {
					additionals: {},
					formPayment: {},
				})

				var tHead = ''

				for (var key in payload.formPayment) {
					var formPayment = payload.formPayment[key]
					tHead += '<th class="text-right">'+ formPayment.description +'</th>'
				}

				innerHTML = '<table class="table table-striped" style="width: 100%">\
					<thead class="thead-light">\
						<tr>\
							<th></th>\
							<th>Adicional</th>\
							'+ tHead +'\
						</tr>\
					</thead>\
					<tbody>'

				for (var key in payload.additionals) {
					var additional = payload.additionals[key]

					var tHead = ''
					for (var formPaymentKey in payload.formPayment) {
						var it = null

						for (var i = 0; i < additional.payload.length; i++) {
							if (formPaymentKey == additional.payload[i].form_payment_id) {
								it = additional.payload[i]
								break
							}
						}

						if (it) {
							if (!it.full_value) {
								it.full_value = 0
							}

							tHead += '<td class="text-right">R$ '+ numberWithCommas(it.full_value, 2) +'</td>'
						} else {
							tHead += '<td></td>'
						}
					}

					innerHTML += '<tr data-key="'+ key +'" class="alert" style="cursor:pointer" title="Clique para selecionar">\
						<td></td>\
						<td>'+ additional.title +'</td>\
						'+ tHead +'\
					</tr>'
				}

				innerHTML += '</tbody></table>'
			}
			elemAdditional.innerHTML = innerHTML;
		}

		var course = {!! isset($course) ? $course : '{}' !!};

		if (course.course_additional) {
			listAdditional(course.course_additional);
		}
	</script>
@endsection
