<?php

namespace App\Repository\Admin;

use App\Abstract\BaseRepositoryImplementation;
use App\Interfaces\Admin\UserInterface;
use App\Models\User;
use App\Statuses\UserStatus;

class UserRepository extends BaseRepositoryImplementation implements UserInterface
{
    public function model()
    {
        return User::class;
    }

    public function indexUser()
    {
        $data['users'] = $this->where('role', UserStatus::USER)->get();

        return view('page.admin.user.index', $data);
    }

    public function deleteUser($id)
    {
        $this->deleteById($id);

        return redirect()->route('user.index');
    }
}
