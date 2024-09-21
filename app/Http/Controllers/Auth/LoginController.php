<?php
namespace App\Http\Controllers\Auth;  

use Illuminate\Http\Request;   
use App\Http\Controllers\Controller;  
use Illuminate\Foundation\Auth\AuthenticatesUsers;  
use Illuminate\Support\Facades\Auth; 
use Illuminate\Http\Response;

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

    /**  
     * Log the user into the application.  
     *  
     * @param  \Illuminate\Http\Request  $request  
     * @return \Illuminate\Http\Response  
     */  
    public function login(Request $request)  
    {   
        $this->validate($request, [  
            'username' => 'required|string',  
            'password' => 'required|string|min:8',  
        ]);  
  
        $credentials = $request->only('username', 'password');  

        if (Auth::attempt($credentials)) {    
          
            if (Auth::user()->active) {  
                return redirect()->intended($this->redirectTo);  
            } else {  
                Auth::logout();   
                return back()->withErrors([  
                    'username' => 'Your account is not active. Please contact support.',  
                ]);  
            }  
        }  
         
        return back()->withErrors([  
            'username' => 'These credentials do not match our records.',  
        ]);  
    }  

    /**  
     * Show the login form.  
     *  
     * @return \Illuminate\View\View  
     */  
    public function showLoginForm()  
    {  
        return view('auth.login');   
    }  

    /**  
     * Handle a logout request.  
     *  
     * @param  \Illuminate\Http\Request  $request  
     * @return \Illuminate\Http\RedirectResponse  
     */  
    public function logout(Request $request)  
    {  
        Auth::logout();  
        return redirect()->route('login');   
    }  
}