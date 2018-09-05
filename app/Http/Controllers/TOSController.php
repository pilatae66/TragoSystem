<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exam;
use App\TOS;

class TOSController extends Controller
{
    public function __construct(){
        $this->middleware('auth:instructors');
    }

    public function tosForm1($id)
    {
        $exam = Exam::find($id);
        return view('exam.tos1', compact('exam'));
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
            $tosInput[$key]['hours'] = $request->hours[$key];
            $tosInput[$key]['knowledge'] = (($request->knowledge[$key] / 100) * ($tos['ratio'] * $request->hours[$key]));
            $tosInput[$key]['understanding'] = (($request->understanding[$key] / 100) * ($tos['ratio'] * $request->hours[$key]));
            $tosInput[$key]['application'] = (($request->application[$key] / 100) * ($tos['ratio'] * $request->hours[$key]));
            $tosInput[$key]['TestItems'] = $tos['ratio'] * $request->hours[$key];
            $tosInput[$key]['percentage'] = (($tos['ratio'] * $request->hours[$key]) / $request->totalItems) * 100;
            $count += $request->hours[$key];
            $cognitive[$key] = $request->knowledge[$key] + $request->application[$key] + $request->understanding[$key];
            if($cognitive[$key] != 100){
                return redirect()->back();
                break;
            }
        }
        // return $cognitive;

        $request->session()->put('tos', $tos);
        $request->session()->put('tosInput', $tosInput);

        return redirect()->route('exam.showTosStep3');
    }
}
