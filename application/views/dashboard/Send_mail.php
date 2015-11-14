		<?php 
			

			$receiver = array(
			        'name'          => 'receiver',
			        'id'            => 'receiver',
			        'value'         => ''
			);
			$title = array(
			        'name'          => 'title',
			        'id'            => 'title',
			        'value'         => ''
			);
			$message = array(
			        'name'          => 'message',
			        'id'            => 'message',
			        'value'         => ''
			);
			$attributes = array(
		        'style' => 'color: #999;font-size:0.95em;display: block;font-weight: 500;'
		    );
			?>
			<div class="col-md-12 dashboard_primary_menu">
			<?php

			echo "<h3>Send</h3>";
			echo validation_errors();
			echo form_open('dashboard/send');
			echo form_label('Message to: ', 'receiver', $attributes);
			echo form_input($receiver);
			echo "<br/>";
			echo form_label('Title: ', 'title', $attributes);
			echo form_input($title);
			echo "<br/>";
			echo form_label('Text Message: ', 'message', $attributes);
			echo form_textarea($message);
			echo "<br />";
			echo form_submit('send', 'Send!');
			echo form_close();

		?>
		</div>