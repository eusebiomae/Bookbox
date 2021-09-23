<div class="box_teacher">
		<div class="indent_title_in">
			<i class="pe-7s-user"></i>
			<h3>{{$name}}</h3>
			@if (isset($subtitle))
				<p>{{$subtitle}}</p>
			@endif
		</div>
		<div class="wrapper_indent">
			<p>{!! $description !!}</p>
			<h5>Currículo</h5>
			<p>{!! $curriculum !!}</p>
			<ul class="list_3 row">
				@foreach ($certification as $item)
					<li class="col-md-6"><strong>{{ $item['date'] }}</strong>
						<p>{{ $item['name'] }}</p>
					</li>
				@endforeach
			</ul>
			<!-- End row-->
		</div>
		<!--wrapper_indent -->
		<hr class="styled_2">
		<div class="indent_title_in">
			<i class="pe-7s-display1"></i>
			<h3>My courses</h3>
			@if (isset($subtitle))
			<p>{{$subtitle}}</p>
			@endif
		</div>
		<div class="wrapper_indent">
		<p>{{$descript_courses}}</p>
				<table class="table table-responsive table-striped add_bottom_30">
					<thead>
						<tr>
							<th>Category</th>
							<th>Course name</th>
							{{-- <th>Rate</th> --}}
						</tr>
					</thead>
					<tbody>

						<tr>
							<td>Business</td>
							<td><a href="#">Business Plan</a></td>
							{{-- <td class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i> <i class="icon-star voted"></i></td> --}}
						</tr>
						<tr>
							<td>Business</td>
							<td><a href="#">Economy pinciples</a></td>
							{{-- <td class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i> <i class="icon-star"></i></td> --}}
						</tr>
						<tr>
							<td>Business</td>
							<td><a href="#">Understand diagrams</a></td>
							{{-- <td class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i> <i class="icon-star"></i></td> --}}
						</tr>
						<tr>
							<td>Business</td>
							<td><a href="#">Marketing strategies</a></td>
							{{-- <td class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i> <i class="icon-star"></i></td> --}}
						</tr>
						<tr>
							<td>Business</td>
							<td><a href="#">Marketing</a></td>
							{{-- <td class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i> <i class="icon-star voted"></i></td> --}}
						</tr>
						<tr>
							<td>Business</td>
							<td><a href="#">Business Plan</a></td>
							{{-- <td class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i> <i class="icon-star"></i></td> --}}
						</tr>
						<tr>
							<td>Business</td>
							<td><a href="#">Economy pinciples</a></td>
							{{-- <td class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i> <i class="icon-star"></i></td> --}}
						</tr>
						<tr>
							<td>Business</td>
							<td><a href="#">Understand diagrams</a></td>
							{{-- <td class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i> <i class="icon-star"></i></td> --}}
						</tr>
					</tbody>
				</table>
		</div>
		<!--wrapper_indent -->
	</div>
