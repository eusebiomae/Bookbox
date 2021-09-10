<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>&pi;+ | @yield('title') </title>
	<style>
		.remove {
			display: none;
		}
	</style>
	<link href="{!! asset('images/favicon/favicon.ico') !!}" rel="icon">
	<link rel="stylesheet" href="{!! asset('css/vendor.css') !!}" />
	<link href="{!! asset('css/style-painel.css')!!}" rel="stylesheet">
	<link rel="stylesheet" href="{!! asset('css/app.css') !!}" />
	<link rel="stylesheet" href="{!! asset('font-awesome/css/font-awesome.css') !!}">

	@yield('css')

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-146580573-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-146580573-1');
	</script>
</head>
<body>

	<div id="aysLoading" style="display:none">
		<div style="background-color: #2f4050;position: fixed;width: 100%;height: 100vh;z-index: 999999999;opacity: .9;align-items: center;display: flex;flex-direction: row;flex-wrap: wrap;justify-content: center">
			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="201px" height="201px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
				<g transform="translate(50,50)">
					<g transform="scale(1)">
						<g transform="translate(-50,-50)">
							<g>
								<animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" values="360 50 50;0 50 50" keyTimes="0;1" dur="1.408450704225352s" keySplines="0.7 0 0.3 1" calcMode="spline"></animateTransform>
								<path fill="#93dbe9" d="M30.4,9.7c-7.4,10.9-11.8,23.8-12.3,37.9c0.2,1,0.5,1.9,0.7,2.8c1.4-5.2,3.4-10.3,6.2-15.1 c2.6-4.4,5.6-8.4,9-12c0.7-0.7,1.4-1.4,2.1-2.1c7.4-7,16.4-12,26-14.6C51.5,3.6,40.2,4.9,30.4,9.7z"></path>
								<path fill="#689cc5" d="M24.8,64.2c-2.6-4.4-4.5-9.1-5.9-13.8c-0.3-0.9-0.5-1.9-0.7-2.8c-2.4-9.9-2.2-20.2,0.4-29.8 C10.6,25.5,6,36,5.3,46.8C11,58.6,20,68.9,31.9,76.3c0.9,0.3,1.9,0.5,2.8,0.8C31,73.3,27.6,69,24.8,64.2z"></path>
								<path fill="#5e6fa3" d="M49.6,78.9c-5.1,0-10.1-0.6-14.9-1.8c-1-0.2-1.9-0.5-2.8-0.8c-9.8-2.9-18.5-8.2-25.6-15.2 c2.8,10.8,9.5,20,18.5,26c13.1,0.9,26.6-1.7,38.9-8.3c0.7-0.7,1.4-1.4,2.1-2.1C60.7,78.2,55.3,78.9,49.6,78.9z"></path>
								<path fill="#3b4368" d="M81.1,49.6c-1.4,5.2-3.4,10.3-6.2,15.1c-2.6,4.4-5.6,8.4-9,12c-0.7,0.7-1.4,1.4-2.1,2.1 c-7.4,7-16.4,12-26,14.6c10.7,3,22.1,1.7,31.8-3.1c7.4-10.9,11.8-23.8,12.3-37.9C81.6,51.5,81.4,50.6,81.1,49.6z"></path>
								<path fill="#d9dbee" d="M75.2,12.9c-13.1-0.9-26.6,1.7-38.9,8.3c-0.7,0.7-1.4,1.4-2.1,2.1c5.2-1.4,10.6-2.2,16.2-2.2 c5.1,0,10.1,0.6,14.9,1.8c1,0.2,1.9,0.5,2.8,0.8c9.8,2.9,18.5,8.2,25.6,15.2C90.9,28.1,84.2,18.9,75.2,12.9z"></path>
								<path fill="#b3b7e2" d="M94.7,53.2C89,41.4,80,31.1,68.1,23.7c-0.9-0.3-1.9-0.5-2.8-0.8c3.8,3.8,7.2,8.1,10,13 c2.6,4.4,4.5,9.1,5.9,13.8c0.3,0.9,0.5,1.9,0.7,2.8c2.4,9.9,2.2,20.2-0.4,29.8C89.4,74.5,94,64,94.7,53.2z"></path>
							</g>
						</g>
					</g>
				</g>
			</svg>
		</div>
	</div>

	<script>
		function showLoading() {
			document.getElementById('aysLoading').style.display = ''
		}
		function hideLoading() {
			document.getElementById('aysLoading').style.display = 'none'
		}
	</script>

	<!-- Wrapper-->
	<div id="wrapper">

		<!-- Navigation -->
		@include('student_area.layouts.navigation')

		<!-- Page wraper -->
		<div id="page-wrapper" class="gray-bg">

			<!-- Page wrapper -->
			@include('student_area.layouts.topnavbar')

			<!-- Main view  -->
			@yield('content')

			<!-- Footer -->
			@include('student_area.layouts.footer')

		</div>
		<!-- End page wrapper-->

	</div>
	<!-- End wrapper-->
	<script src="{!! asset('js/jquery.min.js') !!}"></script>
	<script src="{!! asset('js/gp-ays.js') !!}"></script>
	<script src="{!! asset('js/app.js') !!}"></script>
	<script src="{!! asset('lib/vimeoPlayer.js') !!}"></script>

	@yield('scripts')
	<script>
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
  </script>

</body>
</html>
