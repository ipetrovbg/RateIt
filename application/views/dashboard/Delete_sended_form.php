<?php

$data = array(
        'type'  => 'hidden',
        'name'  => 'id_mail',
        'value' => $id
);

echo form_open('dashboard/delete_sended_message');

echo form_input($data);

echo form_submit('delete', 'Delete this message!');

echo form_close();