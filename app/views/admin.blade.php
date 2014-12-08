@extends('layout.master')

@section('content')

<div class="page-container">
    <div class="row">
      <div class="panel-centered">
        <h2>Dashboard</h2>
      </div>
    </div>

    <div class="page-container">
        <div class="row">
            <a href = "selection"><button class="btn btn-red" style="float:right">Add new subcategory</button></a>
            <br><br>
        </div>
        <div class="row">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                @foreach($categories as $cat)
                <div class="panel panel-default">
                  <div class="panel-heading" role="tab" id={{"heading".$cat->cid}}>
                    <h4 class="panel-title">
                      <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href={{"#collapse".$cat->cid}} aria-expanded="false" aria-controls={{"#collapse".$cat->cid}}>
                        {{$cat->cname}}
                      </a>
                    </h4>
                  </div>

                  <div id={{"collapse".$cat->cid}} class="panel-collapse collapse" role="tabpanel" aria-labelledby={{"heading".$cat->cid}}>
                    <div class="panel-body">
                            @foreach($subcategories[$cat->cid] as $subcat)
                             {{Form::open(array('action'=>'HomeController@showAdmin'))}}
                              <p>{{$subcat->sname}} 
                                {{Form::hidden('subid', $subcat->sid)}}
                                {{Form::submit('Delete',['class'=>'btn btn-link'])}}
                              </p>
                               {{Form::close()}}
                            @endforeach
                    </div>

                  </div>
                    
                </div>
                 @endforeach
               <br>
               <br>
                {{Form::open(array('action'=>'HomeController@showAdmin'))}}
                    <p><b>Please enter a name for the new category: </b></p>
                  {{ Form::textarea('catName', null, ['placeholder' => 'category name', 'size'=>'50x1']) }}
                  {{Form::submit('Add',['class'=>'btn btn-link'])}}
                  {{Form::close()}}
            </div>
        </div>
    </div>
</div>

@stop