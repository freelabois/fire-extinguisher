<?php


namespace Domains\Tickets\Actions;


use Domains\Tickets\DataTransferObjects\TicketDataTransferObject;
use Domains\Tickets\Repositories\TicketRepository;

class CreateOrUpdateTicket
{


    /**
     * @var TicketRepository
     */
    private TicketRepository $ticket_repository;

    public function __construct(TicketRepository $ticket_repository)
    {
        $this->ticket_repository = $ticket_repository;
    }

    public function execute(TicketDataTransferObject $ticket_data_transfer_object)
    {
       $ticket = $this->ticket_repository->storeOrUpdate((array) $ticket_data_transfer_object);
       return TicketDataTransferObject::fromEloquentModel($ticket);
    }

}
