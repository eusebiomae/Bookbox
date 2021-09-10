<?php $bannerCarrossel = isset($banner) || isset($carrossel)?>

@php
	$schoolInformation = schoolInformation();
  $categoryType = GigaGetData::getCategoryType();
  $event = GigaGetData::getEvent();
@endphp

<!-- Main Menu Start -->
<header class="header menu_2 sticky">

	{{-- <div @if($bannerCarrossel) class="info d-none d-md-block" @else class="gp-info d-none d-md-block" style="display:block;" @endif>
		<div class="container">
			<div class="row">
				<div class="col-4 text-left">
					@if (!empty($schoolInformation->facebook))
						<a href="{{ $schoolInformation->facebook }}" class="text-light" target="_blank">
							<i class="icon-facebook p-1" title="Facebook"></i>
						</a>
					@endif
					@if (!empty($schoolInformation->twitter))
						<a href="{{ $schoolInformation->twitter }}" class="text-light" target="_blank">
							<i class="icon-twitter p-1" title="Twitter"></i>
						</a>
					@endif
					@if (!empty($schoolInformation->instagram))
						<a href="{{ $schoolInformation->instagram }}" class="text-light" target="_blank">
							<i class="icon-instagram p-1" title="Instagram"></i>
						</a>
					@endif
					@if (!empty($schoolInformation->pinterest))
						<a href="{{ $schoolInformation->pinterest }}" class="text-light" target="_blank">
							<i class="icon-pinterest p-1" title="Pinterest"></i>
						</a>
					@endif
					@if (!empty($schoolInformation->linkedin))
						<a href="{{ $schoolInformation->linkedin }}" class="text-light" target="_blank">
							<i class="icon-linkedin p-1" title="Linkedin"></i>
						</a>
					@endif
					@if (!empty($schoolInformation->youtube))
						<a href="{{ $schoolInformation->youtube }}" class="text-light" target="_blank">
							<i class="icon-youtube p-1" title="Youtube"></i>
						</a>
					@endif
				</div>
				<div class="col-8 text-right text-light">
					<span class="mr-5">Telefone: {{ getValueByColumn($schoolInformation, 'phone1') }}
						@if (isset($schoolInformation->phone2) && !empty($schoolInformation->phone2))
							| {{ $schoolInformation->phone2 }}
						@endif
					</span>
					<span>E-mail: {{ getValueByColumn($schoolInformation, 'email1') }}</span>
				</div>
			</div>
		</div>
	</div> --}}

	<div @if($bannerCarrossel) class="menu" @else class="gp-menu" @endif>
		<div class="container">
			<div id="preloader"><div data-loader="circle-side"></div></div><!-- /Preload -->

			<div id="logo">
				<a href="/"><img src="/cetcc/img/logo_vertical.png" width="" height="67" data-retina="true" alt="Logotipo CETCC"></a>
				{{-- <a href="/"><img src="/cetcc/img/logo_wide2.png" width="300" height="" data-retina="true" alt=""></a> --}}
			</div>
			<ul id="top_menu">
				{{-- <li><a href="login.html" class="login">Login</a></li> --}}
				<li><a href="#" class="search-overlay-menu-btn" >Pesquisar</a></li>

				<li class="btn-group" style="display: inline-flex;">
					@if (Auth::guard('studentArea')->check())
						<a href="/student_area" target="_blank">
							<i class="icon-user-1 d-block d-md-none"></i>
							<button type="button" class="btn btn_1 d-none d-md-block" style="font-size: 14px;">
								{{ firstLastName(Auth::guard('studentArea')->user()->name) }}
							</button>
						</a>
						<a href="/student_area" target="_blank">
							<i class="icon-user-1 d-block d-md-none"></i>
						</a>
						<a href="{{ route('studentArea.logout') }}" class="btn btn_2 d-none d-md-block">
							<i class="fa fa-sign-out"></i>
						</a>
					@else
						<a href="/student_area" target="_blank">
							<i class="icon-user-1 d-block d-md-none"></i>
							<button type="button" class="btn btn_1 d-none d-md-block" style="font-size: 14px;">
								Área do Aluno
							</button>
						</a>
					@endif
				</li>

			</ul>
			<!-- /top_menu -->
			<a href="#menu" class="btn_mobile">
				<div class="hamburger hamburger--spin" id="hamburger">
					<div class="hamburger-box">
						<div class="hamburger-inner"></div>
					</div>
				</div>
			</a>

			<!-- Search Menu -->
			<div class="search-overlay-menu">
				<span class="search-overlay-close"><span class="closebt"><i class="ti-close"></i></span></span>
				<form role="search" id="searchform" method="get" action="/search">
					<input value="" name="search" type="search" placeholder="Pesquisar..." />
					<button type="submit"><i class="icon_search"></i>
					</button>
				</form>
			</div><!-- End Search Menu -->

		<div style="clear:both;"></div>
		</div>
	</div>

	<div @if($bannerCarrossel) class="info d-none d-md-block" @else class="gp-info d-none d-md-block" style="display:block;" @endif>

		<nav id="menu" class="main-menu">
			<ul>
				<li><span><a href="/">Home</a></span></li>
				<li>
					<span><a href="#0">CETCC</a></span>
					<ul>
						<li><span><a href="/about">Quem Somos</a></span></li>
						<li><span><a href="/certification">Certificação</a></span></li>
						<li><span><a href="/teacher">Docentes</a></span></li>
						<li><span><a href="/collaborator">Colaboradores</a></span></li>
						<li><span><a href="/photos">Galeria</a></span></li>
					</ul>
				</li>
				<li>
					<span><a href="#0">Eventos</a></span>
					<ul>
						@if($event) <li><span><a href="{{ $event->link }}" target="_blank">{{ $event->title_pt }}</a></span></li> @endif
						<li><span><a href="javascript:location.href='/course?{{ time() }}#%7B%22subcategories%22:%5B5%5D,%22showSubcategories%22:0%7D';">Palestras</a></span></li>
						<li><span><a href="javascript:location.href='/course?{{ time() }}#%7B%22subcategories%22:%5B4%5D,%22showSubcategories%22:0%7D';">Workshops</a></span></li>
					</ul>
				</li>
				<li>
					<span><a href="/course">Cursos</a></span>
					<ul>
						<li><span><a href="/course">Todos</a></span></li>
						@foreach ($categoryType as $type)
							<li><span><a href="/{{$type->flg}}">Cursos {{$type->title}}</a></span></li>
						@endforeach
					</ul>
				</li>
				<li>
					<span><a href="#0">Clínica-Escola</a></span>
					<ul>
						<li><span><a href="/add_psychologist">Cadastro Psicólogo</a></span></li>
						<li><span><a href="/add_patient">Cadastro Paciente</a></span></li>
					</ul>
				</li>
				<li>
					<span><a href="#0">Biblioteca</a></span>
					<ul>
						<li><span><a href="/article">Artigos</a></span></li>
						{{-- <li><span><a href="/doc">Teses e Monografias</a></span></li> --}}
					</ul>
				</li>
				<li><span><a href="/supervision">Supervisão</a></span></li>

				<li><span><a href="/scholarship">Bolsas Estudo</a></span></li>

				<li><span><a href="/blog">Blog</a></span></li>

				<li><span><a href="/contact">Contato</a></span></li>

				{{-- <li title="Perguntas frequentes"><span><a href="/faq">FAQ</a></span></li> --}}
				{{-- <li><span><a href="/satisfaction_survey">Pesquisa de Satisfação</a></span></li> --}}
			</ul>
		</nav>
	</div>

</header>
<!-- Main Menu End -->
