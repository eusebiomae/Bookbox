@foreach ($pageData->content as $item)
<section id="how_works" class="section section-xxl swiper-slide-how  text-md-left" style="background-image: url('{{$item['image_bg']}}');">
	<div class="container">
			<div class="row row-30 row-md-60 row-lg-70 justify-content-center align-items-md-center">
					<div class="col-xl-12">
							<h3 class="text-transform-none wow" style="text-align: center; margin-top: 50px;">Cómo funciona?</h3>
							{{-- <h4 class="text-transform-none wow" style="text-align: center;">Como funciona?</h4> --}}
							<div class="row row-30">
									<div class="col-sm-6 col-lg-6 wow fadeInLeft" data-wow-delay=".2s">
											<article class="box-icon-creative">
													<div
															class="unit flex-column flex-md-row flex-lg-column flex-xl-row align-items-md-center align-items-lg-start align-items-xl-center">
															<div class="unit-left">
																	<div class="box-icon-creative-icon fl-bigmug-line-big104"></div>
															</div>
															<div class="unit-body">
																	<p class="box-icon-creative-text">As assinaturas são feitas até o último dia de cada mês, ou seja, para receber a caixa de março, você deve assinar até o último dia de fevereiro.</p>
															</div>
													</div>
											</article>
									</div>
									<div class="col-sm-6 col-lg-6 wow fadeInLeft" data-wow-delay=".1s">
											<article class="box-icon-creative">
													<div
															class="unit flex-column flex-md-row flex-lg-column flex-xl-row align-items-md-center align-items-lg-start align-items-xl-center">
															<div class="unit-left">
																	<div class="box-icon-creative-icon fl-bigmug-line-chat55"></div>
															</div>
															<div class="unit-body">
																	<p class="box-icon-creative-text">A primeira cobrança é efetudada no dia da assinatura. A partir do mês seguinte, a cobrança será efetuada todo dia 15, e você receberá as informações dp pagamento por e-mail.</p>
															</div>
													</div>
											</article>
									</div>
									<div class="banner">
											<img  src="{{ url ('assets/images/site/linhaTempoBox.webp')}}" alt="" class="">
									</div>
							</div>
					</div>
			</div>
		</div>
	</section>
	@endforeach
