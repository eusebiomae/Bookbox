<?php

namespace App\Mail;

use App\Model\api\ScholarshipStudentModel;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailResultsScholarship extends Mailable
{
	use Queueable, SerializesModels;

	/**
	* Create a new message instance.
	*
	* @return void
	*/
	public function __construct($data)
	{
		$this->data = $data;
	}

	/**
	* Build the message.
	*
	* @return $this
	*/
	public function build()
	{
		$template = $this->data->discount_percentage ? 'email.emailApprovalScholarship' : 'email.emailDisapprovalScholarship';

		return $this->view($template)
		->subject("Resultados da bolsa '{$this->data->scholarship->title}'")
		->with([ 'data' => $this->data, ]);
	}

	static public function toSend($id) {
		$dataToSend = ScholarshipStudentModel::with([ 'student', 'scholarship' ])->find($id);

		if ($dataToSend->student->email) {
			$emailTo = $dataToSend->student->email;

			return \Illuminate\Support\Facades\Mail::to($emailTo)->send(new EmailResultsScholarship($dataToSend));
		}
	}
}
