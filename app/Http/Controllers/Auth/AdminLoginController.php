<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        //$this->middleware('guest');   //don't use because if user is not an admin we have infinite loop
    }

    public function showLoginForm()
    {
        return view('auth.admin-login');
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        if ($this->attemptLogin($request)) {
            return redirect(route('admin.home'));
        }

        $this->sendFailedLoginResponse($request);
    }

    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'password' => 'required|min:6'
        ],
        [
            'required' => 'Поле ":attribute" не может быть пустым',
        ]);
    }

    protected function attemptLogin(Request $request)
    {
        return Auth::guard()->attempt(['name' => $request->name, 'password' => $request->password]);
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            'password' => ['Неверный логин или пароль.'],
        ]);
    }
}