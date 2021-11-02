@foreach ($pageData->content as $item)
<section id="editions" class="section section-xxl swiper-slide-editions" style="background-image: url('{{$item['image_bg']}}');">
	<div class="container">
			<div class="isotope-wrap">
					<div class="row row-30 row-lg-50">
						{{-- @foreach ($item as $product) --}}
						<div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
							<!-- Product-->
							<article class="product">
								<div class="product-body">
									<h5 class="product-title"><a href="/signature/{{ $product['id'] }}">{{$item->title_pt}}</a></h5>
									<div class="product-figure-box"><img src="{{$item->image}}" alt="" />
									</div>

									<div class="product-price-wrap">
										<div class="product-price">{{$item->text_pt}}</div>
									</div>
								</div>
								{{-- <div class="product-button-wrap">
									<div class="product-button">
										<a class="button button-secondary button-zakaria fl-bigmug-line-search74" href="/single-product/{{ $product['id'] }}" title="Detalhes"></a>
									</div>
									<div class="product-button">
										<a class="button button-primary button-zakaria fl-bigmug-line-shopping202" href="/signature/{{ $product['id'] }}" title="Eu quero"></a>
									</div>
								</div> --}}
							</article>
						</div>
						{{-- @endforeach --}}
					</div>
			</div>
	</div>
</section>
@endforeach
