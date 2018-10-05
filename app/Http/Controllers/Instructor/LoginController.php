<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Support\Facades\Auth;
use App\User;
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
    protected $redirectTo = '/inst/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:instructors')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.instructor.login');
    }

    public function showLoginForms($instructor)
    {
        return view('auth.instructor.password', compact('instructor'));
    }

    public function LoginForm(Request $request)
    {
        if(User::find($request->id)){
            if (User::find($request->id)->hasPassword == 1) {
                return redirect()->route('instructor.showloginpass',$request->id);
            }
            else{
                return redirect()->route('instructor.registerPassword',$request->id);
            }
        }
        else{
            toast('No User stored with that ID Number!','error','top')->autoClose(5000);
            return redirect()->back()->withInput();
        }
    }

    public function registerInstructor($instructor, Request $request)
    {
        $this->validate($request, [
            'password' => 'required|string|confirmed'
        ]);

        $user = User::find($instructor);
        $user->password = bcrypt($request->password);
        $user->hasPassword = 1;
        $user->save();
        
        toast('Password saved!','success','top')->autoClose(5000);
        return redirect()->route('instructor.username');
    }

    
    public function showPasswordForm()
    {
        return view('auth.instructor.password');
    }

    public function createPassword($instructor)
    {
        return view('auth.instructor.registerPassword', compact('instructor'));
    }

    protected function guard()
    {
        return Auth::guard('instructors');
    }
}
