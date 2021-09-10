<footer class="footer-area">
	<div class="main-footer">
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-sm-6 col-xs-12">
					<div class="single-widget pr-60">
						<div class="footer-logo pb-25 ">
							<a href="index.html"style="padding-left:10%" ><img src="images/logo/pleno-02.png" alt="Pleno Desenvolvimento" width="75%"></a>
						</div>
						<p>I must explain to you how all this mistaken idea of denoung pleure and praising pain was born and give you a coete account of the system. </p>
						<div class="footer-social">
							<ul>
								<li><a href="https://www.facebook.com/devitems/?ref=bookmarks"><i class="fab fa-facebook-f"></i></a></li>
								<!-- <li><a href="https://www.facebook.com/devitems/?ref=bookmarks"><i class="zmdi zmdi-facebook"></i></a></li> -->
								<li><a href="https://www.pinterest.com/devitemsllc/"><i class="zmdi zmdi-pinterest"></i></a></li>
								<li><a href="#"><i class="zmdi zmdi-vimeo"></i></a></li>
								<li><a href="https://twitter.com/devitemsllc"><i class="zmdi zmdi-twitter"></i></a></li>
								<li><a href="https://twitter.com/devitemsllc"><i class="zmdi zmdi-email"></i></a></li>
							</ul>    
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-12">
					<div class="single-widget">
						<h3>Contato</h3>
						<p>{{ $results->contact[0]->address }}, {{ $results->contact[0]->number }}, {{ $results->contact[0]->complement }} <br> {{ $results->contact[0]->neighborhood }}<br>- {{ $results->contact[0]->city }}/{{ $results->contact[0]->state_abbreviation }} - CEP: {{ $results->contact[0]->cep }}</p>
						<p>{{ $results->contact[0]->phone1 }}<br>{{ $results->contact[0]->cell_phone1 }}</p>
						<p>{{ $results->contact[0]->email1 }}</p>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-12">
					<div class="single-widget">
						<h3>Menu</h3>
						<ul>
							<li><a href="/">Home</a></li>
							<li><a href="/history">Sobre Nós</a></li>
							<li><a href="event.html">Coaching Grupo</a></li>
							<li><a href="event.html">Formação de Coaching</a></li>
							<li><a href="/blog">Notícia &amp; Blog</a></li>
							<li><a href="/contact">Contato</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-12">
					<div class="single-widget">
						<h3>DESENVOLVIMENTO E HOSPEDAGEM</h3>
						<div class="footer-logo pb-25 ">
							<a href="http://gigapixel.com.br/" target="_blank"><img src="images/logo/logo.png" alt="Pleno Desenvolvimento" width="100%"></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>   
	<div class="footer-bottom text-center">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<p>Copyright © <?= date('Y'); ?> {{ $results->contact[0]->name }}. {{ trans('footer.copyright')}}</p>
					<p class="text-capitalize">{{ trans('footer.developer')}} 
						<a href="http://gigapixel.com.br" target="_Blank">GigaPixel</a>
					</p>
				</div> 
			</div>
		</div>    
	</div>
</footer>
