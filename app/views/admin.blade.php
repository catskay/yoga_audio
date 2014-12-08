@extends('layout.adminlayout')

@section('content')

<div class="page-container">
	<div class="row">
            <h1 class="page-header">Dashboard</h1>
            <div style="float:right">
	            <a href="createaudio"><button type="button" class="btn btn-red">Create New Audio Course</button></a> 
	            <a href="addaudio"><button type="button" class="btn btn-red">Add New Audio File</button></a> 
	        </div>
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
                                 <tr class="odd gradeX">
                                    <td>name</td>
                                    <td>11/29/14</td>
                                    <td>for sleeping</td>
                                    <td><button  id="download" class="btn btn-default">Download</button></td>
                               </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
	</div>
</div>

@stop