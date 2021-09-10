@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Pagina de teste</div>

				<div class="panel-body">

					<video id="vdo" width="320" height="240" controls controlsList="nodownload" oncontextmenu="return false">
						<source type="video/mp4" src="https://player.vimeo.com/external/516334150.hd.mp4?s=d53c1bdc839ef05b35a8f34d5723eed1c8e77660">
					</video>

					<script>
						var vdo = document.getElementById('vdo')

						setInterval(() => {
							console.log(vdo.currentTime)
						}, 1000)
					</script>

				</div>
			</div>
		</div>
	</div>
</div>
@endsection

