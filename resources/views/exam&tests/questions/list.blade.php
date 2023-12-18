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
    <div class="col-12 row ">
        <div class="cust-container-desc-title float-left row" style="margin-bottom: 0px;">
            <div class=" col-md-10 p-2">
                <h3 class="cust-container-desc-title-h3 cus-school-teachers-head custom_teachers_count cus-font-family-lato ">
                    <span class="cus-admin-logo">Question List</span>
                </h3>
            </div>
            <div class="col-md-2 float-right p-2">
                <a href="/create-question/{{$subject_id}}/{{$quiz_id}}"><input type="button" value="Create" class="btn btn-success"></a>
                <a href="/dashboard"><input type="button" value="Back" class="btn btn-info"></a>
            </div>
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

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 p-0">
        <div style="overflow-x:auto;">

                <table class="table table-bordered cus-table-css custom_class_table" id="sample_4" style="word-wrap: normal" >
                    <thead class="cus-table-th" style="background-color: transparent !important;">
                        <tr>
                            <th  class="cus-align-center cus-font-family-lato" >S.No.</th>
                            <th class="cus-align-center cus-font-family-lato" >Subject </th>
                            <th class="cus-align-center cus-font-family-lato" >Title </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($questions as $key=>$question)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$question['subject']['name']}}</td>
                            <td>{{$question['title']}}</td>
                        </tr>
                        @empty
                        <tr><td colspan="6">Data not found!</td></tr>
                        @endforelse
                        
                    </tbody>
                </table>
            </div>
        
    </div>                           
</div> 
@endsection

@section('js')
<script type="text/javascript">
    
</script>

@endsection

