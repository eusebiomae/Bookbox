@foreach ($payload as $item)
	<div class="col-md-4">
		<div class="panel panel-primary">
			<div class="panel-body">
				<h3 style = "text-align: justify;">{{ $item->title }}</h3>

				<h5 style = "text-align: justify;">
					{{ $item->courseCategoryType->title }} - {{ $item->courseSubcategory->description_pt }} - {{ $item->courseCategory->description_pt }}
				</h5>

				<p style = "text-align: justify;">{{ $item->description }}</p>

				<p>
					@foreach ($item->scholarshipDiscount as $discount)
						<span class="badge badge-info">
							{{ ($discount->amount_bag == 1) ? $discount->amount_bag.' bolsa' : $discount->amount_bag.' bolsas'}} de
							{{ $discount->discount_percentage }}%
						</span>
					@endforeach
				</p>

				<p>
					@if (!($item->avaliation))
						<button class = "btn btn-block btn-sm btn-danger" disabled>Prova Ainda Não Cadastrada</button>
					@elseif (count($item->avaliation->avaliationStudent) > 0)
						<a class = "btn btn-block btn-primary" href = "/student_area/scholarship/viewProofProficiency/{{ $item->avaliation->id }}">Ver Prova</a>
						<a class = "btn btn-block btn-sm btn-info" href = "/student_area/scholarship/classification/{{ $item->id }}">Classificação</a>
					@else
						<span class="badge badge-danger" style = "display: block; margin-bottom: 2px;">Faça a prova até {{ $item->exam_deadline }}</span>
						<a class = "btn btn-block btn-primary" href = "/student_area/scholarship/proofProficiency/{{ $item->avaliation->id }}">Fazer Prova de Proficiência</a>
					@endif
				</p>
			</div>
		</div>
	</div>
@endforeach
