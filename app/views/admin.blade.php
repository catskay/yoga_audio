@extends('layout.dashboardlayout')

@section('content')

<div class="page-container">
  <div class="row">
    <div class="panel-centered">
      <h2>Dashboard</h2>
    </div>
  </div>

  <div class="page-container">
    <div class="row">
      <a href = "selection"><button class="btn btn-red" style="float:right">Create new audio file</button></a>
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
                <p>{{$subcat->sname}} 
                <a href={{"#".$subcat->sid}} role="button" class="btn" data-toggle="modal">Delete</a></p>
              @endforeach
            </div>

          </div>

        </div>
        @endforeach

        <?php $arr = array(); ?>

        @foreach($categories as $cat)

            @foreach($subcategories[$cat->cid] as $subcat)
              <?php array_push($arr,array('name'=>$subcat->sid,'text'=>$subcat->sname)); ?>
            @endforeach

        @endforeach

        @foreach($arr as $contents)

        <!-- Modal -->
        <div class="modal fade" id={{$contents['name']}} tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
              </div>
              <div class="modal-body">
                <h4>Are you sure you want to delete {{$contents['text']}}?</h4>
              </div>
              <div class="modal-footer">
                {{Form::open(array('action'=>'HomeController@showAdmin'))}}
                {{Form::hidden('subid', $contents['name'])}}
                {{Form::submit('Yes',['class'=>'btn btn-red','style'=>'float:left'])}}
                {{Form::close()}}
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
              </div>
            </div>
          </div>
        </div>
        @endforeach

        <br>
        <br>
        {{Form::open(array('action'=>'HomeController@showAdmin'))}}
        <p><b>Please enter a name for the new category: </b></p>
        {{ Form::textarea('catName', null, ['placeholder' => 'category name', 'size'=>'50x1', 'required']) }}
        {{Form::submit('Add',['class'=>'btn btn-link'])}}
        {{Form::close()}}

        <p><b>Please select a category: </b></p>
        {{Form::open(array('action'=>'HomeController@showAdmin'))}}
        <select name="categories" id = 'cat' onchange="change()">
         @foreach($categories as $cat)
         <option value={{$cat->cid}}>{{$cat->cname}}</option>
         @endforeach    
       </select>
        <a href="#myModal" data-toggle="modal" class="btn btn-link" onClick="render()">Delete</a>

       <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
              </div>
              <div class="modal-body">
                <div class="panel-centered2">
                  <textInline>Are you sure you want to delete</textInline>
                  <textInline name="toDelete"></textInline>
                  <textInline>?</textInline>
                </div>
              </div>
              <div class="modal-footer">
                {{Form::submit('Yes',['class'=>'btn btn-danger','style'=>'float:left'])}}
                {{Form::close()}}
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
              </div>
            </div>
          </div>
        </div>
     </div>
   </div>
 </div>
</div>



@stop

<script>
  function render(){
    var toDelete = document.getElementsByName("toDelete");
    var e = document.getElementById("cat");
    var strCat = e.options[e.selectedIndex].text;
    toDelete[0].innerHTML = strCat;
  }
</script>



