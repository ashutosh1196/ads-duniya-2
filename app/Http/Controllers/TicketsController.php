<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\TicketMessage;
use App\Models\Admin;
use App\Models\Recruiter;
use App\Models\Organization;

class TicketsController extends Controller {
	
	public function ticketsList() {
		$ticketsList = Ticket::all();
		return view('tickets/tickets_list', [ 'ticketsList' => $ticketsList ]);
	}

	public function viewTicket($id) {
		$ticket = Ticket::find($id);
		$ticketId = $ticket->id;
		$ticketMessages = TicketMessage::find($ticketId);
		$superAdmin = Admin::where('role_id', 1)->get();
		$recruiter = Recruiter::find($ticket->recruiter_id);
		$organization = Organization::find($recruiter->organization_id);
		return view('tickets/view_ticket', [
			'ticket' => $ticket,
			'ticketMessages' => $ticketMessages,
			'superAdmin' => $superAdmin,
			'recruiter' => $recruiter,
			'organizationLogo' => $organization[0]->logo
		]);
	}

	public function replyOnTicket(Request $request) {
		$request->validate([
			'message_text' => 'required',
		], [
			'message_text.required' => 'Message is required',
		]);
		$fileName = "";
		if($request->file('attachment_file')) {
			$attachment_file = $request->file('attachment_file');
			// $destinationPath = config('adminlte.website_url').'ticket_images';
			$destinationPath = $_SERVER["DOCUMENT_ROOT"].'/which-vocation/website/Amrik-which-vocation-web/public/ticket_images';
			$fileName = uniqid().'.'.$attachment_file->extension();
			$attachment_file->move($destinationPath, $fileName);
		}

		$reply = new TicketMessage;
		$reply->message_text = $request->message_text;
		$reply->ticket_id = $request->ticket_id;
		$reply->attachment_file = $fileName;
		$reply->sent_by = 'admin';
		if($reply->save()) {
			return back();
		}
		else {
			return back()->with('error', 'Something went wrong!');
		}
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
