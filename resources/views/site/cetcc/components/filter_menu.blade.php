<div class="filters_listing gp-bkg-yellow sticky_horizontal">
	<div class="container">
		<ul class="clearfix">
			@if (isset($switch))
			<li>
				<div class="switch-field">
					<input type="radio" id="all" name="listing_filter" value="all" checked>
					<label for="all">Todos</label>
					<input type="radio" id="popular" name="listing_filter" value="popular">
					<label for="popular">Populares</label>
					<input type="radio" id="latest" name="listing_filter" value="latest">
					<label for="latest">Recentes</label>
				</div>
			</li>
			<li>
				<div class="layout_view">
					<a href="#0" class="active"><i class="icon-th"></i></a>
					<a href="courses-list.html"><i class="icon-th-list"></i></a>
				</div>
			</li>
			@endif
			<li>
				<select name="orderby" class="selectbox">
					<option value="category">Category</option>
					<option value="category 2">Literature</option>
					<option value="category 3">Architecture</option>
					<option value="category 4">Economy</option>
				</select>
			</li>
		</ul>
	</div>
</div>
