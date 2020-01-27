<?php


namespace Support\Users\Actions;


use Freelabois\LaravelQuickstart\Exceptions\BadCredentials;
use Freelabois\LaravelQuickstart\Exceptions\MissingCredentials;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;

class LoginPassport
{
    /**
     * @var Client
     */
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function execute($username, $password)
    {
        try {
            $response = $this->client->post(config('services.passport.login_endpoint'), [
                'form_params' => [
                    'grant_type' => 'password',
                    'client_id' => config('services.passport.client_id'),
                    'client_secret' => config('services.passport.client_secret'),
                    'username' => $username,
                    'password' => $password,
                ]
            ]);
            return $response->getBody();
        } catch (BadResponseException $e) {
            if ($e->getCode() === 400) {
                throw new MissingCredentials(Lang::get('exceptions.login.invalid_request'), $e->getCode());
            } elseif ($e->getCode() === 401) {
                throw new BadCredentials(Lang::get('exceptions.login.incorrect_credentials'), $e->getCode());
            }
        }
        return;
    }

}
