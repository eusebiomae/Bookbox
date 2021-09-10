<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailConfirmationMail extends Mailable
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
		return $this->view('email.emailConfirmationMail')
		->subject('Confirmação de Cadastro')
		->with([ 'data' => $this->data, ]);
	}
}
