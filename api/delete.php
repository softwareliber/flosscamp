<?php
	require("jQueryAnnotate.class.php");
	$data_file = 'data';

	if( isset( $_GET['v'] ) and !empty( $_GET['v'] ) )
		$data_file = $_GET['v'];
	if( !file_exists( "./$data_file.csv" ) )
		return;

	$ja = new jQueryAnnotate( $data_file.'.csv' );
	$ja->delete();
?>
