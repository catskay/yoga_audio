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
          @if(count($subcategories[$cat->cid])<>0)
            @foreach($subcategories[$cat->cid] as $subcat)
              <p>{{$subcat->sname}} <a href={{"#subcat".$subcat->sid}} role="button" class="btn" data-toggle="modal">Download</a></p>
            @endforeach
          @else
            <p>{{$cat->cname}} <a href={{"#cat".$cat->cid}} role="button" class="btn" data-toggle="modal">Download</a></p>
          @endif
        </div>
      </div>
      
    </div>

    @endforeach

    <?php $arr = array(); ?>

    @foreach($categories as $cat)

      @if(count($subcategories[$cat->cid])<>0)
        @foreach($subcategories[$cat->cid] as $subcat)
          <?php array_push($arr,array('name'=>"subcat".$subcat->sid,'text'=>$subcat->sname)); ?>
        @endforeach
      @else
        <?php array_push($arr,array('name'=>"cat".$cat->cid,'text'=>$cat->cname)); ?>
      @endif

    @endforeach

    @foreach($arr as $contents)

    <!-- Modal -->
    <div class="modal fade" id={{$contents['name']}} tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title" id="myModalLabel">Download {{$contents['text']}}</h4>
          </div>
          <div class="modal-body">
            <p>Description here</p>
            <a href="payment"><button type="button" class="btn-link">Click here to purchase audio file</button></a>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    @endforeach


  
   
   
  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <h4 class="modal-title" id="myModalLabel">Download Audio</h4>
        </div>
        <div class="modal-body">
        	<p>Description here</p>
          <a href="payment"><button type="button" class="btn-link">click here to download audio file...</button></a>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

</div>
</div>


@stop