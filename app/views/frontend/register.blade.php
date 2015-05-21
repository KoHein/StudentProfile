@extends('frontend.layouts.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12" style="margin-top:10px;">
            <center><h2>Register</h2></center>
        </div>
        <div class="col-md-4 col-md-offset-4">
            {{ Form::open(['routes'=>'registerPost','method' => 'POST' , 'files' => 'true']) }}
            <div class="form-group">
                {{ Form::text('username', null, array('class' => 'form-control', 'placeholder' => 'Username'))}}
            </div>
            <div class="form-group">
                {{ Form::text('nickname', null, array('class' => 'form-control', 'placeholder' => 'Nick Name'))}}
            </div>
            <div class="form-group">
                {{ Form::text('email', null , array('class' => 'form-control','placeholder' => 'Email'))}}
            </div>        
            <div class="form-group">
                {{ Form::password('password' , array('class' => 'form-control','placeholder' => 'Password'))}}
            </div>
            <div class="form-group">
                {{ Form::password('confirm-password' , array('class' => 'form-control','placeholder' => 'Confirm Password'))}}
            </div>
            <div class="form-group">
                {{ Form::text('phone', null , array('class' => 'form-control','placeholder' => 'PhoneNumber'))}}
            </div>
            <div class="form-group">
                {{ Form::text('address', null , array('class' => 'form-control','placeholder' => 'Address'))}}
            </div>
            <div class="form-group">
                {{ Form::text('hometown', null , array('class' => 'form-control','placeholder' => 'HomeTown'))}}
            </div>
            <div class="form-group">
                {{ Form::text('work', null , array('class' => 'form-control','placeholder' => 'Your Job'))}}
            </div>
            <div class="form-group">
                {{ Form::text('company',null , array('class' => 'form-control','placeholder' => 'Company'))}}
            </div>
            
            <div class="form-group">
                {{ Form::file('photo', null , array('class' => 'form-control','placeholder' => 'Photo'))}}
            </div>
            <div class="form-group">
                {{ Form::submit('Register', array('class' => 'form-control','class' => 'btn btn-block btn-success'))}}
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div> 
@stop