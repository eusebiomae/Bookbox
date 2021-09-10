<input type="hidden" id="_token" value="{{ csrf_token() }}"/>
<div class="preloader">
  	<div class="spinner">
  		<div class="bounce1 hexagon-shape">
  		</div>
  		<div class="bounce2 hexagon-shape">
  		</div>
  		<div class="bounce3 hexagon-shape">
  		</div>
  	</div>
</div>
 <!-- Header Area Start -->
 <header class="top">
	<div class="header-area header-sticky fixed">
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-sm-3 col-xs-6">
					<div class="logo">
						<a href="index.html"><img src="images/logo/pleno-01.png" alt="Pleno Desenvolvimento" width="50%" /></a>
						<!-- <a href="index.html"><img src="img/logo/logo.png" alt="Pleno Desenvolvimento" /></a> -->
					</div>
				</div>
				<div class="col-md-9 col-sm-9 col-xs-12">
					<div class="content-wrapper one">
						@include('layouts.site.navigation')
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
