@foreach ($pageData->content as $item)
<section id="faq" class="section section-xxl swiper-slide-faq" style="background-image: url('{{$item['image_bg']}}');">
	<div class="container">
			<div class="col-md-12 col-xl-12">
					<h3 class="text-transform-none wow text-align-center" style="margin-top: 50px;">{{$item['title_pt']}}</h3>
					<!-- Bootstrap collapse-->
					<div class="card-group-custom card-group-corporate" id="accordion1" role="tablist"
							aria-multiselectable="false">
							<!-- Bootstrap card-->
							<article class="card card-custom card-corporate wow fadeInRight" data-wow-delay=".1s">
									<div class="card-header" role="tab">
											<div class="card-title"><a class="collapsed" id="accordion1-card-head-qteehppu"
															data-toggle="collapse" data-parent="#accordion1"
															href="#accordion1-card-body-unqfdlnh"
															aria-controls="accordion1-card-body-unqfdlnh" aria-expanded="false"
															role="button">O que é Bookbox Saúde?
															<div class="card-arrow">
																	<div class="icon"></div>
															</div>
													</a></div>
									</div>
									<div class="collapse show" id="accordion1-card-body-unqfdlnh"
											aria-labelledby="accordion1-card-head-qteehppu" data-parent="#accordion1"
											role="tabpanel">
											<div class="card-body">
													<p class="text-justify" style="color: #fff">Somos seu clube de assinatura de livros na área de saúde, bem-estar e autocuidado, com conteúdos baseados nos quatro principais pilares da vida, saúde física, mental, emocional e financeira.</p>
											</div>
									</div>
							</article>
							<!-- Bootstrap card-->
							<article class="card card-custom card-corporate wow fadeInRight" data-wow-delay=".2s">
									<div class="card-header" role="tab">
											<div class="card-title"><a class="collapsed" id="accordion1-card-head-iebkfbxx" data-toggle="collapse"
															data-parent="#accordion1" href="#accordion1-card-body-eephkkca"
															aria-controls="accordion1-card-body-eephkkca" aria-expanded="false"
															role="button">O que vou receber?
															<div class="card-arrow">
																	<div class="icon"></div>
															</div>
													</a></div>
									</div>
									<div class="collapse" id="accordion1-card-body-eephkkca"
											aria-labelledby="accordion1-card-head-iebkfbxx" data-parent="#accordion1"
											role="tabpanel">
											<div class="card-body">
													<p class="text-justify" style="color: #fff">Todo mês você vai receber uma caixa com dois livros inéditos e exclusivos para assinantes, brinde especial, guia de leitura, 2 marca páginas e 1 cartão postal colecionável. Os itens são exclusivos para assinantes e acompanham o kit.</p>
											</div>
									</div>
							</article>
							<!-- Bootstrap card-->
							<article class="card card-custom card-corporate wow fadeInRight" data-wow-delay=".3s">
									<div class="card-header" role="tab">
											<div class="card-title"><a class="collapsed"
															id="accordion1-card-head-crpnkjpm" data-toggle="collapse"
															data-parent="#accordion1" href="#accordion1-card-body-qbvvnoxx"
															aria-controls="accordion1-card-body-qbvvnoxx" aria-expanded="false"
															role="button">Como posso assinar?
															<div class="card-arrow">
																	<div class="icon"></div>
															</div>
													</a></div>
									</div>
									<div class="collapse" id="accordion1-card-body-qbvvnoxx"
											aria-labelledby="accordion1-card-head-crpnkjpm" data-parent="#accordion1"
											role="tabpanel">
											<div class="card-body">
													<p class="text-justify" style="color: #fff">Para assinar, escolha um dos nossos planos, preencha os seus dados, escolha a melhor forma de pagamento e aguarde a confirmação do pagamento por e-mail. Agora é só esperar o seu box chegar em sua casa e aproveitar a experiência da vida saudável, plena e feliz!
													</p>
											</div>
									</div>
							</article>
							<!-- Bootstrap card-->
							<article class="card card-custom card-corporate wow fadeInRight" data-wow-delay=".3s">
									<div class="card-header" role="tab">
											<div class="card-title"><a class="collapsed"
															id="accordion1-card-head-kgkjkjj" data-toggle="collapse"
															data-parent="#accordion1" href="#accordion1-card-body-sadasdas"
															aria-controls="accordion1-card-body-sadasdas" aria-expanded="false"
															role="button">Quais formas de pagamento?
															<div class="card-arrow">
																	<div class="icon"></div>
															</div>
													</a></div>
									</div>
									<div class="collapse" id="accordion1-card-body-sadasdas"
											aria-labelledby="accordion1-card-head-crpnkjpm" data-parent="#accordion1"
											role="tabpanel">
											<div class="card-body">
														<p class="text-justify" style="color: #fff"><b>Plano digital</b> - o pagamento pode ser feito com cartão de crédito ou boleto bancário, sem fidelidade, todos os meses será feita a cobrança no seu cartão de crédito ou você receberá o boleto por e-mail.

														Caso não queira receber o e-book do mês seguinte, você pode entrar na sua conta e cancelar a próxima cobrança.</p>

														<p class="text-justify" style="color: #fff"><b>Plano Mensal</b> - o pagamento pode ser feito com cartão de crédito ou boleto bancário, sem fidelidade, todos os meses será feita a cobrança no seu cartão de crédito ou você receberá o boleto por e-mail.

														Caso não queira receber o box do mês seguinte, você pode entrar na sua conta e cancelar a próxima cobrança.</p>

														<p class="text-justify" style="color: #fff"><b>Plano Semestral</b> - o pagamento deverá ser efetuado com cartão de crédito com fidelidade de 6 meses. Todos os meses será debitado do seu cartão de crédito o valor correspondente ao plano escolhido. Após o período contratado a renovação é feita automaticamente, caso queira cancelar sua assinatura você poderá entrar na sua conta e pedir o cancelamento.</p>

														<p class="text-justify" style="color: #fff"><b>Plano Anual</b> - o pagamento deverá ser efetuado com cartão de crédito com fidelidade de 12 meses. Todos os meses será debitado do seu cartão de crédito o valor correspondente ao plano escolhido. Após o período contratado a renovação é feita automaticamente, caso queira cancelar sua assinatura você poderá entrar na sua conta e pedir o cancelamento.</p>

											</div>
									</div>
							</article>
							<!-- Bootstrap card-->
							<article class="card card-custom card-corporate wow fadeInRight" data-wow-delay=".4s">
									<div class="card-header" role="tab">
											<div class="card-title"><a class="collapsed"
															id="accordion1-card-head-easgcjgdtrrnbjjhbh" data-toggle="collapse"
															data-parent="#accordion1" href="#accordion1-card-body-jhgkjsgfkjsagfksdgfkeuh"
															aria-controls="accordion1-card-body-jhgkjsgfkjsagfksdgfkeuh" aria-expanded="false"
															role="button">Como posso cancelar?
															<div class="card-arrow">
																	<div class="icon"></div>
															</div>
													</a></div>
									</div>
									<div class="collapse" id="accordion1-card-body-jhgkjsgfkjsagfksdgfkeuh"
											aria-labelledby="accordion1-card-head-kjgkbkmjnbj" data-parent="#accordion1"
											role="tabpanel">
											<div class="card-body">
													<p style="color: #fff">Caso queira cancelar o plano contratado, você deve entrar na sua conta e solicitar o cancelamento, lembrando que nos planos semestral e anual o cancelamento só poderá ser feito no último mês do período contrato, para que não seja feita a renovação automática.
													</p>
											</div>
									</div>
							</article>
					</div>
			</div>
		</div>
	</section>
	@endforeach
