<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="url" content="http://www.cetcc.com.br" />
	<meta name="company" content="Centro de Estudo em Terapia Cognitivo-Comportamental - São Paulo/SP" />
	<!--palavras chaves para pesquisas (google, bing, yahoo, etc.)-->
	<meta name="keywords" content="CETCC, psicologia, terapia comportamental, tcc, Terapia Cognitivo Comportamental, escola, são paulo, escola são paulo, pós-graduacao, especialização, psicólogo, beck, tcc do beck, especilização São Paulo">
	<!--Indica o que se trata o site, decrição do site, qual o assunto relacionado -->
	<meta name="description" content="O CETCC é a Escola de Pós-graduac'~ao em Terapia Cognitivo-comportamental de Beck que mais forma especialistas na abordagem, atualmente.">
	<!-- Indexar a página e todos os links nela contida -->
	<meta name="Robots" content="index, follow">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="GigaPixel -  Design & Technology">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!-- Favicons-->
	<link rel="shortcut icon" href="{!! asset('cetcc/img/logo_small.png') !!}" type="image/x-icon">
	<link rel="apple-touch-icon" type="image/x-icon" href="{!! asset('cetcc/img/logo_small.png') !!}">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="{!! asset('cetcc/img/logo_small.png') !!}">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="{!! asset('cetcc/img/logo_small.png') !!}">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="{!! asset('cetcc/img/logo_small.png') !!}">

	<!-- GOOGLE WEB FONT -->
	{{-- <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800" rel="stylesheet"> --}}

	<!-- BASE CSS -->
	<link href="{!! asset('css/bootstrap.min.css') !!}" rel="stylesheet">
	<link href="{!! asset('cetcc/css/vendors.css') !!}" rel="stylesheet">
	<link href="{!! asset('cetcc/css/icon_fonts/css/all_icons.min.css') !!}" rel="stylesheet">

	<link href="{!! asset('cetcc/layerslider/css/layerslider.css') !!}" rel="stylesheet">
	<link href="{!! asset ('css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css') !!}" rel="stylesheet">

	<link rel="stylesheet" href="{!! asset('css/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') !!}" />
	<link href="{!! asset('css/bootstrap.min-painel.css') !!}" rel="stylesheet">
	<link href="{!! asset('font-awesome/css/font-awesome.css') !!}" rel="stylesheet">
	<link href="{!! asset('css/plugins/iCheck/custom.css') !!}" rel="stylesheet">
	<link href="{!! asset('css/plugins/steps/jquery.steps.css') !!}" rel="stylesheet">
	<link href="{!! asset('css/animate-painel.css') !!}" rel="stylesheet">
	<link href="{!! asset('css/plugins/datapicker/datepicker3.css') !!}" rel="stylesheet">
	<link href="{!! asset('css/plugins/jasny/jasny-bootstrap.min.css')!!}" rel="stylesheet">
	<link href="{!! asset('css/plugins/switchery/switchery.css')!!}" rel="stylesheet">
	<link href="{!! asset('css/style-painel.css')!!}" rel="stylesheet">
	<!-- YOUR CUSTOM CSS -->
	<link href="{!! asset('cetcc/css/style.css') !!}" rel="stylesheet">
	<link href="{!! asset('cetcc/css/custom.css') !!}" rel="stylesheet">

	<title>CETCC - Login </title>
	<style>
		button[disabled] {
			background: #ccc;
			cursor: no-drop;
		}

		button[disabled]:hover {
			background: #ccc;
		}
	</style>
</head>

<body id="login_bg">

	<div style="width: 100%; height: 100vh; background: #000; opacity: .5"></div>

	<nav id="menu" class="fake_menu"></nav>

	{{-- <div id="preloader">
		<div data-loader="circle-side"></div>
	</div> --}}
	<!-- End Preload -->
	<div id="login">
		<div id="phrase" class="gp-login-float d-flex align-items-end"></div>
		<aside>
			<figure>
				<a href="index.html"><img src="/cetcc/img/logo_small.png" width="149" data-retina="true" alt=""></a>
			</figure>

			<form name="formLogin" action="login" method="POST">
				{{ csrf_field() }}

				<div class="form-group mt-5">
					<label>
						CPF ou E-mail
					</label>
					<input class="form-control required gp-genero" type="text" autocomplete="off" name="identification" maxlength="255" required onkeyup="validEmailCPF(event, document.forms.formLogin)">
				</div>
				<div class="form-group">
					<span class="input">
						<label>
							Senha
						</label>
						<input class="form-control required gp-genero" type="password" autocomplete="new-password" name="password" maxlength="32" required>
					</span>
					<small><a href="javascript:formReset()">Esqueci minha senha</a></small>
				</div>
				@if (isset($payload['other_inf']))
					@foreach ($payload['other_inf'] as $item)
						<div class="alert alert-warning">
							<b>{{$item->title}}</b><br>
							{!!$item->description!!}
						</div>
					@endforeach
				@endif

				@if (old('codeResponse') == 400)
				<div class="alert alert-danger alert-dismissable">
					<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
					Usuário ou senha incorreto!
				</div>
				@endif

				<button type="submit" class="btn_1 rounded full-width add_top_60">Login</button>
				<div class="text-center add_top_10"><strong><a href="javascript:newAccount()">Criar uma conta</a></strong></div>
			</form>

			<form name="formRegister" action="/student_area/login/register" method="POST" style="display:none;">
				{{ csrf_field() }}
				<div id="wizard">
					<h1>Passo</h1>
					<div class="step-content ">
						<div class="form-group">
							<input type="hidden" name="id">
							<div class="col-sm-12 m-t-xs">
								<label>
									Nome*
								</label>
								<input class="form-control required" type="text" autocomplete="off" name="name" maxlength="128">
							</div>
							<div class="col-sm-12 m-t-xs">
								<label>
									E-mail*
								</label>
								<input class="form-control required" type="email" autocomplete="off" name="email" maxlength="255">
							</div>
							<div class="col-sm-12 m-t-xs">
								<label>
									CPF*
								</label>
								<input class="form-control required mask-cpf" type="text" data-mask="999.999.999-99" autocomplete="off" name="cpf">
							</div>
							<div class="col-sm-12 m-t-xs">
								<label>
									RG
								</label>
								<input type="text" name="rg" class="form-control mask-rg" onkeyup="this.value = this.value.toUpperCase();">
							</div>
							<div class="col-sm-12 m-t-xs">
								<div class="">
									<label>Genero*</label><br>
									<div class="btn-group btn-group-toggle" data-toggle="buttons">
										<label class="btn btn-white gp-genero">
											<input type="radio" name="gender" value="male"><small>Masculino</small>
										</label>
										<label class="btn btn-white gp-genero">
											<input type="radio" name="gender" value="feminine">  <small>Feminino</small>
										</label>
										<label class="btn btn-white gp-genero">
											<input type="radio" name="gender" value="others"> <small>Outros</small>
										</label>
									</div>
								</div>
							</div>
							<div class="col-sm-12 m-t-xs">
								<label>
									Senha*
								</label>
								<input class="form-control required" type="password" autocomplete="new-password" name="password" maxlength="32" required>
							</div>
							<div class="col-sm-12 m-t-xs">
								<label>
									Confirmar Senha*
								</label>
								<input class="form-control required" type="password" autocomplete="new-password" name="confirmPassword" maxlength="32" required>
							</div>
							<div class="col-sm-12 m-t-xs">
								<label>
									Telefone*
								</label>
								<input class="form-control required mask-phone" type="text" autocomplete="off" name="phone">
							</div>
							<div class="col-sm-12 m-t-xs">
								<label>
									Celular*
								</label>
								<input class="form-control required mask-cell" type="text" autocomplete="off" name="cell_phone">
							</div>
							<div class="col-sm-12 m-t-xs m-b-md">
								<label class="">Data de Nasc.*</label>
								<div class="input-group date">
									<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
									<input type="text" name="birth_date" class="form-control required" required readonly>
								</div>
							</div>
						</div>
					</div>
					<h1>Passo</h1>
					<div class="step-content ">
						<div class="form-group">
							<div class="col-sm-6 m-t-xs">
								<label>
									CEP*
								</label>
								<input class="form-control required mask-cep" type="text" autocomplete="off" name="zip_code" maxlength="10">
							</div>
							<div class="col-sm-6 m-t-xs m-b-md">
								<label>
									Estado*
								</label>
								<select class="form-control required" type="text" autocomplete="off" name="state_id"></select>
							</div>
							<div class="col-sm-6 m-t-xs">
								<label>
									Cidade*
								</label>
								<input class="form-control required" type="text" autocomplete="off" name="city" maxlength="45" required>
							</div>
							<div class="col-sm-6 m-t-xs">
								<label>
									Endereço*
								</label>
								<input class="form-control required" type="text" autocomplete="off" name="address" maxlength="450" required>
							</div>
							<div class="col-sm-6 m-t-xs">
								<label>
									Bairro*
								</label>
								<input type="text" name="neighborhood " class="form-control required" maxlength="450" autofocus required placeholder="">
							</div>
							<div class="col-sm-6 m-t-xs">
								<label>
									Nº*
								</label>
								<input type="number" name="n" class="form-control required" maxlength="32" autofocus required placeholder="">
							</div>
							<div class="col-sm-12 m-t-xs">
								<label>
									Complemento
								</label>
								<input type="text" name="complement" class="form-control" maxlength="32" autofocus placeholder="">
							</div>
							<div class="col-sm-12 m-t-xs">
								<label>Formação em Psicologia?</label><br />
								<input type="checkbox" class="js-switch" onchange="document.getElementById('formation').style.display = this.checked ? 'none' : null" checked/>

								<div id="formation" style="display:none;">
									<label>Qual sua Formação?*</label><br />
									<input  name="formation" type="text" class="form-control required mt-3" required>
								</div>
							</div>
							<div class="col-sm-12 m-t-sm">
								<label>
									Experiência com TCC?
								</label>
								<input type="checkbox" name="tcc_experience" class="js-switch_2" value="1" />
							</div>
							<div class="col-sm-12 m-t-xs m-b-md">
								<label>
									Mais Informação
								</label>
								<textarea name="more_information" class="form-control" id="plus_information" rows="4"></textarea>
							</div>
						</div>
					</div>
				</div>
				@if (old('codeResponse') == 402)
				<div class="alert alert-danger alert-dismissable">
					<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
					Erro! Usuário já cadastrado.
				</div>
				@endif
				<div class="text-center add_top_10"><strong><a href="javascript:formLogin()">Já tem uma conta? </a></strong></div>
			</form>

			@include('student_area.components.formReset')

			<form name="formResetPassword" action="/student_area/login/resetPassword" method="POST" style="display:none;">
				{{ csrf_field() }}
				<input type="hidden" id="resetPasswordCode" name="resetPasswordCode">
				<div class="form-group mt-5">
					<span class="input">
						<input class="form-control required gp-genero" type="password" autocomplete="off" name="password" maxlength="255">
						<label>
							Senha
						</label>
					</span>

					<span class="input">
						<input class="form-control required gp-genero" type="password" autocomplete="off" name="password2" maxlength="255">
						<label>
							Confirmar Senha
						</label>
					</span>
				</div>
				<div class="alert alert-warning">
					<b>Dicas para sempre acessar sua conta:</b><br>
					1 - Use uma senha que contenha caracteres alfanuméricos, letras maiúscula e caracteres especiais.<br>
					2 - Use uma senha segura e que seja fácil relembrar.<br>
					3 - Marque sua senha em um lugar seguro caso precise no futuro.<br>
				</div>
				<button type="submit" name="btnReset" class="btn_1 rounded full-width add_top_60" disabled>Salvar</button>
				<div class="text-center add_top_10"><strong><a href="javascript:formLogin()">Voltar para Login</a></strong></div>
			</form>

			<div id="confMail" style="display: none">
				<h1>Confirmação de E-mail</h1>
				<p>Enviamos um E-mail de confirmação. Verifique na caixa de entrada de seu E-mail e click no botão "Validar E-mail"</p>
				<div class="text-center add_top_10"><strong><a href="javascript:formLogin()">Já tem uma conta? </a></strong></div>

			</div>

			<div class="copy">
				<strong>Copyright</strong> GigaPixel - Design &amp; Technology &copy; 2014 - <?= date('Y'); ?>
			</div>
		</aside>
	</div>
	<!-- /login -->

	<script src="/lib/populateSelectBox.js"></script>
	{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --}}
	<script src="{!! asset('js/jquery-3.1.1.min.js')!!}"></script>

	<script src="{!! asset('js/bootstrap.min-painel.js') !!}"></script>
	{{-- <script src="{!! asset('js/plugins/metisMenu/jquery.metisMenu.js') !!}"></script>
	<script src="{!! asset('js/plugins/slimscroll/jquery.slimscroll.min.js') !!}"></script> --}}
	{{-- <script src="{!! asset('js/inspinia.js') !!}"></script>
	<script src="{!! asset('js/plugins/pace/pace.min.js') !!}"></script> --}}
	{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script> --}}

	<script src="{!! asset('js/plugins/steps/jquery.steps.min.js') !!}"></script>
	<script src="{!! asset('js/plugins/validate/jquery.validate.min.js') !!}"></script>
	<script src="{!! asset('js/plugins/switchery/switchery.js') !!}"></script>
	<script src="{!! asset('js/plugins/datapicker/bootstrap-datepicker.js') !!}"></script>
	{{-- <script src="{!! asset('js/plugins/jasny/jasny-bootstrap.min.js')!!}"></script> --}}
	<script src="{!! asset('js/app.js') !!}" type="text/javascript"></script>
	<script>
		window.Laravel = {!! json_encode([ 'csrfToken' => csrf_token() ]) !!}

		var APP = {
			payload: <?= isset($payload) ? json_encode($payload) : '{}' ?>
		}

		try {
			populateSelectBox({
				list: APP.payload.states,
				target: document.forms.formRegister.state_id,
				columnValue: "id",
				columnLabel: "abbreviation",
				selectBy: [ ],
				emptyOption: {
					label: ""
				}
			})

			$.fn.datepicker.dates['pt-BR'] = {
				days: ["Domingo", "Segunda", "Terça", "Quarta", "Quinta", "Sexta", "Sábado"],
				daysShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
				daysMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S'],
				months: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
				monthsShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
				today: "Hoje",
				clear: "Limpar",
				format: "dd/mm/yyyy",
				titleFormat: "MM yyyy",
				weekStart: 0
			};
		} catch (error) {

		}

		function newAccount() {
			document.forms.formLogin.style.display = 'none'
			document.forms.formRegister.style.display = null
			document.forms.formReset.style.display = 'none'
			document.getElementById('confMail').style.display = 'none'
		}

		function formLogin() {
			document.forms.formLogin.style.display = null
			document.forms.formRegister.style.display = 'none'
			document.forms.formReset.style.display = 'none'
			document.forms.formResetPassword.style.display = 'none'
			document.getElementById('confMail').style.display = 'none'
		}

		function formReset() {
			document.forms.formLogin.style.display = 'none'
			document.forms.formRegister.style.display = 'none'
			document.forms.formReset.style.display = null
			document.getElementById('confMail').style.display = 'none'
		}

		function formConfMail(){
			document.getElementById('confMail').style.display = null
			document.forms.formLogin.style.display = 'none'
			document.forms.formRegister.style.display = 'none'
			document.forms.formReset.style.display = 'none'
		}

		@if (isset($resetPasswordCode))
		document.getElementById('resetPasswordCode').value = '{{ $resetPasswordCode }}'
		document.forms.formLogin.style.display = 'none'
		document.forms.formRegister.style.display = 'none'
		document.forms.formReset.style.display = 'none'
		document.forms.formResetPassword.style.display = null

		var formResetPassword = document.forms.formResetPassword

		formResetPassword.addEventListener('keyup', function(event) {
			if (formResetPassword.password.value && formResetPassword.password2.value && formResetPassword.password.value === formResetPassword.password2.value) {
				formResetPassword.btnReset.removeAttribute('disabled')
			} else {
				formResetPassword.btnReset.setAttribute('disabled', '')
			}
		})
		@endif

		$(document).ready(function() {

			$(document.forms.formRegister).validate({
				errorPlacement: function (error, element) {
					element.before(error);
				},
				rules: {
					confirmPassword: {
						equalTo: "form[name='formRegister'] [name='password']",
					},
				},
				messages: {
					confirmPassword: {
						equalTo: 'Por favor entre com o mesmo valor novamente',
					},
				}
			})

			$("#wizard").steps({
				labels: {
					finish: "Salvar",
					next: "Próximo",
					previous: "Anterior",
				},
			 	onStepChanging: function (event, currentIndex, newIndex) {
					return $(document.forms.formRegister).valid()
				},
				onFinishing: function (event, currentIndex) {
					if ($(document.forms.formRegister).valid()) {
						$(document.forms.formRegister).submit()
					}
				},
			})

			var elem = document.querySelector('.js-switch');
			var switchery = new Switchery(elem, { color: '#007FB8' });

			var elem_2 = document.querySelector('.js-switch_2');
			var switchery_2 = new Switchery(elem_2, { color: '#007FB8' });

			function setDatePicker() {
				$('.input-group.date').datepicker({
					todayBtn: "linked",
					keyboardNavigation: false,
					forceParse: false,
					calendarWeeks: true,
					autoclose: true,
					format: "dd/mm/yyyy",
					endDate: new Date(),
					language: 'pt-BR',
				});
			}
			setDatePicker();

			APP.phraseIndexCurrent = 0
			function updatePhrases() {
				var phrase = APP.payload.phrases[APP.phraseIndexCurrent]
				document.getElementById('phrase').innerHTML = phrase.phrase

				if (++APP.phraseIndexCurrent == APP.payload.phrases.length) {
					APP.phraseIndexCurrent = 0
				}

				document.getElementById('login_bg').style.backgroundImage = 'url('+ phrase.image +')'
			}

			updatePhrases()
			setInterval(updatePhrases, 10000)

			var codeResponse = '{{ old('codeResponse') }}'

			switch (codeResponse) {
				case '401':
				case '201':
					formReset()
					break;
				case '402':
					newAccount()
					break;
				case '202':
					formConfMail()
				break;

			}

			updateInputMask()
		});
	</script>
</body>
</html>
