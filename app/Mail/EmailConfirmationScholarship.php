<?php

namespace App\Mail;

use App\Model\api\ScholarshipStudentModel;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailConfirmationScholarship extends Mailable
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
		return $this->view('email.emailConfirmationScholarship')
		->subject('Confirmação de Inscrição de Bolsa')
		->with([ 'data' => $this->data, ]);
	}

	static public function toSend($id) {
		$dataToSend = ScholarshipStudentModel::with([ 'student', 'scholarship' ])->find($id);

		if ($dataToSend->student->email) {
			$emailTo = $dataToSend->student->email;

			return \Illuminate\Support\Facades\Mail::to($emailTo)->send(new EmailConfirmationScholarship($dataToSend));
		}
	}
}
