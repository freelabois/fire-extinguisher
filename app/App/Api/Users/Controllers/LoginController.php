<?php


namespace App\Api\Users\Controllers;


use Illuminate\Http\Request;
use Support\Users\Actions\LoginPassport;

class LoginController
{

    /**
     * @var LoginPassport
     */
    private $login_action;

    public function __construct(LoginPassport $login_action)
    {
        $this->login_action = $login_action;
    }

    public function __invoke(Request $request)
    {
        return $this->login_action->execute($request->username, $request->password);
    }

}
