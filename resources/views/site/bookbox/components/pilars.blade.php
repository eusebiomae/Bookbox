@foreach ($pageData->content as $item)
<section id="pilars" class="section section-xxl swiper-slide-pilars" style="background-image: url('{{$item['image_bg']}}');">
	<div class="container">
		<h4 class="col-md-12 text-center">{{$item['title_pt']}}</h4>
			<div class="row row-xl row-30 row-md-40 row-lg-50 align-items-center">
					<div class="col-md-5 col-xl-4">
							<div class="row row-30 row-md-40 row-lg-50 bordered-2">
									<div class="col-sm-6 col-md-12">
											<article
													class="box-icon-classic box-icon-nancy-right text-center text-lg-right wow fadeInLeft">
													<div class="unit flex-column flex-lg-row-reverse">
															<img src="{{ url ('assets/images/site/saudeFisica.png')}}"  width="120px" alt="" class="">
															<div class="unit-body">
																	<h4 class="box-icon-classic-title"><a href="#">Saúde Física</a></h4>
																	<p class="box-icon-classic-text">Escrito por médicos, especialistas e profissionais que têm experiências para compartilhar.</p>
															</div>
													</div>
											</article>
									</div>
									<div class="col-sm-6 col-md-12">
											<article
													class="box-icon-classic box-icon-nancy-right text-center text-lg-right wow fadeInLeft"
													data-wow-delay=".1s">
													<div class="unit flex-column flex-lg-row-reverse">
															<img src="{{ url ('assets/images/site/saudeMetal.png')}}"  width="120px" alt="" class="">
															<div class="unit-body">
																	<h4 class="box-icon-classic-title"><a href="#">Saúde Mental</a></h4>
																	<p class="box-icon-classic-text">Escrito por psiccólogos, psiquiatras e profissionais que tem muito para contribuir.</p>
															</div>
													</div>
											</article>
									</div>
							</div>
					</div>
					<div class="col-md-2 col-xl-4 d-none d-md-block wow fadeScale"><img
									src="{{ url('assets/images/site/01.png') }}" alt="" width="400" height="600" />
					</div>
					<div class="col-md-5 col-xl-4">
							<div class="row row-30 row-md-40 row-lg-50 bordered-2">
									<div class="col-sm-6 col-md-12">
											<article
													class="box-icon-classic box-icon-nancy-left text-center text-lg-left wow fadeInRigth" style="margin-top: 70px;">
													<div class="unit flex-column flex-lg-row">
															<img src="{{ url ('assets/images/site/saudeEspiritual.png')}}"  width="115px;" height="150px;" alt="" class="">
															<div class="unit-body">
																	<h4 class="box-icon-classic-title"><a href="#"> Saúde espiritual</a></h4>
																	<p class="box-icon-classic-text">Escrito por naturopatas, coaches e profissionais focados em alta performance com equilíbrio.</p>
															</div>
													</div>
											</article>
									</div>
									<div class="col-sm-6 col-md-12">
											<article
													class="box-icon-classic box-icon-nancy-left text-center text-lg-left wow fadeInRight"
													data-wow-delay=".1s">
													<div class="unit flex-column flex-lg-row">
															<img src="{{ url ('assets/images/site/saudeFinanceira.png')}}" style="width: 115px; height: 120px;"  alt="" class="">
															<div class="unit-body">
																	<h4 class="box-icon-classic-title"><a href="#">Saúde Financeira</a></h4>
																	<p class="box-icon-classic-text">Escrito por consultores, administradores de empresaas, advogados e gestores focados no sucesso e na liberdade financeira.</p>
															</div>
													</div>
											</article>
									</div>
							</div>
					</div>
			</div>
		</div>
	</section>
	@endforeach
