<?php $bannerCarrossel = isset($banner) || isset($carrossel)?>

@php
	$schoolInformation = schoolInformation();
  $categoryType = GigaGetData::getCategoryType();
  $event = GigaGetData::getEvent();
@endphp

<!-- Main Menu Start -->
<header class="section page-header header-creative-wrap context-dark">
	<div class="rd-navbar-wrap">
			<nav class="rd-navbar rd-navbar-creative rd-navbar-creative-2" data-layout="rd-navbar-fixed"
					data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed"
					data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static"
					data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static"
					data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static"
					data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="100px"
					data-xl-stick-up-offset="112px" data-xxl-stick-up-offset="132px" data-lg-stick-up="true"
					data-xl-stick-up="true" data-xxl-stick-up="true">
					<div class="rd-navbar-collapse-toggle rd-navbar-fixed-element-1"
							data-rd-navbar-toggle=".rd-navbar-collapse"><span></span></div>
					<div class="rd-navbar-aside-outer">
							<div class="rd-navbar-aside">
									<div class="rd-navbar-collapse">
											<ul class="contacts-classic">
													<li><span class="contacts-classic-title"></span>
															<a href="tel:#"></a>
													</li>
													<li>
															<a href="mailto:#"></a>
													</li>
											</ul><a class="rd-navbar-basket rd-navbar-basket-mobile fl-bigmug-line-shopping202"
													href="#"><span></span></a>
									</div>
									<!-- RD Navbar Panel-->
									<div class="rd-navbar-panel">
											<!-- RD Navbar Toggle-->
											<button class="rd-navbar-toggle"
													data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
											<!-- RD Navbar Brand-->
											<div class="rd-navbar-brand">
													<!--Brand-->
													<a class="brand" href="index.html"><img class="brand-logo-light"
																	src="{{ url ('assets/images/site/Logo H Negativo Roxo.png')}}"
																	alt="" /></a>
													<!-- <img class="brand-logo-dark" src="images/site/Logo_estilizado.png" alt="" width="157" height="35" /> -->
											</div>
									</div>
									<div class="rd-navbar-aside-element">
									</div>
							</div>
					</div>
					<div class="rd-navbar-main-outer">
							<div class="rd-navbar-main">
									<div class="rd-navbar-nav-wrap">
											<ul class="rd-navbar-nav">
													<li class="rd-nav-item active"><a class="rd-nav-link" href="index.html">Home</a>
													</li>
													<li class="rd-nav-item"><a href="/blog_post" class="rd-nav-link">Blog</a>
													</li>
													<li class="rd-nav-item"><a class="rd-nav-link"
																	href="grid-gallery.html" >Galeria</a>
													</li>
													<li class="rd-nav-item"><a href="/box_blog" class="rd-nav-link"
																	href="grid-shop.html" >ShopBox</a>
													</li>
													<li class="rd-nav-item"><a class="rd-nav-link" href="about-us.html">Sobre
																	nós</a>
													</li>
													<li class="rd-nav-item"><a class="rd-nav-link"
																	href="contact-us.html">Contato</a>
													</li>
													<li class="rd-nav-item"><a class="rd-nav-link"
																	href="privacy-policy.html">Termos e Condições</a>
													</li>
													<li class="rd-nav-item"><a class="rd-nav-link" href="pricing-list.html"
																	target="blank" style="color: #552b79;">Assine já</a>
													</li>
											</ul>
									</div>
							</div>
					</div>
			</nav>
	</div>
</header>
<!-- Main Menu End -->
