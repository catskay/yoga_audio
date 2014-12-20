@extends('layout.master')

@section('content')

<div class="row">
  <div class="panel-centered">
    <h2>Categories</h2>
    <h5>Select a category below to view and download available experiences</h5>
  </div>
</div>

<div class="page-container">
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
              <p>{{$subcat->sname}} <a href={{"#subcat".$subcat->sid}} role="button" class="btn" data-toggle="modal">Download</a></p>
            @endforeach
        </div>
      </div>
      
    </div>

    @endforeach

    <?php $arr = array(); ?>

    @foreach($categories as $cat)

        @foreach($subcategories[$cat->cid] as $subcat)
          <?php array_push($arr,array('name'=>"subcat".$subcat->sid,'text'=>$subcat->sname, 'id' => $subcat->sid, 'description' => $subcat->description)); ?>
        @endforeach

    @endforeach

    @foreach($arr as $contents)

    <!-- Modal -->
    <div class="modal fade" id={{$contents['name']}} tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" onclick= "pauseAudio()" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title" id="myModalLabel">Download {{$contents['text']}}</h4>
          </div>
          <div class="modal-body">
            <p>{{$contents['description']}}</p>
            {{Form::open(array('action' => 'HomeController@showPayment')); }}
            {{Form::hidden('subcatId', $contents['id']) }}
            {{Form::submit('Click here to purchase audio file', array('class' => 'btn btn-link'));}}
            {{Form::close() }}

            <audio controls id="script"> 
                  <source src={{"audio/30subcat".$contents['id'].".mp3"}} >
                  Your browser does not support the audio tag.
            </audio>
          </div>
          <div class="modal-footer">
            <button type="button" onclick= "pauseAudio()" class="btn btn-primary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    @endforeach
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