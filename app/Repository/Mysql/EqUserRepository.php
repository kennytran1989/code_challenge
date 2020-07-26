<?php
namespace App\Repository\Mysql;

use App\Contract\Repository\UserRepository;
use Firebase\JWT\JWT;
use Illuminate\Support\Facades\Auth;

class EqUserRepository implements UserRepository
{
    /**
     * Hanlde Login for User
     * @author KennyHuy <kennytran1989@gmail.com>
     * @param array $data
     * @return array
     */
    public function login(array $data): array
    {

        if(Auth::attempt($data)){
            $user           = Auth::user()->toArray();
            return [
                'status'    => true,
                'data'      => ['token' => $this->generateToken($user), 'role' => $user['role']]
            ];
        }else{
            return [
                'status'    => false,
                'message'   => 'Email or password not match'
            ];
        }
    }

    /**
     * @author KennyHuy <kennytran1989@gmail.com>
     * @param string $verify_signature
     * @return array
     */
    public function auth(string $verify_signature = ''): array {
        return (array) JWT::decode($verify_signature, env('JWT_KEY'), array('HS256'));
    }

    /**
     * @author KennyHuy <kennytran1989@gmail.com>
     * @param type $data
     * @return type
     */
    private function generateToken($data)
    {
        $data['expires_in'] = time() + env('JWT_EXPIRE');
        return  (JWT::encode($data, env('JWT_KEY')));
    }
}
