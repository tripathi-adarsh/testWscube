@extends('layouts.app')
@section('css')
<!-- BEGIN OF PAGE LEVEL CSS -->
<link href="{{ URL::asset('css/common/plugins.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('css/common/dashboard.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('css/plugins/components-rounded.min.css') }}" rel="stylesheet" type="text/css" />  
<link href="{{ URL::asset('css/custom.css') }}" rel="stylesheet" type="text/css" />  
<!-- END OF PAGE LEVEL CSS -->
<style>

    placeholder {
        color: red;
    }
</style>
@endsection
@section('content')
<!-- BEGIN OF PAGE CONTENT WRAPPPER BODY -->
<div class="row px-5">                 
    <div class="col-12 ">
        <div class="cust-container-desc-title float-left" style="margin-bottom: 0px;">
            <h3 class="cust-container-desc-title-h3 cus-school-teachers-head custom_teachers_count cus-font-family-lato ">
                <span class="cus-admin-logo"><b>Start Quiz</b> ({{$quiz->title}})</span>
                <br>
                <span style=" font-size: 15px;"><b>Total Questions: {{$totQues}}</b></span>
            </h3>
            
        </div>

    </div>

    <div class="col-12 p-0">
        <hr class="cus-hr-1 mt-0 p-0">
    </div>
    <div class="col-12 p-0">
        @if ($message = Session::get('success'))
        <div class="alert alert-success ">
            <p>{{ $message }}</p>
        </div>
        @endif
        @if ($message = Session::get('error'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
        @endif
    </div>
    <div class="col-12 p-3">
        <!-- BEGIN OF FORM-->
        <form action="{{'/store-student-quiz'}}" class="form-horizontal text-margin-top" method="POST">
            @csrf
            <div class="panel panel-default">
                
                <div class="panel-heading">
                    <div class="col-12">  <b>Question.{{$count}}</b></div>
                </div>                   
               
                <div class="panel-body p-3">
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <div class="form-group">  
                                    @foreach($question as $key=> $option)
                                    <label class="radio-inline"> 
                                        <input id="option{{$key+1}}" type="radio" name="answers" value="{{ $option->id }}">
                                        {{ $option->option }}   
                                    </label>
                                    <br>
                                    <input type="hidden" name="subject_id" value="{{$subject_id}}">
                                    <input type="hidden" name="quiz_id" value="{{$quiz_id}}">
                                    <input type="hidden" name="options[{{$key+1}}]" value="{{$option->id}}">
                                    <input type="hidden" name="count" value="{{$count}}">
                                    <input type="hidden" name="totcount" value="{{$totQues}}">
                                    <input type="hidden" name="question_id" value="{{$option->question_id}}">
                                    
                                    @endforeach 
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12">
                        <div class="col-md-9 col-sm-8">
                        </div>
                        <div class="col-md-3 col-sm-4 p-3">
                            
                            @if($count!=$totQues)
                            <input type="submit" value="Next" class="btn btn-success">
                            @endif

                            @if($count==$totQues)
                            <button class="btn btn-danger" type='submit' title="Submit your quiz."  name='finalSubmit'>Submit Quiz</button>
                            @endif
                        </div>      
                    </div>
                </div>
            </div>
        </form>
        <!-- END OF FORM-->
    </div>                           
</div> 
@endsection

@section('js')
<script type="text/javascript">
    
</script>

@endsection

