<div class="wrapper wrapper-content animated fadeInRight">
	<div class="">
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<div class="col-sm-9">
					<h5>Supervisões <small>Visualização dos dados de Supervisão</small></h5>
				</div>
				<div class="col-sm-3 text-right" style="margin: -8px">
					<a href="{{ url('/student_area/order/newsupervision') }}">
						<button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Nova inscrição</button>
					</a>
				</div>
			</div>

			<div class="ibox-content">
				<div class="tabs-container">
					<ul class="nav nav-tabs">
						<li class="active"><a data-toggle="tab" href="#tab-enable"> Inscrições</a></li>
						<li><a data-toggle="tab" href="#tab-disable"> Finalizados</a></li>
					</ul>

					<div class="tab-content">

						<div id="tab-enable" class="tab-pane active">
							<div class="panel-body">
								<div class="col-lg-12">
									@include('student_area.components.cardSupervision', [ 'payload' => $payload['order'] ])
								</div>
							</div>
						</div>

						<div id="tab-disable" class="tab-pane">
							<div class="panel-body">
								<div class="col-lg-12">
									@if (isset($payload['orderF']))
										@include('student_area.components.cardSupervision', [ 'payload' => $payload['orderF'] ])
									@endif
								</div>
							</div>
						</div>

					</div>

				</div>
			</div>

		</div>
	</div>
</div>
