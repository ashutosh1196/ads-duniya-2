<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerifyUser extends Mailable {
	use Queueable, SerializesModels;

	/**
	 * Create a new message instance.
	 *
	 * @return void
	*/
	public function __construct($username, $link) {
		$this->username = $username;
		$this->link = $link;
	}

	/**
	 * Build the message.
	 *
	 * @return $this
	*/
	public function build() {
		return $this->from('no_reply@whichvocation.com', "Which Vocation")
					->subject('User Verification')
					->view('emails.verify_user')
					->with(['username' => $this->username, 'link' => $this->link]);
	}
}
