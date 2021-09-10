@section('css')
@parent
<link href="{!! asset('cetcc/css/skins/square/grey.css') !!}" rel="stylesheet">

@endsection
<aside class="col-lg-3" id="sidebar">
		<div id="filters_col"> <a data-toggle="collapse" href="#collapseFilters" aria-expanded="false" aria-controls="collapseFilters" id="filters_col_bt">Filters </a>
			<div class="collapse show" id="collapseFilters">
				<div class="filter_type">
					<h6>Categorias</h6>
					<ul>
						<li>
							<label >
								<input type="checkbox" class="icheck" checked />Todos <small id="categoryAll"></small>
							</label>
						</li>
						<li>
							<label>
								<input type="checkbox" class="icheck" />description_pt<small>(000)</small>
							</label>
						</li>
					</ul>
				</div>
				{{-- @if (isset($star_5) || isset($star_4) || isset($star_3) || isset($star_2) || isset($star_1))
				<div class="filter_type">
					<h6>Rating</h6>
					<ul>
						<li>
							<label>
								<input type="checkbox" class="icheck">
								<span class="rating">
									<i class="icon_star voted"></i>
									<i class="icon_star voted"></i>
									<i class="icon_star voted"></i>
									<i class="icon_star voted"></i>
									<i class="icon_star voted"></i>
									<small>({{$star_5}})</small>
								</span>
							</label>
						</li>
						@if (iseet($star_4))
						<li>
							<label>
								<input type="checkbox" class="icheck">
								<span class="rating">
									<i class="icon_star voted"></i>
									<i class="icon_star voted"></i>
									<i class="icon_star voted"></i>
									<i class="icon_star voted"></i>
									<i class="icon_star"></i>
									<small>({{$star_4}})</small>
								</span>
							</label>
						</li>
						@endif
						@if (iseet($star_3))
						<li>
							<label>
								<input type="checkbox" class="icheck">
								<span class="rating">
									<i class="icon_star voted"></i>
									<i class="icon_star voted"></i>
									<i class="icon_star voted"></i>
									<i class="icon_star"></i>
									<i class="icon_star"></i>
									<small>({{$star_3}})</small>
								</span>
							</label>
						</li>
						@endif
						@if (iseet($star_2))
						<li>
							<label>
								<input type="checkbox" class="icheck">
								<span class="rating">
									<i class="icon_star voted"></i>
									<i class="icon_star voted"></i>
									<i class="icon_star"></i>
									<i class="icon_star"></i>
									<i class="icon_star"></i>
									<small>({{$star_2}})</small></span>
							</label>
						</li>
						@endif
						@if (iseet($star_1))
						<li>
							<label>
								<input type="checkbox" class="icheck">
								<span class="rating">
									<i class="icon_star voted"></i>
									<i class="icon_star"></i>
									<i class="icon_star"></i>
									<i class="icon_star"></i>
									<i class="icon_star"></i>
									<small>({{$star_1}})</small>
								</span>
							</label>
						</li>
						@endif
					</ul>
				</div>
				@endif --}}
			</div>
			<!--/collapse -->
		</div>
		<!--/filters col-->
	</aside>


	@section('scripts')
	@parent
<script>
		document.addEventListener('DOMContentLoaded', function () {
			// $('.icheck').iCheck('update');
			jQuery(function() {
				jQuery('.icheck').iCheck({
					checkboxClass: 'icheckbox_square-grey',
					radioClass: 'iradio_square-grey'
				});
			})

		});
	</script>
@endsection
