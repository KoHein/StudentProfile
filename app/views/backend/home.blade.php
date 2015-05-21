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
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{ $user->username}}<b class="caret"></b></a>
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
						<a href="{{ URL::to('/admin/portfolios')}}"><i class="fa fa-fw fa-dashboard"></i> Portfolios</a>
					</li>
					<li>
						<a href="{{ URL::to('/admin/contacts')}}"><i class="fa fa-fw fa-dashboard"></i> Contacts</a>
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
							Dashboard <small>Statistics Overview</small>
						</h1>
						<ol class="breadcrumb">
							<li class="active">
								<i class="fa fa-dashboard"></i> Dashboard
							</li>
						</ol>
					</div>
				</div>
				<!-- /.row -->
				@if( count($not_activited_students) != 0 )
				<div class="row">
					<div class="col-lg-12">
						<div class="alert alert-danger alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

							<i class="fa fa-info-circle"></i> There are <strong> {{  count($not_activited_students)  }} </strong> stuents are waiting for your approved!
						</div>
					</div>
				</div>
				<!-- /.row -->
				@endif
				<div class="row">
					@if( count($not_activited_students) != 0 )
					<div class="col-lg-6 col-md-6">
						<div class="panel panel-green">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-3">
										<i class="fa fa-users fa-5x"></i>
									</div>
									<div class="col-xs-9 text-right">
										<div class="huge"> {{ count($actived_students) }}</div>
										<div>Students!</div>
									</div>
								</div>
							</div>
							<a href="{{ URL::to('admin/students')}}">
								<div class="panel-footer">
									<span class="pull-left">View Details</span>
									<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
									<div class="clearfix"></div>
								</div>
							</a>
						</div>
					</div>
					<div class="col-lg-6 col-md-6">
						<div class="panel panel-yellow">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-3">
										<i class="fa fa-edit fa-5x"></i>
									</div>
									<div class="col-xs-9 text-right">
										<div class="huge"> {{ count($not_activited_students) }} </div>
										<div>are waiting for approved!</div>
									</div>
								</div>
							</div>
							<a href="#">
								<div class="panel-footer">
									<span class="pull-left">View Details</span>
									<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
									<div class="clearfix"></div>
								</div>
							</a>
						</div>
					</div>
					@else
					<div class="col-lg-12 col-md-12">
						<div class="panel panel-green">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-3">
										<i class="fa fa-users fa-5x"></i>
									</div>
									<div class="col-xs-9 text-right">
										<div class="huge"> {{ count($actived_students) }}</div>
										<div>Students!</div>
									</div>
								</div>
							</div>
							<a href="{{ URL::to('admin/students')}}">
								<div class="panel-footer">
									<span class="pull-left">View Details</span>
									<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
									<div class="clearfix"></div>
								</div>
							</a>
						</div>
					</div>
					@endif
				</div>
				<!-- /.row -->
				<div class="row">
					@if( count($not_activited_students) != 0 )
					<div class="col-lg-6">
						<h2>New Students</h2>
						<div class="table-responsive">
							<table class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>Name</th>
										<th>Email</th>
									</tr>
								</thead>
								<tbody>
									@foreach($actived_students as $student)
									<tr>
										<td>{{ $student->username }}</td>
										<td>{{ $student->email }}</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
					<div class="col-lg-6">
						<h2>Pending Students</h2>
						<div class="table-responsive">
							<table class="table table-bordered table-hover table-striped">
								<thead>
									<tr>
										<th>Name</th>
										<th>Email</th>
									</tr>
								</thead>
								<tbody>
									@foreach($not_activited_students as $student)
									<tr>
										<td>{{ $student->username }}</td>
										<td>{{ $student->email }}</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
					@else
					<div class="col-lg-12">
						<h2>New Students</h2>
						<div class="table-responsive">
							<table class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>Name</th>
										<th>Email</th>
									</tr>
								</thead>
								<tbody>
									@foreach($actived_students as $student)
									<tr>
										<td>{{ $student->username }}</td>
										<td>{{ $student->email }}</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
					@endif
				</div> <!--./row-->
			</div>
			<!-- /.container-fluid -->
		</div>
		<!-- /#page-wrapper -->

	</div>
	<!-- /#wrapper -->

	<!-- jQuery -->
	{{ HTML::script('js/jquery.js') }}
	{{ HTML::script('js/jquery.lcnCircleRangeSelect.js') }}

	{{ HTML::script('js/bootstrap.min.js') }}
	{{ HTML::script('js/plugins/morris/raphael.min.js') }}
	{{ HTML::script('js/plugins/morris/morris.min.js') }}
	{{ HTML::script('js/plugins/morris/morris-data.js') }}

</body>


@stop