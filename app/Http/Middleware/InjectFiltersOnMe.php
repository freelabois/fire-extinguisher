<?php


namespace Freelabois\FiEx\Http\Middleware;

use Closure;
use Freelabois\FiEx\Domains\Users\Repositories\UserRepository;
use Illuminate\Http\Request;

class InjectFiltersOnMe
{

    /**
     * @var UserRepository
     */
    private $user_repository;

    public function __construct(
        UserRepository $user_repository
    )
    {
        $this->user_repository = $user_repository;
    }

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $params = $request->route()->parameters();

        foreach ($params as $route_param => $value) {
            if ($route_param == "user") {
                if ($value) {
                    if ($value == 'me') {
                        $user = auth()->user();
                        $request->route()->setParameter($route_param, $user->usu_codigo);
                        $request->request->set('user', $user->usu_codigo);
                    } else {
                        $route_param = $this->user_repository->find($value);
                        $request->request->set('user', $route_param->id);
                    }
                }
            }
        }
        return $next($request);
    }
}
