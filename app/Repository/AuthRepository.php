<?php

namespace App\Repository;

use App\Abstract\BaseRepositoryImplementation;
use App\Http\Requests\AuthRequest;
use App\Interfaces\AuthInterface;
use App\Models\User;
use App\Statuses\UserStatus;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthRepository extends BaseRepositoryImplementation implements AuthInterface
{
    public function view()
    {
        return view('Auth.login');
    }

    public function login(AuthRequest $request)
    {

        if (auth()->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {

            if (Auth::user()->role == UserStatus::USER) {
                return redirect()->route('blog.index')->with('success', 'Login successfully.');
            }
            else  if (Auth::user()->role == UserStatus::ADMIN) {
                return redirect()->route('admin.blog.index')->with('success', 'Login successfully.');
            }

        }
    }

    public function model()
    {
        return User::class;
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }

    public function registerView()
    {
        return view('Auth.register');
    }

    public function register($data)
    {
        $user = $this->create($data);
        Auth::login($user);

        return redirect()->route('blog.index')->with('success', 'Login successfully.');

    }

    public function reset_view()
    {
        return view('auth.reset');
    }

    public function reset($data)
    {

        $user=Auth::user();
        if (Hash::check($data['current_password'],$user->password))
        {

           $this->updateById($user->id,['password'=>Hash::make($data['new_password'])]);
            return redirect()->route('admin.blog.index');

        }
        return redirect()->back();

    }
}
