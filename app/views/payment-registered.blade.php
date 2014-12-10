@extends('layout.master')

@section('content')

<div class="page-container">
	<div class="row">
        <div class="col-md-8">
            <div class= "lined-container">
            <div class="alert alert-danger">
                You have successfully registered.
            </div>
            <h3>User information</h3>
                <h6>Name: </h6>{{$name}}
                <br>
                <h6>Email: </h6>{{$email}}
            </div>
        </div>
		<div class="col-md-4">
			<div class="lined-container">
				<h4>Cart summary</h4>
				{{ HTML::image('img/audio-file.jpg') }}
				<p style="float:right">{{ $categtext }}</p>
                <br><br>
                <p style="float:right"><b>Total: </b> $5.00</p>
                <br><br>
                {{Form::open(array('action' => 'HomeController@showDownload')); }}
                {{Form::hidden('categName', $categtext) }}
                {{Form::hidden('categId', $categnum) }}
                {{Form::submit('Checkout', array('class' => 'btn btn-red'));}}
                {{Form::close()}}
                <br>
			</div>
		</div>
    </div>
</div>


@stop