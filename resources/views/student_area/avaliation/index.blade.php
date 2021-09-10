<style>
	.swal2-container {
		z-index: 99999;
	}
</style>

<!-- Wrapper-->
<div id="avaliationBackdrop" class="remove" style="position: fixed;top: 0;right: 0;bottom: 0;left: 0;z-index: 2005;background-color: #000;opacity: .7;"></div>
<div id="wrapperAvaliation" class="remove" style="position: absolute; top: 5px; left: 0; right: 0; z-index: 2006">
	<div style="margin: 0 auto; width: 90%;">
		{{-- <h1>{{ $avaliation->id }}</h1> --}}
		<!-- Page wraper -->
		<div class="gray-bg" style="min-height: 100vh">
			<h3 class="p-sm" style="font-size: 2em; font-weight: bold;">
				Tempo de Avaliação: <span id="durationTime"></span>
			</h3>

			<!-- Navbar -->
			<div class="row white-bg border-bottom" style="margin: auto">
				<div class="col-sm-12">
					<ul id="pagination" class="pagination justify-content-end">
						<li class="page-item px-3 align-self-center" data-question-back>
							<a class="" href="#" tabindex="-1" aria-disabled="true" onclick="backQuestion()">
								<i class="fa fa-arrow-left"></i>
							</a>
						</li>

						<li class="page-item px-3" data-question-next>
							<a class="" href="#" onclick="nextQuestion()">
								<i class="fa fa-arrow-right"></i>
							</a>
						</li>
					</ul>
				</div>
			</div>

			<!-- Main view  -->
			<div id="content" class="m-0 ">
				<!-- CONTEUDO PRINCIPAL -->

				<div class="row p-lg m-t-md m-b-md">
					<!-- CONTEUDO  -->
					<div class="col-12">
						<form name="avaliation" class="m-t-lg" method="POST" enctype="multipart/form-data" onsubmit="onSubmitAvaliation(event)">
							<input type="hidden" name="student_id">
							<input type="hidden" name="order_id">
							<input type="hidden" name="classes_id">
							<input type="hidden" name="avaliation_id">

							<div class="ibox-content">
								<small id="avaliationPreTitle"></small>
								<h3 id="avaliationTitle"></h3>
								<div id="avaliationDesc"></div>

								<div id="questions" class="border p-4 m-t-md m-b-md p-md bg-white" style="border:1px solid rgb(218, 218, 218); border-radius:10px;"></div>

								<div id="beforeNext" class="row text-right">
									<button type="button" class="btn btn-info" onclick="backQuestion()">
										<i class="fa fa-arrow-left"></i> Anterior
									</button>

									<button type="button" class="btn btn-info" onclick="nextQuestion()">
										Próximo <i class="fa fa-arrow-right"></i>
									</button>
								</div>
							</div>

							<div class="row p-md text-left">
								<button type="submit" class="btn btn-w-m btn-danger">Finalizar</button>
							</div>
						</form>
					</div>
				</div>
			</div>

		</div>
		<!-- End page wrapper-->
	</div>
</div>

@section('scripts')
@parent

<script type="text/x-dot-template" id="tmplQuestion">
	<section class="form-group text-left" data-question="@{{= it.indx ?? '' }}" data-flg-type="@{{= it.flgType ?? '' }}" >
		<label class="m-b-md"><b>@{{= it.count ?? '' }} - </b> @{{= it.title ?? '' }}<br>@{{= it.description ?? '' }}</label>
		<div id="toTmplAlternative_@{{= it.id ?? '' }}"></div>
	</section>
</script>

<script type="text/x-dot-template" id="tmplAlternative_1">
	<label class="row" style="display: inherit;">
		<div class="col-sm-12">
			<textarea class="text-response" name="response[@{{= it.question_id }}]" rows="10" style="width:100%"></textarea>
		</div>
	</label>
</script>

<script type="text/x-dot-template" id="tmplAlternative_2">
	<label class="row" style="display: inherit;">
		<div class="col-sm-1">
			<div class="i-checks">
				<input type="radio" name="alternative[@{{= it.question_id }}]" value="@{{= it.id }}">
			</div>
		</div>
		<div class="col-sm-11">@{{= it.title }}</div>
	</label>
</script>

<script type="text/x-dot-template" id="tmplAlternative_3">
	<label class="row" style="display: inherit;">
		<div class="col-sm-1">
			<div class="i-checks">
				<input type="checkbox" name="alternative[@{{= it.question_id }}][]" value="@{{= it.id }}">
			</div>
		</div>
		<div class="col-sm-11">@{{= it.title }}</div>
	</label>
</script>

<script type="text/x-dot-template" id="tmplAlternative_4">
	<label class="row" style="display: inherit;">
		<div class="col-sm-1">
			<div class="i-checks">
				<input type="radio" name="yes_no[@{{= it.question_id }}]" value="1">
			</div>
		</div>
		<div class="col-sm-11">Sim</div>
	</label>
	<label class="row" style="display: inherit;">
		<div class="col-sm-1">
			<div class="i-checks">
				<input type="radio" name="yes_no[@{{= it.question_id }}]" value="0">
			</div>
		</div>
		<div class="col-sm-11">Não</div>
	</label>
</script>

<script type="text/x-dot-template" id="tmplUpload">
	<section class="form-group text-left">
		<label class="row" style="display: inherit;">
			<div class="col-sm-12">
				<input type="file" name="avaliation_file[]"  />
			</div>
		</label>
	</section>
</script>

<!-- End wrapper-->
<script src="{!! asset('sweetalert2/sweetalert2.all.min.js') !!}"></script>

<script type="text/javascript">
	var AppAvaliation = {
		data: null,
		student: [],
		countQuestions: 0,
		countAlert: 0,
		countdownDurationTime: null,
		$elemDurationTime: null,
	}

	function dispatchEventAvaliationFinalized() {
		document.dispatchEvent(new CustomEvent('avaliation:finalized', {
			detail: {
				avaliationId: AppAvaliation.avaliation.id,
			},
		}))
	}

	function questionsNone() {
		$("#questions section.form-group").addClass('pace-inactive');
	}

	// AVANÇO
	function nextQuestion(elem) {
		var $elem = $("#pagination li.active");

		var indx = $elem.data('question') + 1
		if (indx < AppAvaliation.countQuestions) {
			thisQuestion($('#pagination li[data-question="' + indx + '"]'))
		}
	}

	// ANTERIOR
	function backQuestion() {
		// console.log('backQuestion');
		var $elem = $("#pagination li.active");

		var indx = $elem.data('question') - 1
		if (indx > -1) {
			thisQuestion($('#pagination li[data-question="' + indx + '"]'))
		}
	}

	// DISABLE PAGINATION
	function disablePagination() {
		$("#pagination li.active").removeClass('active').addClass('disable')
	}

	// ESTA QUESTÃO
	function thisQuestion(elem) {
		setSuccessClassItem()

		disablePagination()

		$(elem).removeClass('px-3').addClass('px-1')
		$(elem).addClass('active').removeClass('disable');

		questionsNone()

		$('#questions section[data-question="'+ $(elem).data('question') +'"]').removeClass('pace-inactive');
	}

	function setSuccessClassItem() {
		var $liActive = $('#pagination li.active')

		var indx = $liActive.data('question')
		var $questionActive = $('#questions section[data-question="'+ indx +'"]')

		switch ($questionActive.data('flgType')) {
			case 1: {
				if ($questionActive.find('textarea').val()) {
					$liActive.addClass('success').removeClass('px-3')
				}
			} break
			case 2:
			case 3:
			case 4: {
				if ($questionActive.find('input:checked').length) {
					$liActive.addClass('success').removeClass('px-3')
				}
			} break;
		}
	}

	function setTmplUpload(avaliation) {
		setTmplInsertAdjacentHTML({
			data: {
				avaliation: avaliation,
			},
			tmpl: 'tmplUpload',
			toTmpl: 'questions',
		})
	}

	function setTmplAlternative_1(idQuestion, alternatives, question) {
		toTmpl = 'toTmplAlternative_' + idQuestion

		setTmplInsertAdjacentHTML({
			data: {
				id: idQuestion,
				title: question.title,
				question_id: question.id,
			},
			tmpl: 'tmplAlternative_1',
			toTmpl: toTmpl,
		})
	}

	function setTmplAlternative_2(idQuestion, alternatives) {
		alternatives.forEach(function(item) {
			if (item.flg_type != 2) return

			toTmpl = 'toTmplAlternative_' + idQuestion

			setTmplInsertAdjacentHTML({
				data: {
					id: item.id,
					title: item.title,
					question_id: item.question_id,
				},
				tmpl: 'tmplAlternative_2',
				toTmpl: toTmpl,
			})
		})
	}

	function setTmplAlternative_3(idQuestion, alternatives) {
		alternatives.forEach(function(item) {
			if (item.flg_type != 3) return

			toTmpl = 'toTmplAlternative_' + idQuestion

			setTmplInsertAdjacentHTML({
				data: {
					id: item.id,
					title: item.title,
					question_id: item.question_id,
				},
				tmpl: 'tmplAlternative_3',
				toTmpl: toTmpl,
			})
		})
	}

	function setTmplAlternative_4(idQuestion, alternatives) {
		alternatives.forEach(function(item) {
			if (item.flg_type != 4) return

			toTmpl = 'toTmplAlternative_' + idQuestion

			setTmplInsertAdjacentHTML({
				data: {
					id: item.id,
					title: item.title,
					question_id: item.question_id,
				},
				tmpl: 'tmplAlternative_4',
				toTmpl: toTmpl,
			})
		})
	}

	function showMsgFinalize() {
		Swal.fire({
			icon: "success",
			title: 'Prova finalizada com sucesso!',
			text: '',
		}).then(function() {
			dispatchEventAvaliationFinalized()
		})
	}

	function finalizeProof(showMsg = true) {
		$('body').off('mouseleave', onMouseLeave)
		$('#avaliationBackdrop, #wrapperAvaliation').addClass('remove')

		AppAvaliation.countdownDurationTime.stopCountdown()

		var $formAvaliation = $('form[name="avaliation"]')
		showLoading()

		return $.ajax({
			url: '/student_area/avaliation/finalize',
			type: 'POST',
			data:  new FormData($formAvaliation[0]),
			cache: false,
			contentType: false,
			processData: false,
		}).then(function(resp) {
			(typeof getModuleClasses == 'function') && getModuleClasses(APP.order.id, $formAvaliation.find('[name="classes_id"]').val())
			(typeof getNextClassesRelease == 'function') && getNextClassesRelease(APP.order.id)
			(typeof eventCloseVideoLesson == 'function') && eventCloseVideoLesson()

			hideLoading()
			if (showMsg) {
				showMsgFinalize()
			}

		}).catch(hideLoading)
	}

	function updateSuccessClassItemByQuestion() {
		var $liQuestion = $('#pagination li[data-question]')

		$('#questions section').each(function(indx, elem) {
			if ($(elem).find('[name^="alternative"]:checked').length) {
				$($liQuestion[indx]).addClass('success').removeClass('px-3')
			}
		})
	}

	function delay(callback, ms) {
		var timer = 0;
		return function() {
			var context = this, args = arguments;
			clearTimeout(timer);
			timer = setTimeout(function () {
				callback.apply(context, args);
			}, ms || 0);
		};
	}

	function initAvaliation(data, params) {
		$('#avaliationBackdrop, #wrapperAvaliation').removeClass('remove')
		$( "body" ).append($('#avaliationBackdrop'))
		$( "body" ).append($('#wrapperAvaliation'))

		AppAvaliation.$elemDurationTime = $('#durationTime')

		Object.assign(AppAvaliation, data)

		var formAvaliation = $('form[name="avaliation"]')

		if (params) {
			formAvaliation.find('[name="student_id"]').val(params.student_id)
			formAvaliation.find('[name="order_id"]').val(params.order_id)
			formAvaliation.find('[name="classes_id"]').val(params.classes_id)
		}

		formAvaliation.find('[name="avaliation_id"]').val(data.avaliation.id)

		$('#pagination li[data-question]').remove()

		AppAvaliation.countQuestions = AppAvaliation.avaliation.question.length;
		for (var i = 0; i < AppAvaliation.countQuestions; i++) {
			$('<li class="page-item mx-1" data-question="' + i + '" onclick="thisQuestion(this)"><a class="" href="#">' + (i + 1) + '</a></li>').insertBefore('#pagination li[data-question-next]');
		}

		$('#avaliationPreTitle').text(AppAvaliation.avaliation.category?.description_pt ?? '')
		$('#avaliationTitle').text(AppAvaliation.avaliation.title)
		$('#avaliationDesc').html(AppAvaliation.avaliation.description)

		$('#questions').empty()

		if ([ 4, 5 ].includes(+AppAvaliation.avaliation.avaliation_type_id)) {
			setTmplUpload(AppAvaliation.avaliation)
			$('#pagination, #beforeNext').addClass('hide')
		} else {
			$('#pagination, #beforeNext').removeClass('hide')

			AppAvaliation.avaliation.question.forEach(function(question, questionIndex) {
				setTmplInsertAdjacentHTML({
					data: {
						indx: questionIndex,
						count: questionIndex + 1,
						id: question.id,
						title: question.title,
						description: question.description,
						flgType: question.flg_type,
					},
					tmpl: 'tmplQuestion',
					toTmpl: 'questions',
				})

				window['setTmplAlternative_' + question.flg_type](question.id, question.alternative, question)
			})

			AppAvaliation.student && AppAvaliation.student.forEach(function(item) {
				$('#questions input[name="alternative['+ item.question_id +']"][value="'+ item.alternative_id +'"]').prop('checked', true)
			})

			if ($('#questions .i-checks').iCheck) {
				$('#questions .i-checks').iCheck({
					checkboxClass: 'icheckbox_square-green',
					radioClass: 'iradio_square-green',
				})
			}

			updateSuccessClassItemByQuestion()

			questionsNone()

			$("#questions section.form-group:first").removeClass('pace-inactive');
			$('#pagination li[data-question="0"]').addClass('active');
			$('#pagination li[data-question="0"]').removeClass('px-3');

			$('body').on('mouseleave', onMouseLeave)

			AppAvaliation.countdownDurationTime = startCountdown(AppAvaliation.avaliation.duration_time, AppAvaliation.$elemDurationTime)

			// $("#questions").on('ifChecked', '.i-checks input', function (e) {
				// console.log(e);
				// return axios({
				// 	url: '/student_area/order/setAnswer',
				// 	method: 'post',
				// 	data: e.target.name + '=' + e.target.value
				// }).then(function(resp) {
				// 	console.info(resp)
				// })
			// });
		}

		// $('.text-response').keyup(delay(function (e) {
		// 	return axios({
		// 		url: '/student_area/avaliation/setAnswer',
		// 		method: 'post',
		// 		data: e.target.name + '=' + e.target.value,
		// 	}).then(function(resp) {
		// 		console.info(resp)
		// 	})
		// }, 5000));

	}

	function onMouseLeave() {
		return
		if (AppAvaliation.countAlert > 9) {
			finalizeProof(false)
			Swal.fire({
				icon: "warning",
				title: 'Limite de alertas excedido',
				text: `Infelizmente não será mais possível continuar sua avaliação pois ultrapassou a quantidade de alerta permitido.
							Clique no botão FINALIZAR abaixo para salvar seu progresso até o momento.`,
				closeOnConfirm: true,
				confirmButtonColor: "#23c6c8",
				cancelButtonColor: "#DD6B55",
				confirmButtonText: "Finalizar",
			}).then(function(ret) {
				showMsgFinalize()
			})
		} else {
			$('body').off('mouseleave', onMouseLeave)

			Swal.fire({
				icon: 'warning',
				title: '<div><h1 id="countAlert"></h1><br>Não é permitido sair desta tela durante a avaliação!</div>',
				text: `Para seu melhor desempenho se concentre e mantenha sua mente livre de distrações.
								CLIQUE em VOLTAR dentro do tempo limite ou sua avaliação será FINALIZADA.
							Ah, vale resaltar que esse alerta só aparecerá 10 VEZES, após esse limite sua avaliação será finalizada.`,
				closeOnConfirm: false,
				confirmButtonColor: "#23c6c8",
				cancelButtonColor: "#DD6B55",
				confirmButtonText: "Voltar",
			}).then(function(ret) {
				$('body').on('mouseleave', onMouseLeave)
				alertOutCountdownScope.stopCountdown()
			})

			var timestartAlert = $("#countAlert");
			var alertOutCountdownScope = startCountdown(30, timestartAlert)

			AppAvaliation.countAlert++
		}
	}

	function onSubmitAvaliation(event) {
		event.preventDefault()
		Swal.fire({
			icon: "warning",
			title: 'Confirma que deseja finalizar a prova agora? ',
			showCancelButton: true,
			closeOnConfirm: false,
			confirmButtonColor: "#23c6c8",
			cancelButtonColor: "#DD6B55",
			cancelButtonText: "Não",
			confirmButtonText: "Sim",
		}).then(function(ret) {
			if (ret.value) {
				finalizeProof()
			}
		})
	}

	function startCountdown(tempo, element) {
		var setTimeoutIndx = null

		function exec() {
			// Se o tempo não for zerado
			if((tempo - 1) >= 0) {

				// Pega a parte inteira dos minutos
				var hor = parseInt(tempo / 3600);
				var min = tempo % 3600;
				var seg = min % 60;
				min = parseInt(min / 60);

				// Formata o número menor que dez, ex: 08, 07, ...
				hor = (hor < 10) ? ("0" + hor).slice(0, 2) : hor
				min = (min < 10) ? ("0" + min).slice(0, 2) : min
				seg = (seg < 10) ? ("0" + seg).slice(0, 2) : seg

				// Cria a variável para formatar no estilo hora/cronômetro
				horaImprimivel = hor + ':' + min + ':' + seg;

				//JQuery pra setar o valor
				element.html(horaImprimivel);

				// Define que a função será executada novamente em 1000ms = 1 segundo
				setTimeoutIndx = setTimeout(exec, 1000, --tempo, element);

			// Quando o contador chegar a zero faz esta ação
			} else {
				finalizeProof(false)
				Swal.fire({
					icon: "warning",
					title: 'Tempo Esgotado.',
					text: `Infelizmente não será mais possível continuar sua avaliação.
								Clique no botão FINALIZAR abaixo para salvar seu progresso até o momento.`,
					closeOnConfirm: true,
					confirmButtonColor: "#23c6c8",
					cancelButtonColor: "#DD6B55",
					confirmButtonText: "Finalizar",
				}).then(function(ret) {
					showMsgFinalize()
				})
			}
		}

		exec()

		return {
			stopCountdown: function() {
				// console.log('stopCountdown:', setTimeoutIndx, tempo, element);
				clearTimeout(setTimeoutIndx)
			}
		}
	}

</script>

@endsection
