@php
	$schoolInformation = schoolInformation();
@endphp
{{-- @foreach ($pageData->content as $item) --}}
<footer class="section footer-modern footer-modern-2">
	<div class="footer-modern-body section-sm context-dark" style="background-color: #9873a8;">
			<div class="container">
				<div class="row col-md-12" style="justify-content: end;">
					<ul class="list-inline list-social-3 list-inline-sm" style="margin-left: 20px;">
						<li>
								<a class="icon mdi mdi-facebook icon-xxs" href="https://www.facebook.com/bookboxsaude/" target="_blank" style="color: #fff"></a>
						</li>
						<li>
								<a class="icon mdi mdi-instagram icon-xxs" href="https://www.instagram.com/bookboxsaude/" target="_blank" style="color: #fff"></a>
						</li>
						<li>
								<a class="icon mdi mdi-youtube-play icon-xxs" href="https://www.youtube.com/channel/UCh2dbFaDZWrS_Hz5-ZQNYwA" target="_blank" style="color: #fff"></a>
						</li>
						<li>
								<a class="icon mdi mdi-whatsapp icon-xxs" href="https://api.whatsapp.com/send?phone=5511976816349&text=Vamos%20falar%20sobre%20a%20Bookbox!" target="_blank" style="color: #fff"></a>
						</li>
					</ul>
				</div>

					<div class="row row-40 row-md-50">
						<div class="row">
							<div class="col-sm-6 col-md-5 col-lg-4 col-xl-3 wow fadeInRight" data-wow-delay=".2s">
									{{-- <h5 class="footer-modern-title">Contato: </h5>
									<h6 class="footer-modern-title">Bookbox - Saúde Integrada </h6> --}}
									<ul class="contacts-creative">
										<div class="unit unit-spacing-sm flex-column flex-md-row align-center">
												<a href="#" target="_blank"><img src="{{ url ('assets/images/site/Logo_Negativo_saude.png')}}" style="width: 100%; max-width: 240px; margin-top: -50px; margin-left: 15px;" /></a>
										</div>
									</ul>
							</div>


							<div class="col-sm-9 col-md-9 col-lg-9 wow fadeInRight" data-wow-delay=".1s">
								<div class="unit unit-spacing-sm flex-column flex-md-row">
									{{-- <p class="text-justify">{!! $item['text_pt'] !!}</p> --}}
									<p class="text-justify">Bookbox Saúde é um clube de assinatura de livros na área de saúde, bem-estar e autocuidado. Todos os meses enviamos uma caixa com livros e mimos fofos para você ter mais equilíbrio nos principais pilares da sua vida: saúde física, mental, emocional, financeira e também cuidar da sua alimentação. Um acompanhamento mensal, desenvolvido com exclusividade para você ter uma vida cheia de saúde e vitalidade.</p>
								</div>
									{{-- <h5 class="footer-modern-title">Saiba mais</h5> --}}
							</div>
					</div>

							<div class="row col-md-12 col sm-12 col-lg-12" style="margin: 15px; margin-top: 0px;">

								<div class="col-sm-3 col-md-3 col-lg-3 wow fadeInRight" data-wow-delay=".1s">
									{{-- <ul class="footer-modern-list footer-modern-list-2 d-sm-inline-block d-md-block"> --}}
										{{-- <li><a href="grid-shop.html">ShopBox</a></li> --}}
										{{-- <li><a href="blog-list.html">Blog Post</a></li> --}}
										<div class="unit-body"><a href="/about" style="color: #fff"> - Sobre Nós</a></div><br/>
										<div class="unit-body"><a href="/privacy-policy" style="color: #fff"> - Termos e Condições</a></div><br/>
										<div class="unit-body"><a href="/pricing-list" style="color: #fff"> - Assinar</a></div>
										{{-- <li><a href="#">Contato</a></li> --}}
									{{-- </ul> --}}
								</div>

								<div class="col-sm-3 col-md-3 col-lg-3 wow fadeInRight" data-wow-delay=".1s">
									<h5 class="footer-modern-title">Formas de pagamento</h5>
									<div class="row" style="margin-left: 5px;">
										{{-- <ul class="footer-modern-list footer-modern-list-2 d-sm-inline-block d-md-block"> --}}
											<ul><img src="{{ url ('assets/images/site/formasPagamento/mastercard.svg')}}" alt="" class="" style="width: 50px;"></ul>
											<ul><img src="{{ url ('assets/images/site/formasPagamento/visa.svg')}}" alt="" class="" style="width: 50px; margin-left: 25px;"></ul>
												<ul><img src="{{ url ('assets/images/site/formasPagamento/boleto.svg')}}" alt="" class="" style="width: 65px; margin-left: 25px; margin-top: -8px;"></ul>
										{{-- </ul> --}}
									</div>
								</div>

									<div class="col-sm-3 col-md-3 col-lg-3 col-xl-3 wow fadeInRight" data-wow-delay=".2s">
										{{-- <h5 class="footer-modern-title">Credenciais Bookbox: </h5> --}}
										<ul class="contacts-creative">
												<li>
														<div class="unit unit-spacing-sm flex-column flex-md-row">

														</div>
												</li>
												<li>
														<div class="unit unit-spacing-sm flex-column flex-md-row">
																{{-- <div class="unit-left"><span class="icon mdi mdi-phone"></span></div> --}}
																{{-- <p class="unit-body"><a href="tel:+55-11-97681-6349" target="_blank">(11) 97681-6349</a></p> --}}
																<div class="unit-body"><span>CNPJ:</span><span class=""></span><span style="margin-left: 15px;">62.328.984/0001-91</span></div>
														</div>
												</li>
												<li>
														<div class="unit unit-spacing-sm flex-column flex-md-row">
																<div class="unit-left">
																	<p style="color: #fff">Av. Armando Ferrentini, 388</p>
																	<p style="color: #fff">Paraíso - São Paulo - SP</p>
																</div>
																{{-- <div class="unit-body"><a href="mailto:atendimento@bookbox.com.br?subject=Informação sobre a Bookbox" target="_blank">atendimento@bookbox.com.br</a></div> --}}
														</div>
												</li>
										</ul>
									</div>

									<div class="col-sm-3 col-md-3 col-lg-3 col-xl-3 wow fadeInRight" data-wow-delay=".2s">
										<h5 class="footer-modern-title">Contato: </h5>
										<ul class="contacts-creative">
												<li>
														<div class="unit unit-spacing-sm flex-column flex-md-row">

														</div>
												</li>
												<li>
														<div class="unit unit-spacing-sm flex-column flex-md-row">
																{{-- <div class="unit-left"><span class="icon mdi mdi-phone"></span></div> --}}
																<p class="unit-body"><a href="tel:+55-11-97681-6349" target="_blank">(11) 97681-6349</a></p>
																{{-- <div class="unit-body"><span>CNPJ:</span><span class=""></span><span style="margin-left: 15px;">62.328.984/0001-91</span></div> --}}
														</div>
												</li>
												<li>
														<div class="unit unit-spacing-sm flex-column flex-md-row">
																{{-- <div class="unit-left"><p style="color: #fff">Av. Armando Ferrentini, 388 - Paraíso	São Paulo - SP</p> --}}
																</div>
																<div class="unit-body"><a href="mailto:atendimento@bookbox.com.br?subject=Informação sobre a Bookbox" target="_blank">atendimento@bookbox.com.br</a></div>
														</div>
												</li>
										</ul>
									</div>
								</div>
							</div>

					</div>
			</div>
	</div>
	<div class="footer-modern-panel text-center" style="background-color: #9873a8">
			<div class="container">
					<p class="rights"><span>&copy;&nbsp; </span><span
									class="copyright-year"></span><span>&nbsp;</span><span>2021 - Bookbox Saúde - Todos os direitos reservados.</span> <span></span> <span style="margin-right: 75px;"></span>Powered by:<a href="https://gigapixel.com.br/" target="_blank"><img src="{{ url ('assets/images/site/logo_gigapixel.png')}}" style="width: 100%; max-width: 150px; margin-left: 25px;" /></a></p>
			</div>
	</div>
</footer>
{{-- @endforeach --}}
<!--/footer-->
