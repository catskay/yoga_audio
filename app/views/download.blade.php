@extends('layout.master')

@section('content')

<div class="page-container">
	<div class="row">
		<div class="panel-centered">
			<h4>Thank you! Click the button below to download your file. </h4>
			<p>{{ $subcat->sname }}</p>
			<?php $filename = 'subcat'.$subcat->sid.'.mp3'; ?>
			<p><b>{{ $filename }}</b></p>
			<a href={{$filename}} download={{$filename}}><button id="download" class="btn btn-large-red">Download</button></a>
		</div>
	</div>
</div>

@stop