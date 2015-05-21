@extends('backend.layouts.master')

@section('sidebar')

<p>This is appended to the master sidebar.</p>
@stop

@section('content')
<body>
	<div id="wrapper">
		<!-- Navigation -->
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				{{ Link_to_route('home', 'Stuend Profile Managemtent', null, ['class'=> 'navbar-brand', 'target'=>'_blank'])}}
			</div>
			<!-- Top Menu Items -->
			<ul class="nav navbar-right top-nav">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{ $student->username }} <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li>
							<a href="{{ URL::to('admin/profile')}}"><i class="fa fa-fw fa-user"></i> Profile</a>
						</li>
						
						<li class="divider"></li>
						<li>
							<a href="{{ URL::to('logout')}}"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
						</li>
					</ul>
				</li>
			</ul>
			<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav side-nav">
					<li class="active">
						<a href="{{ URL::to('/admin')}}"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
					</li>
					<li>
						<a href="{{ URL::to('/admin/students')}}"><i class="fa fa-fw fa-dashboard"></i> Students</a>
					</li>
					<li>
						<a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-gear"></i> Settings <i class="fa fa-fw fa-caret-down"></i></a>
						<ul id="demo" class="collapse">
							<li>
								<a href="{{ URL::to('/admin')}}">Administrators</a>
							</li>
							<li>
								<a href="{{ URL::to('/admin')}}">Others</a>
							</li>
						</ul>
					</li>
					
				</ul>
			</div>
			<!-- /.navbar-collapse -->
		</nav>
		<div id="page-wrapper">

			<div class="container-fluid">

				<!-- Page Heading -->
				<div class="row">
					<div class="col-lg-12">
						<h1 class="page-header">
							Update Student
							<small>update student information</small>
						</h1>
						<ol class="breadcrumb">
							<li>
								<i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
							</li>
							<li class="active">
								<i class="fa fa-file"></i> profile
							</li>
						</ol>
					</div>
				</div>
				<!-- /.row -->
				<div class="row">
					<div class="col-md-10 col-md-offset-1" style="margin-top:20px;">
						{{ Form::open(['routes'=>'editstudent','method' => 'POST' , 'files' => 'true']) }}

							{{ Form::hidden('id', $student->id)}}
							
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
							{{ Form::text('webdesign',$student->webdesign , array('class' => 'form-control','placeholder' => 'Webdesign'))}}
						</div>
						<div class="form-group">
							{{ Form::text('graphicdesign',$student->graphicdesign , array('class' => 'form-control','placeholder' => 'Graphicdesign'))}}
						</div>
						<div class="form-group">
							{{ Form::text('illustration',$student->illustration , array('class' => 'form-control','placeholder' => 'Illustration'))}}
						</div>
						<div class="form-group">
							{{ Form::text('threedmodel',$student->threedmodel , array('class' => 'form-control','placeholder' => '3D Modal'))}}
						</div>
						<div class="form-group">
                			{{ Form::text('branding',$student->branding , array('class' => 'form-control','placeholder' => 'Branding'))}}
            			</div>
						<div class="form-group">
							{{ Form::text('photography',$student->photography  , array('class' => 'form-control','placeholder' => 'Photography'))}}
						</div>
		<!-- 				<div class="form-group">
							{{ Form::file('photo', null , array('class' => 'form-control','placeholder' => 'Photography'))}}
						</div> -->
						<div class="form-group">
							{{ Form::submit('Update', array('class' => 'form-control','class' => 'btn btn-block btn-success'))}}
						</div>
						{{ Form::close() }}
					</div>
				</div>
			</div>
			<!-- /.container-fluid -->

		</div>

		<!-- jQuery -->
		{{ HTML::script('js/jquery.js') }}
		{{ HTML::script('js/bootstrap.min.js') }}
		{{ HTML::script('js/plugins/morris/raphael.min.js') }}
		{{ HTML::script('js/plugins/morris/morris.min.js') }}
		{{ HTML::script('js/plugins/morris/morris-data.js') }}

	</body>


	@stop