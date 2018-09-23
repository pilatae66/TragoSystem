<?php

namespace App\Http\Controllers;

use App\Student;
use App\Subject;
use Illuminate\Http\Request;
use App\Exam;
use App\Questionnaire;
use App\Score;
use Auth;
use App\ExamStatus;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:students')->except('create','store');
    }

    public function dashboard()
    {
        $statuses = ExamStatus::where('student_id', Auth::user()->id)->get();
        $exams = Exam::all();
        foreach ($exams as $key => $exam) {
            foreach ($statuses as $key => $status) {
                if($status->exam_id == $exam->id){
                    $exam->score = Score::where('exam_id', $exam->id)->where('student_id', Auth::user()->id)->first()->score;
                    $exam->status = 1;
                }    
            }
        }
        return view('student.dashboard', compact('exams'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();

        return view('student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.create');
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
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'year' => 'required|string',
            'course' => 'required|string',
            'password' => 'required|string|min:6|confirmed'
        ]);

        $student = new Student;
        $student->id = $request->id;
        $student->firstname = $request->firstname;
        $student->lastname = $request->lastname;
        $student->year = $request->year;
        $student->course = $request->course;
        $student->password = bcrypt($request->password);
        $student->save();

        return redirect()->route('student.login');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }

    public function examIndex()
    {
        return view();
    }

    public function takeExam(Exam $exam)
    {
        $questionnaire = Questionnaire::where('exam_id', $exam->id)->get();
        return view('exam.takeExam', compact('questionnaire'));
    }

    public function submitExam(Exam $exam, Request $request)
    {
        $score = 0;
        foreach ($exam->questions as $key => $question) {
            // return $question->questions->answer->ansKey;
            switch ($question->questions->questionType) {
                case 'Identification':
                    if($question->questions->answer->ansKey == $request->answer[$key]['answer']){
                        $score++;
                    }
                    break;
                
                case 'ToF':
                    # code...
                    break;
                
                case 'Multiple':
                    # code...
                    break;
                
                case 'Essay':
                    # code...
                    break;
                
                case 'Enumeration':
                    # code...
                    break;
                
                default:
                    # code...
                    break;
            }
        }
        // return $score;

        $scores = new Score;
        $scores->score = $score;
        $scores->scoreType = 'full';
        $scores->exam_id = $exam->id;
        $scores->student_id = Auth::user()->id;
        $scores->save();

        $status = new ExamStatus;
        $status->status = 1;
        $status->student_id = Auth::user()->id;
        $status->exam_id = $exam->id;
        $status->save();

        return redirect()->route('student.dashboard');
    }
}
