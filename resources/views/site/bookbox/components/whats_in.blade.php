<section id="whats_in" class="section section-xxl bg-image-1">
	<div class="container">
		@foreach ($pageData->content as $item)
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
																	role="button">Lorem ipsum.
																	<div class="card-arrow">
																			<div class="icon"></div>
																	</div>
															</a></div>
											</div>
											<div class="collapse show" id="accordion1-card-body-unqfdlnh"
													aria-labelledby="accordion1-card-head-qteehppu" data-parent="#accordion1"
													role="tabpanel">
													<div class="card-body">
															<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
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
																	role="button">Ipsum ipsum.
																	<div class="card-arrow">
																			<div class="icon"></div>
																	</div>
															</a></div>
											</div>
											<div class="collapse" id="accordion1-card-body-eephkkca"
													aria-labelledby="accordion1-card-head-iebkfbxx" data-parent="#accordion1"
													role="tabpanel">
													<div class="card-body">
															<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
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
																	role="button">Ipsum Lorem ipsum
																	<div class="card-arrow">
																			<div class="icon"></div>
																	</div>
															</a></div>
											</div>
											<div class="collapse" id="accordion1-card-body-qbvvnoxx"
													aria-labelledby="accordion1-card-head-crpnkjpm" data-parent="#accordion1"
													role="tabpanel">
													<div class="card-body">
															<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
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
			@endforeach
	</div>
</section>