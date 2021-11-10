@foreach ($pageData->content as $item)
<section id="how_works" class="section section-xxl swiper-slide-how  text-md-left" style="background-image: url('{{$item['image_bg']}}');">
	<div class="container">
		<h3 class="text-transform-none wow" style="text-align: center; margin-top: 90px; margin-bottom: -90px; font-family:'Lobster Two', cursive; font-size: 45px;">{{$item['title_pt']}}</h3>
		<div class="row row-30 row-md-60 row-lg-70 justify-content-center align-items-md-center">
			<div class="row col-sm-12 col-md-12 col-xl-12">
						{{-- <div class="col-sm-6 col-lg-6 wow fadeInLeft" data-wow-delay=".2s" style="margin-top: 100px;">
							<article class="box-icon-creative">
								<div
								class="unit flex-column flex-md-row flex-lg-column flex-xl-row align-items-md-center align-items-lg-start align-items-xl-center">
								<div class="unit-body">
									<div class="box-icon-creative-icon"><img src="{{ url('assets/images/site/home/last/pedidosCliente/icon_assine.png')}}" alt="" class="" style="width: 45px;"></div>
									<h6 class="box-icon-creative-text text-align-center">Assine</h6>
									<p class="box-icon-creative-text text-justify">Escolha um dos nossos planos aqui no site.</p>
								</div>
							</div>
						</article>
					</div>
					<br/>
						<div class="col-sm-6 col-lg-6 wow fadeInLeft" data-wow-delay=".1s" style="margin-top: 100px;">
							<article class="box-icon-creative">
								<div class="unit flex-column flex-md-row flex-lg-column flex-xl-row align-items-md-center align-items-lg-start align-items-xl-center">
									<div class="unit-body">
										<div class="box-icon-creative-icon"><img src="{{ url('assets/images/site/home/last/pedidosCliente/icon_receba_em_casa.png')}}" alt="" class="" style="width: 45px;"></div>
										<h6 class="box-icon-creative-text text-align-center">Receba em sua casa</h6>
										<p class="box-icon-creative-text text-justify">Todo mês chegará para você sua caixinha de autocuidado, saúde e bem-estar.</p>
									</div>
								</div>
							</article>
						</div>
						<div class="col-sm-6 col-lg-6 wow fadeInLeft" data-wow-delay=".1s">
							<article class="box-icon-creative">
								<div class="unit flex-column flex-md-row flex-lg-column flex-xl-row align-items-md-center align-items-lg-start align-items-xl-center">
									<div class="unit-body">
										<div class="box-icon-creative-icon"><img src="{{ url('assets/images/site/home/last/pedidosCliente/icon_viva_seu_momento.png')}}" alt="" class="" style="width: 45px;"></div>
										<h6 class="box-icon-creative-text text-align-center">Viva seu momento!</h6>
										<p class="box-icon-creative-text text-justify">Os conteúdos de nossos livros são elaborados com muito amor, carinho e exclusividade, para que você tenha uma vida plena, saudável e feliz.</p>
									</div>
								</div>
							</article>
						</div>
					</div> --}}

					<div class="col-md-12 col-xl-12">
						<img style="margin-top: 50px; margin-bottom: -75px;" src="{{$item['image']}}" alt="" class="">
					</div>
				</div>

				<div class="button-wrap" data-caption-animate="fadeInLeft"
					data-caption-delay="400" style="margin-top: 35px; margin-bottom: 70px;"><a
					class="button button-lg button-shadow-4 button-secondary-2 button-zakaria"
					href="/pricing-list">Quero Assinar</a>
				</div>

		</div>
	</section>
	@endforeach
