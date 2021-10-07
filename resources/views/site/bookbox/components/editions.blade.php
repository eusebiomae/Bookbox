@foreach ($pageData->content as $item)
<section id="editions" class="section section-xxl swiper-slide-editions" style="background-image: url('{{$item['image_bg']}}');">
	<div class="container">
			<h2 class="text-transform-capitalize wow fadeScale">Confira nossas edições anteriores</h2>
			<div class="isotope-wrap">
					<div class="isotope-filters">
							<button
									class="isotope-filters-toggle button button-sm button-icon button-icon-right button-default-outline"
									data-custom-toggle=".isotope-filters-list" data-custom-toggle-disable-on-blur="true"
									data-custom-toggle-hide-on-blur="true"><span
											class="icon mdi mdi-chevron-down"></span>Filtrar</button>
							{{-- <div class="isotope-filters-list-wrap">
									<ul class="isotope-filters-list">
											<li><a class="active" href="#" data-isotope-filter="*">Todas</a></li>
											<li><a href="#" data-isotope-filter="Type 1">Últimos 3 meses</a></li>
											<li><a href="#" data-isotope-filter="Type 2">Mais antigas</a></li>
									</ul>
							</div> --}}
					</div>
					<div class="row row-30 row-lg-50">
						@foreach ($editions as $edition)
						<div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
							<!-- Product-->
							<article class="product">
								<div class="product-body">
									<div class="product-figure-box"><img src="{{$edition->img}}" alt="" />
									</div>
									<h5 class="product-title"><a href="single-product.html">{{$edition->title_pt}}</a></h5>

									<div class="product-price-wrap">
										<div class="product-price">{{$edition->subtitle_pt}}</div>
									</div>
								</div>
								<div class="product-button-wrap">
									<div class="product-button">
										<a class="button button-secondary button-zakaria fl-bigmug-line-search74" href="/box_blog" title="Detalhes"></a>
									</div>
									<div class="product-button">
										<a class="button button-primary button-zakaria fl-bigmug-line-shopping202" href="/signature/{{ $edition['id'] }}" title="Eu quero"></a>
									</div>
								</div>
							</article>
						</div>
						@endforeach
					</div>
			</div>
	</div>
</section>
@endforeach
