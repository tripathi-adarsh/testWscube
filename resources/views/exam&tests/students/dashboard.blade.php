@extends('layouts.app')
@section('css')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome-animation/0.3.0/font-awesome-animation.min.css">
<style type="text/css">

</style>
@endsection
@section('content')
<!-- start dashboard content -->
<section id="dashboard" class="content section-cnt">            
    <div class="container-fluid " >
        <div class="row m-0 mt-3">
            <div class="col-xs-12 col-sm-12 col-lg-12 cust-container-desc-title p-0">
                <h3 class="m-0 cust-darkblue" >&nbsp;  Dashboard</h3>
            </div>          
        </div>
        <div class="col-xs-12 col-sm-12 col-lg-12 p-0 mt-2">
            <hr class="cus-hr-1 mt-0 p-0">
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12 p-3">
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
        <div class="row m-0 mt-3 custom_row_mr">
            <div class="col-xs-12 col-sm-6 col-md-4">
                <a href="/student/subjects" >
                <div class="card p-3 py-5 " title="New request for book approval, Click here to view."  style="background-color:#4d0000; border-radius:23px;">
                    <span class="text-white m-0 text-center font-weight-bold cust_das_tile"><b>Subject</b></span>
                </div>
                </a>
            </div>

        </div>
    
    </div> 
@endsection
