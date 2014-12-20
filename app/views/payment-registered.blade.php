@extends('layout.dashboardlayout')

@section('content')

<div class="page-container">
	<div class="row">
        <div class="col-md-8">
            <div class= "lined-container">
            <div class="alert alert-danger">
                You have successfully registered.
            </div>
            <h3>User information</h3>
                <h6>Name: </h6>{{$user->name}}
                <br>
                <h6>Email: </h6>{{$user->email}}
            </div>
        </div>
		<div class="col-md-4">
			<div class="lined-container">
				<h4>Cart summary</h4>
				{{ HTML::image('img/audio-file.jpg') }}
				<p style="float:right">{{ $subcat->sname }}</p>
                <br><br>
                <p style="float:right"><b>Total: </b> $5.00</p>
                <br><br>
                {{Form::open(array('action' => 'HomeController@showDownload')); }}
                {{Form::submit('Checkout', array('class' => 'btn btn-red'));}}
                {{Form::close()}}
                <br>
			</div>
		</div>
    </div>
</div>


@stop