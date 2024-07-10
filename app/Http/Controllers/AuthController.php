<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\RegiserRequest;
use App\Http\Requests\ResetRequest;
use App\Interfaces\AuthInterface;

class AuthController extends Controller
{
    protected $auth;

    public function __construct(AuthInterface $auth)
    {
        $this->auth = $auth;
    }

    public function view()
    {

        return $this->auth->view();
    }

    public function registerView()
    {

        return $this->auth->registerView();
    }

    public function Login(AuthRequest $request)
    {
        return $this->auth->login($request);
    }

    public function register(RegiserRequest $request)
    {
        return $this->auth->register($request->validated());
    }

    public function logout()
    {
        return $this->auth->logout();
    }

    public function reset_view()
    {
        return $this->auth->reset_view();

    }
    public function reset(ResetRequest $request)
    {
        return $this->auth->reset($request->validated());

    }
}
