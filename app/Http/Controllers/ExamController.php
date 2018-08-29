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
        $subjects = Subject::all();
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
            'exam_room' => 'required',
            'subject_id' => 'required',
            'instructor_id' => 'required'
        ]);

        $exam = new Exam;
        $exam->exam_time = $request->exam_time;
        $exam->exam_date = $request->exam_date;
        $exam->exam_room = $request->exam_room;
        $exam->subject_id = $request->subject_id;
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

    public function tosForm1()
    {
        return view('exam.tos1');
    }

    public function submitTos1(Request $request)
    {
        $step1 = $request->validate([
            'topics' => 'required',
            'hours' => 'required',
            'knowledge' => 'required',
            'understanding' => 'required',
            'application' => 'required',
            'totalItems' => 'required|numeric',
        ]);


        $tos = [];
        $tosInput = [];
        $count = 0;

        $tos['hoursTotalCount'] = array_sum($request->hours);

        $tos['ratio'] = $request->totalItems / $tos['hoursTotalCount'];

        $tos['totalTestItems'] = $request->totalItems;

        foreach ($request->topics as $key => $topic) {
            $tosInput[$key]['topic'] = $topic;
            $tosInput[$key]['hours'] = $request->hours[$key];
            $tosInput[$key]['knowledge'] = (($request->knowledge[$key] / 100) * ($tos['ratio'] * $request->hours[$key]));
            $tosInput[$key]['understanding'] = (($request->understanding[$key] / 100) * ($tos['ratio'] * $request->hours[$key]));
            $tosInput[$key]['application'] = (($request->application[$key] / 100) * ($tos['ratio'] * $request->hours[$key]));
            $tosInput[$key]['TestItems'] = $tos['ratio'] * $request->hours[$key];
            $tosInput[$key]['percentage'] = (($tos['ratio'] * $request->hours[$key]) / $request->totalItems) * 100;
            $count += $request->hours[$key];
        }

        $request->session()->put('tos', $tos);
        $request->session()->put('tosInput', $tosInput);

        return redirect()->route('exam.showTosStep3');
    }

    public function tosForm2(Request $request)
    {
        return view('exam.tos2');
    }

    public function submitTos2(Request $request)
    {
        $tos = $request->session()->get('tos');

        $tos['knowledge'] = $request->knowledge;
        $tos['understanding'] = $request->understanding;
        $tos['application'] = $request->application;

        // return $tos;
        $request->session()->put('tos', $tos);

        return redirect()->route('exam.showTosStep3');
    }

    public function tosForm3(Request $request)
    {
        $tos = $request->session()->get('tos');
        $tosInput = $request->session()->get('tosInput');
        // return $step1;
        return view('exam.tos3', compact('tos', 'tosInput'));
    }

    public function submitTos3(Request $request)
    {
        return redirect()->route('exam.showTosStep3');
    }
}
