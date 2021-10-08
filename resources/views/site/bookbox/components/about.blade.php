@foreach ($pageData->content as $item)
<section id="about" class="section section-xl bg-default text-md-left">
	<div class="container">
		<div class="row row-40 row-md-60 justify-content-center align-items-xl-center" style="margin-top: -100px;">
			<div class="col-md-11 col-lg-6 col-xl-5">
				<!-- Quote Classic Big-->
				<article class="quote-classic-big inset-xl-right-30">
					<div class="heading-3 text-transform-capitalize quote-classic-big-text">
						<div class="q">Saúde &amp; bem-estar para você</div>
					</div>
				</article>
				<!-- Bootstrap tabs-->
				<div class="tabs-custom tabs-horizontal tabs-line" id="tabs-1">
					<!-- Nav tabs-->
					<div class="nav-tabs-wrap">
						<ul class="nav nav-tabs">
							<li class="nav-item" role="presentation"><a class="nav-link active" href="#tabs-1-1" data-toggle="tab">Sobre a Book</a></li>
							<li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-1-2" data-toggle="tab">Nosso Trabalho</a></li>
							<li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-1-3" data-toggle="tab">Nosso Objetivo</a></li>
						</ul>
					</div>
					<!-- Tab panes-->
					<div class="tab-content">
						<div class="tab-pane fade show active" id="tabs-1-1">
							<p class="text-justify">Somos a caixinha da saúde e do bem-estar!
								Contando com a curadoria de especialistas referência nas áreas, trazemos a cada mês conteúdos novos, incríveis e exclusivos, buscando levar saúde, bem-estar e beleza diretamente para a casa de nossos assinantes.</p>
							{{-- <p>Ubi est peritus devatio? A falsis, adelphis peritus apolloniates. Est raptus clabulare, cesaris. Cum pulchritudine manducare, omnes genetrixes captis bassus</p> --}}
						</div>
						<div class="tab-pane fade" id="tabs-1-2">
							<p class="text-justify">Toda a formatação é baseada em 4 grandes pilares: Saúde física, mental, espiritual e financeira.</p>
							<p class="text-justify">Para abordarmos esses pilares, cada box é composto por 2 livros, marcadores de página, guia de leitura, cartão postal colecionável e um presente surpresa exclusivo, tudo preparado com carinho para que você consiga aproveitar e aplicar em sua vida os conhecimentos que trazemos a cada edição.</p>
						</div>
						<div class="tab-pane fade" id="tabs-1-3">
							<p class="text-justify">A Bookbox acompanha você em todos os passos na mudança dos hábitos em busca de uma vida mais saudável. </p>
							<p class="text-justify">Assine agora mesmo e garanta condições imperdíveis!</p>
							<a class="button button-lg button-shadow-2 button-primary button-zakaria" href="#">Assinar Agora</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-11 col-lg-6 col-xl-7">
				<div class="slick-slider-1 inset-xl-left-35">
					<!-- Slick Carousel-->
					<div class="slick-slider carousel-parent slick-nav-1 slick-nav-2" id="carousel-parent" data-items="1" data-autoplay="true" data-slide-effect="true" data-child="#child-carousel" data-for="#child-carousel" data-arrows="true">
						<div class="item"><img src="{{ url ('assets/images/site/home/last/banner_img.png')}}" alt="" width="634" height="373"/>
						</div>
						<div class="item"><img src="{{ url ('assets/images/site/01.png')}}" alt="" width="634" height="373"/>
						</div>
						<div class="item"><img src="{{ url ('assets/images/site/oQueVem.png')}}" alt="" width="634" height="373"/>
						</div>
						<div class="item"><img src="{{ url ('assets/images/site/Logo_estilizado.png')}}" alt="" width="634" height="373" style="margin-top: 150px;"/>
						</div>
					</div>
					<div class="slick-slider child-carousel" id="child-carousel" data-items="3" data-sm-items="4" data-md-items="4" data-lg-items="4" data-xl-items="4" data-xxl-items="4" data-for="#carousel-parent">
						<div class="item"><img src="{{ url ('assets/images/site/home/last/banner_img.png')}}" alt="" width="143" height="114"/>
						</div>
						<div class="item"><img src="{{ url ('assets/images/site/01.png')}}" alt="" width="143" height="114"/>
						</div>
						<div class="item"><img src="{{ url ('assets/images/site/oQueVem.png')}}" alt="" width="143" height="114"/>
						</div>
						<div class="item"><img src="{{ url ('assets/images/site/Logo_estilizado.png')}}" alt="" width="143" height="114" style="margin-top: 25px;"/>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endforeach
