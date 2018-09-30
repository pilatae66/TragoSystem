<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Admin;
use App\User;
use App\Student;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admins');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'password' => 'required|required_with:password_confirmation|string|confirmed',
        ]);

        $admin = new Admin;
        $admin->id = $request->id;
        $admin->firstname = $request->firstname;
        $admin->lastname = $request->lastname;
        $admin->password = bcrypt($request->password);

        $admin->save();

        return redirect('admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        return view('admin.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        $this->validate($request, [
            'id' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
        ]);

        $admin->id = $request->id;
        $admin->firstname = $request->firstname;
        $admin->lastname = $request->lastname;

        $admin->save();

        // return $admin;

        return redirect('admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        $admin->delete();
    }

    public function dashboard(){
        return view('admin.dashboard');
    }

    public function instructorIndex()
    {
        $instructors = User::all();

        return view('admin.instructorIndex', compact('instructors'));
    }

    public function instructorEdit($inst)
    {   
        $instructor = User::find($inst);
        return view('instructor.edit', compact('instructor'));
    }

    public function instructorUpdate($id, Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
            'firstname' => 'required|string',
            'lastname' => 'required|string',
        ]);

        $user = User::find($id);
        $user->id = $request->id;
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->save();

        return redirect()->route('admin.instructorIndex');
    }

    public function instructorDestroy($inst)
    {   
        $instructor = User::find($inst);
        $instructor->delete();
        return redirect()->route('admin.instructorIndex');
    }

    public function studentIndex()
    {
        $students = Student::all();

        return view('admin.studentIndex', compact('students'));
    }

    public function studentEdit(Student $student)
    {  
        return view('student.edit', compact('student'));
    }

    public function studentUpdate(Student $student, Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
            'firstname' => 'required|string',
            'lastname' => 'required|string',
        ]);

        $student->firstname = $request->firstname;
        $student->lastname = $request->lastname;
        $student->year = $request->year;
        $student->course = $request->course;
        $student->save();

        return redirect()->route('admin.studentIndex');
    }

    public function studentDestroy(Student $student)
    {   
        $student->delete();
        return redirect()->route('admin.studentIndex');
    }

    public function createStudent()
    {
        return view('student.create');
    }
}
