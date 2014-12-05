<html>
<head>
	<title>lo</title>
</head>
<body>
	{{Form::open(array('action' => 'HomeController@merge'))}}
	{{Form::hidden('submitted', 'true')}}
	{{Form::submit('Merge', array('class' => 'btn')) }}
	{{Form::close()}}

</body>

</html>