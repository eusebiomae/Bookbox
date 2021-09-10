@extends('layouts.site.site')

@section('title', 'Home')

@section('content')

<!-- Page Title


============================================= -->
<section class="bg-overlay bg-overlay-gradient pb-0">
	<div class="bg-section" >
		<img src="{!! asset('storage/slides/' . $results->slide[0]->image) !!}" alt="Background"/>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="page-title title-1 text-center">
					<div class="title-bg">
						{{-- <h2>{{ internation($results->slide[0], 'title')}}</h2> --}}
						{{-- <h2>{{print $results->slide[0]->title_pt}}</h2> --}}
					</div>
					<ol class="breadcrumb">
						<li><a href="index.html">{{ trans('menu.home')}}</a></li>
						<li><a href="#">{{ trans('menu.contact')}}</a></li>
						<li class="active">{{ trans('menu.scheduleVisit')}} </li>
					</ol>
				</div>
				<!-- .page-title end -->
			</div>
			<!-- .col-md-12 end -->
		</div>
		<!-- .row end -->
	</div>
	<!-- .container end -->
</section>
<!-- Contact #1
============================================= -->
<section id="contact" class="contact">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="heading heading-4">
					<div class="heading-bg heading-right">
						<p class="mb-0">{{ trans('scheduleVisit.subtitle')}}</p>
						<h2>{{ trans('scheduleVisit.title')}}</h2>
					</div>
				</div>
				<!-- .heading end -->
			</div>
			<!-- .col-md-12 end -->
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-4 widgets-contact mb-60-xs">
						<div class="widget">
							<div class="widget-contact-icon pull-left">
								<i class="lnr lnr-map"></i>
							</div>
							<div class="widget-contact-info">
								<p class="text-capitalize">{{ trans('scheduleVisit.visit')}}</p>
								<p class="text-capitalize font-heading">{{ $results->contact[0]->address }}, {{ $results->contact[0]->number }}, {{ $results->contact[0]->complement }} <br> {{ $results->contact[0]->neighborhood }} - {{ $results->contact[0]->city }}/{{ $results->contact[0]->state_abbreviation }} - CEP: {{ $results->contact[0]->cep }}</p>
							</div>
						</div>
						<!-- .widget end -->
						<div class="clearfix"></div>
						<div class="widget">
							<div class="widget-contact-icon pull-left">
								<i class="lnr lnr-envelope"></i>
							</div>
							<div class="widget-contact-info">
								<p class="text-capitalize ">{{ trans('scheduleVisit.email')}}</p>
								<p class="text-capitalize font-heading">{{ $results->contact[0]->email1 }}</p>
								{{--  <p class="text-capitalize font-heading">{{ $results->contact[0]->email2 }}</p>
								<p class="text-capitalize font-heading">{{ $results->contact[0]->email3 }}</p>  --}}
							</div>
						</div>
						<!-- .widget end -->
						<div class="clearfix">
						</div>
						<div class="widget">
							<div class="widget-contact-icon pull-left">
								<i class="lnr lnr-phone"></i>
							</div>
							<div class="widget-contact-info">
								<p class="text-capitalize">{{ trans('scheduleVisit.contactUs')}}</p>
								<p class="text-capitalize font-heading">{{ $results->contact[0]->phone1 }}  |  {{ $results->contact[0]->cell_phone1 }}</p>
								{{--  <p class="text-capitalize font-heading">{{ $results->contact[0]->phone2 }}</p>
								<p class="text-capitalize font-heading">{{ $results->contact[0]->phone3 }}</p>
								<p class="text-capitalize font-heading">{{ $results->contact[0]->cell_phone1 }}</p>
								<p class="text-capitalize font-heading">{{ $results->contact[0]->cell_phone2 }}</p>
								<p class="text-capitalize font-heading">{{ $results->contact[0]->cell_phone3 }}</p>  --}}
							</div>
						</div>
						<!-- .widget end -->
					</div>
					<!-- .col-md-4 end -->
					<div class="col-xs-12 col-sm-12 col-md-8">
						<div class="row">
							<form id="contact-form" action="/scheduleVisit/send" method="post">
								<div class="col-md-6">
									<input type="text" class="form-control mb-30" name="contact-name" id="name" placeholder="{{ trans('scheduleVisit.yourName')}}" required/>
								</div>
								<div class="col-md-6">
									<input type="email" class="form-control mb-30" name="contact-email" id="email" placeholder="{{ trans('scheduleVisit.yourEmail')}}" required/>
								</div>
								<div class="col-md-6">
									<input type="text" class="form-control mb-30" name="contact-telephone" id="telephone" placeholder="{{ trans('scheduleVisit.yourTel')}}" required/>
								</div>
								<div class="col-md-6">
									<input type="text" class="form-control mb-30" name="contact-subject" id="subject" placeholder="{{ trans('scheduleVisit.yourClass')}}" required/>
								</div>
								<div class="col-md-12">
									<textarea class="form-control mb-30" name="contact-message" id="message" rows="2" placeholder="{{ trans('scheduleVisit.yourMensage')}}" required></textarea>
								</div>
								<div class="col-md-12">
									<button type="submit" id="submit-message" class="btn btn-primary btn-black btn-block">{{ trans('scheduleVisit.schedule')}}</button>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-12 mt-xs">
									<!--Alert Message-->
									<div id="contact-result"></div>
								</div>
								{{ csrf_field() }}
							</form>
						</div>
					</div>
					<!-- .col-md-8 end -->
				</div>
				<!-- .row end -->
			</div>
			<!-- .col-md-12 end -->
		</div>
		<!-- .row end -->
	</div>
	<!-- .container end -->
</section>

<!-- Google Maps
============================================= -->
<section class="google-maps pb-0 pt-0">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 pr-0 pl-0">
				<div id="googleMap" style="width:100%;height:300px;">
				<!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3704.6453978752047!2d-48.19364888443768!3d-21.793980904589233!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94b8f3d73ac97ad9%3A0xca807d07155fe766!2sRua+Victor+Lacorte%2C+955%2C+Araraquara+-+SP%2C+14801-460!5e0!3m2!1spt-BR!2sbr!4v1552656702163" width="100%" height="300px;" frameborder="0" style="border:0" allowfullscreen></iframe> -->
				</div>
			</div>
		</div>
	</div>
</section>
<!-- .google-maps end -->

@endsection
@section('scripts')

@endsection

