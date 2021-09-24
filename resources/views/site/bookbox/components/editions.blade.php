@foreach ($pageData->content as $item)
<section id="editions" class="section section-xxl swiper-slide-call" style="background-image: url('{{$item['image_bg']}}');">
	<div class="container">
			<h2 class="text-transform-capitalize wow fadeScale">Confira nossas edições anteriores</h2>
			<div class="isotope-wrap">
					<div class="isotope-filters">
							<button
									class="isotope-filters-toggle button button-sm button-icon button-icon-right button-default-outline"
									data-custom-toggle=".isotope-filters-list" data-custom-toggle-disable-on-blur="true"
									data-custom-toggle-hide-on-blur="true"><span
											class="icon mdi mdi-chevron-down"></span>Filter</button>
							<div class="isotope-filters-list-wrap">
									<ul class="isotope-filters-list">
											<li><a class="active" href="#" data-isotope-filter="*">Todas</a></li>
											<li><a href="#" data-isotope-filter="Type 1">Últimos 3 meses</a></li>
											<li><a href="#" data-isotope-filter="Type 2">Mais antigas</a></li>
									</ul>
							</div>
					</div>
					<div class="row row-30 isotope isotope-custom-1" data-lightgallery="group">
							<div class="col-sm-6 col-lg-4 col-xl-3 isotope-item" data-filter="Type 1">
									<!-- Thumbnail Classic-->
									<article class="thumbnail-classic block-1">
											<div class="thumbnail-classic-caption">
													<div>
															<h5 class="thumbnail-classic-title">
																<a href="">
																	<div class="button-wrap" data-caption-animate="fadeInUp" data-caption-delay="400">
																		<a class="button button-lg button-shadow-4 button-secondary-2 button-zakaria"
																		href="single-product.html">Eu quero</a>
																	</div>
																</a>
															</h5>

													</div>
											</div>
											<div class="thumbnail-classic-figure"><img src="{{ url('assets/images/site/boxAvulso/bannerBoxAgosto.png') }}" alt="" width="270" style="height: 180px;" /><h5 class="" style="margin-top: 15px;">Box Agosto/2021</h5>
											</div>
									</article>
							</div>
							<div class="col-sm-6 col-lg-4 col-xl-3 isotope-item" data-filter="Type 1">
									<!-- Thumbnail Classic-->
									<article class="thumbnail-classic block-1">
										<div class="thumbnail-classic-caption">
											<div>
													<h5 class="thumbnail-classic-title">
														<a href="">
															<div class="button-wrap" data-caption-animate="fadeInUp" data-caption-delay="400">
																<a class="button button-lg button-shadow-4 button-secondary-2 button-zakaria"
																href="single-product.html">Eu quero</a>
															</div>
														</a>
													</h5>

											</div>
									</div>
									<div class="thumbnail-classic-figure"><img src="{{ url('assets/images/site/boxAvulso/boxJulho.png') }}" alt="" width="270" style="height: 180px;" /><h5 class="" style="margin-top: 15px;">Box Julho/2021</h5>
									</div>
									</article>
							</div>
							<div class="col-sm-6 col-lg-4 col-xl-3 isotope-item" data-filter="Type 1">
									<!-- Thumbnail Classic-->
									<article class="thumbnail-classic block-1">
										<div class="thumbnail-classic-caption">
											<div>
													<h5 class="thumbnail-classic-title">
														<a href="">
															<div class="button-wrap" data-caption-animate="fadeInUp" data-caption-delay="400">
																<a class="button button-lg button-shadow-4 button-secondary-2 button-zakaria"
																href="single-product.html">Eu quero</a>
															</div>
														</a>
													</h5>

											</div>
									</div>
									<div class="thumbnail-classic-figure"><img src="{{ url('assets/images/site/boxAvulso/boxJunho.png') }}" alt="" width="270" style="height: 180px;" /><h5 class="" style="margin-top: 15px;">Box Junho/2021</h5>
									</div>
									</article>
							</div>
							<div class="col-sm-6 col-lg-4 col-xl-3 isotope-item" data-filter="Type 2">
									<!-- Thumbnail Classic-->
									<article class="thumbnail-classic block-1">
										<div class="thumbnail-classic-caption">
											<div>
													<h5 class="thumbnail-classic-title">
														<a href="">
															<div class="button-wrap" data-caption-animate="fadeInUp" data-caption-delay="400">
																<a class="button button-lg button-shadow-4 button-secondary-2 button-zakaria"
																href="single-product.html">Eu quero</a>
															</div>
														</a>
													</h5>

											</div>
									</div>
									<div class="thumbnail-classic-figure"><img src="{{ url('assets/images/site/boxAvulso/boxMaio.png') }}" alt="" width="270" style="height: 180px;" /><h5 class="" style="margin-top: 15px;">Box Maio/2021</h5>
									</div>
									</article>
							</div>
							<div class="col-sm-6 col-lg-4 col-xl-3 isotope-item" data-filter="Type 2">
									<!-- Thumbnail Classic-->
									<article class="thumbnail-classic block-1">
										<div class="thumbnail-classic-caption">
											<div>
													<h5 class="thumbnail-classic-title">
														<a href="">
															<div class="button-wrap" data-caption-animate="fadeInUp" data-caption-delay="400">
																<a class="button button-lg button-shadow-4 button-secondary-2 button-zakaria"
																href="single-product.html">Eu quero</a>
															</div>
														</a>
													</h5>

											</div>
									</div>
									<div class="thumbnail-classic-figure"><img src="{{ url('assets/images/site/boxAvulso/boxAbril.png') }}" alt="" width="270" style="height: 180px;" /><h5 class="" style="margin-top: 15px;">Box Abril/2021</h5>
									</div>
									</article>
							</div>
							<div class="col-sm-6 col-lg-4 col-xl-3 isotope-item" data-filter="Type 2">
									<!-- Thumbnail Classic-->
									<article class="thumbnail-classic block-1">
										<div class="thumbnail-classic-caption">
											<div>
													<h5 class="thumbnail-classic-title">
														<a href="">
															<div class="button-wrap" data-caption-animate="fadeInUp" data-caption-delay="400">
																<a class="button button-lg button-shadow-4 button-secondary-2 button-zakaria"
																href="single-product.html">Eu quero</a>
															</div>
														</a>
													</h5>

											</div>
									</div>
									<div class="thumbnail-classic-figure"><img src="{{ url('assets/images/site/boxAvulso/boxMarço.png') }}" alt="" width="270" style="height: 180px;" /><h5 class="" style="margin-top: 15px;">Box Março/2021</h5>
									</div>
									</article>
							</div>
							<div class="col-sm-6 col-lg-4 col-xl-3 isotope-item" data-filter="Type 2">
									<!-- Thumbnail Classic-->
									<article class="thumbnail-classic block-1">
										<div class="thumbnail-classic-caption">
											<div>
													<h5 class="thumbnail-classic-title">
														<a href="">
															<div class="button-wrap" data-caption-animate="fadeInUp" data-caption-delay="400">
																<a class="button button-lg button-shadow-4 button-secondary-2 button-zakaria"
																href="single-product.html">Eu quero</a>
															</div>
														</a>
													</h5>

											</div>
									</div>
									<div class="thumbnail-classic-figure"><img src="{{ url('assets/images/site/boxAvulso/boxFevereiro.jpg') }}" alt="" width="270" style="height: 180px;" /><h5 class="" style="margin-top: 15px;">Box Fevereiro/2021</h5>
									</div>
									</article>
							</div>
					</div>
			</div>
	</div>
</section>
@endforeach
