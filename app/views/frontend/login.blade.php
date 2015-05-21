@extends('frontend.layouts.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12" style="margin-top:100px;">
            <center><h2>Login</h2></center>
        </div>
        <div class="col-md-4 col-md-offset-4">
           @if (Session::has('error'))
           <p class="error">{{ Session::get('error') }}</p>
           @endif

           {{ Form::open(array('routes' => 'loginPost')) }}
           <div class="form-group">
            {{ Form::text('email', Input::old('email'), array('class' => 'form-control','placeholder' => 'Email'))}}
            @if ($errors->first('email'))
            <p class="error">{{ $errors->first('email') }}</p>
            @endif
            </div>
            <div class="form-group">
            {{ Form::password('password' , array('class' => 'form-control', 'placeholder' => 'Password'))}}
            @if ($errors->first('password'))
            <p class="error">{{ $errors->first('password') }}</p>
            @endif
            </div>
            <div class="form-group">
            {{ Form::submit('Login', array('class' => 'btn btn-block btn-danger'))}}
            </div>
        {{ Form::close() }} 
    </div>
</div>
</div> 
@stop