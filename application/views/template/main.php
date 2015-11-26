<?php
$this->load->view('template/Header', $title);

foreach ($dynamic as $value) {

	$this->load->view($value);

}


$this->load->view('template/Footer', $categories);