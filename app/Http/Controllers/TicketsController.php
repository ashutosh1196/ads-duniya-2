<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\TicketMessage;

class TicketsController extends Controller {
	
	public function ticketsList() {
		$ticketsList = Ticket::all();
		return view('tickets/tickets_list', [ 'ticketsList' => $ticketsList ]);
	}

	public function viewTicket($id) {
		$ticket = Ticket::where('id', $id)->get();
		$ticketMessage = TicketMessage::where('id', $ticket[0]->id)->get();
		return view('tickets/view_ticket', [
			'ticket' => $ticket,
			'ticketMessage' => $ticketMessage
		]);
	}

	public function closeTicket(Request $request) {
		$closeTicket = Ticket::where('id', $request->id)->update([ 'status' => 'close' ]);
		if($closeTicket) {
			$ticketsList = Ticket::all();
			$res['success'] = 1;
			$res['data'] = $ticketsList;
			return json_encode($res);
		}
		else {
			$res['success'] = 0;
			return json_encode($res);
		}
	}

	public function openTicket(Request $request) {
		$openTicket = Ticket::where('id', $request->id)->update([ 'status' => 'open' ]);
		if($openTicket) {
			$ticketsList = Ticket::all();
			$res['success'] = 1;
			$res['data'] = $ticketsList;
			return json_encode($res);
		}
		else {
			$res['success'] = 0;
			return json_encode($res);
		}
	}
}
