@extends('site.cetcc.layout.layout')
@section('title', 'Docentes-Details')

@section('content')
		@include('site.cetcc.components.banner')
		{{-- @include('site.cetcc.components.filter_menu') --}}

		<div class="container margin_60_35">
			<div class="row">
				<aside class="col-lg-3" id="sidebar">
					<div class="profile">
						<figure>
							<img src="{{ $payload->image }}" alt="Teacher" class="rounded-circle" style="width: 150px;height: 150px">
						</figure>
						<ul class="social_teacher">
							@if (isset($face_link))
								<li><a href="{{$face_link}}"><i class="icon-facebook"></i></a></li>
							@endif
							@if (isset($twit_link))
								<li><a href="{{$twit_link}}"><i class="icon-twitter"></i></a></li>
							@endif
							@if (isset($link_link))
								<li><a href="{{$link_link}}"><i class="icon-linkedin"></i></a></li>
							@endif
							@if (isset($email_link))
								<li><a href="{{$email_link}}"><i class="icon-email"></i></a></li>
							@endif
						</ul>
						<ul>
							<li>Nome: <span>{{ $payload->name }}</span> </li>
							<li>CRP: <span class="FLOAT-RIGHT">{{ $payload->crp }}</span></li>
							<li>Graduação: <span class="FLOAT-RIGHT">{{ getValueByColumn($payload, 'graduation.description_pt') }}</span></li>
							<li>Função: <span class="FLOAT-RIGHT">{{ getValueByColumn($payload, 'function.description_pt') }}</span></li>
							{{-- <li>Diciplinas: <span class="float-right">{{ $payload->image }}</span></li> --}}
						</ul>
					</div>
				</aside>

				<div class="col-lg-9">
					<div class="box_teacher">
						<div class="indent_title_in">
							<i class="pe-7s-user"></i>
							<h3>{{ $payload->name }}</h3>
							<div class = "text-justify">{!! $payload->description_pt !!}</div>
						</div>

						@if (count($payload->course))
							<div class="indent_title_in">
								<i class="pe-7s-display1"></i>
								<h3>Meus Cursos</h3>
							</div>
							<table class="table table-responsive table-striped add_bottom_30">
								<thead>
									<tr>
										{{-- <th>Classes</th> --}}
										<th>Titulo</th>
										<th>Link</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($payload->course as $course)
									<tr>
											{{-- <td>
												@foreach ($course->class as $class)
													{{ $class->name }},
												@endforeach
											</td> --}}
											<td>{{ $course->title_pt }}</td>
											<td><a href="/course/{{ $course->id }}" class="btn btn-sm btn_1 p-2"> <span class="d-none d-md-block">Ver curso</span> <i class="d-md-none d-block icon-link"></i></a></td>
										</tr>
										@endforeach
									</tbody>
								</table>
								<div class="mb-4 mb-md-none d-block d-md-none font-weight-bold text-center text-secondary">
									<i class="arrow_carrot-left h4 align-text-bottom"></i>
									<span style="vertical-align: super; font-size:12px;">
										Deslize para mais preços
									</span>
									<i class="arrow_carrot-right h4 align-text-bottom"></i>
								</div>
							@endif
						</div>
				</div>

			</div>
		</div>

@endsection

@section('scripts')
@parent

@endsection
