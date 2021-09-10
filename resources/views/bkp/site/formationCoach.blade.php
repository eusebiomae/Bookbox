@extends('layouts.site.site')

@section('title', 'Home')

@section('css')
<style>
.testimonial-3 .testimonial-content p {
    padding-top: 0px !important;
}
</style>

@endsection

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
						<h2>{{ internation($results->slide[0], 'title')}}</h2>
					</div>
					<ol class="breadcrumb">
						<li>
							<a href="/home">{{ trans('menu.home')}}</a>
						</li>
						<li><a href="#">{{ trans('menu.classesHours')}}</a></li>
						<li class="active">{{ trans('menu.nursery')}}</li>
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

<!-- Shortcode #1 
============================================= -->
<section id="shotcode-1" class="shotcode-1 text-center-xs text-center-sm">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="heading heading-4">
							<div class="heading-bg heading-right">
								<p class="mb-0">{{ internation($results->content[0], 'subtitle') }}</p>
								<h2>{{ internation($results->content[0], 'title')}}</h2>
							</div>
						</div>
						<!-- .heading end -->
					</div>
				</div>
			</div>
			<!-- .col-md-12 end -->
			<div class="col-xs-12 col-sm-12 col-md-12">
				<?= internation($results->content[0], 'text') ?>
			</div>
			<!-- .col-md-6 end -->
		</div>
		<!-- .row end -->
	</div>
	<!-- .container end -->
</section>

<!-- Call To Action #3
============================================= -->
<section id="cta-3" class="cta cta-3 bg-overlay bg-overlay-theme text-center">
		<div class="bg-section" >
			{{--  <img src="{!! asset('images/call/2.jpg') !!}" alt="Background"/>  --}}
		</div>
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">
					<div class="cart-table table-responsive">
						<table class="table table-bordered">
							<thead>
								<tr class="cart-product">
									<th class="cart-product-item" colspan=3>{{ internation($results->content[0], 'title')}}</th>
								</tr>
							</thead>
							<tbody style="background: white">
								@foreach($results->schedules as $item)
								<tr class="cart-product">
									<td class="cart-product-item">
										<div class="cart-product-name">
											<h6>{{ internation($item, 'title')}}</h6>
										</div>
									</td>
									<td class="cart-product-price"><h6>{{ internation($item, 'subtitle')}}</h6></td>
									<td class="cart-product-total"><h6><?= internation($item, 'text') ?></h6></td>
								</tr>
								@endforeach

							</tbody>
						</table>
					</div>
				</div>
				<!-- .col-md-8 end -->
			</div>
			<!-- .row end -->
		</div>
		<!-- .container end -->
	</section>
	<!-- #cta-3 end -->
	
		<!-- Shortcode #6 
	============================================= -->
		<section id="shortcode-6" class="shortcode-6 bg-gray text-center-xs">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-6">
								<div class="heading heading-4">
									<div class="heading-bg heading-right">
										<p class="mb-0"></p>
										<h2>{{ internation($results->generalHours[0], 'title') }}</h2>
									</div>
								</div>
								<!-- .heading end -->
							</div>
						</div>
					</div>
					<!-- .col-md-12 end -->
					<div class="col-xs-12 col-sm-12 col-md-6">
						<div class="panel-group accordion" id="accordion02" role="tablist" aria-multiselectable="true">
							@foreach($results->hoursEducationalLevel as $item)
							<!-- Panel 01 -->
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="{{ $item->id}} ">
									<h4 class="panel-title">
										<a class="accordion-toggle" 
											role="button" 
											data-toggle="collapse" 
											data-parent="#accordion02" 
											href="#collapse02-{{ $item->id}}" 
											aria-expanded="true" 
											aria-controls="collapse02-{{ $item->id}}"> {{ internation($item, 'title') }}  
										</a>
										<span class="icon"></span>
									</h4>
								</div>
								<div id="collapse02-{{ $item->id}}" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="{{ $item->id}} ">
									<div class="panel-body">
										<h6>{{ internation($item, 'subtitle') }}</h6>
										<?= internation($item, 'text') ?>
									</div>
								</div>
							</div>
							@endforeach
						</div>
						<!-- End .Accordion-->
					</div>
					<!-- .col-md-6 end -->
					<div class="col-xs-12 col-sm-12 col-md-6">
						<div id="testimonial-oc-5"  class="testimonial-slide testimonial testimonial-3">
							<div class="testimonial-item">
								<div class="testimonial-content">
									<div style="padding-top: 80px;">
										@foreach($results->extraHours as $item)
										<h6>{{internation($item, 'title')}}</h6>
										<?= internation($item, 'text') ?>
										<br>
										@endforeach
									</div>
								</div>
							</div>
							<!-- .testimonial-item end -->
						</div>
					</div>
					<!-- .col-md-6 end -->
				</div>
				<!-- .row end -->
			</div>
			<!-- .container end -->
		</section>
@endsection