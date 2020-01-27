<?php


namespace Support\Extendables\Contracts;

use Illuminate\Http\Request;

interface DataTransferObject
{

    public function __construct(array $values);
    public static function fromRequest(Request $request): self;

}
