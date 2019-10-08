<?php
	function validateKosong(&$errors, $field_list, $field_name){ //satu
		if (empty($field_list[$field_name])) $errors[$field_name] = 'Form is empty';
	}
	function validateAlpha(&$errors, $field_list, $field_name){ //dua
		$pattern = "/^[a-zA-Z' -]+$/";
		if (!preg_match($pattern, $field_list[$field_name])) $errors[$field_name] = 'Only use alphabets';
	}
	function validateNum(&$errors, $field_list, $field_name){ //tiga
		$pattern = "/^[0-9]+$/";
		if (!preg_match($pattern, $field_list[$field_name])) $errors[$field_name] = 'Only use numerik';
	}
	function validateEmail(&$errors, $field_list, $field_name){ //empat
		$pattern = "/^[a-zA-Z0-9_.]+@[a-zA-Z0-9]+.[a-zA-Z0-9]+$/";
		if (!preg_match($pattern, $field_list[$field_name])) $errors[$field_name] = 'Email Format invalid';
	}
	function validateLenChar(&$errors, $field_list, $field_name){ //lima
		$pattern = "/.{6,}$/";
		if (!preg_match($pattern, $field_list[$field_name])) $errors[$field_name] = 'Password too weak. Consider using more than 6 chars';
	}
	function validateSame(&$errors, $field_list, $field_name_a, $field_name_b){ //enam
		$pattern = "/^$field_list[$field_name_a]$/";
		if (!preg_match($pattern, $field_list[$field_name_b])) $errors[$field_name_b] = 'Wrong Password';
	}
	
?>