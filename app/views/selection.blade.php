@extends('layout.master')

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Merge Audio From Methods</h1>
        </div>

    </div>

    <div class="row">
        <div class="col-lg-12 checkbox">
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

   <select name="categories" id = 'cat' onchange="change()">
    @foreach($categories as $cat)
    <option value={{$cat->cid}}>{{$cat->cname}}</option>
    @endforeach    
</select>
<br>
<br>
<p><b>Please enter a name for the new subcategory: </b></p>
{{ Form::textarea('subcatName', null, ['placeholder' => 'subcategory name', 'size'=>'50x1']) }}
{{Form::hidden('submitted', 'true')}}
<br>
<br>
<br>
{{Form::submit('Merge', array('class' => 'btn')) }}
{{Form::close()}}


</div>
</div>

<script>
function change() {

}
</script>
@stop