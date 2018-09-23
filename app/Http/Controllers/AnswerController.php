<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function __construct(){
        $this->middleware('auth:instructors');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($question)
    {
        $question = Question::find($question);
        // return $question;
        return view('answer.create', compact('question'));
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
        if(!is_array($request->answer_key)){
            $answer = new Answer;
            $answer->ansKey = $request->answer_key;
            $answer->isAnswerKey = 1;
            $answer->questionID = $request->question_id;
            $answer->save();
        }
        elseif(count($request->answer_key) > 0 && $request->has('is_answer_key')){
            foreach ($request->answer_key as $key => $value) {
                if ($request->is_answer_key == $key+1) {
                    $answer = new Answer;
                    $answer->ansKey = $value;
                    $answer->isAnswerKey = 1;
                    $answer->questionID = $request->question_id;
                    $answer->save();
                }
                else{
                    $answer = new Answer;
                    $answer->ansKey = $value;
                    $answer->isAnswerKey = 0;
                    $answer->questionID = $request->question_id;
                    $answer->save();
                }
            }
        }
        elseif(count($request->answer_key) > 0 && !$request->has('is_answer_key')) {
            foreach ($request->answer_key as $key => $value) {
                $answer = new Answer;
                $answer->ansKey = $value;
                $answer->isAnswerKey = 1;
                $answer->questionID = $request->question_id;
                $answer->save();
            }
        }

        return redirect()->route('question.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function show(Answer $answer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function edit(Answer $answer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Answer $answer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Answer $answer)
    {
        //
    }
}
