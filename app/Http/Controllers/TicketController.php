<?php

namespace App\Http\Controllers;

use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    public function ticketPage() {
        if(Auth::user()->role == 1)
            return view('ticket.main', ['data' => Ticket::all()]);
        else
//            dd(DB::table('tickets')->where('user_id', Auth::user()->id)->get());
            return view('ticket.main', [
                'data' => DB::table('tickets')->where('user_id', Auth::user()->id)->get()
            ]);
    }

    public function ticketRecord($id) {
        $ticket = new Ticket();
        $ticket->service_id = $id;
        $ticket->user_id = Auth::user()->id;

        $ticket->save();

        return redirect()->route('home')->with('success', 'Заказ оформлен');
    }

    public function ticketClose($id) {
        $ticket = Ticket::all()->find($id);
        $ticket->status = 1;

        $ticket->save();

        return redirect()->route('ticket-page')->with('info', 'Заказ выполнен');
    }
}
