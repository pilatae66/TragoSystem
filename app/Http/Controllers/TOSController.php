<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exam;
use App\TOS;
use App\Questionnaire;
use Illuminate\Support\Collection;
use App\Question;

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
			$tos['total_test_items'] = $tosInput->sum('total_items');
			$questionnaire = Questionnaire::where('exam_id', $id)->orderBy('test_number', 'ASC')->get();
			// return $questionnaire->count();
			if ($questionnaire->count() > 0) {
				// return $questionnaire;
				// return $tos['hoursTotalCount'];
				return redirect()->route('exam.showTosStep3', $id);
				session()->put('exam_id', $id);
			}
		}
		else {
			$exam = Exam::find($id);
			session()->put('exam_id', $id);
			return view('exam.tos1', compact('exam'));
		}
	}
	
	public function submitTos1(Request $request)
	{
		// return $request;
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
			
			$tos['total_test_items'] = $request->totalItems;
			
			$under = 0;
			$know = 0;
			$app = 0;
			$total = 0;
			$cog = new Collection();
			
			foreach ($request->topics as $key => $topic) {
				$tosInput[$key]['topic'] = $topic;
				$tosInput[$key]['hours_spent'] = $request->hours[$key];
				$tosInput[$key]['knowledge'] = (($request->knowledge[$key] / 100) * ($tos['ratio'] * $request->hours[$key]));
				if ($tosInput[$key]['knowledge']) {
					$know == 0 ? $know++ : $know += 0;
					!$cog->contains('knowledge') ? $cog->put(0,'knowledge') : '';
				}
				$tosInput[$key]['understanding'] = (($request->understanding[$key] / 100) * ($tos['ratio'] * $request->hours[$key]));
				if ($tosInput[$key]['understanding']) {
					$under == 0 ? $under++ : $under += 0;
					!$cog->contains('understanding') ? $cog->put(1,'understanding') : '';
				}
				$tosInput[$key]['application'] = (($request->application[$key] / 100) * ($tos['ratio'] * $request->hours[$key]));
				if ($tosInput[$key]['application']) {
					$app == 0 ? $app++ : $app += 0;
					!$cog->contains('application') ? $cog->put(2,'application') : '';
				}
				$tosInput[$key]['total_items'] = $tos['ratio'] * $request->hours[$key];
				$tosInput[$key]['percentage'] = (($tos['ratio'] * $request->hours[$key]) / $request->totalItems) * 100;
				$count += $request->hours[$key];
				$cognitive[$key] = $request->knowledge[$key] + $request->application[$key] + $request->understanding[$key];
				if($cognitive[$key] != 100){
					return redirect()->back();
					break;
				}
				$toss = new TOS;
				$toss->topic = $tosInput[$key]['topic'];
				$toss->hours_spent = round($tosInput[$key]['hours_spent']);
				$toss->knowledge = round($tosInput[$key]['knowledge']);
				$toss->understanding = round($tosInput[$key]['understanding']);
				$toss->application = round($tosInput[$key]['application']);
				$toss->total_items = round($tosInput[$key]['total_items']);
				$toss->percentage = round($tosInput[$key]['percentage']);
				$toss->exam_id = $request->exam_id;
				
				$toss->save();
				
				$total = $know + $app + $under;
				session()->put('cognitive', $total);
				session()->put('cog', $cog);
				
			}
			// return $cognitive;
			// return $toss;
			
			$request->session()->put('tos', $tos);
			$request->session()->put('tosInput', $tosInput);
			if(Questionnaire::where('exam_id', $request->exam_id)->count() > 0){
				return redirect()->route('exam.showTosStep3',$request->exam_id);
			}
			else{
				return redirect()->route('exam.showTosStep2');
				
			}
		}
		
		public function tosForm2()
		{
			$cognitive = session()->get('cognitive');
			return view('exam.tos2', compact('cognitive'));
		}
		
		public function submitTos2(Request $request)
		{
			// return $request;
			$exam_id = session()->get('exam_id');
			$tos = $request->session()->get('tos');
			$tosInput = TOS::where('exam_id', $exam_id)->get();
			$types = $request->test_type;
			$cog = session()->get('cog');
			$exam = Exam::find($exam_id);
			// return $tosInput[0][$cog[0]];
			$questions = Question::all();
			$questionnaire = [];
			$knowledge = $tosInput->sum('knowledge');
			$understanding = $tosInput->sum('understanding');
			$application = $tosInput->sum('application');
			$cogni = [$knowledge, $understanding, $application];
			$cogniu = [];
			$key = 0;
			// return $cogni[0];
			// return $tosInput;
			// print($question['id']. " ");
			for ($i=0; $i < count($cogni); $i++) { 
				// return $cog->count();
				// $questionnaire[]='Test '.($i+1);
				for ($j=0; $j < $cogni[$i]; $j++) {
					// print($cogni[$i]. " ");
					$questionnaire = Questionnaire::where('exam_id',$exam_id)->select(['question_id'])->get();
					// foreach ($questionnaire as $key => $q) {
					// 	$cogniu[] = $q->id;
					// }
					$question = Question::where('questionType', $types[$i])->where('category',ucfirst($cog[$i]))->whereNotIn('id', $questionnaire->toArray())->inRandomOrder()->first();
					if (!empty($question->id)) {
						$quest = new Questionnaire;
						$quest->test_number = $i;
						$quest->question_id = $question->id;
						$quest->exam_id = $exam_id;
						$quest->save();
					}
					else{
						toast('Questions are not sufficient for the system to generate a questionnaire!','error','top')->autoClose(5000);
						return redirect()->route('exam.index');
					}
					// print($question);
				}
			}
			// return Questionnaire::where('exam_id',$exam_id)->count();
			if(Questionnaire::where('exam_id',$exam_id)->count() >= $exam->total_items){
				// return view('home');
				// return $request;
				$types = $request->test_type;
				// return $types;
				$request->session()->put('types', $types);
				return redirect()->route('exam.showTosStep3', $exam_id);
			}else{
				$tos = TOS::where('exam_id', $exam_id)->get();
				foreach ($tos as $key => $value) {
					$value->delete();
				}
				toast('Questions are not sufficient for the system to generate a questionnaire!','error','top')->autoClose(5000);
				return redirect()->route('exam.index');
			}
		}
		
		public function tosForm3($id, Request $request)
		{
			$tosInput = TOS::where('exam_id', $id)->get();
			$questionnaire = Questionnaire::where('exam_id', $id)->get();
			return view('exam.tos3', compact('questionnaire', 'tosInput', 'tos'));
		}
	}
	