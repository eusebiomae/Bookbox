@php
	$schoolInformation = schoolInformation();
@endphp
<footer class="section footer-modern footer-modern-2">
	<div class="footer-modern-body section-xl context-dark" style="background-color: #855f9f">
			<div class="container">
					<div class="row row-40 row-md-50 justify-content-xl-between">
							<div class="col-sm-6 col-md-5 col-lg-4 col-xl-3 wow fadeInRight" data-wow-delay=".2s">
									{{-- <h5 class="footer-modern-title">Contato: </h5>
									<h6 class="footer-modern-title">Bookbox - Saúde Integrada </h6> --}}
									<ul class="contacts-creative">
										<div class="unit unit-spacing-sm flex-column flex-md-row align-center">
												<a href="#" target="_blank"><img src="{{ url ('assets/images/site/Logo_Negativo_saude.png')}}" style="width: 100%; max-width: 240px; margin-top: -50px; margin-left: 15px;" /></a>
										</div>
											<li>
												<div class="unit unit-spacing-sm flex-column flex-md-row">
													<p class="text-justify">{!! $item['text_pt'] !!}</p>
													{{-- <p class="text-justify">A Bookbox Saúde é uma caixa com doses de saúde, autocuidado, equilíbrio e bem-estar físico, mental e financeiro. Ela é desenvolvida com exclusividade para você ter uma vida cheia de saúde e vitalidade!</p> --}}
											</div>
											</li>
									</ul>
									<ul class="list-inline list-social-3 list-inline-sm" style="margin-left: 20px;">
											<li>
													<a class="icon mdi mdi-facebook icon-xxs" href="https://www.facebook.com/bookboxsaude/" target="_blank"></a>
											</li>
											<li>
													<a class="icon mdi mdi-instagram icon-xxs" href="https://www.instagram.com/bookboxsaude/" target="_blank"></a>
											</li>
											<li>
													<a class="icon mdi mdi-youtube-play icon-xxs" href="https://www.youtube.com/channel/UCh2dbFaDZWrS_Hz5-ZQNYwA" target="_blank"></a>
											</li>
											<li>
													<a class="icon mdi mdi-whatsapp icon-xxs" href="https://api.whatsapp.com/send?phone=5511976816349&text=Vamos%20falar%20sobre%20a%20Bookbox!" target="_blank"></a>
											</li>
									</ul>
							</div>
							<div class="col-sm-6 col-md-7 col-lg-5 wow fadeInRight" data-wow-delay=".1s">
									{{-- <h5 class="footer-modern-title">Links Importantes</h5>
									<ul class="footer-modern-list footer-modern-list-2 d-sm-inline-block d-md-block">
											<li><a href="grid-shop.html">ShopBox</a></li>
											<li><a href="blog-list.html">Blog Post</a></li>
											<li><a href="/about">Sobre Nós</a></li>
											<li><a href="/privacy-policy">Termos e Condições</a></li>
											<li><a href="contact-us.html">Contato</a></li>
											<li><a href="/signature">Assinar</a></li>
									</ul><br/><br/> --}}
									<h5 class="footer-modern-title">Formas de pagamento</h5>
									<div class="row" style="margin-left: 5px;">
									{{-- <ul class="footer-modern-list footer-modern-list-2 d-sm-inline-block d-md-block"> --}}
											<ul><img src="{{ url ('assets/images/site/formasPagamento/mastercard.svg')}}" alt="" class="" style="width: 50px;"></ul>
											<ul><img src="{{ url ('assets/images/site/formasPagamento/visa.svg')}}" alt="" class="" style="width: 50px; margin-left: 25px;"></ul>
											<ul><img src="{{ url ('assets/images/site/formasPagamento/boleto.svg')}}" alt="" class="" style="width: 65px; margin-left: 25px; margin-top: -8px;"></ul>
									{{-- </ul> --}}
								</div>
							</div>
							<div class="col-sm-6 col-md-5 col-lg-4 col-xl-3 wow fadeInRight" data-wow-delay=".2s">
									<h5 class="footer-modern-title">Credenciais Bookbox: </h5>
									<ul class="contacts-creative">
											<li>
													<div class="unit unit-spacing-sm flex-column flex-md-row">

													</div>
											</li>
											<li>
													<div class="unit unit-spacing-sm flex-column flex-md-row">
															{{-- <div class="unit-left"><span class="icon mdi mdi-phone"></span></div> --}}
															<div class="unit-body"><a href="tel:+55-11-97681-6349" target="_blank">(11) 97681-6349</a></div>
													</div>
											</li>
											<li>
													<div class="unit unit-spacing-sm flex-column flex-md-row">
															{{-- <div class="unit-left"><span class="icon mdi mdi-email-outline"></span> --}}
															</div>
															<div class="unit-body"><a href="mailto:atendimento@bookbox.com.br?subject=Informação sobre a Bookbox" target="_blank">atendimento@bookbox.com.br</a></div>
													</div>
											</li>
									</ul>
									{{-- <ul class="list-inline list-social-3 list-inline-sm">
											<li>
													<a class="icon mdi mdi-facebook icon-xxs" href="https://www.facebook.com/gigapixxel/?ref=bookmarks"></a>
											</li>
											<li>
													<a class="icon mdi mdi-twitter icon-xxs" href="https://twitter.com/gigapixxel"></a>
											</li>
											<li>
													<a class="icon mdi mdi-instagram icon-xxs" href="https://www.instagram.com/gigapixxel/"></a>
											</li>
											<li>
													<a class="icon mdi mdi-youtube-play icon-xxs" href="https://www.youtube.com/channel/UCMjqS_krg7VCKm35J9LtqtQ"></a>
											</li>
											<li>
													<a class="icon mdi mdi-linkedin icon-xxs" href="https://www.linkedin.com/company/12636001/admin/"></a>
											</li>
											<li>
													<a class="icon mdi mdi-whatsapp icon-xxs" href="https://api.whatsapp.com/send?phone=5516982651020&text=Vamos%20falar%20sobre%20a%20Gigapixel!"></a>
											</li>
									</ul> --}}
							</div>
					</div>
			</div>
	</div>
	<div class="footer-modern-panel text-center" style="background-color: #855f9f">
			<div class="container">
					<p class="rights"><span>&copy;&nbsp; </span><span
									class="copyright-year"></span><span>&nbsp;</span><span>2021 - Bookbox Saude - Todos os direitos reservados.</span> <span></span> <span style="margin-right: 75px;"></span>Powered by:<a href="https://gigapixel.com.br/" target="_blank"><img src="{{ url ('assets/images/site/logo_gigapixel.png')}}" style="width: 100%; max-width: 150px; margin-left: 25px;" /></a></p>
			</div>
	</div>
</footer>
<!--/footer-->
