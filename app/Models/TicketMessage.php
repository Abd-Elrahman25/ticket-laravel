<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketMessage extends Model
{
    use HasFactory;
    protected $fillable =['ticket_id','message_id'];

    public function ticket(){
        return $this->belongsTo(Ticket::class);
    }

    public function message(){
        return $this->belongsTo(Message::class);
    }

}
