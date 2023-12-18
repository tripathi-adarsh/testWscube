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
                <span  class="cus-admin-logo">Create question</span>
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
        <form action="{{'/store-question'}}" class="form-horizontal text-margin-top" method="POST">
            @csrf
            <input type="hidden" name="subject_id" value="{{$subject_id}}">
            <input type="hidden" name="quiz_id" value="{{$quiz_id}}">
            <div class="form-body row">
                <div class="form-group col-sm-6 p-0">
                <label class="col-12 control-label cus-color-brown"><b>Title</b></label>
                    <div class="col-12">
                    @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                        <textarea class="form-control input-circle cust-grey-border-col " style="height:150px; background:transparent; outline-color: black;  color: black;"   name="title" placeholder="Enter Question" value="{{ old('title') }}" ></textarea >
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="form-group col-sm-6 mt-3 p-0">
                <label class="col-12 control-label cus-color-brown"><b>Option #1</b></label>
                    <div class="col-12">
                    @error('option')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                        <input type="text" name="option1" id="option1" class="form-control input-circle cust-grey-border-col" style="background:transparent; "   placeholder="Option #1" value="{{ old('option1') }}" required>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="form-group col-sm-6 mt-3 p-0">
                <label class="col-12 control-label cus-color-brown"><b>Option #2</b></label>
                    <div class="col-12">
                    @error('option')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                        <input type="text" name="option2" id="option2" class="form-control input-circle cust-grey-border-col" style="background:transparent; "   placeholder="Option #2" value="{{ old('option2') }}" required>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="form-group col-sm-6 mt-3 p-0">
                <label class="col-12 control-label cus-color-brown"><b>Option #3</b></label>
                    <div class="col-12">
                    @error('option')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                        <input type="text" name="option3" id="option3" class="form-control input-circle cust-grey-border-col" style="background:transparent; "   placeholder="Option #3" value="{{ old('option3') }}" required>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="form-group col-sm-6 mt-3 p-0">
                <label class="col-12 control-label cus-color-brown"><b>Option #4</b></label>
                    <div class="col-12">
                    @error('option')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                        <input type="text" name="option4" id="option4" class="form-control input-circle cust-grey-border-col" style="background:transparent; "   placeholder="Option #4" value="{{ old('option4') }}" required>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="form-group col-sm-6 mt-3 p-0">
                <label class="col-12 control-label cus-color-brown"><b>Correct option</b></label>
                    <div class="col-12">
                        @if($errors->has('correct'))
                            <p class="help-block">
                                {{ $errors->first('correct') }}
                            </p>
                        @endif
                        <select class="form-control input-circle cust-grey-border-col" name="correct_option" id="correct_option">
                          <option value="">Select Correct option</option>
                          <option value="1">Option #1</option>
                          <option value="2">Option #2</option>
                          <option value="3">Option #3</option>
                          <option value="4">Option #4</option>
                        </select>
                        
                    </div>
                </div>



                

                


                <div class="text-center col-12 p-3">
                    <button type="submit" class="btn btn-circle btn-success">Submit</button>
                    
                    <a class="btn btn-circle grey-salsa btn-outline btn-danger" href="{{'/Students'}}">Cancel </a>
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

