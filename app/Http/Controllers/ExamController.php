<?php

namespace App\Http\Controllers;

use App\Exam;
use App\Subject;
use Illuminate\Http\Request;

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
            'instructor_id' => 'required'
        ]);

        $exam = new Exam;
        $exam->exam_time = $request->exam_time;
        $exam->exam_date = $request->exam_date;
        $exam->total_items = $request->total_items;
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

    public function tosForm3(Request $request)
    {
        $tos = $request->session()->get('tos');
        $tosInput = $request->session()->get('tosInput');
        $questionnaire = $request->session()->get('questionnaire');
        // return $step1;
        return view('exam.tos3', compact('tos', 'tosInput', 'questionnaire'));
    }

    public function submitTos3(Request $request)
    {
        return redirect()->route('exam.showTosStep3');
    }
}
