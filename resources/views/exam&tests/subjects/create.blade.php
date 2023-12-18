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
                <span  class="cus-admin-logo">Create Subject</span>
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
        <form action="{{'/store-subject'}}" class="form-horizontal text-margin-top" method="POST">
            @csrf
            <div class="form-body row">
                <div class="form-group col-sm-6 p-0">
                <label class="col-12 control-label cus-color-brown"><b>Name</b></label>
                    <div class="col-12">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                        <input type="text" name="name"  class="form-control input-circle cust-grey-border-col" style="background:transparent; "   placeholder="Name" value="{{ old('name') }}" required>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="form-group col-sm-6 mt-3 p-0">
                <label class="col-12 control-label cus-color-brown"><b> Description</b></label>
                    <div class="col-12">
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                        <textarea class="form-control input-circle cust-grey-border-col "   style="height:150px; background:transparent; outline-color: black;  color: black;"   name="description" placeholder=" Description" value="{{ old('description') }}" ></textarea >
                    </div>
                </div>

                <div class="text-center col-12 p-3">
                    <button type="submit" class="btn btn-circle btn-success">Submit</button>
                    
                    <a class="btn btn-circle grey-salsa btn-outline btn-danger" href="{{'/subjects'}}">Cancel </a>
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

