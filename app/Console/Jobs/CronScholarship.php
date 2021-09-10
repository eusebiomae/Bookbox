<?php

namespace App\Console\Jobs;

use App\Model\api\ScholarshipModel;

class CronScholarship
{

	public static function run()
	{

		$getDiscountPercentage = function(&$scholarshipDiscount) {
			foreach ($scholarshipDiscount as &$discount) {
				if ($discount['amount_bag']) {
					$discount['amount_bag']--;

					return $discount['discount_percentage'];
				}
			}

			return 0;
		};

		$scholarship = ScholarshipModel::with([
			'scholarshipDiscount' => function($query) {
				$query->orderByDesc('discount_percentage');
			},
			'scholarshipStudent' => function($query) {
				$query
				->whereNotNull('payment_date')
				->where('proficiency_note', '>', '0')
				->where('socio_economic_note', '>', '0')
				->orderBy('to_approve')
				->orderByDesc('proficiency_note')
				->orderByDesc('socio_economic_note');
			},
		])
		->whereHas('scholarshipStudent', function($query) {
			$query->where('scholarship_student_status_id', 3);
		})
		->where('results_release_date', '<', now())
		->get();

		foreach ($scholarship as &$scholarshipItem) {
			$scholarshipDiscount = $scholarshipItem->scholarshipDiscount->toArray();

			foreach ($scholarshipItem->scholarshipStudent as $indx => &$scholarshipStudent) {
				$ranking = $indx + 1;
				$discountPercentage = $getDiscountPercentage($scholarshipDiscount);
				$scholarshipStudent->fill([
					'scholarship_student_status_id' => $discountPercentage ? 1 : 4,
					'ranking' => $ranking,
					'discount_percentage' => $discountPercentage,
				])->save();

				\App\Mail\EmailResultsScholarship::toSend($scholarshipStudent->id);
			}
		}

		return $scholarship;
	}
}
