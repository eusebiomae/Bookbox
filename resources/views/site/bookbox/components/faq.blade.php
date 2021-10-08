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
															role="button">O que é o bookbox?
															<div class="card-arrow">
																	<div class="icon"></div>
															</div>
													</a></div>
									</div>
									<div class="collapse show" id="accordion1-card-body-unqfdlnh"
											aria-labelledby="accordion1-card-head-qteehppu" data-parent="#accordion1"
											role="tabpanel">
											<div class="card-body">
													<p style="color: #fff">Bookbox é o seu clube de assinatura de livros na área de saúde e bem-estar, com conteúdos baseados nos quatro principais pilares da vida, saúde física, mental, espiritual e financeira.</p>
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
													<p style="color: #fff">Todo mês você vai receber uma caixa com dois livros inéditos e exclusivos para assinantes, um guia de leitura, um brinde especial, 2 marca páginas e 1 cartão postal colecionável. Os itens são exclusivos para assinantes e só poderão ser adquiridos no site.</p>
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
													<p style="color: #fff">Para assinar, escolha um dos nossos planos, preencha os seus dados e inclua o endereço. Após concluir o pagamento espere a confirmação do pagamento por e-mail. Agora é só esperar o seu box chegar em sua casa.
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
													<p style="color: #fff">Todo plano padrão, o pagamento pode ser realizado no cartão de crédito ou no boleto. No plano anual, o pagamento é exclusivamente no cartão de crédito. Caso a assinatura seja realizada no boleto, você receberá por e-mail o documento com vencimento em até 3 dias corridos no dia 15 de cada mês. Caso a assinatura seja realizada no cartão de crédito, a cobrança será realizada automaticamente e você receberá as informações do pagamento no dia 15 de cada mês.
													</p>
											</div>
									</div>
							</article>
					</div>
			</div>
		</div>
	</section>
	@endforeach
