@extends('frontend.layouts.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-1">
            <h3 style="margin-top:40px;">Add Your Portfolio</h3>
            <a href="{{URL::to('/')}}" class="btn btn-danger">Back</a>
        </div>
        <div class="col-md-10 col-md-offset-1" style="margin-top:20px;">
            {{ Form::open(['routes'=>'addportfolio','method' => 'POST' , 'files' => 'true']) }}
            
            {{ Form::hidden('studentid', Sentry::getUser()->id)}}

            <div class="form-group">
                {{ Form::text('name', null , array('class' => 'form-control', 'placeholder' => 'Project Name'))}}
            </div>
            <div class="form-group">
                {{ Form::text('tools', null , array('class' => 'form-control', 'placeholder' => 'Tools'))}}
            </div>
            <div class="form-group">
                {{ Form::file('image', array('class' => 'form-control file','placeholder' => 'image'))}}
            </div>
            <div class="form-group">
                {{ Form::submit('Submit', array('class' => 'form-control','class' => 'btn btn-block btn-danger'))}}
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@stop