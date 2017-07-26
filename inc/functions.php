<?php

function wpIonicLoginAuthValidateLogin($username, $password){

	$results = array();

	$user = get_user_by("login", $username);

	if ( $user && wp_check_password( $password, $user->data->user_pass, $user->ID) ){

		$results = array(
			"displayname" => $user->data->display_name,
			"result" => "Success!",
		);
	}else{

		$results = array(
			"result" => "Access denied!",
		);
	}

	return $results;
}