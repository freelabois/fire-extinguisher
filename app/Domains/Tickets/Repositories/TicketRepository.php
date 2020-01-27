<?php


namespace Domains\Tickets\Repositories;


use Domains\Tickets\Models\Ticket;
use Freelabois\LaravelQuickstart\Extendables\Repository;

class TicketRepository extends Repository
{

    protected $model = Ticket::class;

}
