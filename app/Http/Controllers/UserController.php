<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\LoginValidation;

class UserController extends Controller
{
    /**
     * @var User
     */
    private $user;

    /**
     * UsereController constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(UserRequest $request)
    {
        $data = $request->all();
        $user = $this->user->create($data);
        session()->flash('success', 'Регистрация пройдена');
        Auth::login($user);

        return redirect()->route('home');
    }

    public function loginForm()
    {
        return view('user.login');
    }

    public function login(UserLoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            session()->flash('success', 'You are logged');
            if (Auth::user()->is_admin) {

                return redirect()->route('admin.index');
          } else {
                return redirect()->route('home');
           }
        }

        return redirect()->back()->with('error', 'Incorrect Login or password');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login.create');
    }
}
