@foreach ($pageData->content as $item)
<section>
	<div id="address" class="container-fluid align-items-center" style="background: url({{$item['image_bg']}}) no-repeat center; background-size:cover;">
		<div class="container">
			{{-- <div class="row row-30 row-lg-50">
				<div class="col-md-12 col-sm-12 col-xl-12"> --}}
					<div class="" id="login-container">
						<h6>{{$item['title_pt']}}</h6>

						<form action="/login" method="post">
							@csrf
							<label for="Email" class="">Email</label>
							<input type="email" name="email" id="email" required placeholder="Digite seu e-mail*" autocomplete="off">

							<label for="Senha" class="">Senha</label>
							<input type="password" name="password" id="password" required placeholder="Digite sua senha*" autocomplete="off">

							<a href="#" class="" id="forgot-pass">Esqueceu a senha?</a>
							<input type="submit" value="Login" class="btn_send">
						</form>

						<div class="" id="social-container">
							<p class="">Ou entre com suas redes sociais</p>
							<i class="fa fa-facebook-f"></i>
							<i class="fa fa-google"></i>
						</div>

						<div class="" id="register-container">
							<p class="">Ainda não tem conta?</p>
							<a href="#" class="">Registrar</a>
						</div>
					</div>
				{{-- </div>
			</div> --}}
		</div>
	</div>

	<style>
	/* geral */
	* {
		margin: 0;
		padding: 0;
		box-sizing: border-box;
		font-family: Arial, Helvetica, sans-serif;
		color: #323232
	}

	body {

	}

	textarea:focus, input:focus {
		outline: none;

	}

	a, label {
		font-size: .8rem; /* 16 * .8 = x */
	}

	a:hover {
		color: #08558B;
	}

	/* container Login */

	#login-container {
		background-color: #fff;
		width: 400px;
		margin-left: auto;
		margin-right: auto;
		padding: 20px 30px;
		margin-top: 10vh;
		border-radius: 10px;
		text-align: center;
	}

	/* Formulário */

	form {
		margin-top: 30px;
		margin-bottom: 40px;

	}

	label, input {
		display: block;
		width: 100%;
		text-align: left;
	}

	label {
		font-weight: bold;
	}

	input {
		border-bottom: 2px solid #323232;
		padding: 10px;
		font-size: 1rem;
		margin-bottom: 20px;
	}

	input:focus {
		border-bottom: 2px solid #08558B;
	}

	#forgot-pass {
		text-align: right;
		display: block;
	}

	input[type="submit"] {
		text-align: center;
		text-transform: uppercase;
		font-weight: bold;
		border: none;
		height: 40px;
		border-radius: 20px;
		margin-top: 30px;
		color: #fff;
		background-color: #08558B;
		cursor: pointer;
	}

	input[type="submit"]:hover {
		background-color: #1B223C;
		transition: .5s;
	}

	/* redes sociais */

	#social-container, #social-container p {
		margin-bottom: 20px;
	}

	#social-container i {
		height: 40px;
		width: 40px;
		border-radius: 50%;
		line-height: 40px;
		margin: 0 5px;
		cursor: pointer;
	}

	.fa-facebook-f {
		background-color: #3B5998;
		color: #fff
	}

	.fa-google {
		background-color: #de3f32;
		color: #fff;
	}

	/* registrar */

	#register-container p{
		margin-bottom: 10px;
	}

	#register-container a{
		margin-bottom: 20px;
	}

	</style>
</section>
@endforeach

