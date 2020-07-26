<?php

namespace App\Http\Controllers;

use App\Contract\Repository\UserRepository;
use App\Http\Requests\LoginRequest;

class UserController extends Controller
{
    protected $userRepository;
    public function __construct()
    {
        parent::__construct();
        $this->userRepository = app(UserRepository::class);
    }

    /**
     * Function Handle Login User
     * @author KennyHuy <kennytran1989@gmail.com>
     * @param LoginRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginRequest $request)
    {
        $credentials = [
            'email'     => $request->input('email'),
            'password'  => $request->input('password')
        ];
        $data = $this->userRepository->login($credentials);
        return response()->json($data, $this->status_code[200]);
    }
}
