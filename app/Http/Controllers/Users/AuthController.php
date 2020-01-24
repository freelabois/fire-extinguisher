<?php


namespace Freelabois\FiEx\Http\Controllers\Users;


use Freelabois\LaravelQuickstart\Exceptions\BadCredentials;
use Freelabois\LaravelQuickstart\Exceptions\MissingCredentials;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;

class AuthController
{

    public function login(Request $request)
    {

        $http = new Client();
        try {
            $response = $http->post(config('services.passport.login_endpoint'), [
                'form_params' => [
                    'grant_type' => 'password',
                    'client_id' => config('services.passport.client_id'),
                    'client_secret' => config('services.passport.client_secret'),
                    'username' => $request->username,
                    'password' => $request->password,
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

    public function logout()
    {
        auth()->user()->tokens->each(function ($token) {
            $token->delete();
        });

        return response()->json(Lang::get('exceptions.login.logged_out_successfully'), 200);
    }

}
