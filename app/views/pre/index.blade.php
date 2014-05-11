@extends('template')
@section('content')
<br />
<h4 class="text-success">{{ $title }}<span class="badge badge-success"><?=$count;?></span></h4>


<table width="100%" border="0">
  <tr>
    <td width="12%">&nbsp;</td>
    <td width="25%">&nbsp;</td>
    <td width="29%">&nbsp;</td>
    <td width="34%">&nbsp;</td>
  </tr>
  <tr>
    <td align="right">Region:</td>
    <td>{{ Form::select('region_id', $regions, '', array('id' => 'region_id')) }}</td>
    <td>Type of Asset</td>
    <td>{{ Form::select('asset_id', $assets, '', array('id' => 'asset_id')) }}</td>
  </tr>
  <tr>
    <td align="right">Province:</td>
    <td>{{ Form::select('province_id', $regions, '', array('id' => 'province_id')) }}</td>
    <td>Type of Construction</td>
    <td>{{ Form::select('construction_id', $constructions, '', array('id' => 'construction_id')) }}</td>
  </tr>
  <tr>
    <td align="right">City/Municipality:</td>
    <td>{{ Form::select('municipality_id', $regions, '', array('id' => 'municipality_id')) }}&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="show" id="show" value="Show" /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>


<table width="100%" id="myTable" class="table">
  <thead>
  <tr>
    <th width="2%">&nbsp;</th>
    <th width="26%">Date</th>
    <th width="13%"><strong>LGU</strong></th>
    <th width="19%">Name</th>
    <th width="17%">Address</th>
    <th width="4%">Actions</th>
    <td width="19%">
      <!--<a href="{{Request::root()}}/add" class="btn btn-primary btn-small">Add</a>-->
    </td>
  </tr>
  </thead>
  <tbody>
  <?php $i=1;?>
  
  @foreach($rows as $row)
  <tr>
    <td><?=$i++;?></td>
    <td>{{ $row->created_at->toFormattedDateString() }}</td>
    <td>{{ $row->lgu->name }}</td>
    <td>{{ $row->user->first_name }} {{ $row->user->last_name }}</td>
    <td>{{ $row->address }}</td>
    <td></td>
    <td>
      <!--<a href="{{Request::root()}}/submitted/view/{{ $row->id }}" class="btn btn-primary btn-small">Picture</a>
      <a href="{{Request::root()}}/submitted/map/{{ $row->id }}" class="btn btn-primary btn-small">Map</a>
      <a href="{{Request::root()}}/admin/photo/edit/{{ $row->id }}" class="btn btn-primary btn-small">Edit</a>
      <a href="#" class="btn btn-small" id="delete" val="{{ $row->id }}">Delete</a>-->
    </td>
  </tr>
  @endforeach
  </tbody>
</table>


<?php echo $rows->links(); ?>


<script>
$(document).ready(function(){ 
	
	
	$('#show').click(function(){
		
		alert("show");
		
	});
	
	$('#region_id').change(function(){
		
		alert("region");
		
	});
	
	$('#province_id').change(function(){
		
		alert("province");
		
	});
	
	$('#municipality_id').change(function(){
		
		alert("municipality_id");
		
	});

	
	//$("#myTable").tablesorter(); 


});

$('a#delete').click(function(){

var val = $(this).attr('val');

//alert(val);

if (confirm("Are you sure?")) {
	$.post('<?php echo Request::root().'/admin/photo/delete/';?>'+val);
	$(this).parent().parent().remove();
}
return false;

});
</script>  

@stop

