@foreach ($pageData->content as $item)
<section id="our_team" class="section section-xxl swiper-slide-pilars" style="background-image: url('{{$item['image_bg']}}');">
	<div class="container">
			<h3 class="text-transform-none wow fadeScale">{{$item['title_pt']}}</h3>
			<p class="" style="padding: 15px;">{!! $item['text_pt'] !!}</p>
			<!-- Owl Carousel-->
			<div class="owl-carousel owl-style-9" data-items="2" data-sm-items="2" data-md-items="3" data-lg-items="6" data-margin="30" data-dots="true" data-mouse-drag="false" style="margin-bottom: -100px">
					<article class="team-modern box-sm wow slideInUp">
							<a class="" href="#"><img src="{{ url ('assets/images/site/perfil/Ivana.png')}}" alt="" style="width: 150px" /></a>
							<h5 class="team-modern-name"><a href="#">Ivana Lavanda</a></h5>
							<p class="team-modern-text">Nutricionista Funcional</p>
							{{-- <ul class="list-inline team-modern-list-social list-social-2 list-inline-sm">
									<li>
											<a class="icon mdi mdi-facebook" href="#"></a>
									</li>
									<li>
											<a class="icon mdi mdi-twitter" href="#"></a>
									</li>
									<li>
											<a class="icon mdi mdi-instagram" href="#"></a>
									</li>
									<li>
											<a class="icon mdi mdi-google-plus" href="#"></a>
									</li>
							</ul> --}}
					</article>
					<article class="team-modern box-sm wow slideInUp" data-wow-delay=".1s">
							<a class="" href="#"><img src="{{ url ('assets/images/site/perfil/Rafael.png')}}" alt="" style="width: 150px" /></a>
							<h5 class="team-modern-name"><a href="#">Rafael Ibraim</a></h5>
							<p class="team-modern-text">Fisioterapeuta</p>
							{{-- <ul class="list-inline team-modern-list-social list-social-2 list-inline-sm">
									<li>
											<a class="icon mdi mdi-facebook" href="#"></a>
									</li>
									<li>
											<a class="icon mdi mdi-twitter" href="#"></a>
									</li>
									<li>
											<a class="icon mdi mdi-instagram" href="#"></a>
									</li>
									<li>
											<a class="icon mdi mdi-google-plus" href="#"></a>
									</li>
							</ul> --}}
					</article>
					<article class="team-modern box-sm wow slideInUp" data-wow-delay=".2s">
							<a class="" href="#"><img src="{{ url ('assets/images/site/perfil/Vanessa-Oliveira.png')}}" alt="" style="width: 150px" /></a>
							<h5 class="team-modern-name"><a href="#">Vanessa Oliveira</a></h5>
							<p class="team-modern-text">Consultora Financeira</p>
							{{-- <ul class="list-inline team-modern-list-social list-social-2 list-inline-sm">
									<li>
											<a class="icon mdi mdi-facebook" href="#"></a>
									</li>
									<li>
											<a class="icon mdi mdi-twitter" href="#"></a>
									</li>
									<li>
											<a class="icon mdi mdi-instagram" href="#"></a>
									</li>
									<li>
											<a class="icon mdi mdi-google-plus" href="#"></a>
									</li>
							</ul> --}}
					</article>
					<article class="team-modern box-sm wow slideInUp" data-wow-delay=".3s">
							<a class="" href="#"><img src="{{ url ('assets/images/site/perfil/Fernando.png')}}" alt="" style="width: 150px" /></a>
							<h5 class="team-modern-name"><a href="#">Fernando Zapparoli</a></h5>
							<p class="team-modern-text">Uro-oncologista</p>
							{{-- <ul class="list-inline team-modern-list-social list-social-2 list-inline-sm">
									<li>
											<a class="icon mdi mdi-facebook" href="#"></a>
									</li>
									<li>
											<a class="icon mdi mdi-twitter" href="#"></a>
									</li>
									<li>
											<a class="icon mdi mdi-instagram" href="#"></a>
									</li>
									<li>
											<a class="icon mdi mdi-google-plus" href="#"></a>
									</li>
							</ul> --}}
					</article>
					<article class="team-modern box-sm wow slideInUp" data-wow-delay=".3s">
							<a class="" href="#"><img src="{{ url ('assets/images/site/perfil/Lygia.png')}}" alt="" style="width: 150px" /></a>
							<h5 class="team-modern-name"><a href="#">Lygia Saad Rossi</a></h5>
							<p class="team-modern-text">Gastróloga</p>
							{{-- <ul class="list-inline team-modern-list-social list-social-2 list-inline-sm">
									<li>
											<a class="icon mdi mdi-facebook" href="#"></a>
									</li>
									<li>
											<a class="icon mdi mdi-twitter" href="#"></a>
									</li>
									<li>
											<a class="icon mdi mdi-instagram" href="#"></a>
									</li>
									<li>
											<a class="icon mdi mdi-google-plus" href="#"></a>
									</li>
							</ul> --}}
					</article>
					<article class="team-modern box-sm wow slideInUp" data-wow-delay=".3s">
							<a class="" href="#"><img src="{{ url ('assets/images/site/perfil/Ben.png')}}" alt="" style="width: 150px" /></a>
							<h5 class="team-modern-name"><a href="#">Ben Zruel</a></h5>
							<p class="team-modern-text">Consultor Financeiro</p>
							{{-- <ul class="list-inline team-modern-list-social list-social-2 list-inline-sm">
									<li>
											<a class="icon mdi mdi-facebook" href="#"></a>
									</li>
									<li>
											<a class="icon mdi mdi-twitter" href="#"></a>
									</li>
									<li>
											<a class="icon mdi mdi-instagram" href="#"></a>
									</li>
									<li>
											<a class="icon mdi mdi-google-plus" href="#"></a>
									</li>
							</ul> --}}
					</article>
					<article class="team-modern box-sm wow slideInUp" data-wow-delay=".3s">
							<a class="" href="#"><img src="{{ url ('assets/images/site/perfil/Caroline.png')}}" alt="" style="width: 150px" /></a>
							<h5 class="team-modern-name"><a href="#">Caroline Anselmi de Oliveira</a></h5>
							<p class="team-modern-text">Odontologista</p>
							{{-- <ul class="list-inline team-modern-list-social list-social-2 list-inline-sm">
									<li>
											<a class="icon mdi mdi-facebook" href="#"></a>
									</li>
									<li>
											<a class="icon mdi mdi-twitter" href="#"></a>
									</li>
									<li>
											<a class="icon mdi mdi-instagram" href="#"></a>
									</li>
									<li>
											<a class="icon mdi mdi-google-plus" href="#"></a>
									</li>
							</ul> --}}
					</article>
					<article class="team-modern box-sm wow slideInUp" data-wow-delay=".3s">
							<a class="" href="#"><img src="{{ url ('assets/images/site/perfil/Elaine.png')}}" alt="" style="width: 150px" /></a>
							<h5 class="team-modern-name"><a href="#">Elaine Quaglia</a></h5>
							<p class="team-modern-text">Dermatologista</p>
							{{-- <ul class="list-inline team-modern-list-social list-social-2 list-inline-sm">
									<li>
											<a class="icon mdi mdi-facebook" href="#"></a>
									</li>
									<li>
											<a class="icon mdi mdi-twitter" href="#"></a>
									</li>
									<li>
											<a class="icon mdi mdi-instagram" href="#"></a>
									</li>
									<li>
											<a class="icon mdi mdi-google-plus" href="#"></a>
									</li>
							</ul> --}}
					</article>
					<article class="team-modern box-sm wow slideInUp" data-wow-delay=".3s">
							<a class="" href="#"><img src="{{ url ('assets/images/site/perfil/Fernanda.png')}}" alt="" style="width: 150px" /></a>
							<h5 class="team-modern-name"><a href="#">Fernanda Bastieri</a></h5>
							<p class="team-modern-text">Psicóloga</p>
							{{-- <ul class="list-inline team-modern-list-social list-social-2 list-inline-sm">
									<li>
											<a class="icon mdi mdi-facebook" href="#"></a>
									</li>
									<li>
											<a class="icon mdi mdi-twitter" href="#"></a>
									</li>
									<li>
											<a class="icon mdi mdi-instagram" href="#"></a>
									</li>
									<li>
											<a class="icon mdi mdi-google-plus" href="#"></a>
									</li>
							</ul> --}}
					</article>
					<article class="team-modern box-sm wow slideInUp" data-wow-delay=".3s">
							<a class="" href="#"><img src="{{ url ('assets/images/site/perfil/Camila.png')}}" alt="" style="width: 150px" /></a>
							<h5 class="team-modern-name"><a href="#">Camila Ripamonte</a></h5>
							<p class="team-modern-text">Infectologista</p>
							{{-- <ul class="list-inline team-modern-list-social list-social-2 list-inline-sm">
									<li>
											<a class="icon mdi mdi-facebook" href="#"></a>
									</li>
									<li>
											<a class="icon mdi mdi-twitter" href="#"></a>
									</li>
									<li>
											<a class="icon mdi mdi-instagram" href="#"></a>
									</li>
									<li>
											<a class="icon mdi mdi-google-plus" href="#"></a>
									</li>
							</ul> --}}
					</article>
					<article class="team-modern box-sm wow slideInUp" data-wow-delay=".3s">
							<a class="" href="#"><img src="{{ url ('assets/images/site/perfil/Cristiane.png')}}" alt="" style="width: 150px" /></a>
							<h5 class="team-modern-name"><a href="#">Cristiane Ferreira</a></h5>
							<p class="team-modern-text">Nutricionista</p>
							{{-- <ul class="list-inline team-modern-list-social list-social-2 list-inline-sm">
									<li>
											<a class="icon mdi mdi-facebook" href="#"></a>
									</li>
									<li>
											<a class="icon mdi mdi-twitter" href="#"></a>
									</li>
									<li>
											<a class="icon mdi mdi-instagram" href="#"></a>
									</li>
									<li>
											<a class="icon mdi mdi-google-plus" href="#"></a>
									</li>
							</ul> --}}
					</article>
					<article class="team-modern box-sm wow slideInUp" data-wow-delay=".3s">
							<a class="" href="#"><img src="{{ url ('assets/images/site/perfil/Karla-Fabiana.png')}}" alt="" style="width: 150px" /></a>
							<h5 class="team-modern-name"><a href="#">Karla Fabiana Brasil Gomes</a></h5>
							<p class="team-modern-text">Endocrinologista</p>
							{{-- <ul class="list-inline team-modern-list-social list-social-2 list-inline-sm">
									<li>
											<a class="icon mdi mdi-facebook" href="#"></a>
									</li>
									<li>
											<a class="icon mdi mdi-twitter" href="#"></a>
									</li>
									<li>
											<a class="icon mdi mdi-instagram" href="#"></a>
									</li>
									<li>
											<a class="icon mdi mdi-google-plus" href="#"></a>
									</li>
							</ul> --}}
					</article>
					<article class="team-modern box-sm wow slideInUp" data-wow-delay=".3s">
							<a class="" href="#"><img src="{{ url ('assets/images/site/perfil/Fredy.png')}}" alt="" style="width: 150px" /></a>
							<h5 class="team-modern-name"><a href="#">Fredy Figner</a></h5>
							<p class="team-modern-text">Psicoterapeuta e Coach</p>
							{{-- <ul class="list-inline team-modern-list-social list-social-2 list-inline-sm">
									<li>
											<a class="icon mdi mdi-facebook" href="#"></a>
									</li>
									<li>
											<a class="icon mdi mdi-twitter" href="#"></a>
									</li>
									<li>
											<a class="icon mdi mdi-instagram" href="#"></a>
									</li>
									<li>
											<a class="icon mdi mdi-google-plus" href="#"></a>
									</li>
							</ul> --}}
					</article>
					<article class="team-modern box-sm wow slideInUp" data-wow-delay=".3s">
							<a class="" href="#"><img src="{{ url ('assets/images/site/perfil/Marta.png')}}" alt="" style="width: 150px" /></a>
							<h5 class="team-modern-name"><a href="#">Marta Corrêa</a></h5>
							<p class="team-modern-text">Psicóloga</p>
							{{-- <ul class="list-inline team-modern-list-social list-social-2 list-inline-sm">
									<li>
											<a class="icon mdi mdi-facebook" href="#"></a>
									</li>
									<li>
											<a class="icon mdi mdi-twitter" href="#"></a>
									</li>
									<li>
											<a class="icon mdi mdi-instagram" href="#"></a>
									</li>
									<li>
											<a class="icon mdi mdi-google-plus" href="#"></a>
									</li>
							</ul> --}}
					</article>
					<article class="team-modern box-sm wow slideInUp" data-wow-delay=".3s">
							<a class="" href="#"><img src="{{ url ('assets/images/site/perfil/Maria-Luiza.png')}}" alt="" style="width: 150px" /></a>
							<h5 class="team-modern-name"><a href="#">Maria Luiza Passaneri</a></h5>
							<p class="team-modern-text">Farmácia e Bioquímica</p>
							{{-- <ul class="list-inline team-modern-list-social list-social-2 list-inline-sm">
									<li>
											<a class="icon mdi mdi-facebook" href="#"></a>
									</li>
									<li>
											<a class="icon mdi mdi-twitter" href="#"></a>
									</li>
									<li>
											<a class="icon mdi mdi-instagram" href="#"></a>
									</li>
									<li>
											<a class="icon mdi mdi-google-plus" href="#"></a>
									</li>
							</ul> --}}
					</article>
					{{-- <article class="team-modern box-sm wow slideInUp" data-wow-delay=".3s">
							<a class="" href="#"><img src="{{ url ('assets/images/site/perfil/Maxwili.png')}}" alt="" style="width: 150px" /></a>
							<h5 class="team-modern-name"><a href="#">Maxwilli Siqueira</a></h5>
							<p class="team-modern-text">Canal Maximize Despertar Humano</p>
							<ul class="list-inline team-modern-list-social list-social-2 list-inline-sm">
									<li>
											<a class="icon mdi mdi-facebook" href="#"></a>
									</li>
									<li>
											<a class="icon mdi mdi-twitter" href="#"></a>
									</li>
									<li>
											<a class="icon mdi mdi-instagram" href="#"></a>
									</li>
									<li>
											<a class="icon mdi mdi-google-plus" href="#"></a>
									</li>
							</ul>
					</article> --}}
					<article class="team-modern box-sm wow slideInUp" data-wow-delay=".3s">
							<a class="" href="#"><img src="{{ url ('assets/images/site/perfil/Renata.png')}}" alt="" style="width: 150px" /></a>
							<h5 class="team-modern-name"><a href="#">Renata Martins</a></h5>
							<p class="team-modern-text">Mentora de Mulheres, Coach e Head Trainer</p>
							{{-- <ul class="list-inline team-modern-list-social list-social-2 list-inline-sm">
									<li>
											<a class="icon mdi mdi-facebook" href="#"></a>
									</li>
									<li>
											<a class="icon mdi mdi-twitter" href="#"></a>
									</li>
									<li>
											<a class="icon mdi mdi-instagram" href="#"></a>
									</li>
									<li>
											<a class="icon mdi mdi-google-plus" href="#"></a>
									</li>
							</ul> --}}
					</article>
					<article class="team-modern box-sm wow slideInUp" data-wow-delay=".3s">
							<a class="" href="#"><img src="{{ url ('assets/images/site/perfil/Rose.png')}}" alt="" style="width: 150px" /></a>
							<h5 class="team-modern-name"><a href="#">Rose Lourenço</a></h5>
							<p class="team-modern-text">Meditação e Mentoria de Equilibrio</p>
							{{-- <ul class="list-inline team-modern-list-social list-social-2 list-inline-sm">
									<li>
											<a class="icon mdi mdi-facebook" href="#"></a>
									</li>
									<li>
											<a class="icon mdi mdi-twitter" href="#"></a>
									</li>
									<li>
											<a class="icon mdi mdi-instagram" href="#"></a>
									</li>
									<li>
											<a class="icon mdi mdi-google-plus" href="#"></a>
									</li>
							</ul> --}}
					</article>
					<article class="team-modern box-sm wow slideInUp" data-wow-delay=".3s">
							<a class="" href="#"><img src="{{ url ('assets/images/site/perfil/Vanessa.png')}}" alt="" style="width: 150px" /></a>
							<h5 class="team-modern-name"><a href="#">Vanessa Dias</a></h5>
							<p class="team-modern-text">Personal Trainer</p>
							{{-- <ul class="list-inline team-modern-list-social list-social-2 list-inline-sm">
									<li>
											<a class="icon mdi mdi-facebook" href="#"></a>
									</li>
									<li>
											<a class="icon mdi mdi-twitter" href="#"></a>
									</li>
									<li>
											<a class="icon mdi mdi-instagram" href="#"></a>
									</li>
									<li>
											<a class="icon mdi mdi-google-plus" href="#"></a>
									</li>
							</ul> --}}
					</article>
			</div>
		</div>
	</section>
	@endforeach
