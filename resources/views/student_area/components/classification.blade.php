<div class="wrapper wrapper-content animated fadeInRight">
	<div class="ibox float-e-margins">
		<div class="ibox-title"><h5>Classificação na Bolsa "{{ $payload['scholarshipStudent']->scholarship->title }}"</h5></div>

		<div class="ibox-content">
			<div class="tabs-container">
				@php
						if($payload['scholarshipStudent']->scholarship_student_status_id == 3){
							$badgeColor = 'badge-info';
							$content = "<p style = 'margin-top: 5px;'>
														A data de divulgação da 1° chamada e 2° chamada serão, respectivamente, <strong>{$payload['scholarshipStudent']->scholarship->results_release_date}</strong> e <strong>{$payload['scholarshipStudent']->scholarship->results_date_second_call}</strong>. Fique atento ao seu e-mail ou a plataforma nessas respectivas datas!
													</p>";
						}elseif($payload['scholarshipStudent']->scholarship_student_status_id == 4){
							$badgeColor = 'badge-danger';
							$content = "<p style = 'margin-top: 5px;'>
														Infelizmente não foi desta vez! Mas não desanime, temos várias outras bolsas nas quais você pode se inscrever <a href = '/scholarship' target = '_blank'>clicando aqui</a>.
													</p>";
						}elseif($payload['scholarshipStudent']->scholarship_student_status_id == 2){
							$badgeColor = 'badge-danger';
							$content = "<p style = 'margin-top: 5px;'>
														Sua inscrição foi cancelada! Caso tenha alguma contestação sobre isto nos mande um e-mail no endereço <a href='mailto://cetcc@cetcc.com.br'>cetcc@cetcc.com.br</a>.
													</p>";
						}else{
							$badgeColor = 'badge-success';
							$content = "<p style = 'margin-top: 5px;'>
														Parabéns!!! Você foi aprovado em nossa seleção de bolsistas!!
														<a class = 'btn btn-primary btn-sm' href = '/shopping_journey?course={$payload['scholarshipStudent']->scholarship->course_id}&scholarshipStudent={$payload['scholarshipStudent']->id}'>Finalizar Inscrição</a>
													</p>";
						}
				@endphp

				<span class = "badge {{ $badgeColor }}" style = "font-size: 13px; padding: 5px 7px;">
					{{ $payload['scholarshipStudent']->scholarshipStudentStatus->name }}
				</span>

				{!! $content !!}
			</div>
		</div>
	</div>
</div>
