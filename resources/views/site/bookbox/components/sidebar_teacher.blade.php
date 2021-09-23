<aside class="col-lg-3" id="sidebar">
	<div class="profile">
	<figure><img src="{{$img}}" alt="Teacher" class="rounded-circle"></figure>
		<ul class="social_teacher">
			@if (isset($face_link))
				<li><a href="{{$face_link}}"><i class="icon-facebook"></i></a></li>
			@endif
			@if (isset($twit_link))
				<li><a href="{{$twit_link}}"><i class="icon-twitter"></i></a></li>
			@endif
			@if (isset($link_link))
				<li><a href="{{$link_link}}"><i class="icon-linkedin"></i></a></li>
			@endif
			@if (isset($email_link))
				<li><a href="{{$email_link}}"><i class="icon-email"></i></a></li>
			@endif
		</ul>
		<ul>
			<li>Nome: <span class="float-right">{{$name}}</span> </li>
			<li>CRP: <span class="float-right">{{$crp}}</span></li>
			<li>Cursos: <span class="float-right">{{$course_qtn}}</span></li>
			<li>Diciplinas: <span class="float-right">{{$subject_qtn}}</span></li>
		</ul>
	</div>
</aside>
