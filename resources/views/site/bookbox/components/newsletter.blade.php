<form action="/newsletter" method="post">
	{{ csrf_field() }}
	<div class="row justify-content-md-center mb-4 text-darkblue">
		<div class="col-12">
			<h1 class="text-center">Newsletter</h1>
		</div>
		<div class="col-md-3">
			<span class="input">
				<input class="input_field autofill-none" type="text" name="name" required>
				<label class="input_label">
					<span class="input__label-content">Nome</span>
				</label>
			</span>
		</div>
		<div class="col-md-3">
			<span class="input">
				<input class="input_field autofill-none" type="email" name="email" required>
				<label class="input_label">
					<span class="input__label-content">Email</span>
				</label>
			</span>
		</div>
		<div class="col-md-2" style="margin:auto 0;">
			<input type="submit" style="float:right;" value="Cadastrar" class="btn_1 rounded">
		</div>
	</div>
</form>
