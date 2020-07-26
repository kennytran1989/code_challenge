<?php

namespace App\Http\Middleware;
use App\Models\User;
use Closure;
use App\Repository\Mysql\EqUserRepository;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redis;

class Permission
{
    /**
     * @author KennyHuy <kennytran1989@gmail.com>
     * @param type $request
     * @param Closure $next
     * @return request
     */
    public function handle($request, Closure $next)
    {
        $userRepository = app(EqUserRepository::class);
        $code = \Illuminate\Support\Facades\Config::get('status_code');
        $data  = [
            'status'    => false ,
            'message'   => 'Access token not found'
        ];

        try{


            if(!$request->header('Authorization')){
                return response()->json($data, $code[401]);
            }
            $user   = $userRepository->auth($request->header('Authorization'));
            if(@$user['expires_in'] < time())
            {
                $data['message'] = 'Token expired';
                return response()->json($data, $code[401]);
            }
            $role   = $user['role'] == 'user' ? 'user'  : $user['role'];
            $roles  = config('roles');
            $route  = explode('.', Route::currentRouteName());
            if(!in_array($route[0], $roles[$role]))
            {
                $data['message'] = 'Permission deny';
                return response()->json($data, $code[403]);
            }else{
                //$request->attributes->add(['userInfo' => $user]);
                $request->request->set('userInfo', $user);
                return $next($request);
            }
        } catch (\Exception $ex) {
            $data['message'] = $ex->getMessage();
            return response()->json($data, $code[401]);
        }


    }
}
