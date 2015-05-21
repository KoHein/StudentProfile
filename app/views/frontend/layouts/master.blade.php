<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>{{ Config::get('setting.site_name')}}</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
<!-- 
Metro Template 
http://www.templatemo.com/preview/templatemo_363_metro 
-->
{{ HTML::style('css/bootstrap.css')}}
{{ HTML::style('css/templatemo_style.css')}}
{{ HTML::style('css/font-awesome.css')}}
{{ HTML::style('css/custom.css')}}

{{ HTML::script('js/jquery.min.js')}}
{{ HTML::script('js/jquery.scrollTo-min.js')}}
{{ HTML::script('js/jquery.localscroll-min.js')}}
{{ HTML::script('js/init.js')}}

{{ HTML::style('css/slimbox2.css')}}
{{ HTML::script('js/slimbox2.js')}}

</head> 
<body> 
	@yield('content')
</body> 
</html>