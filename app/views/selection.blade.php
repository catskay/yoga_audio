@extends('layout.master')

@section('content')
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Merge Audio From Methods</h1>
    </div>

  </div>

  <div class="row">
    <div class="col-lg-7 checkbox">
       {{Form::open(array('action' => 'AudioController@merge'))}}
       @foreach($arr as $section => $subsections)
       @foreach($subsections as $subsection => $methods)
       <?php 
       $sub = Subsection::where("ssname", "=", $subsection)->first();  
       $r = $sub->r;
       $g = $sub->g;
       $b = $sub->b;
       $str = '"color:rgb('.$r.','.$g.','.$b.')"';
       ?>
       <ul style={{$str}}><b>{{$section}}</b>
        <ul>{{$subsection}}
         @foreach($methods as $method)
         <li>
           {{Form::checkbox('checked[]', $method->mid)}}{{$method->mname}}<br>
         </li>
         @endforeach
       </ul>
     </ul>
     @endforeach
     @endforeach
 </ul>

 <br>
 <p><b>Please select a category: </b></p>
 <select name="categories" id = 'cat'>
  @foreach($categories as $cat)
  <option value={{$cat->cid}}>{{$cat->cname}}</option>
  @endforeach    
</select>
<br>
<br>
<p><b>Please enter a name for the new subcategory: </b></p>
{{ Form::textarea('subcatName', null, ['placeholder' => 'subcategory name', 'size'=>'50x1', 'required']) }}
{{Form::hidden('submitted', 'true')}}
<br>
<br>
<p><b>Please enter a description for the new subcategory: </b></p>
{{Form::textarea('subcatDescript', null, ['placeholder' => 'subcategory description', 'size'=>'50x5', 'required']) }}
<br>
<br>
{{Form::submit('Merge', array('class' => 'btn btn-danger')) }}
{{Form::close()}}
</div>

<div class = "col-lg-4 border">
  <h4>Replace Existing Audio Files</h4>
  {{Form::open(array('action'=> 'AudioController@upload', 'files'=>true))}}
  {{ Form::label('noticelabel','Please choose a method you want to replace:') }}
  <select name="methods" id = 'meth' class="selectpicker" data-live-search="true">
    @foreach($arr as $section => $subsections)
    @foreach($subsections as $subsection => $methods)
    <optgroup label = {{$subsection}}></optgroup>
     @foreach($methods as $method)
     <option value={{$method->mid}}>{{$method->mname}}</option>
     @endforeach    
     @endforeach
     @endforeach
   </select>
   <br>
   <br>
   {{ Form::label('filelabel','Upload an Audio File') }}
   {{ Form::file('audio','',array('class'=>'')) }}
   <br>
   <br>
   {{Form::submit('Upload', array('class' => 'btn btn-danger')) }}
   <br>
   <br>
   {{Form::close()}}
 </div>
</div>
<script>
$('.selectpicker').selectpicker();
</script>
@stop