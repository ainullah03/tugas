<?php
	function validateKosong(&$errors, $field_list, $field_name){ //satu
		if (empty($field_list[$field_name])) $errors[$field_name] = 'Form is empty';
	}
	function validateNum(&$errors, $field_list, $field_name){ //tiga
		$pattern = "/^[0-9]+$/";
		if (!preg_match($pattern, $field_list[$field_name])) $errors[$field_name] = 'Only use numerik';
	}
	
?>