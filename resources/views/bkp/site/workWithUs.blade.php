@extends('layouts.site.site')

@section('title', 'Home')

@section('css')
	<link rel="stylesheet" href="{!! asset('css/plugins/jasny/jasny-bootstrap.min.css') !!}" />
	<link rel="stylesheet" href="{!! asset('css/plugins/dropzone/basic.css') !!}" />
	<link rel="stylesheet" href="{!! asset('css/plugins/dropzone/dropzone.css') !!}" />
@endsection

@section('content')

<!-- Page Title
============================================= -->
<section class=" bg-overlay bg-overlay-gradient pb-0">
	<div class="bg-section" >
		<img src="{!! asset('storage/slides/' . $results->slide[0]->image) !!}" alt="Background"/>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="page-title title-1 text-center">
					<div class="title-bg">
						<h2>{{ internation($results->slide[0], 'title')}}</h2>
					</div>
					<ol class="breadcrumb">
						<li><a href="/home">{{ trans('menu.home')}}</a></li>
						<li><a href="#">{{ trans('menu.contact')}}</a></li>
						<li class="active">{{ trans('menu.workWithUs')}} </li>
					</ol>
				</div>
				<!-- .page-title end -->
			</div>
			<!-- .col-md-12 end -->
		</div>
		<!-- .row end -->
	</div>
	<!-- .container end -->
</section>

<!-- Contact #1
============================================= -->
<section id="contact" class="contact">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="heading heading-4">
					<div class="heading-bg heading-right">
						<p class="mb-0">{{ trans('workWithUs.subtitle')}}</p>
						<h2>{{ trans('workWithUs.title')}}</h2>
					</div>
				</div>
				<!-- .heading end -->
			</div>
			<!-- .col-md-12 end -->
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="row">
					<!-- .col-md-4 end -->
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="row">
							<form id="contact-form" action="/workWithUs/send" method="post" enctype="multipart/form-data">
								{{ csrf_field() }}
								<div class="col-md-6">
									<label id="name" name="name">{{ trans('workWithUs.name')}}: </label>
									<input type="text" class="form-control mb-30" name="name" id="name" placeholder="" required/>
								</div>
								<div class="col-md-6">
									<label id="last_name" name="last_name">{{ trans('workWithUs.lastName')}}: </label>
									<input type="text" class="form-control mb-30" name="last_name" id="last_name" placeholder="" required/>
								</div>
								<div class="col-md-4">
									<label id="genre" name="genre">{{ trans('workWithUs.genre')}}: </label>
									<select class="form-control mb-30" id="genre" name="genre" required>
										<option value="M">Masculino</option>
										<option value="F" selected>Feminino</option>
									</select> 
								</div>
								<div class="col-md-4">
									<label id="date_birth" name="date_birth">{{ trans('workWithUs.dateBirth')}}: </label>
									<input type="date" class="form-control mb-30" name="date_birth" id="date_birth" required/>
								</div>
								<div class="col-md-4">
									<label id="profession" name="profession">{{ trans('workWithUs.profession')}}: </label>
									<input type="text" class="form-control mb-30" name="profession" id="profession" placeholder="" required/>
								</div>
								<div class="col-md-3">
									<label id="graduation_id" name="graduation_id">{{ trans('workWithUs.graduation')}}: </label>
									<select class="form-control mb-30" id="graduation_id" name="graduation_id" required>
										@foreach($listSelectBox->graduation as $item)
										<option value="{{ $item->id }}">{{ $item->description_pt }}</option>
										@endforeach
									</select>
								</div>
								<div class="col-md-3">
									<label id="function_id" name="function_id">{{ trans('workWithUs.function')}}: </label>
									<select class="form-control mb-30" id="function_id" name="function_id" required>
										@foreach($listSelectBox->function as $item)
										<option value="{{ $item->id }}">{{ $item->description_pt }}</option>
										@endforeach
									</select>
								</div>
								<div class="col-md-3">
									<label id="office_id" name="office_id">{{ trans('workWithUs.office')}}: </label>
									<select class="form-control mb-30" id="office_id" name="office_id" required>
										@foreach($listSelectBox->office as $item)
										<option value="{{ $item->id }}">{{ $item->description_pt }}</option>
										@endforeach
									</select>
								</div>
								<div class="col-md-3">
									<label id="english_level_id" name="english_level_id">{{ trans('workWithUs.englishLevel')}}: </label>
									<select class="form-control mb-30" id="english_level_id" name="english_level_id" required>
										@foreach($listSelectBox->englishLevel as $item)
										<option value="{{ $item->id }}">{{ $item->description_pt }}</option>
										@endforeach
									</select>
								</div>
								<div class="col-md-10">
									<label id="address" name="address">{{ trans('workWithUs.address')}}: </label>
									<input type="text" class="form-control mb-30" name="address" id="address" placeholder="" required/>
								</div>
								<div class="col-md-2">
									<label id="number" name="number">{{ trans('workWithUs.number')}}: </label>
									<input type="number" class="form-control mb-30" name="number" id="number" placeholder="" required/>
								</div>
								<div class="col-md-12">
									<label id="complement" name="complement">{{ trans('workWithUs.complement')}}: </label>
									<input type="text" class="form-control mb-30" name="complement" id="complement" placeholder="" required/>
								</div>
								<div class="col-md-3">
									<label id="neighborhood" name="neighborhood">{{ trans('workWithUs.neighborhood')}}: </label>									
									<input type="text" class="form-control mb-30" name="neighborhood" id="neighborhood" placeholder="" required/>
								</div>
								<div class="col-md-3">
									<label id="city" name="city">{{ trans('workWithUs.city')}}: </label>
									<input type="text" class="form-control mb-30" name="city" id="city" placeholder="" required/>
								</div>
								<div class="col-md-3">
									<label id="uf" name="uf">{{ trans('workWithUs.uf')}}: </label>
									<input type="text" class="form-control mb-30" name="uf" id="uf" placeholder="" required/>
								</div>
								<div class="col-md-3">
										<label id="cep" name="cep">{{ trans('workWithUs.cep')}}: </label>
									<input type="text" class="form-control mb-30" name="cep" id="cep" placeholder="" required/>
								</div>
								<div class="col-md-6">
										<label id="phone1" name="phone1">{{ trans('workWithUs.phone')}}: </label>
									<input type="text" class="form-control mb-30" name="phone1" id="phone1" placeholder="" required/>
								</div>
								<div class="col-md-6">
										<label id="cell_phone1" name="cell_phone1">{{ trans('workWithUs.cellPhone')}}: </label>
									<input type="text" class="form-control mb-30" name="cell_phone1" id="cell_phone1" placeholder="" required/>
								</div>
								<div class="col-md-12">
									<label id="email1" name="email1">{{ trans('workWithUs.email')}}: </label>
									<input type="text" class="form-control mb-30" name="email1" id="email1" placeholder="" required/>
								</div>
		
								<div class="col-md-12">
									<label id="text_pt" name="text_pt">{{ trans('workWithUs.textPt')}} </label>
									<textarea class="form-control mb-30" name="text_pt" id="text_pt" rows="2" placeholder="{{ trans('workWithUs.answerPt')}}" required></textarea>
								</div>

								<div class="col-md-12">
									<label id="text_en" name="text_en">{{ trans('workWithUs.textEn')}} </label>
									<textarea class="form-control mb-30" name="text_en" id="text_en" rows="2" placeholder="{{ trans('workWithUs.answerEn')}}" required></textarea>
								</div>

								<div class="col-md-12">
									<label id="fileCurriculum" name="fileCurriculum">{{ trans('workWithUs.attach')}}: </label>
									<div>
										<div class="fileinput fileinput-new input-group" data-provides="fileinput">
												<div class="form-control" data-trigger="fileinput">
													<i class="glyphicon glyphicon-file fileinput-exists"></i>
													<span class="fileinput-filename"></span>
												</div>
												<span class="input-group-addon btn btn-default btn-file">
													<span class="fileinput-new">Selecionar</span>
													<span class="fileinput-exists">Alterar</span>
														<input type="file" accept=".doc,.docx,.pdf"  id="fileCurriculum" name="fileCurriculum">
													</span>
												<a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remover</a>
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<label id="fileVideo" name="fileVideo">{{ trans('workWithUs.attachVideo')}}</label>
									<div>
										<div class="fileinput fileinput-new input-group" data-provides="fileinput">
												<div class="form-control" data-trigger="fileinput">
													<i class="glyphicon glyphicon-file fileinput-exists"></i>
													<span class="fileinput-filename"></span>
												</div>
												<span class="input-group-addon btn btn-default btn-file">
													<span class="fileinput-new">Selecionar</span>
													<span class="fileinput-exists">Alterar</span>
														<input type="file" accept=".avi,.mov,.wmv,.mp4,.mpeg,.3gp,.mvk" id="fileVideo" name="fileVideo">
													</span>
												<a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remover</a>
										</div>
									</div>
								</div>

								<div class="col-md-3">
									<button type="reset" id="submit-message" class="btn btn-primary btn-black btn-block">{{ trans('workWithUs.cancel')}}</button>
								</div>
								<div class="col-md-3">
									<button type="submit" id="submit-message" class="btn btn-primary btn-black btn-block">{{ trans('workWithUs.submit')}}</button>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-12 mt-xs">
									<!--Alert Message-->
									<div id="contact-result">
									</div>
								</div>
							</form>
						</div>
					</div>
					<!-- .col-md-8 end -->
				</div>
				<!-- .row end -->
			</div>
			<!-- .col-md-12 end -->
		</div>
		<!-- .row end -->
	</div>
	<!-- .container end -->
</section>

@endsection

@section('scripts')
<script src="{!! asset('js/plugins/jasny/jasny-bootstrap.min.js') !!}" type="text/javascript"></script>
	<script src="{!! asset('js/plugins/dropzone/dropzone.js') !!}" type="text/javascript"></script>
@endsection
