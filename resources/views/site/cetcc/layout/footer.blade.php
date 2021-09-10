@php
	$schoolInformation = schoolInformation();
@endphp
<footer class = "text-justify">
	<div class="container margin_120_95">
		<div class="row">
			<div class="col-lg-5 col-md-12 p-r-5">
				<p>
					<a href="/about">
						<img src="/cetcc/img/logo_vertical_white.png" style="text-align: center;" data-retina="true" alt="Logo CETCC"></p>
					</a>
				<p>{{ getValueByColumn($schoolInformation, 'company_information') }}</p>
				<div class="follow_us">
					{{-- <ul>
							<li>Follow us</li>
							<li><a href="#0"><i class="ti-facebook"></i></a></li>
							<li><a href="#0"><i class="ti-twitter-alt"></i></a></li>
							<li><a href="#0"><i class="ti-google"></i></a></li>
							<li><a href="#0"><i class="ti-pinterest"></i></a></li>
							<li><a href="#0"><i class="ti-instagram"></i></a></li>
						</ul> --}}
				</div>
			</div>
			<div class="col-lg-4 col-md-6 ml-lg-auto">
				@if (isset($footerLinks))
					<h5>{{ $footerLinks['title'] }}</h5>
					<ul class="links">
						@foreach ($footerLinks['links'] as $item)
							<li><a href="{{ $item['url'] }}" target="_blank">{{ $item['label'] }}</a></li>
						@endforeach
					</ul>
				@else
					<h5>Links</h5>
					<ul class="links">
						<li><a href="http://abpmc.org.br/" target="_blank">Associação Brasileira de Psicoterapia e Medicina Comportamental</a></li>
						<li><a href="http://www.bvs-psi.org.br/php/index.php" target="_blank">BVS Psicologia ULAPSI Brasil</a></li>
						<li><a href="https://inpaonline.com.br/" target="_blank">InPA – Instituto de Psicologia Aplicada</a></li>
						<li><a href="http://ipc.psico.net/" target="_blank">Instituto de Psicologia Comportamental de São Carlos</a></li>
						<li><a href="http://www.laborecursos.com.br/" target="_blank">Labore - Instituto de Ensino</a></li>
						{{-- <li><a href="http://www.livrariadopsi.com.br/" target="_blank">Livraria do Psi</a></li> --}}
						<li><a href="https://grudacom.wordpress.com/" target="_blank">Grupo de Estudos de Doenças Afetivas</a></li>
						<li><a href="http://www.redepsi.com.br/" target="_blank">Rede Psi</a></li>
					</ul>
				@endif

			</div>
			<div class="col-lg-3 col-md-6">
				<h5>Fale conosco</h5>
				<ul class="contacts">
					@if (isset($schoolInformation->phone1)&& !empty($schoolInformation->phone1))
					<li><a href="tel://{{ $schoolInformation->phone1 }}"><i class="ti-mobile"></i>{{ $schoolInformation->phone1 }}</a></li>
					@endif
					@if (isset($schoolInformation->phone2)&& !empty($schoolInformation->phone2))
						<li><a href="tel://{{ $schoolInformation->phone2 }}"><i class="ti-mobile"></i>{{ $schoolInformation->phone2 }}</a></li>
					@endif
					@if (isset($schoolInformation->cell_phone1)&& !empty($schoolInformation->cell_phone1))
					<li><a href="tel://{{ $schoolInformation->cell_phone1 }}"><i class="ti-mobile"></i>{{ $schoolInformation->cell_phone1 }}</a></li>
					@endif
					@if (isset($schoolInformation->email1)&& !empty($schoolInformation->email1))
					<li><a href="mailto://{{ $schoolInformation->email1 }}"><i class="ti-email"></i>{{ $schoolInformation->email1 }}</a></li>
					@endif

					<li>
						<a href="#"><i class="icon-home"></i></a>
							{{ getValueByColumn($schoolInformation, 'address') }}
							Nª: {{ getValueByColumn($schoolInformation, 'number') }},
							{{ getValueByColumn($schoolInformation, 'complement') }} -
							{{ getValueByColumn($schoolInformation, 'neighborhood') }},
							{{ getValueByColumn($schoolInformation, 'city') }} -
							{{ getValueByColumn($schoolInformation, 'state.abbreviation')}}<br>
							CEP: {{ getValueByColumn($schoolInformation, 'cep') }}
					</li>
					<li class="mt-2">
						@if (isset($schoolInformation->facebook) && !empty($schoolInformation->facebook))
							<a href="{{ $schoolInformation->facebook }}" target="_blank">
								<i class="icon-facebook p-1" title="Facebook"></i>
							</a>
						@endif
						@if (isset($schoolInformation->twitter) && !empty($schoolInformation->twitter))
							<a href="{{ $schoolInformation->twitter }}" target="_blank">
								<i class="icon-twitter p-1" title="Twitter"></i>
							</a>
						@endif
						@if (isset($schoolInformation->instagram) && !empty($schoolInformation->instagram))
							<a href="{{ $schoolInformation->instagram }}" target="_blank">
								<i class="icon-instagram p-1" title="Instagram"></i>
							</a>
						@endif
						@if (isset($schoolInformation->pinterest) && !empty($schoolInformation->pinterest))
							<a href="{{ $schoolInformation->pinterest }}" target="_blank">
								<i class="icon-pinterest p-1" title="Pinterest"></i>
							</a>
						@endif
						@if (isset($schoolInformation->linkedin) && !empty($schoolInformation->linkedin))
							<a href="{{ $schoolInformation->linkedin }}" target="_blank">
								<i class="icon-linkedin p-1" title="Linkedin"></i>
							</a>
						@endif
						@if (isset($schoolInformation->youtube) && !empty($schoolInformation->youtube))
						<a href="{{ $schoolInformation->youtube }}" class="text-light" target="_blank">
							<i class="icon-youtube p-1" title="Youtube"></i>
						</a>
					@endif
					</li>
				</ul>
				{{-- <div id="newsletter">
					<h6>Newsletter</h6>
					<div id="message-newsletter"></div>
					<form method="post" action="assets/newsletter.php" name="newsletter_form" id="newsletter_form">
						<div class="form-group">
							<input type="email" name="email_newsletter" id="email_newsletter" class="form-control" placeholder="Your email">
							<input type="submit" value="Submit" id="submit-newsletter">
						</div>
					</form>
					</div> --}}
			</div>
		</div>
		<!--/row-->
		<hr>
		<div class="row">
			<div class="col-md-8">
				<a href="https://gigapixel.com.br/" target="_blank">
					<img src="/images/logo/logo negativo.png" height="45"/>
				</a>
				{{-- <ul id="additional_links">
						<li><a href="#0">Terms and conditions</a></li>
						<li><a href="#0">Privacy</a></li>
					</ul> --}}
			</div>
			<div class="col-md-4">
				<div id="copy">
					© {{ date('Y') }} <a href="https://gigapixel.com.br/" target="_blank">GigaPixel</a> - Design & Technology
				</div>
			</div>
		</div>
	</div>
</footer>
<!--/footer-->
