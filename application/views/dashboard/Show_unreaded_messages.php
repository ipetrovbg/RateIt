<div class="col-md-6 login-left">
<h3>Unreaded - Messages</h3>
<table border="1">	
<tr><td><b>From</b></td><td><b>Title</b></td><td><b>Message</b></td><td><b>Date</b></td><td><b>View</b></td></tr>
<?php
	foreach ($get_unreaded_mails as $key => $value) {

		echo '<tr style="background-color: #ddd;">';		
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