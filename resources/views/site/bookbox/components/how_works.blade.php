@foreach ($pageData->content as $item)
<section id="how_works" class="section section-xxl swiper-slide-how  text-md-left" style="background-image: url('{{$item['image_bg']}}');">
	<div class="container">
		<h3 class="text-transform-none wow" style="text-align: center; margin-top: 130px; margin-bottom: -70px;">Cómo funciona?</h3>
		<div class="row row-30 row-md-60 row-lg-70 justify-content-center align-items-md-center">
					<div class="col-sm-8 col-md-5 col-xl-6">
							{{-- <h4 class="text-transform-none wow" style="text-align: center;">Como funciona?</h4> --}}

							<div class="inset-xl-right-20">
									<ul class="wow fadeInLeft" data-wow-delay=".2s">
									{{-- <div class="col-sm-4 col-lg-4 wow fadeInLeft" data-wow-delay=".2s" style="margin-top: 200px;"> --}}
											<article class="box-icon-creative">
													<div
															class="unit flex-column flex-md-row flex-lg-column flex-xl-row align-items-md-center align-items-lg-start align-items-xl-center">
															<div class="unit-left">
																	<div class="box-icon-creative-icon"><i class="far fa-calendar"></i></div>
															</div>
															<div class="unit-body">
																	<p class="box-icon-creative-text text-justify">As assinaturas são feitas até o último dia de cada mês, ou seja, para receber a caixa de março, você deve assinar até o último dia de fevereiro.</p>
															</div>
													</div>
											</article>
									{{-- </div> --}}
								  </ul><br/>
									<ul class="wow fadeInLeft" data-wow-delay=".2s">
									{{-- <div class="col-sm-4 col-lg-4 wow fadeInLeft" data-wow-delay=".1s" style="margin-top: 200px;"> --}}
											<article class="box-icon-creative">
													<div
															class="unit flex-column flex-md-row flex-lg-column flex-xl-row align-items-md-center align-items-lg-start align-items-xl-center">
															<div class="unit-left">
																	<div class="box-icon-creative-icon"><i class="far fa-credit-card"></i></div>
															</div>
															<div class="unit-body">
																	<p class="box-icon-creative-text text-justify">A primeira cobrança é efetudada no dia da assinatura. A partir do mês seguinte, a cobrança será efetuada todo dia 15, e você receberá as informações do pagamento por e-mail.</p>
															</div>
													</div>
											</article>
									{{-- </div> --}}
								</ul>
							</div>
						</div>
						<div class="col-md-7 col-xl-6">
							<img style="width: 600px;" src="{{ url ('assets/images/site/home/home-v2_05.png')}}" alt="" class="">
						</div>
			</div>
		</div>
	</section>
	@endforeach
