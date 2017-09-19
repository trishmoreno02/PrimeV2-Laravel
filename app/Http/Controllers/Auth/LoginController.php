<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
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
    protected $redirectTo = '/dashboard';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function login(Request $request)
    {
      /*  $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];*/
        $this->validateLogin($request);
        //$request->password = bcrypt($request->password);

        if($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);  
        }
        else
        {
            return $this->sendFailedLoginResponse($request);
        }
    }
}