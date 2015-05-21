@extends('frontend.layouts.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-1">
            <h3 style="margin-top:40px;">Edit Your Profile</h3>
            <a href="{{URL::to('/'.'#'.Str::slug($student->username))}}" class="btn btn-danger">Back</a>
        </div>
        <div class="col-md-10 col-md-offset-1" style="margin-top:20px;">
            {{ Form::open(['routes'=>'editprofile','method' => 'POST' , 'files' => 'true']) }}
            <div class="form-group">
                {{ Form::text('username', $student->username , array('class' => 'form-control', 'placeholder' => 'Username'))}}
            </div>
            <div class="form-group">
                {{ Form::text('nickname', $student->nickname, array('class' => 'form-control', 'placeholder' => 'Nick Name'))}}
            </div>
            <div class="form-group">
                {{ Form::text('email', $student->email  , array('class' => 'form-control','placeholder' => 'Email'))}}
            </div>        
            <div class="form-group">
                {{ Form::text('phone', $student->phone , array('class' => 'form-control','placeholder' => 'PhoneNumber'))}}
            </div>
            <div class="form-group">
                {{ Form::text('address', $student->address , array('class' => 'form-control','placeholder' => 'Address'))}}
            </div>
            <div class="form-group">
                {{ Form::text('hometown', $student->hometown , array('class' => 'form-control','placeholder' => 'HomeTown'))}}
            </div>
            <div class="form-group">
                {{ Form::text('work', $student->work , array('class' => 'form-control','placeholder' => 'Your Job'))}}
            </div>
            <div class="form-group">
                {{ Form::text('company',$student->company , array('class' => 'form-control','placeholder' => 'Company'))}}
            </div>
            <div class="form-group">
                {{ Form::file('photo', array('class' => 'form-control file','placeholder' => 'photo'))}}
            </div>
            <div class="form-group">
                {{ Form::submit('Update', array('class' => 'form-control','class' => 'btn btn-block btn-danger'))}}
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@stop