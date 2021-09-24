@foreach ($pageData->content as $item)
<section id="editions" class="section section-xxl swiper-slide-call" style="background-image: url('{{$item['image_bg']}}');">
	<div class="container">
			<h2 class="text-transform-capitalize wow fadeScale">Confira nossas edições anteriores</h2>
			<div class="isotope-wrap">
					{{-- <div class="isotope-filters">
							<button
									class="isotope-filters-toggle button button-sm button-icon button-icon-right button-default-outline"
									data-custom-toggle=".isotope-filters-list" data-custom-toggle-disable-on-blur="true"
									data-custom-toggle-hide-on-blur="true"><span
											class="icon mdi mdi-chevron-down"></span>Filter</button>
							<div class="isotope-filters-list-wrap">
									<ul class="isotope-filters-list">
											<li><a class="active" href="#" data-isotope-filter="*">All</a></li>
											<li><a href="#" data-isotope-filter="Type 1">Fruits</a></li>
											<li><a href="#" data-isotope-filter="Type 2">Vegetables</a></li>
									</ul>
							</div>
					</div> --}}
					<div class="row row-30 isotope isotope-custom-1" data-lightgallery="group">
							<div class="col-sm-6 col-lg-4 col-xl-3 isotope-item" data-filter="Type 1">
									<!-- Thumbnail Classic-->
									<article class="thumbnail-classic block-1">
											<div class="thumbnail-classic-figure"><img
															src="{{ url('assets/images/site/boxAvulso/bannerBoxAgosto.png') }}" alt=""
															width="270" style="height: 180px;" />
											</div>
											<div class="thumbnail-classic-caption">
													<div>
															<h5 class="thumbnail-classic-title"><a href="single-product.html">Box Agosto/ 2021</a></h5>
															<div class="button-wrap" data-caption-animate="fadeInUp" data-caption-delay="400"><a
																	class="button button-lg button-shadow-4 button-secondary-2 button-zakaria"
																	href="grid-shop.html">Eu quero</a></div>
													</div>
											</div>
									</article>
							</div>
							<div class="col-sm-6 col-lg-4 col-xl-3 isotope-item" data-filter="Type 1">
									<!-- Thumbnail Classic-->
									<article class="thumbnail-classic block-1">
											<div class="thumbnail-classic-figure"><img
															src="{{ url('assets/images/site/boxAvulso/boxJulho.png') }}" alt=""
															width="270" style="height: 180px;" />
											</div>
											<div class="thumbnail-classic-caption">
													<div>
															<h5 class="thumbnail-classic-title"><a href="single-product.html">Box Julio/ 2021</a></h5>
															<div class="button-wrap" data-caption-animate="fadeInUp" data-caption-delay="400"><a
																	class="button button-lg button-shadow-4 button-secondary-2 button-zakaria"
																	href="grid-shop.html">Eu quero</a></div>
													</div>
											</div>
									</article>
							</div>
							<div class="col-sm-6 col-lg-4 col-xl-3 isotope-item" data-filter="Type 1">
									<!-- Thumbnail Classic-->
									<article class="thumbnail-classic block-1">
											<div class="thumbnail-classic-figure"><img
															src="{{ url('assets/images/site/boxAvulso/boxJunho.png') }}" alt=""
															width="270" style="height: 180px;" />
											</div>
											<div class="thumbnail-classic-caption">
													<div>
															<h5 class="thumbnail-classic-title"><a href="single-product.html">Box Junho/ 2021</a></h5>
															<div class="button-wrap" data-caption-animate="fadeInUp" data-caption-delay="400"><a
																	class="button button-lg button-shadow-4 button-secondary-2 button-zakaria"
																	href="grid-shop.html">Eu quero</a></div>
													</div>
											</div>
									</article>
							</div>
							<div class="col-sm-6 col-lg-4 col-xl-3 isotope-item" data-filter="Type 1">
									<!-- Thumbnail Classic-->
									<article class="thumbnail-classic block-1">
											<div class="thumbnail-classic-figure"><img
															src="{{ url('assets/images/site/boxAvulso/boxMaio.png') }}" alt=""
															width="270" style="height: 180px;" />
											</div>
											<div class="thumbnail-classic-caption">
													<div>
															<h5 class="thumbnail-classic-title"><a href="single-product.html">Box Maio/ 2021</a></h5>
															<div class="button-wrap" data-caption-animate="fadeInUp" data-caption-delay="400"><a
																	class="button button-lg button-shadow-4 button-secondary-2 button-zakaria"
																	href="grid-shop.html">Eu quero</a></div>
													</div>
											</div>
									</article>
							</div>
							<div class="col-sm-6 col-lg-4 col-xl-3 isotope-item" data-filter="Type 1">
									<!-- Thumbnail Classic-->
									<article class="thumbnail-classic block-1">
											<div class="thumbnail-classic-figure"><img
															src="{{ url('assets/images/site/boxAvulso/boxAbril.png') }}" alt=""
															width="270" style="height: 180px;" />
											</div>
											<div class="thumbnail-classic-caption">
													<div>
															<h5 class="thumbnail-classic-title"><a href="single-product.html">Box Abril/ 2021</a></h5>
															<div class="button-wrap" data-caption-animate="fadeInUp" data-caption-delay="400"><a
																	class="button button-lg button-shadow-4 button-secondary-2 button-zakaria"
																	href="grid-shop.html">Eu quero</a></div>
													</div>
											</div>
									</article>
							</div>
							<div class="col-sm-6 col-lg-4 col-xl-3 isotope-item" data-filter="Type 1">
									<!-- Thumbnail Classic-->
									<article class="thumbnail-classic block-1">
											<div class="thumbnail-classic-figure"><img
															src="{{ url('assets/images/site/boxAvulso/boxMarço.png') }}" alt=""
															width="270" style="height: 180px;" />
											</div>
											<div class="thumbnail-classic-caption">
													<div>
															<h5 class="thumbnail-classic-title"><a href="single-product.html">Box Março/ 2021</a></h5>
															<div class="button-wrap" data-caption-animate="fadeInUp" data-caption-delay="400"><a
																	class="button button-lg button-shadow-4 button-secondary-2 button-zakaria"
																	href="grid-shop.html">Eu quero</a></div>
													</div>
											</div>
									</article>
							</div>
							<div class="col-sm-6 col-lg-4 col-xl-3 isotope-item" data-filter="Type 1">
									<!-- Thumbnail Classic-->
									<article class="thumbnail-classic block-1">
											<div class="thumbnail-classic-figure"><img
															src="{{ url('assets/images/site/boxAvulso/boxFevereiro.jpg') }}" alt=""
															width="270" style="height: 180px;" />
											</div>
											<div class="thumbnail-classic-caption">
													<div>
															<h5 class="thumbnail-classic-title"><a href="single-product.html">Box Fevereiro/ 2021</a></h5>
															<div class="button-wrap" data-caption-animate="fadeInUp" data-caption-delay="400"><a
																	class="button button-lg button-shadow-4 button-secondary-2 button-zakaria"
																	href="grid-shop.html">Eu quero</a></div>
													</div>
											</div>
									</article>
							</div>
							{{-- <div class="col-sm-6 col-lg-4 col-xl-3 isotope-item" data-filter="Type 2">
									<!-- Thumbnail Classic-->
									<article class="thumbnail-classic block-1">
											<div class="thumbnail-classic-figure"><img
															src="{{ url('assets/images/masonry-gallery-2-270x530.jpg') }}" alt=""
															width="270" height="530" />
											</div>
											<div class="thumbnail-classic-caption">
													<div>
															<h5 class="thumbnail-classic-title"><a href="single-product.html">Avocado
																			smoothie</a></h5>
															<div class="thumbnail-classic-price">$13.99</div>
															<div class="thumbnail-classic-button-wrap">
																	<div class="thumbnail-classic-button">
																			<a class="button button-gray-6 button-zakaria fl-bigmug-line-search74"
																					href="images/masonry-gallery-2-1200x800-original.jpg"
																					data-lightgallery="item"><img
																							src="{{ url('assets/images/masonry-gallery-2-270x530.jpg') }}"
																							alt="" width="270" height="530" /></a>
																	</div>
																	<div class="thumbnail-classic-button">
																			<a class="button button-primary button-zakaria fl-bigmug-line-shopping202"
																					href="#"></a>
																	</div>
															</div>
													</div>
											</div>
									</article>
							</div>
							<div class="col-sm-6 col-lg-4 col-xl-3 isotope-item" data-filter="Type 1">
									<!-- Thumbnail Classic-->
									<article class="thumbnail-classic block-1">
											<div class="thumbnail-classic-figure"><img
															src="{{ url('assets/images/masonry-gallery-3-270x250.jpg') }}" alt=""
															width="270" height="250" />
											</div>
											<div class="thumbnail-classic-caption">
													<div>
															<h5 class="thumbnail-classic-title"><a href="single-product.html">Grapefruit
																			smoothie</a></h5>
															<div class="thumbnail-classic-price">$10.99</div>
															<div class="thumbnail-classic-button-wrap">
																	<div class="thumbnail-classic-button">
																			<a class="button button-gray-6 button-zakaria fl-bigmug-line-search74"
																					href="images/masonry-gallery-3-1200x800-original.jpg"
																					data-lightgallery="item"><img
																							src="{{ url('assets/images/masonry-gallery-3-270x250.jpg') }}"
																							alt="" width="270" height="250" /></a>
																	</div>
																	<div class="thumbnail-classic-button">
																			<a class="button button-primary button-zakaria fl-bigmug-line-shopping202"
																					href="#"></a>
																	</div>
															</div>
													</div>
											</div>
									</article>
							</div>
							<div class="col-sm-6 col-lg-4 col-xl-3 isotope-item" data-filter="Type 2">
									<!-- Thumbnail Classic-->
									<article class="thumbnail-classic block-1">
											<div class="thumbnail-classic-figure"><img
															src="{{ url('assets/images/masonry-gallery-4-270x250.jpg') }}" alt=""
															width="270" height="250" />
											</div>
											<div class="thumbnail-classic-caption">
													<div>
															<h5 class="thumbnail-classic-title"><a href="single-product.html">Raspberry
																			smoothie</a></h5>
															<div class="thumbnail-classic-price">$8.99</div>
															<div class="thumbnail-classic-button-wrap">
																	<div class="thumbnail-classic-button">
																			<a class="button button-gray-6 button-zakaria fl-bigmug-line-search74"
																					href="images/masonry-gallery-4-1200x800-original.jpg"
																					data-lightgallery="item"><img
																							src="{{ url('assets/images/masonry-gallery-4-270x250.jpg') }}"
																							alt="" width="270" height="250" /></a>
																	</div>
																	<div class="thumbnail-classic-button">
																			<a class="button button-primary button-zakaria fl-bigmug-line-shopping202"
																					href="#"></a>
																	</div>
															</div>
													</div>
											</div>
									</article>
							</div>
							<div class="col-sm-6 col-lg-4 col-xl-3 isotope-item" data-filter="Type 1">
									<!-- Thumbnail Classic-->
									<article class="thumbnail-classic block-1">
											<div class="thumbnail-classic-figure"><img
															src="{{ url('assets/images/masonry-gallery-5-270x250.jpg') }}" alt=""
															width="270" height="250" />
											</div>
											<div class="thumbnail-classic-caption">
													<div>
															<h5 class="thumbnail-classic-title"><a href="single-product.html">Kiwi &amp;
																			avocado mix</a></h5>
															<div class="thumbnail-classic-price">$14.99</div>
															<div class="thumbnail-classic-button-wrap">
																	<div class="thumbnail-classic-button">
																			<a class="button button-gray-6 button-zakaria fl-bigmug-line-search74"
																					href="images/grid-gallery-2-1200x800-original.jpg"
																					data-lightgallery="item"><img
																							src="{{ url('assets/images/masonry-gallery-5-270x250.jpg') }}"
																							alt="" width="270" height="250" /></a>
																	</div>
																	<div class="thumbnail-classic-button">
																			<a class="button button-primary button-zakaria fl-bigmug-line-shopping202"
																					href="#"></a>
																	</div>
															</div>
													</div>
											</div>
									</article>
							</div>
							<div class="col-sm-6 col-lg-4 col-xl-6 isotope-item" data-filter="Type 2">
									<!-- Thumbnail Classic-->
									<article class="thumbnail-classic block-1">
											<div class="thumbnail-classic-figure"><img
															src="{{ url('assets/images/masonry-gallery-6-570x530.jpg') }}" alt=""
															width="570" height="530" />
											</div>
											<div class="thumbnail-classic-caption">
													<div>
															<h5 class="thumbnail-classic-title"><a href="single-product.html">Green fruit
																			mix</a></h5>
															<div class="thumbnail-classic-price">$16.99</div>
															<div class="thumbnail-classic-button-wrap">
																	<div class="thumbnail-classic-button">
																			<a class="button button-gray-6 button-zakaria fl-bigmug-line-search74"
																					href="images/grid-gallery-6-1200x800-original.jpg"
																					data-lightgallery="item"><img
																							src="{{ url('assets/images/masonry-gallery-6-570x530.jpg') }}"
																							alt="" width="570" height="530" /></a>
																	</div>
																	<div class="thumbnail-classic-button">
																			<a class="button button-primary button-zakaria fl-bigmug-line-shopping202"
																					href="#"></a>
																	</div>
															</div>
													</div>
											</div>
									</article>
							</div>
							<div class="col-sm-6 col-lg-8 col-xl-6 isotope-item" data-filter="Type 1">
									<!-- Thumbnail Classic-->
									<article class="thumbnail-classic block-1">
											<div class="thumbnail-classic-figure"><img
															src="{{ url('assets/images/masonry-gallery-7-570x250.jpg') }}" alt=""
															width="570" height="250" />
											</div>
											<div class="thumbnail-classic-caption">
													<div>
															<h5 class="thumbnail-classic-title"><a href="single-product.html">Watermelon
																			energy bowl</a></h5>
															<div class="thumbnail-classic-price">$10.99</div>
															<div class="thumbnail-classic-button-wrap">
																	<div class="thumbnail-classic-button">
																			<a class="button button-gray-6 button-zakaria fl-bigmug-line-search74"
																					href="images/grid-gallery-1-1200x800-original.jpg"
																					data-lightgallery="item"><img
																							src="{{ url('assets/images/masonry-gallery-7-570x250.jpg') }}"
																							alt="" width="570" height="250" /></a>
																	</div>
																	<div class="thumbnail-classic-button">
																			<a class="button button-primary button-zakaria fl-bigmug-line-shopping202"
																					href="#"></a>
																	</div>
															</div>
													</div>
											</div>
									</article>
							</div> --}}
					</div>
			</div>
		</div>
	</section>
	@endforeach
