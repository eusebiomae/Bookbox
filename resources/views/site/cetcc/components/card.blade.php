{{-- REPEAT --}}
<div class="col-xl-6 col-lg-6 col-md-6">
	<div class="box_grid wow">
		@if (isset($author))
			<figure class="block-reveal">
				<div class="block-horizzontal"></div>
				<a href="#0" class="wish_bt" data-liked="{{ $data->id }}"></a>
				<a href="{{ $link }}">
					<img src="{{ $img_card }}" class="img-fluid" alt="">
					<div class="preview"><span>Ler mais</span></div>
				</a>
			</figure>
		@endif

		<div class="wrapper">
			<small>{{ $category }}</small>
			<h5 class = "text-wrap">{{ $data->title }}</h5>
			<p>{{ isset($data->subtitle) ? $data->subtitle : $data->description }}</p>
			<div class="post_info">
				@if (isset($author))
					<ul>
						<li>
							<div class="thumb"><img src="{{ $img_author ? $img_author : 'storage/user/user_default.png' }}" alt=""></div> {{ $author }}
						</li>
						<li><i class="icon-calendar-empty"></i>{{ $data->created_at }}</li>
					</ul>
				@else
					@foreach ($data->scholarshipDiscount as $discount)
						<span class="badge badge-cian mb-1">
							{{ ($discount->amount_bag == 1) ? $discount->amount_bag.' bolsa' : $discount->amount_bag.' bolsas'}} de {{ $discount->discount_percentage }}%
						</span>
					@endforeach
				@endif
			</div>
		</div>

		<ul>
			@if (isset($author))
				<li><i class="icon_heart_alt"></i> {{ $data->count_likes }}</li>
				<li><i class="icon-eye"></i> {{ $data->count_views }}</>
				<li><i class="icon_comment_alt"></i> {{ $data->count_comments }}</>
				<li><a href="{{ $link }}">Ler mais</a></li>
			@else
				<li id = "registrationFee">Inscrição: R${{ formatNumber($data->registration_fee, 2) }}</li>
				<li>
					<a href="{{ $link }}">Fazer Inscrição</a>
					<div class="invalid-feedback text-center" style = "display: block; font-size: 75%;">
						Inscrições até {{ $data->registration_end_date }}
					</div>
				</li>
			@endif
		</ul>
	</div>
</div>
{{--// REPEAT --}}
