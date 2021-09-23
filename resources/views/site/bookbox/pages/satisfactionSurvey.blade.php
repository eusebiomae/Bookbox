@extends('site.cetcc.layout.layout')
@section('title', 'Pesquisa de Satisfação')

@section('css')
@parent
<link rel="stylesheet" href="{!! asset('css/plugins/summernote/summernote.css') !!}" />
<link rel="stylesheet" href="{!! asset('css/plugins/summernote/summernote-bs3.css') !!}" />
<link rel="stylesheet" href="{!! asset('css/plugins/jasny/jasny-bootstrap.min.css') !!}" />
<link rel="stylesheet" href="{!! asset('css/plugins/dropzone/basic.css') !!}" />
<link rel="stylesheet" href="{!! asset('css/plugins/dropzone/dropzone.css') !!}" />

<style>
	.form-control {
		padding: .375rem .75rem;
	}

	.lgx-social-footer {
		text-align: center;
		font-size: 50px;
	}
	.lgx-social-footer li {
		display: inline-block;
		padding: 0 15px;
	}
</style>
@endsection

@section('content')
@component('site.cetcc.components.banner')
@slot('img')
BANNER_CETCC.jpg
@endslot
@slot('title')
Pesquisa de Satisfação
@endslot
@endcomponent

<div class="container margin_120_95">
	<div class="row mb-5">
		<div class="col">
			<h2 class="text-center">Sua opinião é importante para nós!</h2>
			<p class="text-center">
				Nos ajude a melhorar a qualidade de nossos cursos e fortalecer o nosso relacionamento.
			</p>
		</div>
	</div>
	<form action="/satisfaction_survey" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
		<div class="row">
			<div class="col-md-4">
				<span class="input">
					<input class="input_field" type="text" id="name" name="name" maxlength="512" required>
					<label class="input_label">
						<span class="input__label-content"><h6>Nome*</h6></span>
					</label>
				</span>
			</div>
			<div class="col-md-4">
				<span class="input">
					<input class="input_field" type="email" id="email" name="email" maxlength="512" required>
					<label class="input_label">
						<span class="input__label-content"><h6> E-mail*</h6></span>
					</label>
				</span>
			</div>
			<div class="col-md-4">
				<span class="input">
					<label class="input_label"><h6>Qual turma participou?</h6></label>
					<select class="input_field" name="which_class_attended">
						<option></option>
						<option>E4181</option>
						<option>E5172</option>
						<option>EA182</option>
						<option>EM172</option>
						<option>EM181</option>
						<option>F4191P</option>
						<option>F4191R</option>
						<option>F5191</option>
						<option>FI191</option>
						<option>FIO191</option>
						<option>FQ191</option>
						<option>N3181</option>
						<option>N3182</option>
						<option>NA182</option>
						<option>NF191</option>
						<option>NF5191</option>
						<option>NM181</option>
						<option>OF4191</option>
						<option>OP4191</option>
						<option>SJC191</option>
					</select>
				</span>
			</div>
		</div>
		<div></div>

		<div class="form-group my-4">
			<h6>Nível de satisfação:</h6>
			<div class="form-check">
				<label class="form-check-label">
					<input class="form-check-input" type="radio" name="satisfaction_level" value="Plenamente satisfeito">
					Plenamente satisfeito
				</label>
				<label class="form-check-label ml-5">
					<input class="form-check-input" type="radio" name="satisfaction_level" value="Satisfeito">
					Satisfeito
				</label>
				<label class="form-check-label ml-5">
					<input class="form-check-input" type="radio" name="satisfaction_level" value="Precisa melhorar">
					Precisa melhorar
				</label>
				<label class="form-check-label ml-5">
					<input class="form-check-input" type="radio" name="satisfaction_level" value="Insatisfeito">
					Insatisfeito
				</label>
			</div>
		</div>

		<div class="form-group">
			<span class="input">
				<input class="input_field" type="text" name="talk_about_your_satisfaction_rating" maxlength="4096">
				<label class="input_label">
					<span class="input__label-content"><h6>Fale sobre sua avaliação de satisfação</h6> </span>
				</label>
			</span>
		</div>

		<div class="form-group">
			<h6>Como conheceu o CETCC:</h6>

			<div class="form-check">
				<label class="form-check-label mr-5">
					<input class="form-check-input" type="radio" name="how_did_you_meet_cetcc" value="Google">
					Google
				</label>
				<label class="form-check-label mr-5">
					<input class="form-check-input" type="radio" name="how_did_you_meet_cetcc" value="Facebook">
					Facebook
				</label>
				<label class="form-check-label mr-5">
					<input class="form-check-input" type="radio" name="how_did_you_meet_cetcc" value="Instagram">
					Instagram
				</label>
				<label class="form-check-label mr-5">
					<input class="form-check-input" type="radio" name="how_did_you_meet_cetcc" value="Indicação de Amigos">
					Indicação de Amigos
				</label>
				<label class="form-check-label mr-5">
					<input class="form-check-input" type="radio" name="how_did_you_meet_cetcc" value="Revistas">
					Revistas
				</label>
				<label class="form-check-label">
					<input class="form-check-input" type="radio" name="how_did_you_meet_cetcc" value="Outros">
					Outros
				</label>
			</div>
		</div>

		<div class="form-group">
			<span class="input">
				<input class="input_field" type="text" name="what_were_your_real_motivations_for_looking_at_the_cetcc" maxlength="4096">
				<label class="input_label">
					<span class="input__label-content"> <h6>Quais foram suas reais motivações ao procurar o CETCC?</h6></span>
				</label>
			</span>
		</div>

		<div class="form-group my-4">
			<h6>Suas expectativas referente ao curso foram atendidas?</h6>

			<div class="form-check">
				<label class="form-check-label mr-5">
					<input class="form-check-input" type="radio" name="have_your_expectations_regarding_the_course_been_met" value="Plenamente Atendida">
					Plenamente Atendida
				</label>
				<label class="form-check-label mr-5">
					<input class="form-check-input" type="radio" name="have_your_expectations_regarding_the_course_been_met" value="Atendida">
					Atendida
				</label>
				<label class="form-check-label mr-5">
					<input class="form-check-input" type="radio" name="have_your_expectations_regarding_the_course_been_met" value="Atendida Parcialmente">
					Atendida Parcialmente
				</label>
				<label class="form-check-label mr-5">
					<input class="form-check-input" type="radio" name="have_your_expectations_regarding_the_course_been_met" value="Não foi atendida">
					Não foi atendida
				</label>
			</div>
		</div>

		<div class="form-group">
			<span class="input">
				<input class="input_field" type="text" name="in_what_exactly_has_cetcc_helped_you" maxlength="4096">
				<label class="input_label">
					<span class="input__label-content"><h6> No que exatamente o CETCC já te ajudou?</h6></span>
				</label>
			</span>
		</div>

		<div class="col-md-12 mt-4">
			<span class="input">
				<input class="input_field" type="text" name="is_there_anyone_or_anything_that_influenced" maxlength="4096">
				<label class="input_label">
					<span class="input__label-content"><h6>Existe alguém ou algo que influenciou em sua decisão por procurar o CETCC? Quais:</h6></span>
				</label>
			</span>
		</div>

		<div class="row">
			<div class="col-sm-4 col-xs-12">
				<div class="form-group">
					<h6>Como você considera nosso ensino?</h6>

					<div class="form-check">
						<label class="form-check-label">
							<input class="form-check-input" type="radio" name="how_do_you_consider_our_teaching" value="Excelente">
							Excelente
						</label>
					</div>

					<div class="form-check">
						<label class="form-check-label">
							<input class="form-check-input" type="radio" name="how_do_you_consider_our_teaching" value="Bom">
							Bom
						</label>
					</div>

					<div class="form-check">
						<label class="form-check-label">
							<input class="form-check-input" type="radio" name="how_do_you_consider_our_teaching" value="Normal">
							Normal
						</label>
					</div>

					<div class="form-check">
						<label class="form-check-label">
							<input class="form-check-input" type="radio" name="how_do_you_consider_our_teaching" value="Razoável">
							Razoável
						</label>
					</div>

					<div class="form-check">
						<label class="form-check-label">
							<input class="form-check-input" type="radio" name="how_do_you_consider_our_teaching" value="Ruim">
							Ruim
						</label>
					</div>
				</div>
			</div>
			<div class="col-sm-4 col-xs-12">
				<div class="form-group">
					<h6>Como você considera nosso espaço físico?</h6>

					<div class="form-check">
						<label class="form-check-label">
							<input class="form-check-input" type="radio" name="how_do_you_consider_our_physical_space" value="Excelente">
							Excelente
						</label>
					</div>

					<div class="form-check">
						<label class="form-check-label">
							<input class="form-check-input" type="radio" name="how_do_you_consider_our_physical_space" value="Bom">
							Bom
						</label>
					</div>

					<div class="form-check">
						<label class="form-check-label">
							<input class="form-check-input" type="radio" name="how_do_you_consider_our_physical_space" value="Normal">
							Normal
						</label>
					</div>

					<div class="form-check">
						<label class="form-check-label">
							<input class="form-check-input" type="radio" name="how_do_you_consider_our_physical_space" value="Razoável">
							Razoável
						</label>
					</div>

					<div class="form-check">
						<label class="form-check-label">
							<input class="form-check-input" type="radio" name="how_do_you_consider_our_physical_space" value="Ruim">
							Ruim
						</label>
					</div>
				</div>
			</div>
			<div class="col-sm-4 col-xs-12">
				<div class="form-group">
					<h6>Como você considera a cordialidade de nosso atendimento?</h6>

					<div class="form-check">
						<label class="form-check-label">
							<input class="form-check-input" type="radio" name="how_do_you_consider_the_friendliness_of_our_service" value="Excelente">
							Excelente
						</label>
					</div>

					<div class="form-check">
						<label class="form-check-label">
							<input class="form-check-input" type="radio" name="how_do_you_consider_the_friendliness_of_our_service" value="Bom">
							Bom
						</label>
					</div>

					<div class="form-check">
						<label class="form-check-label">
							<input class="form-check-input" type="radio" name="how_do_you_consider_the_friendliness_of_our_service" value="Normal">
							Normal
						</label>
					</div>

					<div class="form-check">
						<label class="form-check-label">
							<input class="form-check-input" type="radio" name="how_do_you_consider_the_friendliness_of_our_service" value="Razoável">
							Razoável
						</label>
					</div>

					<div class="form-check">
						<label class="form-check-label">
							<input class="form-check-input" type="radio" name="how_do_you_consider_the_friendliness_of_our_service" value="Ruim">
							Ruim
						</label>
					</div>
				</div>
			</div>
		</div>

		<div class="form-group">
			<h6>O que considera positivo em nossa instituição?</h6>

			<div class="form-check">
				<label class="form-check-label">
					<input class="form-check-input" type="checkbox" name="what_do_you_consider_positive_in_our_institution[]" value="Nível de Ensino">
					Nível de Ensino
				</label>
			</div>

			<div class="form-check">
				<label class="form-check-label">
					<input class="form-check-input" type="checkbox" name="what_do_you_consider_positive_in_our_institution[]" value="Professores">
					Professores
				</label>
			</div>

			<div class="form-check">
				<label class="form-check-label">
					<input class="form-check-input" type="checkbox" name="what_do_you_consider_positive_in_our_institution[]" value="Material Didático">
					Material Didático
				</label>
			</div>

			<div class="form-check">
				<label class="form-check-label">
					<input class="form-check-input" type="checkbox" name="what_do_you_consider_positive_in_our_institution[]" value="Espaço Físico">
					Espaço Físico
				</label>
			</div>

			<div class="form-check">
				<label class="form-check-label">
					<input class="form-check-input" type="checkbox" name="what_do_you_consider_positive_in_our_institution[]" value="Coffee Break">
					Coffee Break
				</label>
			</div>

			<div class="form-check">
				<label class="form-check-label">
					<input class="form-check-input" type="checkbox" name="what_do_you_consider_positive_in_our_institution[]" value="Atendimento da nossa Equipe">
					Atendimento da nossa Equipe
				</label>
			</div>
		</div>
		<div class="row mt-4">
			<div class="col-md-6">
				<span class="input">
					<input class="input_field" type="text" name="what_do_you_consider_negative_in_our_institution" maxlength="4096">
					<label class="input_label">
						<span class="input__label-content"> <h6>O que considera negativo em nossa instituição?</h6></span>
					</label>
				</span>
			</div>
			<div class="col-md-6">
				<span class="input">
					<label class="input_label"><h6>Qual curso ainda não fez e gostaria de fazer?</h6></label>
					<select class="input_field" name="which_course_you_havent_done_yet_and_would_like_to_do">
						<option></option>
						<option>Cursos de Especialização em TCC</option>
						<option>Cursos de Formação em TCC</option>
						<option>Cursos Intensivos de TCC</option>
						<option>Cursos de Formação TCC focada na Criança e no Adolescente</option>
						<option>Cursos de Especialização TCC focada na Criança e no Adolescente</option>
						<option>Cursos de Formação Terapia do Esquema</option>
						<option>Cursos de Especialização Terapia do Esquema</option>
						<option>Cursos de Formação em Neuropsicologia</option>
						<option>Cursos de Especialização em Neuropsicologia</option>
						<option>Cursos de Especialização  Neuropsicopedagogia</option>
						<option>Cursos de Coaching Psicológico - Cognitivo, Comportamental e Positivo</option>
					</select>
				</span>
			</div>
		</div>

		<div class="row mt-4">
			<div class="col-md-12 mt-4">
				<span class="input">
					<input class="input_field" type="text" name="is_there_any_course_you_would_like_us_to_have_in_our_grid" maxlength="4096">
					<label class="input_label">
						<span class="input__label-content"> <h6>Tem algum curso que gostaria que tivesse em nossa grade?</h6></span>
					</label>
				</span>
			</div>
			<div class="col-md-12 mt-4">
				<span class="input">
					<input class="input_field" type="text" name="what_can_we_improve_on" maxlength="4096">
					<label class="input_label">
						<span class="input__label-content"><h6>No que podemos melhorar? Sugestões:</h6> </span>
					</label>
				</span>
			</div>

			<div class="col-md-12 mt-4 form-group">
				<h6>Você recomendaria o CETCC para seus amigos psicólogos?</h6>
				<div class="form-check">
					<label class="form-check-label mr-5">
						<input class="form-check-input" type="radio" name="would_you_recommend_CETCC_to_your_psychologist_friends" value="Sim">
						Sim
					</label>
					<label class="form-check-label mr-5">
						<input class="form-check-input" type="radio" name="would_you_recommend_CETCC_to_your_psychologist_friends" value="Não">
						Não
					</label>
				</div>
			</div>

		</div>

		<hr>
		<div class="row">
			<div class="col-sm-12">
				<h5>Escreva seu depoimento para nosso site</h5>
				<div class="input">
					<label class="input_label">Profissão</label>
					<select class="input_field" name="office">
						<option>Psicólogo</option>
						<option>Psicólogo expecialista em TCC</option>
						<option>Coach</option>
					</select>
				</div>
			</div>

			<div class="col-md-12 mt-4">
				<span class="input">
					<input class="input_field" type="text" name="abstract_pt" maxlength="400">
					<label class="input_label">
						<span class="input__label-content"><h6>Resumo</h6></span>
					</label>
				</span>
			</div>

			<div class="col-lg-12">
				<div class="ibox float-e-margins">
					<div class="ibox-title">
						<h5>Digite o Depoimento</h5>
					</div>

					<div class="ibox-content no-padding">
						<textarea id="text_pt" name="text_pt" class="summernote"></textarea>
					</div>
				</div>
			</div>

			<div class="col-lg-12 mt-4">
				<label class="control-label">Deseja subir uma foto sua? (Essa foto aparecerá em nosso novo site)</label>
				<div class="fileinput fileinput-new input-group" data-provides="fileinput" style="display: flex;">
					<div class="form-control" data-trigger="fileinput">
						<i class="glyphicon glyphicon-file fileinput-exists"></i>
						<span class="fileinput-filename"></span>
					</div>
					<span class="input-group-addon btn btn-default btn-file">
						<span class="fileinput-new">Selecionar</span>
						<span class="fileinput-exists">Alterar</span>
						<input type="file" id="fileImage" name="fileImage" />
					</span>
					<a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remover</a>
				</div>
			</div>

		</div>

		<div class="row">
			<div class="col-sm-12 text-right">
				<p class="add_top_30"><input type="submit" value="Enviar Opinião" class="btn_1 rounded" id="submit-contact"></p>
			</div>
		</div>

	</div>
</form>
	<div class="col-lg-12 mt-4">
		<h6 style="text-align: center">Deixe seu depoimento nas nossas redes sociais</h6>
		<ul class="lgx-social-footer">
			<li><a href="https://www.facebook.com/pg/cetccsp/reviews/?ref=page_internal" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
			{{-- <li><a href="https://www.instagram.com/cetcc/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li> --}}
			{{-- <li><a href="https://twitter.com/Cetcc2" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li> --}}
			{{-- <li><a href="https://www.linkedin.com/company/cetcc/?viewAsMember=true" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li> --}}
			{{-- <li><a href="https://www.youtube.com/channel/UCmJFR__hBVFdlim6I1XyYrA?view_as=subscriber" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a></li> --}}
			<li><a href="https://g.page/cetcc?gm" target="_blank"><i class="fa fa-google" aria-hidden="true"></i></a></li>
		</ul>
	</div>
</div>
@endsection

@section('scripts')
@parent
<script src="https://use.fontawesome.com/3c5a60a2bf.js"></script>
<!-- SUMMERNOTE -->
<script src="{!! asset('js/plugins/summernote/summernote.min.js') !!}" type="text/javascript"></script>
<script src="{!! asset('js/plugins/jasny/jasny-bootstrap.min.js') !!}" type="text/javascript"></script>
<script src="{!! asset('js/plugins/dropzone/dropzone.js') !!}" type="text/javascript"></script>

<!-- Mainly scripts -->
<script src="{!! asset('js/plugins/metisMenu/jquery.metisMenu.js') !!}" type="text/javascript"></script>
<script src="{!! asset('js/plugins/slimscroll/jquery.slimscroll.min.js') !!}" type="text/javascript"></script>

<script>
	Dropzone.options.dropzoneForm = {
		paramName: "file", // The name that will be used to transfer the file
		maxFilesize: 2, // MB
		dictDefaultMessage: "<strong>Drop files here or click to upload. </strong></br> (This is just a demo dropzone. Selected files are not actually uploaded.)"
	};

	$(document).ready(function() {
		$('.summernote').summernote({
			height: '100px'
		});
	});
</script>
@endsection
