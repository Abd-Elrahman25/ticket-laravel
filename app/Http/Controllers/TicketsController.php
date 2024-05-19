<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketsController extends Controller
{
    public function createTicket(Request $request){

        $user = Auth::user();

        $data = $request->validate([
            'name'=>'required|string|max:255',
            'content'=>'required|string',
        ]);

        $ticket = Ticket::create([
            'name'=>$data['name'],
            'content'=>$data['content'],
            'created_by'=>$user->id,
        ]);

        return response($ticket, 200);
    }

    public function deleteTicket($id){
        try {
           $deleted = Ticket::destroy($id);

           if ($deleted) {
            return response()->json([
                'message' => 'Ticket deleted successfully'],200);
           } else {
            return response()->json([
                'error' => 'Ticket not found'],404);
           }
           
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'An error occurred while deleting the ticket'
            ],500) ; 
        }    
    }

    public function sendMessage(Request $request){

        $user = Auth::user();

        $data = $request->validate([
            'content'=>'required|string',
        ]);

        $message = Message::create([
            'content' => $data['content'],
            'user_id' => $user->id,
        ]);

        return response($message,200);

    }
}
