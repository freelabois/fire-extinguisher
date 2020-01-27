<?php


namespace Domains\Tickets\DataTransferObjects;


use Support\Extendables\BaseDataTransferObject;

class TicketDataTransferObject extends BaseDataTransferObject
{

    public string $id;
    public string $title;
    public string $description;

}
