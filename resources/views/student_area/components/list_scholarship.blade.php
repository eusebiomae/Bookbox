<div class="wrapper wrapper-content animated fadeInRight">
	<div class="ibox float-e-margins">
		<div class="ibox-title"><h5>Bolsas de Estudos</h5></div>

		<div class="ibox-content">
			<div class="tabs-container">
				<ul class="nav nav-tabs">
					<li class="active"><a data-toggle="tab" href="#tab-open"> Abertas</a></li>
					<li><a data-toggle="tab" href="#tab-closed"> Encerradas</a></li>
				</ul>

				<div class="tab-content">

					<div id="tab-open" class="tab-pane active">
						<div class = "row" style = "margin-top: 5px;">
							@include('student_area.components.cardScholarship', [ 'payload' => $payload['openScholarships'] ])
						</div>
					</div>

					<div id="tab-closed" class="tab-pane">
						<div class = "row" style = "margin-top: 5px;">
							@include('student_area.components.cardScholarship', [ 'payload' => $payload['closedScholarships'] ])
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
