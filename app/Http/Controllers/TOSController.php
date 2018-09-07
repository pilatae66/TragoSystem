<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exam;
use App\TOS;
use App\Questionnaire;

class TOSController extends Controller
{
    public function __construct(){
        $this->middleware('auth:instructors');
    }

    public function tosForm1($id)
    {
        if (TOS::where('exam_id', $id)->count() > 0) {
            $tos = [];
            $tosInput = TOS::where('exam_id', $id)->get();
            $tos['hoursTotalCount'] = $tosInput->sum('hours_spent');
            $tos['totalTestItems'] = $tosInput->sum('total_test_items');
            $questionnaire = Questionnaire::where('exam_id', $id)->inRandomOrder()->get();
            // return $questionnaire;
            return view('exam.tos3', compact('tos', 'tosInput', 'questionnaire'));
        }
        else {
            $exam = Exam::find($id);
            return view('exam.tos1', compact('exam'));
        }
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

        $cognitive = [];


        $tos['hoursTotalCount'] = array_sum($request->hours);

        $tos['ratio'] = $request->totalItems / $tos['hoursTotalCount'];

        $tos['totalTestItems'] = $request->totalItems;

        foreach ($request->topics as $key => $topic) {
            $tosInput[$key]['topic'] = $topic;
            $tosInput[$key]['hours_spent'] = $request->hours[$key];
            $tosInput[$key]['knowledge'] = (($request->knowledge[$key] / 100) * ($tos['ratio'] * $request->hours[$key]));
            $tosInput[$key]['understanding'] = (($request->understanding[$key] / 100) * ($tos['ratio'] * $request->hours[$key]));
            $tosInput[$key]['application'] = (($request->application[$key] / 100) * ($tos['ratio'] * $request->hours[$key]));
            $tosInput[$key]['total_test_items'] = $tos['ratio'] * $request->hours[$key];
            $tosInput[$key]['percentage'] = (($tos['ratio'] * $request->hours[$key]) / $request->totalItems) * 100;
            $count += $request->hours[$key];
            $cognitive[$key] = $request->knowledge[$key] + $request->application[$key] + $request->understanding[$key];
            if($cognitive[$key] != 100){
                return redirect()->back();
                break;
            }
            $toss = new TOS;
            $toss->topic = $tosInput[$key]['topic'];
            $toss->hours_spent = round($tosInput[$key]['hours']);
            $toss->knowledge = round($tosInput[$key]['knowledge']);
            $toss->understanding = round($tosInput[$key]['understanding']);
            $toss->application = round($tosInput[$key]['application']);
            $toss->total_test_items = round($tosInput[$key]['TestItems']);
            $toss->percentage = round($tosInput[$key]['percentage']);
            $toss->exam_id = $request->exam_id;

            $toss->save();

        }
        // return $cognitive;
        // return $toss;


        $request->session()->put('tos', $tos);
        $request->session()->put('tosInput', $tosInput);

        return redirect()->route('exam.showTosStep3');
    }
}
