<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Student;

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
    protected $redirectTo = '/stud/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:students')->except('logout');
    }

    public function showLoginForm($student)
    {
        return view('auth.student.login', compact('student'));
    }

    public function LoginForm(Request $request)
    {
        if(Student::find($request->id)){
            if (Student::find($request->id)->hasPassword == 1) {
                return redirect()->route('student.showloginpass',$request->id);
            }
            else{
                return redirect()->route('student.registerPassword',$request->id);
            }
        }
        else{
            toast('No User stored with that ID Number!','error','top')->autoClose(5000);
            return redirect()->back()->withInput();
        }
    }

    public function createPassword($student)
    {
        return view('auth.student.registerPassword', compact('student'));
    }

    public function registerStudent($student, Request $request)
    {
        $this->validate($request, [
            'password' => 'required|string|confirmed'
        ]);

        $student = Student::find($student);
        $student->password = bcrypt($request->password);
        $student->hasPassword = 1;
        $student->save();
        
        toast('Password saved!','success','top')->autoClose(5000);
        return redirect()->route('student.username');
    }

    protected function guard()
    {
        return Auth::guard('students');
    }

    public function showUsernameForm()
    {
        return view('auth.student.username');
    }
}
