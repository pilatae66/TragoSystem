<?php

namespace App\Http\Controllers;

use App\Question;
use App\Subject;
use Illuminate\Http\Request;
use App\ItemAnalysis;

class QuestionController extends Controller
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
        $questions = Question::all();

        return view('question.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('question.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $this->validate($request, [
            'question' => 'required|string',
            'questionType' => 'required',
            'category' => 'required',
            'topic' => 'required|string',
        ]);

        $question = new Question;
        $question->question = $request->question;
        $question->questionType = $request->questionType;
        $question->category = $request->category;
        $question->topic = $request->topic;
        $question->instID = $request->instructor;

        $question->save();

        return redirect()->route('question.answer.create', compact('question'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        return view('question.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        // return $request;
        $this->validate($request, [
            'question' => 'required|string',
            'questionType' => 'required',
            'category' => 'required',
            'topic' => 'required|string',
        ]);

        $question->question = $request->question;
        $question->questionType = $request->questionType;
        $question->category = $request->category;
        $question->topic = $request->topic;
        $question->instID = $request->instructor;

        $question->save();

        return redirect()->route('question.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $question->delete();

        return redirect()->route('question.index');
    }

    public function dashboard(Question $question)
    {
        $items = ItemAnalysis::where('question_id', $question->id)->get();
        return view('question.dashboard', compact('items'));
    }
}
