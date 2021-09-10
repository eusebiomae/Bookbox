@foreach($list as $item)
<div class="col-xs-12 col-sm-{{$layout->col}} col-md-{{$layout->col}} entry">
	<div class="col-md-4 col-sm-6 col-xs-12">
		<div class="single-blog">
			<div class="blog-img">
				<a href="{!! asset('images/blog/grid/' . $item->image) !!}"><img src="{!! asset('images/blog/grid/' . $item->image) !!}" alt="blog"></a>
				<div class="blog-hover">
					<a href="blog-details.html"><i class="fa fa-link"></i></a>
				</div>
			</div>
			<div class="blog-content">
				<div class="blog-top">
					<p>Em:<span>{{ internation($item, 'blog_category_description') }}</span> |  <span>{{ $item->month }}</span> {{ $item->day }}</p>
				</div>
				<div class="blog-bottom">
					<a class="entry-more" href="#" data-toggle="modal" data-target="#model-quote{{ $item->id }}" id="modelquote{{ $item->id }}">{{ internation($item, 'title') }}</a>
					<p class="cut-text" style="height:120px;">{{ internation($item, 'text') }}</p>
					<a class="entry-more" href="#" data-toggle="modal" data-target="#model-quote{{ $item->id }}" id="modelquote{{ $item->id }}"><i class="fa fa-plus"></i>
						<span>{{ trans('blog.read')}}</span>
					</a>
				</div>
			</div>
		</div>
	</div>
	<!-- .entry-content end -->
</div>
<!-- Modal -->
<div class="modal fade model-quote" id="model-quote{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modelquote{{ $item->id }}">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					<div class="model-icon">
						<i class="fa fa-newspaper-o"></i>
					</div>
					<div class="model-divider">
						<div class="model-title">
							<p class="mb-0">{{ trans('home.blogTitle')}}</p>
							<h2> {{ internation($item, 'title') }}</h2>
						</div>
					</div>
				</div>
				<!-- .model-header end -->
				<div class="modal-body">
					<div class="entry-img">
						<a class="img-popup" href="{!! asset('images/blog/grid/' . $item->image) !!}">
							<img src="{!! asset('images/blog/grid/' . $item->image) !!}" alt="title"/>
						</a>
					</div>
					<!-- .entry-img end -->
					<div class="entry-meta clearfix">
						<ul class="pull-left">
							<li class="entry-format">
								<i class="fa fa-newspaper-o"></i>
							</li>
							<li class="entry-date">
								<span>{{ $item->month }}</span> {{ $item->day }}
							</li>
						</ul>
						<ul class="pull-right text-right">
							<li class="entry-cat"> Em:
								<span>
									{{ internation($item, 'blog_category_description') }}<br>
								</span>
								{{--  <span class="entry-author">By:
								<a href="#">Begha</a>
								</span>  --}}
							</li>
						</ul>
					</div>
					<!-- .entry-meta end -->
					<div class="entry-title">
						<a href="#">
							<h3>{{ internation($item, 'title') }}</h3>
						</a>
					</div>
					<!-- .entry-title end -->
					<div class="entry-content">
						<p><?= internation($item, 'text') ?></p>
					</div>
				</div>
				<!-- .model-body end -->
			</div>
		</div>
	</div>
@endforeach
