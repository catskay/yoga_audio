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
    </div>

@stop
