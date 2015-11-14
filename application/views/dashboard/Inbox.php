<div class="col-md-12 dashboard_primary_menu">
<h3>Inbox - Messages</h3>
<table border="1">	
<tr><td><b>From</b></td><td><b>Title</b></td><td><b>Message</b></td><td><b>Date</b></td><td><b>View</b></td></tr>
<?php
	foreach ($inbox as $key => $value) {
		if ($value['readed'] == NULL) {
			echo '<tr style="background-color: #ddd;">';
		}else{
			echo "<tr>";
		}
		
		echo "<td>".$value['sender'] . "</td>";
		echo "<td>".$value['title'] . "</td>";
		echo "<td>".$value['message'] . "</td>";
		echo "<td>".$value['date_added'] . "</td>";
		echo "<td>". anchor('dashboard/inbox/'.$value['id'], 'View') . "</td>";
		echo "</tr>";
	}
?>
</table>
</div>