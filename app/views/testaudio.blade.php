<html>
<head>
	<title>lo</title>
</head>
<body>
	{{Form::open(array('action' => 'HomeController@merge'))}}
	{{Form::checkbox('checked', '1')}}
	{{Form::checkbox('checked', '2')}}
	{{Form::checkbox('checked', '3')}}
	{{Form::checkbox('checked', '4')}}

	{{Form::hidden('submitted', 'true')}}
	{{Form::submit('Merge', array('class' => 'btn')) }}
	{{Form::close()}}

</body>

</html>