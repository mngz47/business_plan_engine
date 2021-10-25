
var max_length;

var original;

function stillOriginal(parent){
	return (original==parent.value);
}

function v_open(input,max_length_i){
    if(input.value===''){
        original = input.value;
    }else{
        original = input.innerHTML;
    }

e('error_msg').innerHTML = '';
max_length = max_length_i;
}

function len(input,t){
input.onkeydown = function(e){
return len_keydown_ext(e,input,t);
};
}

function len_keydown_ext(e,input,t){
if(e.keyCode==8 || e.keyCode==46){
return true;
}else if(input.value.length<max_length){
document.getElementById('error_msg').innerHTML = (t?pass(input):'')+'<span>'+max_length+'</span>';
return true;
}else{
document.getElementById('error_msg').innerHTML = (t?pass(input):'')+'<span class=finish >'+max_length+'</span>';
return false;
}
}

function v_close(){
e('error_msg').innerHTML = '';
}

function words(parent,length){
	
	var w_l = parent.value.split(' ').length;
	
	if(w_l<length){
		e('error_msg').innerHTML = '<span class=highlight_green >Word Summary: '+length+'</span>';
		return true;
	}else{
		e('error_msg').innerHTML = '<span class=highlight >Word Summary: '+length+'</span>';
	}
}

function email(input,type,v_flag){
	if(input.value && !stillOriginal(input)){	
if(/[0-9a-zA-Z]{3,10}@[0-9a-zA-Z]{3,10}\.(com|co\.za)/.test(input.value)){
v_close();
input.className = 'tick';
if(v_flag){
sendVerification(input.value,type,0);
}
return true;
}else{
e('error_msg').innerHTML = '<span class=highlight >Cannot detect email</span>';
input.className = 'cross';
}
	}
}

function sendVerification(target,type,resend){
e('v_load').id = 'v_load_show';

var f = new FormData();
f.append('target',target);
f.append('type',type);
var res = sendform_2('verification.php'+(resend?'?resend=1':''),f);

res.onload = function(){
    
e('v_load_show').id = 'v_load';
if(res.responseText.includes('success')){
    e('v_code').style.display = 'block';
    alert(res.responseText);
    
}else if(res.responseText.includes('already been sent')){
    e('v_code').style.display = 'block';
    if(confirm(res.responseText + '.  Click OK to resend')){
        sendVerification(target,type,1);
    }
    
}

};
}


function password_v(input){
	if(input.value){
var not_strong = /^[a-z]*$/.test(input.value) || /^[0-9]*$/.test(input.value) || /^[A-Z]*$/.test(input.value) || /^[a-z0-9]*$/.test(input.value) || /^[a-zA-Z]*$/.test(input.value) || /^[A-Z0-9]*$/.test(input.value);
if(!not_strong && /^[a-z0-9A-Z]*$/.test(input.value) && input.value.length>4){
v_close();
input.className = 'tick';
return true;
}else{
e('error_msg').innerHTML = '<span class=highlight >for strong password include: small and capital letters, numbers and at least 5 characters</span>';
input.className = 'cross';
}
	}
}

function pass(input){
if(/^[a-z]*$/.test(input.value) || /^[0-9]*$/.test(input.value) || /^[A-Z]*$/.test(input.value)){
return 'weak';
}else if(/^[a-z0-9]*$/.test(input.value) || /^[a-zA-Z]*$/.test(input.value) || /^[A-Z0-9]*$/.test(input.value)){
return 'moderate';
}else if(/^[a-z0-9A-Z]*$/.test(input.value)){
return 'strong';
}else{
return '';
}
}

function showPassword(parent,f){
	if(f){
		parent.type='text';
	}else{
		parent.type='password';
	}
}


function website(parent){
	if(parent.value && !stillOriginal(parent)){
	if(/https:\/\/[a-z]*\.[0-9a-z]*\.(com|co\.za|.*)/.test(parent.value)){
		v_close();
		parent.className = 'tick';
		
		return true;
	}else{
		e('error_msg').innerHTML = '<span class=highlight >Reqiure format example: https://www.productlists.co.za/my_link </span>';
		parent.className = 'cross';
	}
	}
}

function auto_correct(list,type,parent){
		if(parent.value){
			var v = parent.value.toLowerCase();
if(v.length>2){
	for(var a=0;a<list.length;a++){
if(list[a].toLowerCase().includes(v)){
	
	parent.value = list[a];
	e('error_msg').innerHTML = '<span class=highlight_green >Your '+type+'...</span>';
	
break;
}else if(a==(list.length-1)){
	e('error_msg').innerHTML = '<span class=highlight_green >You have inserted a new '+type+'.</span>';
break;
}
	}
parent.className = 'tick';
}
	}
	return true;
}

function general_field(parent){
	if(parent.value && !stillOriginal(parent)){
		if(parent.value.length>2){
		  if(/\w/.test(parent.value)){
			  parent.className = 'tick';
			  return true;
		  }else{
			  parent.className = 'cross';
			  e('error_msg').innerHTML = '<span class=highlight >use letters only</span>';
		  }
		}else{
			parent.className = 'cross';
			e('error_msg').innerHTML = '<span class=highlight >too short</span>';
		}
	}
}

function digit_field(parent){
	if(parent.value && !stillOriginal(parent)){
		if(isNaN(parent.value)){
			parent.className = 'cross';
			e('error_msg').innerHTML = '<span class=highlight >insert number</span>';
		}else{
          parent.className = 'tick';
		  return true;
	   }
	}
}
