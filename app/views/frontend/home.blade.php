@extends('frontend.layouts.master')
@section('content')

<div class="row">
	@if(! Sentry::check())
	<div class="col-md-3 col-md-offset-9" style="margin-top:10px; position:absolute">
		<a href="{{ URL::to('/login')}}"><button type="button" class="btn btn-danger btn-xs">Login</button></a>
		<a href="{{ URL::to('/register')}}"><button type="button" class="btn btn-info btn-xs">Register</button></a>
	</div>
	@else
	<div class="col-md-4 col-md-offset-8" style="margin-top:10px; position:absolute">

		<span style="margin-right:20px;font-size:14px;">Welcome, <a href="#{{ Str::slug(Sentry::getUser()->username) }}"> {{ Sentry::getUser()->username }}</a></span>

		<?php 

		$user = Sentry::findUserByID(Sentry::getUser()->id);
		$admin = Sentry::findGroupByName('Administrators');

		?>
		@if(!$user->inGroup($admin))
		<a href="{{ URL::to('/addportfolio')}}"><button type="button" class="btn btn-danger btn-xs">Add Portfolio</button></a>

		<a href="{{ URL::to('/editprofile')}}"><button type="button" class="btn btn-danger btn-xs">Edit Profile</button></a>
		@else
		<a href="{{ URL::to('/admin')}}"><button type="button" class="btn btn-danger btn-xs">Admin</button></a>
		@endif
		<a href="{{ URL::to('/logout')}}"><button type="button" class="btn btn-danger btn-xs">Logout</button></a>
		@endif
	</div>
</div>

<div id="templatemo_header">
	<div id="site_title"><h2><a href="{{ URL::to('/')}}">{{ Config::get('setting.site_name')}}</a></h2></div>
</div>

<div id="templatemo_main">
	<div id="content"> 
		<div id="home" class="section">
			<div id="home_about" class="box">
				<h2>Welcome</h2>
				<p>This website is working on progress by MM Links Students. Here, you can see our profolio website and students in this project. Thanks you so much for your time.</p>
			</div>

			<div id="home_gallery" class="box no_mr">
				@foreach($portfolios_home as $portfolio)
				<a href="uploads/portfolios/{{ $portfolio->image }}" rel="lightbox[gallery]"><img src="uploads/portfolios/{{ $portfolio->image }}" alt="{{ $portfolio->name }}" /></a>
				@endforeach
			</div>

			<div class="box home_box1 color1">
				<a href="#students"><i class="fa fa-users fa-5x"></i></a>
			</div>

			<div class="box home_box1 color2">
				<a href="#portfolio"><i class="fa fa-archive fa-5x"></i></a>
			</div>

			<div class="box home_box2 color3">
				<div id="social_links">
					<a href="#"><img src="images/facebook.png" alt="Facebook" /></a>
					<a href="#"><img src="images/flickr.png" alt="Flickr" /></a>
					<a href="#"><img src="images/twitter.png" alt="Twitter" /></a>
					<a href="#"><img src="images/youtube.png" alt="Youtube" /></a>
					<a href="#"><img src="images/vimeo.png" alt="Vimeo" /></a>
					<div class="clear h20"></div>
					<h3>Social</h3>
				</div>	
			</div>

			<div class="box home_box1 color4 no_mr">
				<a href="#contact"><img src="images/contact.jpg" alt="Contact" /></a>
			</div>

		</div> <!-- END of home -->

		<div class="section section_with_padding" id="students"> 
			<h2>Students</h2>
			<div class="row">
				@foreach($allstudents as $student)
				<a href="#{{ Str::slug($student->username) }}">
					<div class="col-md-4">
						<div class="thumbnail">
							<div class="profileimagecontainer">
								<img src="uploads/students/{{ $student->photo }}" alt="">
							</div>
							<div class="caption">
								<center><p class="studentname">{{ $student->username }}</p></center>
							</div>
						</div>
					</div>
				</a>
				@endforeach
			</div>

			<a href="#home" class="slider_nav_btn home_btn">home</a> 
			<a href="#home" class="slider_nav_btn previous_btn">Previous</a>
			<a href="#portfolio" class="slider_nav_btn next_btn">Next</a> 

		</div> 
		@foreach($allstudents as $student)
		<div class="section  detail section_with_padding" id="{{ Str::slug($student->username) }}"> 
			<div class="row">
				<div class="col-md-4">
					<center>
						<div class="profileimagecontainer">
							<img src="uploads/students/{{ $student->photo }}" alt="">
						</div>
						<h2>{{ $student->nickname }} </h2>
					</center>
				</div>
				<div class="col-md-8">
					<br>
					<table class="table table-hover table-condensed">
						<tr>
							<td class="col-md-3">Username</td>
							<td class="col-md-9">{{ $student->username}}</td>
						</tr>
						<tr>
							<td>Email</td>
							<td>{{ $student->email }}</td>
						</tr>
						<tr>
							<td>Phone</td>
							<td>{{ $student->phone}}</td>
						</tr>
						<tr>
							<td>Address</td>
							<td>{{ $student->address}}</td>
						</tr>
						<tr>
							<td>HomeTown</td>
							<td>{{ $student->hometown}}</td>
						</tr>
						<tr>
							<td>Work</td>
							<td>{{ $student->work}}</td>
						</tr>
						<tr>
							<td>Company</td>
							<td>{{ $student->company}}</td>
						</tr>
						<tr>
							<td>Web design</td>
							<td>
								<div class="progress">
									<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="{{ $student->webdesign}}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $student->webdesign}}%">
										<span class="sr-only">{{ $student->webdesign}}% Complete (success)</span>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td>Graphic Design</td>
							<td>
								<div class="progress">
									<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="{{ $student->graphicdesign}}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $student->graphicdesign}}%">
										<span class="sr-only">{{ $student->graphicdesign}}% Complete (success)</span>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td>Illustration</td>
							<td>
								<div class="progress">
									<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="{{ $student->illustration}}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $student->illustration}}%">
										<span class="sr-only">{{ $student->illustration}}% Complete (success)</span>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td>3D model</td>
							<td>
								<div class="progress">
									<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="{{ $student->threedmodel}}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $student->threedmodel}}%">
										<span class="sr-only">{{ $student->threedmodel}}% Complete (success)</span>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td>Branding</td>
							<td>
								<div class="progress">
									<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="{{ $student->branding}}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $student->branding}}%">
										<span class="sr-only">{{ $student->branding}}% Complete (success)</span>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td>Photography</td>
							<td>
								<div class="progress">
									<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="{{ $student->photography}}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $student->photography}}%">
										<span class="sr-only">{{ $student->photography}}% Complete (success)</span>
									</div>
								</div>
							</td>
						</tr>
					</table>
					<div class="col-md-12">
						<div id="home_gallery" class="box no_mr">
							<?php 

							$portfolios_student = Portfolio::where( 'studentid','=', $student->id)->take(10)->get();

							?>
							@foreach($portfolios_student as $portfolio)
							<a href="uploads/portfolios/{{ $portfolio->image }}" rel="lightbox[gallery]"><img src="uploads/portfolios/{{ $portfolio->image }}" alt="{{ $portfolio->name }}" /></a>
							@endforeach
						</div>
					</div>
				</div>
			</div>
			<a href="#home" class="slider_nav_btn home_btn">home</a> 
			<a href="#students" class="slider_nav_btn previous_btn">Previous</a>
			<a href="#portfolio" class="slider_nav_btn next_btn">Next</a> 
		</div> 
		@endforeach
		<div class="section scrollbar section_with_padding" id="portfolio"> 
			<h2>Portfolio</h2>
			<div class="row">
				@foreach($portfolios_all as $portfolio)
				<div class="col-md-4 portfolio-item">
					<a href="uploads/portfolios/{{ $portfolio->image }}" rel="lightbox[gallery]"><img src="uploads/portfolios/{{ $portfolio->image }}" alt="{{ $portfolio->name }}" /></a>	
				</div>
				@endforeach
			</div>
			<a href="#home" class="slider_nav_btn home_btn">home</a> 
			<a href="#students" class="slider_nav_btn previous_btn">Previous</a>
			<a href="#contact" class="slider_nav_btn next_btn">Next</a> 
		</div> 
		<div class="section section_with_padding" id="contact"> 
			<h2>Contact</h2> 
			<div class="half left">
				<h4>Quick Contact Form</h4>
				<div id="contact_form">
					{{ Form::open(array('url' => 'contact')) }}
					<div class="form-group">
						<label for="author">Name:</label>
						{{ Form::text('name',null,['class' => 'form-control', 'required' => 'required'])}}

					</div>
					<div class="form-group">                           
						<label for="email">Email:</label>							
						{{ Form::text('email', null ,['class' => 'form-control', 'required' => 'required'])}}
					</div>
					<div class="from-group">
						<label for="text">Message:</label>
						{{ Form::textarea('message', null ,['class' => 'form-control', 'required' => 'required'])}}
					</div>
					<div class="form-group">
						<input type="submit" class="submit_btn float_l" name="submit" id="submit" value="Send" />
					</div>
					{{ Form::close()}}
				</div>
			</div>

			<div class="half right">
				<h4>Myanmar Links Address</h4>
				Building 1, Room 8, Botataung Pagoda Rd, Yangon, Myanmar (Burma)<br />
				<strong>Email: info[ at ]myanmarlinks[ dot ]net</strong><br/>
				<div class="clear h20"></div>
				<div class="img_nom img_border"><span></span>

					<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15279.91602965498!2d96.172943!3d16.77772!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x100dd37ca2cc5b55!2sMyanmar+Links!5e0!3m2!1sen!2s!4v1427454509833" width="320" height="240" frameborder="0" style="border:0"></iframe>

				</div>
				<a href="#home" class="slider_nav_btn home_btn">home</a> 
				<a href="#students" class="slider_nav_btn previous_btn">Previous</a>

			</div> 
		</div> 
	</div>
</div>
<div id="templatemo_footer">
	Copyright © 2015 <a href="#">MM Links</a>
</div>
<!-- templatemo 363 metro -->
@stop