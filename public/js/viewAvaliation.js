function AjaxViewAvaliation(url, selector){
	return $.ajax({
		method: 'get',
		url: url,
	}).then(function(resp) {
		var conteudo = '';
		var average = '';
		var hasAvaliationFile = false;
		var avaliationQuestion = resp.avaliation_question;
		resp.avaliation_student = resp.avaliation_student ? resp.avaliation_student : false;
		console.log(resp)

		if (resp.avaliation_student.length && resp.avaliation_student) {
			average = resp.avaliation_student[resp.avaliation_student.length - 1].score;
		} else {
			average = avaliationQuestion.reduce((av, itemQ) => av + itemQ.avaliation_student.reduce((av, itemAS) => av + itemAS.score, 0), 0)
		}

		conteudo = `<div class = "panel panel-default">
			<div class = "panel-body" style = "background-color: #ededed">
				<div class = "row" style = "text-align: center; font-size: 18px;">
					<div class = "col-md-8">${resp.title}</div>
					<div class = "col-md-4">Média: ${average}</div>
				</div>
			</div>
		</div>`;

		for (var i = 0; i < avaliationQuestion.length; i++) {
			var avaliationStudent = avaliationQuestion[i].avaliation_student;
			var question = avaliationQuestion[i].question;
			var resposta = '<p><strong>Respostas:</strong></p>';
			var respostaCorreta = '<p><strong>Respostas Corretas:</strong></p>';
			var rightWrong = 0;
			var pointsQuestionStudent = 0;
			var textResponse = '';
			var justification = '';

			for(var c = 0; c < avaliationStudent.length; c++){
				var questionStudent = avaliationStudent[c];
				var student_id = questionStudent.student_id;
				var avaliationStudentId = questionStudent.id;
				rightWrong = questionStudent.right_wrong;

				if (questionStudent.alternative) {
					if(avaliationStudent.length < 2){
						resposta = `<p><strong>Resposta:</strong> ${questionStudent.alternative.title}</p>`;
					}else{
						resposta += `<p><strong>${c+1} (${questionStudent.score == 0 ? 'Errada' : questionStudent.score}):</strong> ${questionStudent.alternative.title}</p>`;
					}
				} else if (questionStudent.text_response) {
					if(avaliationStudent.length < 2){
						resposta = `<p><strong>Resposta:</strong> ${questionStudent.text_response}</p>`;
						textResponse = questionStudent.text_response;
					}else{
						resposta += `<p><strong>${c+1}:</strong> ${questionStudent.text_response}</p>`;
					}
				} else {
					if(avaliationStudent.length < 2){
						resposta = `<p><strong>Resposta:</strong> ${questionStudent.yes_no == 1 ? 'Sim' : 'Não'}</p>`;
					}else{
						resposta += `<p><strong>${c+1}:</strong> ${questionStudent.yes_no == 1 ? 'Sim' : 'Não'}</p>`;
					}
				}

				if (questionStudent.justification) {
					resposta += `<p><strong>Justificativa dada pelo avaliador: </strong></p><p>${questionStudent.justification}</p>`;
					justification = questionStudent.justification;
				}

				pointsQuestionStudent = pointsQuestionStudent + questionStudent.score;
			}

			for(var a = 0; a < question.alternative.length; a++){
				var questionAlternative = question.alternative[a];

				if(question.alternative.length < 2){
					respostaCorreta = `<p><strong>Resposta Correta:</strong>
															${questionAlternative.title && questionAlternative.title != 'Sim / Não' ? questionAlternative.title : (questionAlternative.flg_correct && questionAlternative.flg_correct == 1 ? 'Sim' : 'Não')}
														</p>`;
				}else{
					respostaCorreta += `<p><strong>${a+1}:</strong> ${questionAlternative.title}</p>`;
				}
			}

			if(resp.avaliation_student && (avaliationQuestion.length > 0 && resp.avaliation_student.length > 0)){
				if(i == 0){
					conteudo += '<div class="alert alert-warning text-center" role="alert">Esta avaliação foi feita em outra plataforma!</div>';
				}
			}else{
				conteudo += makeContent({
					lengthAvaliationStudent: avaliationStudent.length,
					rightWrong: rightWrong,
					questionTitle: question.title,
					questionScore: (avaliationQuestion[i].score),
					questionScoreStudent: pointsQuestionStudent,
					studentAnswer: resposta,
					rightAnswer: respostaCorreta,
					questionDescription: question.description,
					counter: i,
					avaliationStudentId: avaliationStudentId ? avaliationStudentId : '',
					average: average,
					textResponse: textResponse ? textResponse : '',
					justification: justification ? justification : '',
					student_id: student_id ? student_id : '',
					lengthAvaliationQuestion: avaliationQuestion.length,
				});
			}
		}

		if(avaliationQuestion.length == 0){
			hasAvaliationFile = true;
			for(b = 0; b < resp.avaliation_student.length; b++){
				conteudo += makeContent({
					lengthAvaliationStudent: resp.avaliation_student.length,
					rightWrong: (resp.avaliation_student[b].right_wrong),
					questionTitle: `Relatório ${b+1}`,
					questionScore: 10,
					questionScoreStudent: resp.avaliation_student[b].score,
					file: resp.avaliation_student[b].avaliation_file,
					justification: resp.avaliation_student[b].justification,
					counter: b,
					lengthAvaliationQuestion: avaliationQuestion.length,
				});
			}
		}

		if (hasAvaliationFile) {
			conteudo += `<section class="form-group text-left">
				<form name="avaliation" class="m-t-lg row" method="POST" enctype="multipart/form-data" onsubmit="submitAvaliationFile(event)">
					<input type="hidden" name="order_id" value="${APP.order.id}">
					<input type="hidden" name="student_id" value="${APP.order.student_id}">
					<input type="hidden" name="classes_id" value="${classesId}">
					<input type="hidden" name="avaliation_id" value="${avaliation.id}">
					<div class="col-sm-9">
						<input type="file" name="avaliation_file[]"  />
					</div>
					<div class="col-sm-3">
						<button type="submit" class="btn btn-block btn-sm btn-danger">Subir arquivo</button>
					</div>
				</form>
			</section>`;
		}

		$(selector).html(conteudo);
	})
}

function makeContent(values){
	var icon = '';
	var color = '';
	var title = '';
	var content = '';
	var currentURL = window.location.href;

	if(values.lengthAvaliationStudent < 1){
		icon = 'fa-ban';
		color = '#a0a0a0';
		title = 'Sem Resposta';
		resposta = '';
	}else{
		if (values.questionScoreStudent == 0 && values.rightWrong != null) {
			icon = 'fa-window-close';
			color = '#ED5565';
			title = 'Incorreto';
		} else if (values.questionScoreStudent == values.questionScore) {
			icon = 'fa-check-square';
			color = '#1AB394';
			title = 'Correto';
		} else if (values.questionScoreStudent > 0 && values.questionScoreStudent < values.questionScore) {
			icon = 'fa-adjust';
			color = '#1C84C6';
			title = 'Parcialmente Correto';
		} else {
			icon = 'fa-eye';
			color = '#F8AC59';
			title = 'Em Revisão';
		}
	}

	content = `
				<div class="btn btn-block btn-default" style="text-align: left; border-color: ${color}" onclick="mostrarConteudo(${values.counter}, ${values.lengthAvaliationQuestion ? values.lengthAvaliationQuestion : values.lengthAvaliationStudent})">
					<div class="row">
						<div class="col-sm-5 text-truncate">${values.questionTitle}</div>
						<div class="col-sm-2">Nota: ${values.questionScore}</div>
						<div class="col-sm-4" style="color: ${color}; font-size: 15px; text-align: right;"> ${title} <i class="fa ${icon}" aria-hidden="true" title="${title}"></i></div>
						<div class="col-sm-1"><i class="fa fa-angle-down" style="float: right" aria-hidden="true" id="setinha${values.counter}"></i></div>
					</div>
				</div>

				<div class="divRespAvaliacao" style="display: none;" id="conteudo${values.counter}">
					<fieldset>
						<legend>Nota: ${values.questionScoreStudent}</legend>`;

						if(values.lengthAvaliationQuestion == 0){
							if(values.justification){
								content += `<p><strong>Justificativa dada pelo avaliador: </strong>${values.justification}</p>`;
							}
							content += `<p>
														<a class="btn btn-default btn-block back-to-top" target="_blank" href="${values.file}">
															<i class="fa fa-file"></i> Ver arquivo!
														</a>
													</p>`;
						}else{
							content += `${values.questionDescription}
													${values.studentAnswer}
													${values.rightAnswer == '<p><strong>Respostas Corretas:</strong></p>' ? '' : values.rightAnswer}`;

							if(currentURL.indexOf("/admin") >= 0 && (title == 'Em Revisão' || values.textResponse)){
								content += `<div class = "row" style = "margin-bottom: 7px;">
															<div class = "col-md-12" style = "padding: 0px; display: none;" id = "divCorrection${values.counter}">
																<form action = "/admin/avaliation_student/save" method = "post" class = "form-row">
																	<input type="hidden" name="_token" value="${ $('meta[name="csrf-token"]').attr('content') }">
																	<input type = "hidden" name = "id" value = "${values.avaliationStudentId}" />
																	<input type = "hidden" name = "scholarship_student_id" value = "${currentURL.replace(/\D/gim, '')}" />
																	<input type = "hidden" name = "student_id" value = "${values.student_id}" />

																	<div class = "form-group col-md-8 col-sm-8 col-xs-12">
																		<textarea class = "form-control" rows = "5" placeholder = "Justifique o porquê está incorreto ou parcialmente correto..." name = "justification">${values.justification}</textarea>
																	</div>

																	<div class = "form-group col-md-4 col-sm-4 col-xs-12">
																		<div class = "row">
																			<div class = "col-sm-12 col-xs-4">
																				<input type = "number" class = "form-control" name = "score" step = "0.01" min = "0" max = "${values.questionScore}" placeholder = "Nota" style = "margin-bottom: 5px;" value = "${values.questionScoreStudent}" required />
																			</div>

																			<div class = "col-sm-12 col-xs-4">
																				<select name = "right_wrong" class = "form-control" style = "margin-bottom: 5px;" required>
																					<option value = "">Selecione...</option>
																					<option value = "1">Correto</option>
																					<option value = "-1">Parcialmente Correto</option>
																					<option value = "0">Incorreto</option>
																				</select>
																			</div>

																			<div class = "col-sm-12 col-xs-4">
																				<input type = "submit" value = "Salvar" class = "btn btn-warning btn-block" />
																			</div>
																		</div>
																	</div>
																</form>
															</div>

															<div class = "col-md-10 col-sm-9 col-xs-0"></div>`

															if(title == 'Em Revisão'){
																content += `<div class = "col-md-2 col-sm-3 col-xs-12">
																							<button type = "button" class = "btn btn-block btn-success" id = "correct${values.counter}" onclick = "enableDivCorrection(${values.counter}, ${values.rightWrong})">
																								Corrigir!
																							</button>
																						</div>
																					</div>`;
															}else{
																content += `<div class = "col-md-2 col-sm-3 col-xs-12">
																							<button type = "button" class = "btn btn-block btn-success" id = "edit${values.counter}" onclick = "enableDivCorrection(${values.counter}, ${values.rightWrong})">
																								Editar!
																							</button>
																						</div>`;
															}
							}
						}

	content += `</fieldset>
				</div>`;

	return content;
}

function mostrarConteudo(cont, qtdQuestoes){
	display_conteudo = $('#conteudo'+cont).css('display');

	for(i=0; i<qtdQuestoes; i++){
		if(i != cont){
			if(display_conteudo == 'none'){
				$('#conteudo'+i).css('display', 'none');
				$('#setinha'+i).removeClass('fa-angle-up').addClass('fa-angle-down');
			}
			if(display_conteudo == ''){
				$('#conteudo'+i).css('display', '');
				$('#setinha'+i).removeClass('fa-angle-down').addClass('fa-angle-up');
			}
		}
	}

	if (display_conteudo == 'none') {
		$('#conteudo'+cont).css('display', '');
		$('#setinha'+cont).removeClass('fa-angle-down').addClass('fa-angle-up');
	} else {
		$('#conteudo'+cont).css('display', 'none');
		$('#setinha'+cont).removeClass('fa-angle-up').addClass('fa-angle-down');
	}
}

function enableDivCorrection(cont, rightWrong){
	if($(`#divCorrection${cont}`).css('display') == 'none'){
		$(`#divCorrection${cont}`).css('display', '');
	}else{
		$(`#divCorrection${cont}`).css('display', 'none');
	}

	$(`#divCorrection${cont} select[name = "right_wrong"]`).val(`${rightWrong}`).prop('selected', true);
}
