<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
    protected function authenticated(Request $request, $user)
    {
        return match ($user->role) {
            'admin' => redirect('/admin/dashboard'),
            'guru_pengajar' => redirect('guru/dashboard'),
            'guru_bk' => redirect('/bk/dashboard'),
            'wakasek_kesiswaan' => redirect('/wakasek-kesiswaan/dashboard'),
            'wakasek_kurikulum' => redirect('/wakasek-kurikulum/dashboard'),
            default => redirect('/'),
        };
    }
    public function username()
    {
        return 'nip';
    }
}
