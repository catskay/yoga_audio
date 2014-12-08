@extends('layout.master')

@section('content')

<div class="page-container">
	<div class="row">
		<div class="panel-centered">
			<h4>Thank you! Click the button below to download your file. </h4>
			<p>Health and Restoration: Healing after surgery</p>
			<a href="/yoga_audio/public/audio/audio1-1.mp3" download="health_surgery.mp3"><button id="download" class="btn btn-large-red">Download</button></a>
		</div>
	</div>
</div>

@stop