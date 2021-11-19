@foreach ($pageData->content as $item)
<section id="whats_in" class="section section-xxl swiper-slide-pilars background-default" style="margin-top: 95px;">
	{{-- style="background-image: url('{{$item['image_bg']}}');" --}}
	<div class="container">
		<h3 class="text-transform-none wow text-align-center" style="margin-top: -105px; font-family:'Lobster Two', cursive; font-size: 45px;">{{$item->title_pt}}</h3>
		<h6 class="text-transform-none wow text-justify">{!! $item['text_pt'] !!}</h6>

		<section class="section section-xxl bg-default text-md-left">
			<div class="container">
					<div class="row row-30 row-md-60 row-lg-70 justify-content-center align-items-md-center">
							<div class="col-sm-8 col-md-5 col-xl-6">
									<div class="inset-xl-right-20">
											<div class="product-wrap-1 bg-image-1 block-1">
													<!-- Owl Carousel-->
													<div class="owl-carousel owl-style-5" data-items="1" data-margin="30" data-dots="true" data-autoplay="true">
															<article class="product-creative">
																	<div class="product-figure"><img src="{{ url('assets/images/site/oQueVem.png') }}" alt="" class=""
																		width="634" height="373" />
																	</div>
															</article>
															<article class="product-creative">
																	<div class="product-figure"><img src="{{ url ('assets/images/site/01.png')}}" alt="" width="634" height="373" />
																	</div>
															</article>
															<article class="product-creative">
																	<div class="product-figure"><img src="{{ url ('assets/images/site/Logo_saude.png')}}" alt="" width="634" height="373" style="margin-top: 80px;" />
																	</div>
															</article>
													</div>
											</div>
									</div>
							</div>

							<div class="col-md-7 col-xl-6">
									<!-- Bootstrap collapse-->
									<article class="card card-custom card-corporate wow fadeInRight" data-wow-delay=".1s">
											<div class="collapse show" id="accordion1-card-body-unqfdlnh"
													aria-labelledby="accordion1-card-head-qteehppu" data-parent="#accordion1"
													role="tabpanel">
													<div class="card-body">
															<p class="text-justify" style="color: #000; margin-bottom: 35px;"><i class="fas fa-book" style="color: #76aa6f"></i> 1 LIVRO de saúde & bem-estar – lindo, todo colorido, de leitura leve, com dicas e exercícios para seu equilíbrio emocional. </p>
															<p class="text-justify" style="color: #000; margin-bottom: 35px;"><i class="fas fa-book" style="color: #76aa6f"></i> 1 LIVRO de alimentação e receitas – com informações sobre os alimentos e receitas práticas e saborosas, todo ilustrado e com QR CODE para você acompanhar o preparo em nosso canal no YouTube. </p>
															<p class="text-justify" style="color: #000; margin-bottom: 35px;"><i class="fas fa-book" style="color: #76aa6f"></i> MARCA PÁGINAS – para acompanhar seus livros e facilitar sua leitura. </p>
															<p class="text-justify" style="color: #000; margin-bottom: 35px;"><i class="fas fa-book" style="color: #76aa6f"></i> GUIA DE LEITURA – para você ficar por dentro de todo o conteúdo do mês. </p>
															<p class="text-justify" style="color: #000; margin-bottom: 35px;"><i class="fas fa-book" style="color: #76aa6f"></i> 1 BRINDE – selecionamos com muito carinho produtos fofos para completar seu momento de autocuidado e leitura, todo mês uma surpresa incrível. </p>
															<p class="text-justify" style="color: #000; margin-bottom: 35px;"><i class="fas fa-book" style="color: #76aa6f"></i> CARTÃO POSTAL – com mensagens motivacionais para você enviar para aquela pessoa querida ou colecionar, são lindos! </p>
													</div>
											</div>
									</article>
							</div>
						</div>
						<h3 class="text-transform-uppercase wow text-align-center wow fadeInRight" data-wow-delay=".3s" style="color: #76aa6f;">{{$item->subtitle_pt}}</h3>
					</div>
			</div>
	</section>

	<div class="button-wrap" data-caption-animate="fadeInLeft" data-caption-delay="400" style="margin-bottom: 45px;	margin-top: -100px;"><a	class="button button-lg button-shadow-4 button-secondary-2 button-zakaria"	href="/pricing-list">Quero Assinar</a></div>
	{{-- <div class="banner">
			<h3 class="text-transform-none wow fadeScale">O que vem na sua box</h3>
			<img  src="{{ url ('assets/images/site/bannerBox.webp')}}" alt="" class="">
	</div> --}}
	</div>
</section>
	@endforeach



