<?php
use Illuminate\Support\Facades\DB;


?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<form action="create" method="post">
<?php echo csrf_field(); ?>
<input type="submit" class="btn btn-info" value="Create Sample Data">
</form>


<hr>
<h1>ข้อมูลตัวอย่าง</h2>
<Table class="table table-striped">
<tr>
<td>Emp ID</td><td>NAME</td><td>START WORK</td><td>PHOTO</td><td>DEPARTMENT</td><td>POSITION</td>
</tr>
<?php

$list=DB::select("select emp.*,dep.depname,dep.position from employee emp left join department dep on emp.id=dep.employeeid");
foreach ($list as $row) {
     ?>
	 <tr>
	 <td><?php echo sprintf("%04d",$row->id); ?></td>
	 <td><?php echo $row->name; ?></td>
	 <td><?php echo $row->startwork; ?></td>
	 <td><img style="width:100pt;height:100pt" src="data:image/png;base64,<?php echo $row->photo; ?>"></td>
	 <td><?php echo $row->depname; ?></td>
	 <td><?php echo $row->position; ?></td>
	 </tr>
	 
	 <?php
}

?>
</table>

<h1>List of Department</h1>
<Table class="table table-striped">

<?php

$list=DB::select("select distinct depname from department");
foreach ($list as $row) {
     ?>
	 <tr>
	 <td><?php echo $row->depname; ?></td>

	 </tr>
	 
	 <?php
}

?>
</table><?php /**PATH C:\xampp\htdocs\gypmantech_gypmanlaravel\resources\views/main.blade.php ENDPATH**/ ?>