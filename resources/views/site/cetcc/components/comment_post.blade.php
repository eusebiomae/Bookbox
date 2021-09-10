@foreach ($comments as $comment)
<li>
	<div class="avatar">
		<img src="http://via.placeholder.com/150x150/ccc/fff/avatar3.jpg" alt="">
	</div>

	<div class="comment_right clearfix">
		<div class="comment_info">
			Por: {{ $comment->name }}<span>|</span>{{$comment->created_at}}<span>|</span><a
				href="javaScript:answerComment('{{ htmlentities($comment->name) }} | {{ $comment->created_at }}', {{ $comment->id }})">Responder</a>
		</div>
		{{ $comment->comments }}
	</div>
	@if (count($comment->answerFrom))
		<ul>
		@include('site.cetcc.components.comment_post', [
			'comments' => $comment->answerFrom,
		])
		</ul>
	@endif
</li>
@endforeach
