<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\Admin\UserInterface;

class UserController extends Controller
{
    public function __construct(protected UserInterface $user)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->user->indexUser();
    }

    public function destroy(string $id)
    {
        return $this->user->deleteUser($id);
    }
}
