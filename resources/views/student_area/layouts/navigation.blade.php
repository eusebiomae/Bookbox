<nav class="navbar-default navbar-static-side" role="navigation">
	<div class="sidebar-collapse">
		<ul class="nav metismenu" id="side-menu">
			<li class="nav-header">
				<div class="dropdown profile-element">
					<span>
						<a href="{{ url('/student_area/') }}">
							<img alt="image" class="img" src="{!! asset(Session::get('company')->image) !!}" />
						</a>
					</span>
					<a data-toggle="dropdown" class="dropdown-toggle" href="{{ url('/student_area/') }}">
						<span class="block m-t-xs" style="margin-top: 15px; font-size: 11px; text-align: center;">
							<strong class="font-bold">{{ Session::get('company')->name }}</strong>
						</span>
					</a>
				</div>

				<div class="logo-element">
					CETCC
				</div>
			</li>

			<li class="">
				<a href="{{ url('/student_area/') }}"><i class="fa fa-home"></i> <span class="nav-label">Home</span></a>
			</li>

			<li class="">
				<a href="{{ url('/student_area/account_data') }}">
					<i class="fa fa-address-card"></i>
					<span class="nav-label">Meus Dados</span>
				</a>
			</li>

			<li class="">
				<a href="{{ url('/student_area/order/course') }}">
					<i class="fa fa-graduation-cap"></i>
					<span class="nav-label">Meus Cursos</span>
				</a>
			</li>

			@if (GigaGetData::hasScholarship())
				<li class="">
					<a href="{{ url('/student_area/scholarship') }}">
						<i class="fa fa-suitcase"></i>
						<span class="nav-label">Minhas Bolsas</span>
					</a>
				</li>
			@endif

			<li class="">
				<a href="#">
					<i class="fa fa-list-alt"></i>
					<span class="nav-label">Supervisões</span>
					<span class="fa arrow"></span>
				</a>

				<ul class="nav nav-second-level collapse" >
					<li>
						<a href="{{ url('/student_area/order/supervision') }}">Minhas Supervisões</a>
					</li>

					<li>
						<a href="{{ url('/student_area/order/newsupervision') }}">Nova Supervisão</a>
					</li>
				</ul>
			</li>
			<li class="special_link">
				<a href="{{ url('/') }}">
					<i class="fas fa-globe"></i>
					<span class="nav-label">Ir para o site</span>
				</a>
			</li>

		</ul>

	</div>
</nav>
