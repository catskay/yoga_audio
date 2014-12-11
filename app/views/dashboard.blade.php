@extends('layout.dashboardlayout')

@section('content')

    <div class="page-container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Dashboard</h1>
                <a href="category"><button type="button" class="btn btn-red" style="float:right">Click here to view all experiences</button></a> 
                <br><br>
                <div class="panel panel-default">
                <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Date</th>
                                        <th>Notes</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($experiences as $exp)
                                     <tr class="odd gradeX">
                                        <td>$exp->ename</td>
                                        <td>$exp->date</td>
                                        <td>$exp->notes</td>
                                        <td><div class="btn-group">
                                            <button type="submit" name="actions" value = "Download"class="btn btn-default">Download</button>
                                            <a href="#play" role="button" class="btn btn-default" data-toggle="modal">Play</a>
                                        </div></td>
                                   </tr>
                                   @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <br><br>
        <div class="modal fade" id="play" tabindex="-1" role="dialog" aria-labelledby="playLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button onclick="pauseAudio()" type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="loginLabel">Audio file name</h4>
                    </div>
                    <div class="modal-body">
                        <audio controls id="script"> 
                              <source src="audio/audio-subcat3.mp3" >

                              Your browser does not support the audio tag.
                        </audio>
                    </div>
                    <div class="modal-footer">
                        <button onclick="pauseAudio()" type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

<script> 
var aud = document.getElementById("script"); 

function pauseAudio() { 
    script.pause(); 
    script.currentTime = 0;
} 
</script> 
