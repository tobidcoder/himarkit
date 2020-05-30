<!DOCTYPE html>
<!--
**********************************************************************************************************
    Copyright (c) 2020.
**********************************************************************************************************  -->
<!-- 
Template Name: eClass - Learning Management System 
Version: 1.7.0
Author: Media City
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]> -->

<?php
$language = Session::get('changed_language'); //or 'english' //set the system language
$rtl = array('ar','he','ur', 'arc', 'az', 'dv', 'ku'); //make a list of rtl languages
?>

<html lang="en" @if (in_array($language,$rtl)) dir="rtl" @endif>
<!-- <![endif]-->
<!-- head -->
@include('theme.head')
<!-- end head -->
<!-- body start-->
<body>
<!-- preloader --> 
@if($gsetting->preloader_enable == 1)
<div class="preloader">
    <div class="status">
        <div class="status-message">
        	<img src="{{ asset('images/favicon/'.$gsetting['favicon']) }}" alt="logo" class="img-fluid">
        </div>
    </div>
</div>
@endif

@php
  if(isset(Auth::user()->orders)){
      //Run User Enroll expire background process
      App\Jobs\EnrollExpire::dispatchNow();
  }
@endphp
<!-- end preloader -->
<!-- top-nav bar start-->
@include('theme.nav')
<!-- top-nav bar end-->
<!-- home start -->
<div class="container text-center">

<p class="row justify-content-center"> HiMarkIt is in the begining stages, Pleased send us Feedback any errors we will be properptly corrected!</p>
<button  style="margin-botton: 5px" type="button" class="btn btn-primary" data-whatever="@mdo"><a style="color: white; margin: 0px; padding:0px" href="{{ route('contact')}}"> Send Feedback </a> </button>
      
{{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Send Feedback</button> --}}

</div>
@yield('content')

<!-- testimonial end -->
<!-- footer start -->
@include('theme.footer')
<!-- footer end -->
<!-- jquery -->
@include('theme.scripts')
<!-- end jquery -->
</body>
<!-- body end -->
</html> 
