@extends('layout.master')

@section('content')

    <div class="page-container">
        <div class="row">
            <div class="col-md-8">
                <h1 class="page-header">Dashboard</h1>
                <button type="button" class="btn btn-danger" style="float:right">CREATE NEW</button> 
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

            <div class="col-md-4">
                <div class="panel panel-padded">
                    <a href="/yoga_audio/public/category"><h3>Categories</h3></a>

                    {{Form::open(array('action' => 'HomeController@showCategory')) }}
                    {{Form::hidden('categ', 'health') }}
                    {{Form::submit('Health and Restoration', array('class' => 'btn btn-size-medium'));}}
                    {{Form::close() }}

                    {{Form::open(array('action' => 'HomeController@showCategory')) }}
                    {{Form::hidden('categ', 'health') }}
                    {{Form::submit('Yoga Nidra for Kids', array('class' => 'btn btn-size-medium'));}}
                    {{Form::close() }}

                    {{Form::open(array('action' => 'HomeController@showCategory')) }}
                    {{Form::hidden('categ', 'health') }}
                    {{Form::submit('Stress', array('class' => 'btn btn-size-medium'));}}
                    {{Form::close() }}

                    {{Form::open(array('action' => 'HomeController@showCategory')) }}
                    {{Form::hidden('categ', 'health') }}
                    {{Form::submit('Anti-Aging', array('class' => 'btn btn-size-medium'));}}
                    {{Form::close() }}
                    
                    {{Form::open(array('action' => 'HomeController@showCategory')) }}
                    {{Form::hidden('categ', 'health') }}
                    {{Form::submit('Insomnia/Restful Sleep', array('class' => 'btn btn-size-medium'));}}
                    {{Form::close() }}

                    {{Form::open(array('action' => 'HomeController@showCategory')) }}
                    {{Form::hidden('categ', 'chronic') }}
                    {{Form::submit('Chronic Pain', array('class' => 'btn btn-size-medium'));}}
                    {{Form::close() }}

                    {{Form::open(array('action' => 'HomeController@showCategory')) }}
                    {{Form::hidden('categ', 'health') }}
                    {{Form::submit('Habits and Addictions', array('class' => 'btn btn-size-medium'));}}
                    {{Form::close() }}

                    {{Form::open(array('action' => 'HomeController@showCategory')) }}
                    {{Form::hidden('categ', 'health') }}
                    {{Form::submit('Emotions', array('class' => 'btn btn-size-medium'));}}
                    {{Form::close() }}

                    <!--<p>Health and Restoration</p>
                    <p>Yoga Nidra for Kids</p>
                    <p>Stress</p>
                    <p>Anti-Aging</p>
                    <p>Insomnia/Restful Sleep</p>
                    <p>Chronic Pain</p>
                    <p>Habits and Addictions</p>
                    <p>Emotions</p>-->
                </div>
            </div>
        </div>
    </div>

@stop
