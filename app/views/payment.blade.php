@extends('layout.master')

@section('content')

<div class="page-container">
	<div class="row">
		<div class="col-md-8">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Login
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" style="width:450px">
                                <label>Password</label>
                                <input class="form-control" style="width:450px">
                                <br>
                                <button id="submitLogin" class="btn btn-red">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingTwo">
                        <h4 class="panel-title">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Register
                            </a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                        <div class="panel-body">
                            <div class="form-group">
                                <label>First Name</label>
                                <input class="form-control" style="width:450px">
                                <label>Last Name</label>
                                <input class="form-control" style="width:450px">
                                <label>Email</label>
                                <input class="form-control" style="width:450px">
                                <label>Password</label>
                                <input class="form-control" style="width:450px">
                                <br>
                                <button id="submitRegister" class="btn btn-red">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
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