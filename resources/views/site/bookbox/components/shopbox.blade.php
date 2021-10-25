@foreach ($pageData->content as $item)
<section class="section section-xxl swiper-slide-shopbox bg-default text-md-left">
	<div class="container">
		<div class="row row-30 row-lg-50">
			<div class="col-lg-2 col-xl-2">
				<div class="aside row row-30 row-md-50 justify-content-md-between">
					<div class="aside-item col-sm-6 col-md-5 col-lg-12">
						<h6 class="aside-title">Categorias</h6>
						<ul class="list-shop-filter">
							<li>
								<label class="checkbox-inline">
									<input name="input-group-radio" value="checkbox-1" type="checkbox">Box Avulso
								</label>
							</li>
							<li>
								<label class="checkbox-inline">
									<input name="input-group-radio" value="checkbox-2" type="checkbox">Box Assinatura
								</label>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-lg-10 col-xl-10">
				<div class="row row-30 row-lg-50">
					@foreach ($products as $product)
					<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
						<!-- Product-->
						<article class="thumbnail-classic block-1">
							<div class="thumbnail-classic-caption">
								<div>
										<h5 class="thumbnail-classic-title text-justify" style="margin-top: 45px; margin-bottom: -25px;">{{$product->description_pt}}</h5>
										<div class="thumbnail-classic-price"></div>
										<div class="thumbnail-classic-button-wrap">
												<div class="thumbnail-classic-button">
													<a class="button button-primary button-zakaria fl-bigmug-line-shopping202" href="/signature/{{ $product['id'] }}" title="Eu quero"></a>
												</div>
										</div>
								</div>
							</div>

							<div class="product-body">
								<div class="product-figure-box"><img src="{{$product->img}}" alt="" style="width: 190px;"/>
								</div>
								<h5 class="product-title">{{$product->title_pt}}</h5>

								<div class="product-price-wrap">
									<div class="product-price">{{$product->subtitle_pt}}</div>
								</div>
							</div>

							@if ($product->course_category_id == 1)

								<span class="product-badge product-badge-sale">Venda</span>

							@else
							 	<span class="product-badge product-badge-sale" style="background: #ec7f6e">Box</span>

							@endif
						</article>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</section>
@endforeach

