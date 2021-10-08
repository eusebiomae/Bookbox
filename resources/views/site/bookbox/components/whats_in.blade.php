@foreach ($pageData->content as $item)
<section id="whats_in" class="section section-xxl swiper-slide-pilars" style="background-image: url('{{$item['image_bg']}}');">
	<div class="container">
		<h3 class="text-transform-none wow text-align-center" style="margin-top: 75px;">{{$item->title_pt}}</h3>
		<h6 class="text-transform-none wow text-justify">{!! $item['text_pt'] !!}</h6>
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
																	role="button">2 livros exclusivos
																	<div class="card-arrow">
																			<div class="icon"></div>
																	</div>
															</a></div>
											</div>
											<div class="collapse show" id="accordion1-card-body-unqfdlnh"
													aria-labelledby="accordion1-card-head-qteehppu" data-parent="#accordion1"
													role="tabpanel">
													<div class="card-body">
															<p>1 LIVRO de saúde & bem-estar – lindo, todo colorido, de leitura leve, com dicas e exercícios para seu equilíbrio emocional. </p>
															<p>1 LIVRO de alimentação e receitas – com informações sobre os alimentos e receitas práticas e saborosas, todo ilustrado e com QR CODE para você acompanhar o preparo em nosso canal no YouTube. </p>
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
																	role="button">Itens para melhorar sua leitura
																	<div class="card-arrow">
																			<div class="icon"></div>
																	</div>
															</a></div>
											</div>
											<div class="collapse" id="accordion1-card-body-eephkkca"
													aria-labelledby="accordion1-card-head-iebkfbxx" data-parent="#accordion1"
													role="tabpanel">
													<div class="card-body">
															<p>MARCA PÁGINAS – para acompanhar seus livros e facilitar sua leitura. </p>
															<p>GUIA DE LEITURA – para você ficar por dentro de todo o conteúdo do mês. </p>
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
																	role="button">Mimos para seu autocuidado
																	<div class="card-arrow">
																			<div class="icon"></div>
																	</div>
															</a></div>
											</div>
											<div class="collapse" id="accordion1-card-body-qbvvnoxx"
													aria-labelledby="accordion1-card-head-crpnkjpm" data-parent="#accordion1"
													role="tabpanel">
													<div class="card-body">
															<p>1 BRINDE – selecionamos com muito carinho produtos fofos para completar seu momento de autocuidado e leitura, todo mês uma surpresa incrível.
															</p>
															<p>CARTÃO POSTAL – com mensagens motivacionais para você enviar para aquela pessoa querida ou colecionar, são lindos!
															</p>
													</div>
											</div>
									</article>
							</div>
					</div>
					<h3 class="text-transform-uppercase wow text-align-center wow fadeInRight" data-wow-delay=".3s" style="margin-top: 75px; color: #8571a2">{{$item->subtitle_pt}}</h3>
			</div>
			{{-- <div class="banner">
					<h3 class="text-transform-none wow fadeScale">O que vem na sua box</h3>
					<img  src="{{ url ('assets/images/site/bannerBox.webp')}}" alt="" class="">
			</div> --}}
		</div>
	</section>
	@endforeach
