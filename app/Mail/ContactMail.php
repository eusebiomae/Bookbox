<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactMail extends Mailable
{
	use Queueable, SerializesModels;

	/**
	* Create a new message instance.
	*
	* @return void
	*/
	public function __construct($payload)
	{
		$this->payload = $payload;
	}

	/**
	* Build the message.
	*
	* @return $this
	*/
	public function build()
	{
		return $this->view('email.contact-mail')->with('payload', $this->payload);
	}
}
