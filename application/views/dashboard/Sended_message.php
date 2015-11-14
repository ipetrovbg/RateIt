<div class="col-md-12 dashboard_primary_menu">
<h3>Sended - Message</h3>
<table border="1">	
<?php
		$data['id'] = $message['id'];
		$this->load->view('dashboard/Delete_sended_form', $data);
		echo "<br /><br />";
		echo "<tr>";
		echo "<td colspan='2'><b>Title: </b>".$message['title'] . "</td>";
		echo '</tr>';
		echo '<tr>';
		echo "<td><b>To: </b>".$message['receiver'] . " <img src=".base_url().$receiver_pic['pic']." /></td>";
		
		echo "<td><b>Date: </b>".$message['date_added'] . "</td>";
		echo "</tr>";
		echo "<tr><td colspan='2'><b>Message</b></td></tr>";
		echo "<tr>";
		echo "<td colspan='2'>".$message['message'] . "</td>";
		echo "</tr>";

?>
</table>
</div>