<table width="100%" style="border:1">
<tr>
<th>No</th>
<th>Name</th>
<th>Location</th>
<th>Description</th>
<th>Date Start</th>
<th>Date Finish</th>
<th>Quota</th>
</tr>
<?php
$no = 1;
$event = \App\Event::get();
foreach($event as $myevent){
?>
<tr>
<td>{{$no++}}</td>
<td>{{$myevent->name_event}}</td>
<td>{{$myevent->location}}</td>
<td>{{$myevent->description}}</td>
<td>{{$myevent->date_start}}</td>
<td>{{$myevent->date_finish}}</td>
<td>{{$myevent->quota}}</td>
</tr>
<?php } ?>