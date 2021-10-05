@foreach ($pageData->content as $item)
<section>
	<div id="address" class="container-fluid align-items-center" style="background: url({{$item['image_bg']}}) no-repeat center; background-size:cover;">
		<div class="container">
			<div class="row">
				<div class="col-12">
						<h2>{{$item['title_pt']}}</h2>
						<h3 class="h1">{{$item['subtitle_pt']}}</h3>
						<form action="/register" method="post">
							@csrf
							<div class="row">
								<div class="col-12"><input type="text" name="name" id="name" required placeholder="Nome Completo*"></div>
							</div>
							<div class="row">
								<div class="col-12 col-xl-6"><input type="email" name="email" id="email" required placeholder="E-mail*"></div>
								<div class="col-12 col-xl-6"><input type="number" name="phone" id="phone" required placeholder="Telefone"></div>
							</div>
							<div class="row">
								<div class="col-12 col-xl-6"><input type="text" name="type_trade" id="type_trade" required placeholder="Tipo de comércio"></div>
								<div class="col-12 col-xl-6"><input type="text" name="trade_name" id="trade_name" required placeholder="Nome do comércio"></div>
							</div>
							<div class="row">
								<div class="col-12">
									<textarea name="message_pt" id="message_pt" cols="10" rows="6" placeholder="Mensagem..."></textarea>
								</div>
								<input type="submit" value="cadastrar" class="btn_send">
							</div>
						</form>
				</div>
			</div>
		</div>
	</div>
</section>
@endforeach
