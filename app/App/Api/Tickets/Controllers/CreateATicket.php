<?php


namespace App\Api\Tickets\Controllers;


use App\Api\Tickets\Requests\ValidateNewTicket;
use Domains\Tickets\Actions\CreateOrUpdateTicket;
use Domains\Tickets\DataTransferObjects\TicketDataTransferObject;

class CreateATicket
{

    public function __invoke(ValidateNewTicket $validate_new_ticket)
    {
        $ticket = app(CreateOrUpdateTicket::class)->execute(
          TicketDataTransferObject::fromRequest($validate_new_ticket)
        );

        return response()->json($ticket, 200);
    }

}
