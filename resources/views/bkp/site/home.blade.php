@extends('layouts.site.site')

@section('title', 'Home')

@section('content')


<section id="slider-container" class="slider-area"> 
	<div class="slider-owl owl-theme owl-carousel"> 
		<!-- Start Slingle Slide -->
		@foreach($results->slide as $item)
		<div class="single-slide item" style="background-image: url({!! asset('storage/slides/' . $item->image) !!})">
			<!-- Start Slider Content -->
			<div class="slider-content-area">  
				<div class="container">
					<div class="row">
						<div class="col-md-7 col-md-offset-left-5"> 
							<div class="slide-content-wrapper">
								<div class="slide-content">
									<h3>{{ internation($item, 'pretitle')}} </h3>
									<h2>{{ internation($item, 'title')}} </h2>
									<p>{{ internation($item, 'subtitle')}}</p>
									<a class="default-btn" href="about.html">Learn more</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Start Slider Content -->
		</div>
		@endforeach
		<!-- End Slingle Slide -->							
	</div>
</section>

<!-- Hero Section
============================================= -->
{{-- <section id="hero" class="hero hero-4">
	
	<!-- START REVOLUTION SLIDER 5.0 -->
	<div class="rev_slider_wrapper">
		<div id="slider1" class="rev_slider"  data-version="5.0">
			<ul>

				  @foreach($results->slide as $item)
					<li data-transition="cube-horizontal" data-slotamount="default"  data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="2000" style="background-color: rgba(34, 34, 34, 0.3);">
					<!-- MAIN IMAGE -->
					<img src="{!! asset('storage/slides/' . $item->image) !!}" alt=""  width="1920" height="200">

					<!-- LAYER NR. 4 -->
					<div class="tp-caption" 
						data-x="center" data-hoffset="0" 
						data-y="center" data-voffset="-30" 
						data-width="['auto','auto','auto','auto']"
						data-height="['auto','auto','auto','auto']"
						data-transform_idle="o:1;"
						data-transform_in="x:left;s:2000;e:Power4.easeInOut;" 
						data-transform_out="s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
						data-start="2000" 
						data-splitin="none" 
						data-splitout="none" 
						data-responsive_offset="on" 
						data-fontsize="['17','17','15','15']"
						data-lineheight="['45','45','25','25']"
						data-fontweight="['600','500','600','300']"
						data-color="#fff" style="font-family: Short Stack">
						{{ internation($item, 'pretitle')}}
					</div>
					
					<!-- LAYER NR. 5 -->
					<div class="tp-caption text-uppercase" 
						data-x="center" data-hoffset="0" 
						data-y="center" data-voffset="30" 
						data-whitespace="nowrap"
						data-width="none"
						data-height="none"
						data-transform_idle="o:1;"
						data-transform_in="y:bottom;s:2000;e:Power4.easeInOut;" 
						data-transform_out="s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
						data-start="2500" 
						data-splitin="none" 
						data-splitout="none" 
						data-responsive_offset="on"
						data-fontsize="['55','17','15','15']"
						data-lineheight="['100','45','25','25']"
						data-fontweight="['700','500','600','300']"
						data-color="#ffc527" style="font-family: Short Stack; "
						>
						<h1 style="color:#ffc527; font-size:55px">	{{ internation($item, 'title')}}</h1>
					</div>
					
					<!-- LAYER NR. 6 -->
					<div class="tp-caption" 
						data-x="center" data-hoffset="0" 
						data-y="center" data-voffset="110" 
						data-width="none"
						data-height="none"
						data-transform_idle="o:1;"
						data-transform_in="x:right;s:2000;e:Power4.easeInOut;" 
						data-transform_out="s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
						data-start="3000" 
						data-splitin="none" 
						data-splitout="none" 
						data-responsive_offset="on"
						data-fontsize="['17','17','17','17']"
						data-lineheight="['26','26','25','25']"
						data-fontweight="['700','500','500','500']"
						data-color="#fff" style="font-family: Short Stack; text-align:center">
						{{ internation($item, 'subtitle')}}
					</div>
				</li>				
				@endforeach
				
			</ul>
		</div>
		<!-- END REVOLUTION SLIDER -->
		
	</div>
	<!-- END OF SLIDER WRAPPER -->
</section> --}}
<!-- #hero end -->

<div class="service-area two pt-150 pb-150">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-sm-4 col-xs-12">
					<div class="single-service">
						<h3><a href="teacher.html">PROFESSIONAL TEACHER</a></h3>
						<p>I must explain to you how all this mistaken denouncing pleure and praising pain </p>
					</div>
				</div>
				<div class="col-md-4 col-sm-4 col-xs-12">
					<div class="single-service">
						<h3><a href="teacher.html">PROFESSIONAL TEACHER</a></h3>
						<p>I must explain to you how all this mistaken denouncing pleure and praising pain </p>
					</div>
				</div>
				<div class="col-md-4 col-sm-4 col-xs-12">
					<div class="single-service">
						<h3><a href="teacher.html">PROFESSIONAL TEACHER</a></h3>
						<p>I must explain to you how all this mistaken denouncing pleure and praising pain </p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Service End -->
	<!-- About Start -->
	<div class="about-area pb-155">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<div class="about-content">
						<h2>WELCOME TO <span>EDUHOME</span></h2>
						<p>I must explain to you how all this mistaken idea of denouncing pleure and prsing pain was born and I will give you a complete account of the system, and expound the actual teachings  the master-builder of humanit happiness</p>
						<p class="hidden-sm">I must explain to you how all this mistaken idea of denouncing pleure and prsing pain was born and I will give you a complete account of the system</p>
						<a class="default-btn" href="about.html">view courses</a>
					</div>
				</div>
				<div class="col-md-6 col-sm-6">
					<div class="about-img">
						<img src="img/about/about.png" alt="about">
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- About End -->

<!-- Courses Area Start -->
<div class="courses-area two pt-150 pb-150 text-center">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="section-title">
						<img src="img/icon/section1.png" alt="section-title">
						<h2>COURSES WE OFFER</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 col-sm-6 col-xs-12">
					<div class="single-course">
						<div class="course-img">
							<a href="course-details.html"><img src="img/course/course1.jpg" alt="course">
								<div class="course-hover">
									<i class="fa fa-link"></i>
								</div>
							</a>
						</div>
						<div class="course-content">
							<h3><a href="course-details.html">CSE ENGINEERING</a></h3>
							<p>I must explain to you how all this a mistaken idea of denouncing great explorer of the rut the is lder of human happiness</p>
							<a class="default-btn" href="course-details.html">read more</a>
						</div>   
					</div>
				</div>
				<div class="col-md-4 col-sm-6 col-xs-12">
					<div class="single-course">
						<div class="course-img">
							<a href="course-details.html"><img src="img/course/course2.jpg" alt="course">
								<div class="course-hover">
									<i class="fa fa-link"></i>
								</div>
							</a>
						</div>
						<div class="course-content">
							<h3><a href="course-details.html">political science</a></h3>
							<p>I must explain to you how all this a mistaken idea of denouncing great explorer of the rut the is lder of human happiness</p>
							<a class="default-btn" href="course-details.html">read more</a>
						</div>   
					</div>
				</div>
				<div class="col-md-4 hidden-sm col-xs-12">
					<div class="single-course">
						<div class="course-img">
							<a href="course-details.html"><img src="img/course/course3.jpg" alt="course">
								<div class="course-hover">
									<i class="fa fa-link"></i>
								</div>
							</a>
						</div>
						<div class="course-content">
							<h3><a href="course-details.html">micro biology</a></h3>
							<p>I must explain to you how all this a mistaken idea of denouncing great explorer of the rut the is lder of human happiness</p>
							<a class="default-btn" href="course-details.html">read more</a>
						</div>   
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Courses Area End -->

<!-- Service Block #1
============================================= -->
<section id="service-1" class="service service-1">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3">
				<div class="heading heading-2 text-center">
					<div class="heading-bg">
						<p class="mb-0">{{ trans('home.phaseSubtitle')}}</p>
						<h2>{{ trans('home.phaseTitle')}}</h2>
					</div>
					<p class="mb-0 mt-md">{{ trans('home.phaseDescription')}}</p>
				</div>
				<!-- .heading end -->
			</div>
			<!-- .col-md-6 end -->
		</div>
		<!-- .row end -->
		<div class="row">
			<!-- Service Block #1 -->
			@foreach($results->phase as $item)
			<div class="col-xs-12 col-sm-4 col-md-4 service-block">
				<div class="service-img">
					<img src="{!! asset('storage/content/' . $item->image) !!}" alt="{{ internation($item, 'title') }}">
				</div>
				<div class="service-content">
					<img src="{!! asset('storage/content/icon/' . $item->icon) !!}" alt="{{ internation($item, 'title') }}"/>
					
					<div class="service-desc">
						<h4>{{ internation($item, 'title') }}</h4>
						<p class="cut-text" style="height:120px;">{{ internation($item, 'text') }}</p>
							
						<a class="read-more" href="{{ url('/'. $item->link .'/') }}"><i class="fa fa-plus"></i>
							<span>{{ trans('home.phaseButton')}}</span>
						</a>
					</div>
				</div>
			</div>
			@endforeach
		
	</div>
	<!-- .container end -->
</section>
<section id="shortcode-3" class="shortcode-3 border-b section-img">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3">
				<div class="heading heading-2 text-center">
					<div class="heading-bg">
						<p class="mb-0">{{ trans('home.differentialsSubtitle')}}</p>
						<h2>{{ trans('home.differentialsTitle')}}</h2>
					</div>
				</div>
				<!-- .heading end -->
			</div>
		</div>
		<div class="row">

			<!-- Service Block #4 -->
			@foreach($results->differential as $item)
			<div class="col-xs-12 col-sm-12 col-md-3 service-block">
				<div class="service-img">
					<img src="{!! asset('storage/content/' . $item->image) !!}" alt="icons"/>
				</div>
				<div class="service-content">
					<div class="service-desc">
						<h4>{{ internation($item, 'title') }}</h4>
						<p class="cut-text" style="height:120px;">{{ internation($item, 'text') }}</p>
						<a class="read-more" href="{{ url('/'. $item->link .'/') }}"><i class="fa fa-plus"></i>
							<span>{{ trans('home.phaseButton')}}</span>
						</a>
					</div>
				</div>
			</div>
			@endforeach
		</div>
		<div class="row" style="padding: 5px;">&nbsp</div>
	</div>
</section>

<!-- Call To Action #5
============================================= -->
<section id="cta-2" class="cta cta-5 pb-0 bg-theme">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="cta-2">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-7">
							<div class="cta-icon">
								<i class="lnr lnr-apartment"></i>
							</div>
							<div class="cta-devider">
							</div>
							<div class="cta-desc">
								<p>{{ trans('home.questionSubtitle')}}</p>
								<h5>{{ trans('home.questionTitle')}}</h5>
							</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-5 cta-action text-right pull-right pull-none-xs">
							<a class="btn btn-primary btn-white mr-sm" href="{{ url('/bilingualism/') }}">{{ trans('home.questionButton1')}}</a>
							<a class="btn btn-secondary" href="{{ url('/scheduleVisit/') }}">{{ trans('home.questionButton2')}}</a>
							<!-- .model-quote end -->
						</div>
					</div>
				</div>
				<!-- .cta-1 end -->
			</div>
			<!-- .col-md-12 end -->
		</div>
		<!-- .row end -->
	</div>
	<!-- .container end -->
</section>
<!-- #cta-5 end -->

       <!-- Choose Start -->
	   <section class="choose-area pb-85 pt-77">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-left-4 col-sm-8 col-md-offset-left-4">
                        <div class="choose-content text-left">
                            <h2>WHY YOU CHOOSE EDUHOME ?</h2>
                            <p>I must explain to you how all this mistaken idea of denouncing pleure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings  the master-builder of humanit happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because. </p>
                            <p class="choose-option">I must explain to you how all this mistaken idea of denouncing pleure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings  the master-builder. </p>
                            <a class="default-btn" href="course-details.html">view courses</a>
                        </div>  
                    </div>
                </div>
            </div>
        </section>
        <!-- Choose Area End -->

<!-- Testimonials #4
============================================= -->
 <!-- Testimonial Area Start -->
<section class="testimonial-area pt-110 pb-105 text-center">
	<div class="container">
		<div class="row">
			<div class="heading heading-3 text-center">
				<div class="heading-bg">
					<p class="mb-0">{{ trans('home.testimonialSubtitle')}}</p>
					<h2>{{ trans('home.testimonialTitle')}}</h2>
				</div>
			</div>
			<div class="testimonial-owl owl-theme owl-carousel">
				<div class="col-md-8 col-md-offset-2 col-sm-12">
					@foreach($results->testemonial as $item)
					<div class="single-testimonial">
						<div class="testimonial-info">
							<div class="testimonial-img">
								<img src="img/testimonial/testimonial.jpg" alt="testimonial">
							</div>
							<div class="testimonial-content">
								<p><?= internation($item, 'text') ?></p>
								<h4>{{ $item->name }}</h4>
								<h5>{{ $item->office }}</h5>
							</div>
						</div>
					</div>
					@endforeach
					
				</div> 
			</div>
		</div>
	</div>
</section>
<!-- Testimonial Area End -->

<!-- Blog Area Start -->
<section class="blog-area pt-150 pb-150">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="section-title text-center">
					<img src="img/icon/section.png" alt="section-title">
					<p class="mb-0">{{ trans('home.blogSubtitle')}}</p>
					<h2>{{ trans('home.blogTitle')}}</h2>
				</div>
			</div>
		</div>
		<div class="row">

				<?= $results->blog ?>

			<div class="col-xs-12 col-sm-12 col-md-12 text-center">
				<a class="btn btn-secondary" href="{{ url('/blog/') }}">{{ trans('home.blogButton')}}<i class="fa fa-plus"></i></a>
			</div>
		</div>
	</div>
</section>
<!-- Blog Area End -->

        <!-- Subscribe Start -->
        <div class="subscribe-area pt-60 pb-70">
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-md-offset-2">
							<div class="subscribe-content section-title text-center">
								<h2>subscribe our newsletter</h2>
								<p>I must explain to you how all this mistaken idea </p>
							</div>
							<div class="newsletter-form mc_embed_signup">
								<form action="http://devitems.us11.list-manage.com/subscribe/post?u=6bbb9b6f5827bd842d9640c82&amp;id=05d85f18ef" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
									<div id="mc_embed_signup_scroll" class="mc-form"> 
										<input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="Enter your e-mail address" required>
										<!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
										<div class="mc-news" aria-hidden="true"><input type="text" name="b_6bbb9b6f5827bd842d9640c82_05d85f18ef" tabindex="-1" value=""></div>
										<button id="mc-embedded-subscribe" class="default-btn" type="submit" name="subscribe"><span>subscribe</span></button> 
									</div>    
								</form>
								<!-- mailchimp-alerts Start -->
								<div class="mailchimp-alerts">
									<div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
									<div class="mailchimp-success"></div><!-- mailchimp-success end -->
									<div class="mailchimp-error"></div><!-- mailchimp-error end -->
								</div>
								<!-- mailchimp-alerts end -->
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Subscribe End -->


@endsection

@section('scripts')

<!-- RS5.0 Core JS Files -->
<script type="text/javascript" src="{!! asset('revolution/js/jquery.themepunch.tools.min.js?rev=5.0') !!}"></script>
<script type="text/javascript" src="{!! asset('revolution/js/jquery.themepunch.revolution.min.js?rev=5.0') !!}"></script>

<script type="text/javascript" src="{!! asset('revolution/js/extensions/revolution.extension.video.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('revolution/js/extensions/revolution.extension.slideanims.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('revolution/js/extensions/revolution.extension.actions.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('revolution/js/extensions/revolution.extension.layeranimation.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('revolution/js/extensions/revolution.extension.kenburn.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('revolution/js/extensions/revolution.extension.navigation.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('revolution/js/extensions/revolution.extension.migration.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('revolution/js/extensions/revolution.extension.parallax.min.js') !!}"></script>

<script type="text/javascript"> 
jQuery(document).ready(function() { 
   jQuery("#slider1").revolution({
      sliderType:"standard",
      sliderLayout:"auto",
      delay:9000,
	  disableProgressBar:"on",
	  spinner:"off",
      navigation: {
		keyboardNavigation:"off",
		keyboard_direction: "horizontal",
		mouseScrollNavigation:"off",
		onHoverStop:"off",
		arrows: {
			style:"arrow",
			enable:true,
			hide_onmobile:true,
			hide_onleave:false,
			tmp:'',
			left: {
				h_align:"left",
				v_align:"bottom",
				h_offset:110,
				v_offset:35
			},
			right: {
				h_align:"left",
				v_align:"bottom",
				h_offset:150,
				v_offset:35
			}
		}
	}, 
      gridwidth:1230,
      gridheight:800 ,
	  
    }); 
}); 
</script>


@endsection