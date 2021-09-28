@foreach ($pageData->content as $item)
<section id="blog" class="section section-xxl swiper-slide-blog" style="background-image: url('{{$item['image_bg']}}');">
	<div class="container">
		<!-- Owl Carousel-->
		<div class="owl-carousel" data-items="1" data-sm-items="2" data-lg-items="3" data-margin="30" data-dots="true" data-mouse-drag="false">


			<!-- Post Classic-->
			@foreach ($blogs as $blog)
			<article class="post post-classic box-md wow slideInDown">
				<a class="post-classic-figure" href="blog-post.html"><img src="images/post-1-370x239.jpg" alt="" width="370" height="239" /></a>
				<div class="post-classic-content">
					<div class="post-classic-time">
						<time datetime="2020-08-09">August 9, 2020</time>
					</div>
					<h5 class="post-classic-title"><a href="blog-post.html">Can a Smoothie Supercharge Your Day?</a></h5>
					<p class="post-classic-text">Most of us would agree – mornings are hectic. Getting yourself and possibly others ready for the day ahead may...</p>
				</div>
			</article>
			@endforeach


			<!-- Post Classic-->
			<article class="post post-classic box-md wow slideInUp">
				<a class="post-classic-figure" href="blog-post.html"><img src="images/post-2-370x239.jpg" alt="" width="370" height="239" /></a>
				<div class="post-classic-content">
					<div class="post-classic-time">
						<time datetime="2020-08-09">August 9, 2020</time>
					</div>
					<h5 class="post-classic-title"><a href="blog-post.html">How to Make Your Breakfast Easy and Yummy</a></h5>
					<p class="post-classic-text">Overloading your breakfast with calories may not be the best idea but when you need a boost for the upcoming...</p>
				</div>
			</article>
			<!-- Post Classic-->
			<article class="post post-classic box-md wow slideInDown">
				<a class="post-classic-figure" href="blog-post.html"><img src="images/post-3-370x239.jpg" alt="" width="370" height="239" /></a>
				<div class="post-classic-content">
					<div class="post-classic-time">
						<time datetime="2020-08-09">August 9, 2020</time>
					</div>
					<h5 class="post-classic-title"><a href="blog-post.html">Tips from Our Team: Making Yoghurts with Fresh Fruits</a></h5>
					<p class="post-classic-text">Combining milk and fruits is the best solution for your daily meal, whether it’s breakfast, lunch, or any other...</p>
				</div>
			</article>
		</div>
	</div>
</div>
{{-- Deixe um Comentario section  --}}
<div class="col-md-12 col-sm-12" style="padding: 100px;">
		<h6 class="single-post-title">Deixe um comentário</h6>
		<form class="rd-form rd-mailform" data-form-output="form-output-global" data-form-type="contact" method="post" action="bat/rd-mailform.php">
				<div class="row row-20 row-md-30">
					<div class="col-sm-6">
						<div class="form-wrap">
							<input class="form-input" id="contact-first-name-2" type="text" name="name" data-constraints="@Required">
							<label class="form-label" for="contact-first-name-2">Nome</label>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-wrap">
							<input class="form-input" id="contact-last-name-2" type="text" name="name" data-constraints="@Required">
							<label class="form-label" for="contact-last-name-2">Sobrenome</label>
						</div>
					</div>
					<div class="col-12">
						<div class="form-wrap">
							<label class="form-label" for="contact-message-2">Mensagem</label>
							<textarea class="form-input textarea-lg" id="contact-message-2" name="phone" data-constraints="@Required"></textarea>
						</div>
					</div>
				</div>
				<button class="button button-lg button-secondary button-zakaria" type="submit">Enviar</button>
		</form>
</div>
{{-- Fim de deixe um comentario  --}}
</section>
@endforeach
