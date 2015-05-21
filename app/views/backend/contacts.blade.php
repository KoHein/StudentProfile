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
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{ $user->username }} <b class="caret"></b></a>
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
					<li>
						<a href="{{ URL::to('/admin')}}"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
					</li>
					<li>
						<a href="{{ URL::to('/admin/students')}}"><i class="fa fa-fw fa-dashboard"></i> Students</a>
					</li>
					<li>
						<a href="{{ URL::to('/admin/portfolios')}}"><i class="fa fa-fw fa-dashboard"></i> Portfolios</a>
					</li>
					<li class="active">
						<a href="{{ URL::to('/admin/students')}}"><i class="fa fa-fw fa-dashboard"></i> Contacts</a>
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
							Contacts
							<small>all message from contact form</small>
						</h1>
						<ol class="breadcrumb">
							<li>
								<i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
							</li>
							<li class="active">
								<i class="fa fa-file"></i> students
							</li>
						</ol>
					</div>
				</div>
				<!-- /.row -->
				<div class="row">
					<div class="col-lg-12">
						<h2>All Student List</h2>
						<div class="table-responsive">
							<table class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>name</th>
										<th>email</th>
										<th>message</th>
										<th>action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($contacts as $contact)
									<tr>
										<td>{{ $contact->name }}</td>
										<td>{{ $contact->email }}</td>
										<td>{{ $contact->message }}</td>
										<td>
											{{ Link_to_route('contactDetail','Detail', ['id' => $contact->id] , ['class' => 'btn btn-xs btn-success col-md-6'])}}

											{{Form::open(['method'=>'delete','action'=>['BackendController@deleteContact','id' => $contact->id]])}}
											<button type="submit" class="btn btn-xs btn-danger  col-md-6">Delete</button>                      
											{{Form::close()}}   
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
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