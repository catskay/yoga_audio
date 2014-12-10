@extends('layout.master')

@section('content')

<div class="page-container">
	<div class="row">
		<div class="panel-centered">
			<h4>Thank you! Click the button below to download your file. </h4>
			<p><b>{{$categnum.'.mp3' }}</b></p>
			<a href={{$categnum.".mp3"}} download={{$categnum.".mp3"}}><button id="download" class="btn btn-large-red">Download</button></a>
		</div>
	</div>
</div>

@stop