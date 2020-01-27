<?php


namespace Support\Users\Actions;


use Freelabois\LaravelQuickstart\Exceptions\BadCredentials;
use Freelabois\LaravelQuickstart\Exceptions\MissingCredentials;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;

class LogoutPassport
{


    private $user;

    public function __construct()
    {
        $this->user = auth()->user();
    }

    public function execute()
    {

        $this->user->tokens->each(function ($token) {
            $token->delete();
        });

        return true;
    }

}
