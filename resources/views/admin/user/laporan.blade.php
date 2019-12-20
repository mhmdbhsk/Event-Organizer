<table width="100%" style="border:1">
<tr>
<th>No</th>
<th>Nama</th>
<th>Email</th>
</tr>
<?php
$no = 1;
$users = \App\User::get();
foreach($users as $user){
?>
<tr>
<td>{{$no++}}</td>
<td>{{$user->name}}</td>
<td>{{$user->email}}</td>
</tr>
<?php } ?>
</table>