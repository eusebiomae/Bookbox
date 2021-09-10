@extends('layouts.site.site')

@section('title', 'Home')

@section('content')

<!-- Page Title ============================================= -->
<section class=" bg-overlay bg-overlay-gradient pb-0">
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
						<li class="active">{{ trans('menu.calendar')}}</li>
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

<!-- Contact #1 ============================================= -->
<section id="contact" class="contact">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="heading heading-4">
					<div class="heading-bg heading-right">
						<p class="mb-0">{{ internation($results->slide[0], 'subtitle') }}</p>
						<h2>{{ internation($results->slide[0], 'title') }}</h2>
					</div>
				</div>
				<!-- .heading end -->
			</div>
			<!-- .col-md-12 end -->
			<div class="col-xs-12 col-sm-12 col-md-12 ibox-content">
				<div id="calendar"></div>
			</div>
		</div>
		<!-- .row end -->
	</div>
	<!-- .container end -->
</section>

@endsection

@section('styles')
	<link href="css/plugins/fullcalendar/fullcalendar.css" rel="stylesheet">
	<link href="css/plugins/fullcalendar/fullcalendar.print.css" rel='stylesheet' media='print'>
@endsection

@section('scripts')
<script src="js/plugins/fullcalendar/moment.min.js"></script>
<!-- Full Calendar -->
<script src="js/plugins/fullcalendar/fullcalendar.min.js"></script>
<script src="js/plugins/fullcalendar/locale-all.js"></script>

<script>
	$(document).ready(function() {

		/* initialize the calendar
		-----------------------------------------------------------------*/
		var date = new Date();
		var d = date.getDate();
		var m = date.getMonth();
		var y = date.getFullYear();

		$('#calendar').fullCalendar({


			locale: '<?=Lang::locale() == 'pt' ? 'pt-br' : Lang::locale()?>',
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,listMonth'
				//right: 'month,agendaWeek,agendaDay'
			},
			events: <?= $data ?>
		});
	});
</script>
@endsection
