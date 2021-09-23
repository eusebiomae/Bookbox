<div class="bg_color_1">
	<div class="container margin_120_95">
		<div class="row justify-content-between">
			<div class="col-lg-5">
				<div class="map_contact">
					<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1828.3131622278065!2d-46.6370573573929!3d-23.58186052479181!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x6d5af490fe760bc6!2sTrend%20Paulista%20Offices!5e0!3m2!1spt-BR!2sbr!4v1589399789141!5m2!1spt-BR!2sbr" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
				</div>
				<!-- /map -->
			</div>
			<div class="col-lg-6">
				<h4>Mande uma mensagem</h4>
				<p>Exemplo: Dicas, Sujestões, Dúvidas, entre outras coisas ... Estamos aqui para ajudar!</p>
				<div id="message-contact"></div>
				<form method="post" action="/contact/save" name="contactform" autocomplete="off" onsubmit="onSubmitContact(event)">
					{{ csrf_field() }}
					<div class="row">
						<div class="col-md-12">
							<span class="input">
								<input class="input_field" type="text" name="name" required>
								<label class="input_label">
									<span class="input__label-content">Nome</span>
								</label>
							</span>
						</div>
					</div> <!-- /row -->

					<div class="row">
						<div class="col-md-6">
							<span class="input">
								<input class="input_field" type="email" name="email" required>
								<label class="input_label">
									<span class="input__label-content">E-mail</span>
								</label>
							</span>
						</div>

						<div class="col-md-6">
							<span class="input">
								<input type="text" name="phone" class="input_field mask-cellphone" required />
								<label class="input_label">
									<span class="input__label-content">Telefone</span>
								</label>
							</span>
						</div>
					</div> <!-- /row -->

					<div class="row">
						<div class="col-12">
							<span class="input" >
								<textarea class="input_field" name="message" style="height:150px;" required></textarea>
								<label class="input_label">
									<span class="input__label-content">Mensagem</span>
								</label>
							</span>
						</div>

						<div class="col-12 text-right mb-4 mb-md-none">
							<div id="captcha-math-equations"></div>

							<input type="submit" value="Enviar" class="btn_1 rounded" id="submit-contact">
						</div>

					</div>

				</form>
			</div>
		</div>
		@if (old('savedSuccessfully'))
			<div class="alert alert-success alert-dismissable">
				<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
				Um responsável entrará em contato com você em breve.
			</div>
		@endif
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<script src="/js/captcha-math-equations.min.js"></script>
<script src="{!! asset('js/plugins/jasny/jasny-bootstrap.min.js')!!}"></script>

<script>
	var captchaMathEquations = new CaptchaMathEquations("captcha-math-equations", {
		classInput: "form-control"
	}).init()

	function onSubmitContact(event) {
		if (!captchaMathEquations.checkValidity()) {
			event.preventDefault()
		}
	}
</script>
