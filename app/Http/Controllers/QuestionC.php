<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuestionOptionM;
use App\Models\questionM;
use App\Models\quizM;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use App\Models\AttendQuizM;

class QuestionC extends Controller
{
    
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function list($id ,$key)
    {
        $subject_id=$id;
        $quiz_id=$key;
        if(Auth::user()){
            $questions = questionM::where('subject_id',$id)->where('quiz_id',$quiz_id)->with('subject')->paginate(5);
            return view('exam&tests.questions.list', compact('questions','subject_id','quiz_id'));
        }else{
            return redirect('/login')->with('error', "Please Login!");
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create($id,$key)
    {
        $subject_id=$id;
        $quiz_id=$key;
        if(Auth::user()){
            return view('exam&tests.questions.create', compact('subject_id','quiz_id'));
        }else{
            return redirect('/login')->with('error', "Please Login!");
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    Public function store(Request $request)
    {

        if(Auth::user()){

            $question=new questionM;
            $question->user_id=Auth::user()->id;
            $question->subject_id=$request->subject_id;
            $question->quiz_id = $request->quiz_id;
            $question->title = $request->title;
            $question->save();
            $myArray=[];
            $option=array_merge($myArray, array($request->option1, $request->option2, $request->option3,$request->option4));
            for ($i=0; $i<4 ; $i++) {
                $quesOption = new QuestionOptionM;
                $quesOption->question_id = $question->id;
                $quesOption->option = $option[$i];
                if($i+1==$request->correct_option){
                    $quesOption->correct = 1;
                }else{
                    $quesOption->correct = 0;
                }
                $quesOption->save(); 
            }

      
            return redirect('questions/'.$request->subject_id.'/'.$request->quiz_id)->with('success', "Question created successfully!");
        }else{
            return redirect('/login')->with('error', "Please Login!");
        }
    }

    public function startQuiz($id ,$key,$next=null)
    {
        $subject_id=$id;
        $quiz_id=$key;
        if(Auth::user()){
            $quiz = quizM::where('id',$quiz_id)->where('subject_id',$subject_id)->with('subject')->first();
            $questions=questionM::where('quiz_id',$quiz_id)->where('subject_id',$subject_id)->with('questionOption')->get();
            if(count($questions)==0){
                return redirect()->back()->with('error', "Question Does Not Exists!");
            }
            $totQues=$questions->count();
            if($next){
               $count=$next; 
            }else{
               $count=1; 
            }
            
            $question=$questions[$count-1]['questionOption'];  
              
            return view('exam&tests.quiz.startQuiz', compact('quiz','subject_id','quiz_id','question','totQues','count'));
            
        }else{
            return redirect('/login')->with('error', "Please Login!");
        }
    }

    Public function storeStudentQuiz(Request $request)
    {
        
        if(Auth::user()){
            $attendQuiz = new AttendQuizM();
            if($request->count!=$request->totcount){
                $correctOption=QuestionOptionM::where('question_id',$request->question_id)->where('correct',1)->first();

                $attendQuiz->student_id=Auth::user()->id;
                $attendQuiz->question_id=$request->question_id;
                $attendQuiz->quiz_id=$request->quiz_id;
                
                $attendQuiz->answer=$request->answers;
                if($correctOption->id==$request->answers){
                    $attendQuiz->score=1;
                }else{
                    $attendQuiz->score=0;
                }
                $attendQuiz->save();
                $count=$request->count+1;

                return redirect('start-quiz/'.$request->subject_id.'/'.$request->quiz_id.'/'.$count);
            }
            if($request->count==$request->totcount){

                $correctOption=QuestionOptionM::where('question_id',$request->question_id)->where('correct',1)->first();

                $attendQuiz->student_id=Auth::user()->id;
                $attendQuiz->question_id=$request->question_id;
                $attendQuiz->quiz_id=$request->quiz_id;
                $attendQuiz->answer=$request->answers;
                if($correctOption->id==$request->answers){
                    $attendQuiz->score=1;
                }else{
                    $attendQuiz->score=0;
                }
                $attendQuiz->save();

                return redirect('student/quizzes/'.$request->subject_id)->with('success', "Congratulations!");
            }
            
            
        }else{
            return redirect('/login')->with('error', "Please Login!");
        }
    }
}
