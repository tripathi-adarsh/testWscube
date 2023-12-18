<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubjectM;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\StudentM;


class SubjectC extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function list()
    {
        if(Auth::user()){
            $subjects = SubjectM::where('user_id',Auth::user()->id)->paginate(5);
            return view('exam&tests.subjects.list', compact('subjects'));
        }else{
            return redirect('/login')->with('error', "Please Login!");
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        if(Auth::user()){
            return view('exam&tests.subjects.create');
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
            $subject = new SubjectM;
            $subject->user_id = Auth::user()->id;
            $subject->name = $request->name;
            $subject->description = $request->description;
            $subject->save();
            
            return redirect('subjects')->with('success', "Subject created successfully!");
        }else{
            return redirect('/login')->with('error', "Please Login!");
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        if(Auth::user()){
            $subject = SubjectM::where('user_id',Auth::user()->id)->whereid($id)->first();
            return view('exam&tests.subjects.edit', compact('subject'));
        }else{
            return redirect('/login')->with('error', "Please Login!");
        }
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        if(Auth::user()){
            $name = $request->name;
            $description = $request->description;

            $subject = SubjectM::findOrFail($id);
            if (!empty($name)) {
                $subject->name = $name;
            }
            if (!empty($description)) {
                $subject->description = $description;
            }
            $subject->save();
            
            return redirect('subjects')->with('success', "SubjectM successfully updated!");
        }else{
            return redirect('/login')->with('error', "Please Login!");
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function delete($id)
    {
        if(Auth::user()){
            $subject = SubjectM::find($id);
            $subject->delete();
            
        return redirect('subjects')->with('success', "Subject successfully Deleted!");
        }else{
            return redirect('/login')->with('error', "Please Login!");
        }
    }

    public function studentList()
    {
        if(Auth::user()){
            $userSubject=StudentM::where('user_id',Auth::user()->id)->pluck('subject_id');
            $subjects = SubjectM::where('id',$userSubject)->paginate(5);
            return view('exam&tests.subjects.stuList', compact('subjects'));
        }else{
            return redirect('/login')->with('error', "Please Login!");
        }
    }
}
