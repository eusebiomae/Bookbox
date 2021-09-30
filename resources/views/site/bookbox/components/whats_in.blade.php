@foreach ($pageData->content as $item)
<section id="whats_in" class="section section-xxl swiper-slide-pilars" style="background-image: url('{{$item['image_bg']}}');">
	<div class="container">
			<div class="row row-30 row-md-60 row-lg-70 justify-content-center align-items-md-center">
					<div class="col-sm-8 col-md-5 col-xl-6">
							<div class="inset-xl-right-20">
									<article class="product-creative">
											<div class="product-figure"><img
													src="{{ url('assets/images/site/oQueVem.png') }}" alt="" class=""
															width="470" height="324" />
											</div>
											{{-- <h4 class="product-creative-title"><a href="single-product.html">eBook</a></h4> --}}
											<div class="product-creative-price-wrap">
													{{-- <div class="product-creative-price product-creative-price-old">$20.00</div> --}}
													{{-- <div class="product-creative-price">R$39.90/mês</div> --}}
											</div>
									</article>
							</div>
					</div>

					<div class="col-md-7 col-xl-6">
							<h3 class="text-transform-none wow text-align-center">O que vem na sua box?</h3>
							<!-- Bootstrap collapse-->
							<div class="card-group-custom card-group-corporate" id="accordion1" role="tablist"
									aria-multiselectable="false">
									<!-- Bootstrap card-->
									<article class="card card-custom card-corporate wow fadeInRight" data-wow-delay=".1s">
											<div class="card-header" role="tab">
													<div class="card-title"><a id="accordion1-card-head-qteehppu"
																	data-toggle="collapse" data-parent="#accordion1"
																	href="#accordion1-card-body-unqfdlnh"
																	aria-controls="accordion1-card-body-unqfdlnh" aria-expanded="true"
																	role="button">2 livros exclusivos.
																	<div class="card-arrow">
																			<div class="icon"></div>
																	</div>
															</a></div>
											</div>
											<div class="collapse show" id="accordion1-card-body-unqfdlnh"
													aria-labelledby="accordion1-card-head-qteehppu" data-parent="#accordion1"
													role="tabpanel">
													<div class="card-body">
															<p>Livros com temas variados segundo suas preferencias, com conteúdo diverso e didático para o seu dia a dia. </p>
													</div>
											</div>
									</article>
									<!-- Bootstrap card-->
									<article class="card card-custom card-corporate wow fadeInRight" data-wow-delay=".2s">
											<div class="card-header" role="tab">
													<div class="card-title"><a class="collapsed"
																	id="accordion1-card-head-iebkfbxx" data-toggle="collapse"
																	data-parent="#accordion1" href="#accordion1-card-body-eephkkca"
																	aria-controls="accordion1-card-body-eephkkca" aria-expanded="false"
																	role="button">Itens para melhorar sua leitura.
																	<div class="card-arrow">
																			<div class="icon"></div>
																	</div>
															</a></div>
											</div>
											<div class="collapse" id="accordion1-card-body-eephkkca"
													aria-labelledby="accordion1-card-head-iebkfbxx" data-parent="#accordion1"
													role="tabpanel">
													<div class="card-body">
															<p>Já vem um Marcador de página personalizado do mês e uma Guia de Leitura para facilitar o entendimento do conteúdo. </p>
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
																	role="button">Colécionaveis e brindes.
																	<div class="card-arrow">
																			<div class="icon"></div>
																	</div>
															</a></div>
											</div>
											<div class="collapse" id="accordion1-card-body-qbvvnoxx"
													aria-labelledby="accordion1-card-head-crpnkjpm" data-parent="#accordion1"
													role="tabpanel">
													<div class="card-body">
															<p>Cada mês enviamos um Cartão Postal Colecionável e um Brinde Especial.
															</p>
													</div>
											</div>
									</article>
							</div>
					</div>
			</div>
			{{-- <div class="banner">
					<h3 class="text-transform-none wow fadeScale">O que vem na sua box</h3>
					<img  src="{{ url ('assets/images/site/bannerBox.webp')}}" alt="" class="">
			</div> --}}
		</div>
	</section>
	@endforeach
