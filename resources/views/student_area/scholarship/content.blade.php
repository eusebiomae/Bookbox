@extends('student_area.layouts.app')

@section('title', $title)

@section('css')
<link rel="stylesheet" href="{!! asset('css/plugins/iCheck/custom.css')!!}" >
<link rel="stylesheet" href="{!! asset('css/animate.css') !!}">
@endsection

@section('content')
	@if(!empty($view))
		<div id = "caseAvaliation"></div>
		@include($view)
	@else
		<div class="wrapper wrapper-content animated fadeInRight">
			<div class="ibox float-e-margins">
				<div class="ibox-title"><h5>Visualização da Prova de Proficiência</h5></div>

				<div class="ibox-content">
					<div class="tabs-container">
						<div id = "divProof"></div>
					</div>
				</div>
			</div>
		</div>
	@endif
@endsection

@section('scripts')
@parent

	<script src="{!! asset('js/viewAvaliation.js') !!}"></script>
	<script>
		var payload = @json($payload);

		$(document).ready(function(){
			if(payload && payload.scholarship){
				var avaliation = payload.scholarship.avaliation;
				content = `<div class="wrapper wrapper-content animated fadeInRight">
										<div class="ibox float-e-margins">
											<div class="ibox-title"><h5>${ avaliation.title }</h5></div>

											<div class="ibox-content">
												${ avaliation.description }
												<p><strong>Prova para a bolsa:</strong> "${ payload.scholarship.title }"</p>
												<p><strong>${ avaliation.question.length } questões - Duração: ${ avaliation.duration }</strong></p>
												<p><strong>OBS.:</strong> Esta avaliação só poderá ser feita até ${ payload.scholarship.exam_deadline }</p>`;

												if(payload.avaliation_student){
													content += '<p><span class = "badge badge-danger">Você já fez esta prova!</span></p><a class = "btn btn-primary" href = "/student_area/scholarship">Voltar</a>';
												}else if(Date(payload.scholarship.endDate) < Date()){
													content += '<button class = "btn btn-danger" type = "button" disabled>Prazo Esgotado!</button>';
												}else{
													content += '<button class = "btn btn-primary" type = "button" onclick = "openAvaliation()">Iniciar a avaliação!</button>';
												}

				content += `
											</div>
										</div>
									</div>`;

				$('#caseAvaliation').append(content);
			}

			if(!payload.avaliation && !payload.openScholarships){
				AjaxViewAvaliation('/student_area/avaliation/student/0/' + payload.avaliation_id + '/' + payload.student_id, '#divProof');
			}
		});

		function openAvaliation(){
			var avaliationId = payload.avaliation_id;
			var studentId = payload.student_id;

			$.ajax({
				url: '/student_area/avaliation/evaluated/' + avaliationId + '/' + studentId,
				type: 'get',
				success: function(data){
					if(!data){
						return $.ajax({
							url: '/student_area/avaliation/' + avaliationId,
							method: 'get',
						}).then(function(resp) {
							initAvaliation(resp, {
								student_id: payload.student_id,
							});
						});
					}else{
						window.location.href = '/student_area/scholarship/viewProofProficiency/' + avaliationId;
					}
				}
			});
		}

		document.addEventListener('avaliation:finalized', function(event) {
			var detail = event.detail
			console.log(detail);

			if (detail.avaliationId) {
				window.location.href = '/student_area/scholarship/viewProofProficiency/' + detail.avaliationId
			}
		})
	</script>

@endsection
