<div class="col-md-12 dashboard_primary_menu">
<h3>Sended - Messages</h3>
<?php echo $msg; ?>	
<table border="1">	
<tr><td><b>To</b></td><td><b>Title</b></td><td><b>Message</b></td><td><b>Date</b></td><td><b>View</b></td></tr>
<?php
	foreach ($sended as $key => $value) {
		echo "<tr>";		
		echo "<td>".$value['receiver'] . "</td>";
		echo "<td>".$value['title'] . "</td>";
		echo "<td>".$value['message'] . "</td>";
		echo "<td>".$value['date_added'] . "</td>";
		echo "<td>". anchor('dashboard/sended/msg/'.$value['id'], 'View') . "</td>";
		echo "</tr>";
	}
?>
</table>
</div>