<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentM;
use App\Models\quizM;
use App\Models\User;
use App\Models\AttendQuizM;
use Illuminate\Support\Facades\Auth;

class StudentC extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function list($id)
    {
        $subject_id=$id;
        if(Auth::user()){
            $students = StudentM::where('subject_id',$id)->with('subject')->paginate(5);
            foreach ($students as $key => $student) {
                if($student['subject']['user_id']==Auth::user()->id){
                    $students = StudentM::where('subject_id',$id)->with('subject')->paginate(5);
                }else{
                   $students = null; 
                }
            }
            return view('exam&tests.students.list', compact('students','subject_id'));
            
        }else{
            return redirect('/login')->with('error', "Please Login!");
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create($id)
    {
        $subject_id=$id;
        if(Auth::user()){
            return view('exam&tests.students.create', compact('subject_id'));
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
            request()->validate([
                'name' => 'required',
                'email' => 'required|email',
            ]);
            $user=new User;
            $user->name=$request->name;
            $user->email=$request->email;
            $user->password = bcrypt('11111111');
            $user->save();
            
            $student = new StudentM;
            $student->user_id = $user->id;
            $student->subject_id = $request->subject_id;
            $student->name = $request->name;
            $student->email= $request->email;
            $student->description = $request->description;
            $student->save();
            
            return redirect('students/'.$request->subject_id)->with('success', "Please Login!");
        }else{
            return redirect('/login')->with('error', "student created successfully!");
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function Quizlist($id)
    {
        $subject_id=$id;
        if(Auth::user()){
            $quizzes = quizM::where('subject_id',$id)->with('subject')->paginate(5);
            return view('exam&tests.quiz.list', compact('quizzes','subject_id'));
        }else{
            return redirect('/login')->with('error', "Please Login!");
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function Quizcreate($id)
    {
        $subject_id=$id;
        if(Auth::user()){
            return view('exam&tests.quiz.create', compact('subject_id'));
        }else{
            return redirect('/login')->with('error', "Please Login!");
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    Public function Quizstore(Request $request)
    {
        if(Auth::user()){
            request()->validate([
                'title' => 'required',
                'subject_id' => 'required',
            ]);

            $quiz = new quizM;
            $quiz->user_id = Auth::user()->id;
            $quiz->subject_id = $request->subject_id;
            $quiz->title = $request->title;
            $quiz->description = $request->description;
            $quiz->save();
            
            return redirect('quizzes/'.$request->subject_id)->with('success', "Quiz created successfully!");
        }else{
            return redirect('/login')->with('error', "Please Login!");
        }
    }

    public function StuQuizlist($id)
    {
        $subject_id=$id;
        if(Auth::user()){
            $quizzes = quizM::where('subject_id',$id)->with('subject','quizAttend')->paginate(5);
            $attended=AttendQuizM::where('student_id',Auth::user()->id)->with('quiz')->count();
            return view('exam&tests.quiz.StuList', compact('quizzes','subject_id','attended'));
        }else{
            return redirect('/login')->with('error', "Please Login!");
        }
    }

    public function showScore($id)
    {
        $quiz_id=$id;
        if(Auth::user()){
            $quizzes = quizM::where('subject_id',$id)->with('subject')->paginate(5);
            $attended=AttendQuizM::where('student_id',Auth::user()->id)->where('quiz_id',$quiz_id)->get();
            $totalscore=0;
            foreach ($attended as $key => $attend) {
                $totalscore=$totalscore+$attend->score;
            }

            return view('exam&tests.students.result', compact('totalscore'));
        }else{
            return redirect('/login')->with('error', "Please Login!");
        }
    }
    
}
