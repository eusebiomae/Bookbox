<h5 id="makeComment">Deixe seu Comentário</h5>
<form name="formComment" method="POST" action="/comment" autocomplete="off" class = "form-row">
	{{ csrf_field() }}
	<input type="hidden" name="blog_id" value="{{ $post->id }}" id = "blog_id" />
	<input type="hidden" name="answer_from" />

	<div class="form-group col-md-12"><h6 data-answer-from></h6></div>

	<div class="form-group col-md-6">
		<input type="text" name="name" class="form-control" placeholder="Name" maxlength="255" required>
	</div>

	<div class="form-group col-md-6">
		<input type="email" name="email" class="form-control" placeholder="Email" maxlength="255" required>
	</div>

	<div class="form-group col-md-12">
		<textarea class="form-control" name="comments" rows="3" placeholder="Messagem" required></textarea>
	</div>

	<div class="form-group col-md-9">
		<div class="g-recaptcha" data-sitekey="6LfIZCQcAAAAAFcONLvww28s7xI4XgERWZG0gG4b" data-callback = "recaptchaCallback"></div>
	</div>

	<div class="form-group col-md-3 text-right">
		<button id = "btnSubmit" type="submit" class="btn_1 rounded mt-4" disabled>Enviar</button>
	</div>
</form>
<script src="/js/captcha-math-equations.min.js"></script>
<script>
	function recaptchaCallback(){
		var btnSubmit = document.querySelector('#btnSubmit');
		btnSubmit.removeAttribute('disabled');
	}
</script>
