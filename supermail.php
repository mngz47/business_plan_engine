<?php

include "api.php";

if($_POST['email'] && $_POST['subject'] && $_POST['body']){
	
	if(p_mail($_POST['email'],$_POST['subject'],$_POST['body'])){
		echo 'success';
	}else{
		if(mail($_POST['email'],$_POST['subject'],$_POST['body'])){
			echo 'success';
		}else{
			echo 'error';
		}
	}
	
}else{
	echo 'fill in form';
}
?>