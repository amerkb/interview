<?php

namespace App\Interfaces;

use App\Http\Requests\AuthRequest;

interface AuthInterface
{
    public function login(AuthRequest $request);

    public function logout();

    public function view();

    public function registerView();

    public function register($data);


    public function reset_view();

    public function reset($data);
}
