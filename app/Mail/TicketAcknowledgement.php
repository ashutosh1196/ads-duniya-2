<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TicketAcknowledgement extends Mailable {
	use Queueable, SerializesModels;

	/**
	 * Create a new message instance.
	 *
	 * @return void
	*/
	public function __construct($userName, $ticketLink, $userType) {
		$this->userName = $userName;
		$this->ticketLink = $ticketLink;
		$this->userType = $userType;
	}

	/**
	 * Build the message.
	 *
	 * @return $this
	*/
	public function build() {
		$subject = $this->userType == 'sender' ? config('adminlte.ticket_acknowledgement_subject_sender', '') : config('adminlte.ticket_acknowledgement_subject_receiver', '');
		return $this->from( config("adminlte.from_email", 'admin@whichvocation.com'), config('adminlte.whichvocation', 'Whichvocation') )
			->subject($subject)
			->view('emails.ticket_acknowledgement')
			->with([
				'userName' => $this->userName,
				'ticketLink' => $this->ticketLink,
				'userType' => $this->userType
			]);
	}
}