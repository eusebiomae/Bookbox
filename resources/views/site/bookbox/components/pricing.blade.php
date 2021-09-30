@foreach ($pageData->content as $item)
<section id="boxes" class="section section-xxl swiper-slide-pilars" style="background-image: url('{{ $item['image_bg'] }}');">
	<div class="container">
		<h3 class="text-transform-capitalize wow fadeScale">Você merece uma vida plena</h3>
		<h5 class="text-transform-uppercase">Escolha o plano ideal para você</h5>
		<div class="row row-lg row-30 row-lg-50">
			<div class="col-sm-6 col-md-3 col-lg-3">
				<!-- Product-->
				<article class="product wow fadeInRight">
					<div class="product-body">
						<img src="{{ url('assets/images/site/tablet.png') }}" alt="" class="" style="margin-top: 35px; margin-bottom: 20px;">
						<h4 class="product-title" style="margin-top: 5px;">
							<a href="single-product.html">Sou digital</a>
						</h4>
						<div class="product-price-wrap">
							<div class="product-price" style="margin-bottom: 15px;">
								<h6 class="">R$ 39.90/mês</h6>
							</div>
							<div class=" product-price">
								Receba um link para download
							</div>
							<div class="product-price"> em seu e-mail.</div>
						</div>
						<div class="" style=" margin-top: 15px; margin-bottom: 100px;">
							<p class="">- Sem fidelidade: sem multa.</p>
							<p class="">- Boleto ou cartão de crédito.</p>
							{{-- <p class="">- </p> --}}
						</div>
					</div>
					<span class="   product-badge product-badge-new">Novo</span>
					<div class="product-button-wrap">
						<div class="button-wrap" data-caption-animate="fadeInUp" data-caption-delay="400">
							<a class="button button-lg button-shadow-4 button-secondary-2 button-zakaria" href="/pricing">
								Assine Agora
							</a>
						</div>
					</div>
				</article>
			</div>
			<div class="col-sm-6 col-md-3 col-lg-3">
				<!-- Product-->
				<article class="product wow fadeInRight">
					<div class="product-body">
						<img src="{{ url('assets/images/site/01.png') }}" alt="" class="" />
						<h4 class=" product-title" style="margin-top: 5px;">
							<a href="single-product.html">Cheirinho de livro</a>
						</h4>
						<div class="product-price-wrap">
							<div class="product-price" style="margin-bottom: 15px;">
								<h6 class="">R$ 89.90/mês</h6>
							</div>
							<div class=" product-price">Receba o seu box em
								casa.
							</div>
						</div>
						<div class="" style=" margin-top: 15px; margin-bottom: 100px;">
							<p class="">- Sem fidelidade: sem multa.</p>
							<p class="">- Boleto ou cartão de crédito.</p>
						</div>
					</div><span class="   product-badge product-badge-sale">Box</span>
					<div class="product-button-wrap">
						<div class="button-wrap" data-caption-animate="fadeInUp" data-caption-delay="400">
							<a class="button button-lg button-shadow-4 button-secondary-2 button-zakaria" href="/pricing">
								Assine Agora
							</a>
						</div>
					</div>
				</article>
			</div>
			<div class="col-sm-6 col-md-3 col-lg-3">
				<!-- Product-->
				<article class="product wow fadeInRight">
					<div class="product-body">
						<img src="{{ url('assets/images/site/01.png') }}" alt="" class="">
						<h4 class="product-title" style="margin-top: 5px;">
							<a href="single-product.html">Quero todos mês</a>
						</h4>
						<div class="product-price-wrap">
							<div class="product-price" style="margin-bottom: 15px;">
								<h6 class="">R$ 79.90/mês</h6>
							</div>
							<div class=" product-price">
								Receba o seu box em casa.
							</div>
						</div>
						<div class="" style=" margin-top: 15px; margin-bottom: 100px;">
							<p class="">- Com fidelidade: 6 meses.</p>
							<p class="">- Cartão de crédito.</p>
						</div>
					</div>
					<span class=" product-badge product-badge-sale">Box</span>
					<div class="product-button-wrap">
						<div class="button-wrap" data-caption-animate="fadeInUp" data-caption-delay="400">
							<a class="button button-lg button-shadow-4 button-secondary-2 button-zakaria" href="/pricing">
								Assine Agora
							</a>
						</div>
					</div>
				</article>
			</div>
			<div class="col-sm-6 col-md-3 col-lg-3">
				<!-- Product-->
				<article class="product wow fadeInRight">
					<div class="product-body">
						<img src="{{ url('assets/images/site/01.png') }}" alt="" class=""/>
						<h4 class=" product-title" style="margin-top: 5px;">
							<a href="single-product.html">Quero o ano todo</a>
						</h4>
						<div class="product-price-wrap">
							<div class="product-price" style="margin-bottom: 15px;">
								<h6 class="">R$ 76.90/mês</h6>
							</div>
							<div class=" product-price">
								Receba o seu box em casa.
							</div>
						</div>
						<div class="" style="margin-top: 15px; margin-bottom: 100px;">
							<p class="">- Com fidelidade: 12 meses.</p>
							<p class="">- Cartão de crédito.</p>
						</div>
					</div>
					<span class="product-badge product-badge-sale">Box</span>
					<div class="product-button-wrap">
						<div class="button-wrap" data-caption-animate="fadeInUp" data-caption-delay="400">
							<a class="button button-lg button-shadow-4 button-secondary-2 button-zakaria" href="/pricing">
								Assine Agora
							</a>
						</div>
					</div>
				</article>
			</div>
		</div>
	</div>
</section>
@endforeach
