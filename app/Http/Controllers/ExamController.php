<?php

namespace App\Http\Controllers;

use App\Exam;
use App\Subject;
use Illuminate\Http\Request;
use App\Question;
use Auth;
use App\Answer;
use App\Questionnaire;

class ExamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:instructors');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exams = Exam::all();
        return view('exam.index', compact('exams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('exam.create', compact('subjects'));
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
            'exam_time' => 'required',
            'exam_date' => 'required',
            'total_items' => 'required',
            'duration' => 'required',
            'instructor_id' => 'required'
        ]);

        $exam = new Exam;
        $exam->exam_title = $request->exam_title;
        $exam->exam_time = $request->exam_time;
        $exam->exam_date = $request->exam_date;
        $exam->total_items = $request->total_items;
        $exam->duration = $request->duration;
        $exam->subject = 'Intro to Computing';
        $exam->instructor_id = $request->instructor_id;

        $exam->save();


        return redirect()->route('exam.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function show(Exam $exam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function edit(Exam $exam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Exam $exam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exam $exam)
    {
        $exam->delete();

        return redirect()->route('exam.index');
    }
    public function showExamStats(Exam $exam)
    {
        $highest = $exam->scores->sortByDesc('score')->take(5);
        $lowest = $exam->scores->sortBy('score')->take(5);
        // return $highest;
        return view('exam.dashboard', compact('exam', 'highest', 'lowest'));
    }
}
