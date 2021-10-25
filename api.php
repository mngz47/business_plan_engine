<?php
function cover_image($url){
		if(strpos($url,'jpg')!==-1 || strpos($url,'JPG')!==-1 || strpos($url,'png')!==-1 || strpos($url,'gif')!==-1){
			return true;
		}
}

function email($v){
	if($v){
		  if(preg_match('/[0-9a-zA-Z]{3,10}@[0-9a-zA-Z]{3,10}\.(com|co\.za)/',$v) || preg_match('/\d/',$v)){
			 return 1; 
		  }else{
			$_SESSION['response'] = 'Email example: myemail@gmail.com ';
			header('Location:/'.$_SESSION['location_before_sign']);
		  }
	}else{
	     $_SESSION['response'] = 'Fill in Email field.';
	     header('Location:/'.$_SESSION['location_before_sign']);
	}
}

function general_field($v,$r){
	if($v){  
		if(strlen($v)>2){
		  if(preg_match('/[\w\s]+/',$v)){
			 return 1;
		  }else{
			$_SESSION['response'] = 'Use letters only for '.$r;
			header('Location:/'.$_SESSION['location_before_sign']);
		  }
		}else{
			$_SESSION['response'] = $r.' too short';
			header('Location:/'.$_SESSION['location_before_sign']);
		}
	}else{
	     $_SESSION['response'] = 'Fill in '.$r.' field.';
	     header('Location:/'.$_SESSION['location_before_sign']);
	}
}

function digit_field($v,$r){
	if($v){
		if(is_nan(intval($v))){
			$_SESSION['response'] = 'Insert '.$r.' number';
	        header('Location:/'.$_SESSION['location_before_sign']);	
		}else{
          return true;
	   }
	}else{
	    $_SESSION['response'] = 'Fill in '.$r.' field.';
	    header('Location:/'.$_SESSION['location_before_sign']);	
	}
}

function website($v,$r){
	if($v){
    $matches;
	ereg('/https:\/\/[a-z]*\.[a-z]*\.[a-z]*\/.*/',$v,$matches,PREG_OFFSET_CAPTURE);
	if(count($matches)>0){
		   return true;
	}else{
		ereg('/https:\/\/[a-z]*\.[0-9a-z]*\.(com|co\.za)\/.*/',$v,$matches,PREG_OFFSET_CAPTURE);
		if(count($matches)>0){
			return true;
		}else{
	    $_SESSION['response'] = $r.' link format example: https://www.productlists.co.za/my_link';
	    header('Location:/'.$_SESSION['location_before_sign']);	
		}
	}
	}else{
		$_SESSION['response'] = 'Fill in '.$r.' field.';
	    header('Location:/'.$_SESSION['location_before_sign']);	
	}
}

function email_mask($v){
	return 
	'<div class=header ><a href=https://www.productlists.co.za ><span><img src=https://www.productlists.co.za/resources/logo.png>Productlists</span></a></div>'.$v.
	'<style>.header{margin-bottom:5px;border-bottom:red solid 2px;} .header a {font-size:1.2em;text-decoration:none;} .header span img{width:40px;margin:3px;} '.
	'block_hoov{'.
'margin:3px;'.
'background:rgba(255, 255, 0, 0.8);'.
'min-height:30px;'.
'padding:5px;'.
'color:gray;'.
'}'.

'block:hover{'.
'background:rgba(255, 255, 0, 0.8);'.
'}'.
'block {'.
'margin:3px;'.
'background:rgba(255, 255, 0, 0.23);'.
'min-height:30px;'.
'padding:10px;'.
'color:gray;'.
'}'.
'.block .row {'.
'width:60%;'.
'margin-left:auto;'.
'margin-right:auto;'.
'}'.
'.timeline a {'.
    'width:49%;'.
    'float:left;'.
'}'.
	'</style>';
}

function is_cell_no($to){
   return preg_match('/0\d{9}$/',$to);
}

function p_mail($to,$title,$body){
    $from = 'admin@productlists.co.za';
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
   return mail($to,$title,email_mask($body),$headers);
}

function p_cell($to,$body){
$url = 'http://api.clickatell.com/http/sendmsg?user=mngz633user&password=FIbTCRFfVAXeZH&api_id=3534806&to=27'.substr($to,1).'&text='.$body;
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
$output = curl_exec($ch);
curl_close($ch);
}

?> 
