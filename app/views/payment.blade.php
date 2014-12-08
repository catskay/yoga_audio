@extends('layout.master')

@section('content')

<div class="page-container">
	<div class="row">
		<div class="col-md-8">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <h4 class="panel-title">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Login
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" style="width:450px">
                                <label>Password</label>
                                <input class="form-control" style="width:450px">
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
                                <label>Retype password</label>
                                <input class="form-control" style="width:450px">
                                <label>Password hint</label>
                                <input class="form-control" style="width:450px">
                                <p class="help-block">A word or phrase to remind you of your password</p>
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
				<p style="float:right">Health and Restoration: Healing after surgery</p>
                <br><br>
                <p style="float:right"><b>Total: </b> $5.00</p>
                <br><br>
                <button id="checkout" class="btn btn-red" style="float:right">Checkout</button>
                <br>
			</div>
            
		</div>
	</div>
</div>

@stop