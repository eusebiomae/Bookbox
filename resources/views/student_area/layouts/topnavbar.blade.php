<div class="row border-bottom" style="display: inherit">
	<nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
		<div class="navbar-header">
			<a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
		</div>
		<ul class="nav navbar-top-links navbar-right">
			<li style="padding-right: 5px">
				<span class="text-muted text-xs block">
					{{ Auth::guard('studentArea')->user()->name }}
				</span>
			</li>
			<li>
				<img src="{{ empty(Auth::guard('studentArea')->user()->image) ? '/images/user/user.png' : Auth::guard('studentArea')->user()->image }}" class="img-profile">
			</li>
			<li>
				<a href="{{ route('studentArea.logout') }}">
					<i class="fa fa-sign-out"></i> Sair
				</a>
			</li>
		</ul>
	</nav>
</div>
