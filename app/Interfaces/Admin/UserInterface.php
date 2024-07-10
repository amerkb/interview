<?php

namespace App\Interfaces\Admin;

interface UserInterface
{
    public function indexUser();

    public function deleteUser($id);
}
