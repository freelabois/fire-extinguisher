<?php


namespace App\Api\Users\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Support\Users\Actions\LogoutPassport;

class LogoutController
{

    /**
     * @var LogoutPassport
     */
    private $logout_action;

    public function __construct(LogoutPassport $logout_action)
    {
        $this->logout_action = $logout_action;
    }

    public function __invoke(Request $request)
    {
        $this->logout_action->execute();
        return response()->json(Lang::get('exceptions.login.logged_out_successfully'), 200);
    }

}
