<?php


namespace Domains\Tickets\Models;


use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{

    protected $fillable = [
        'title',
        'description',
    ];

}
