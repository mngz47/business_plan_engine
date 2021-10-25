function setVisible(ele,flag){
ele.style.display=(flag?'':'none');
}

function isVisible(ele){
return ele.style.display=='';
}

function e(id){
return document.getElementById(id);
}

function ne(tag){
return document.createElement(tag);
}

var main_temp = '';

function s_in(){
if(main_temp==''){
main_temp = e('main').innerHTML;
}
	
if(detectMob()){
setVisible(e('header_right'),false);
setVisible(e('left_pane'),false);
}
}

function s_out(ele){
if(ele.value==''){
e('main').innerHTML = main_temp;
}
	
if(detectMob()){
setVisible(e('header_right'),true);
setVisible(e('left_pane'),true);
var l = ne('a');
l.href = '#main';
document.body.appendChild(l);
l.click();
}
}

function detectMob(){
return (window.innerWidth<=800);
}

function sendreq(url){
var req = new XMLHttpRequest();

document.domain = "www.productlists.co.za";
req.open("GET","https://www.productlists.co.za/"+url,true);

req.send();
return req;
}

function response(r,e){
r.onload = function(){
alert(r.responseText);
e.className += ' highlight';
};
}

function sendreq_2(url,target){
var req = new XMLHttpRequest();

document.domain = window.location.hostname;
req.open("GET","https://www.productlists.co.za/"+url,true);

target.className+=' loader';
req.send();
req.onload = function(){
target.className = target.className.replace(' loader','');
target.innerHTML = req.responseText;
};
}

function sendform(url,form){
var req = new XMLHttpRequest();
req.open("POST","https://productlists.co.za/"+url,true);
req.send(form);

req.onload = function(){
alert(req.responseText);
};
return req.responseText;
}

function sendform_2(url,form){
	var req = new XMLHttpRequest();
    req.open("POST","https://www.productlists.co.za/"+url,true);
    req.send(form);
	return req;
}

function setDate(id){
e(id).value = getFormatedDate();
}

function getFormatedDate(){
var d = new Date();
return (d.getFullYear()+'-'+(d.getMonth()+1)+'-'+d.getDate()+' '+d.getHours()+':'+d.getMinutes());
}

function editfield_Res_Manual(from,id,fieldname,fieldval){
if(confirm('update '+fieldname+' field')){
var req = sendreq(from+'?id='+id+'&fieldname='+fieldname+'&fieldval='+fieldval);
return req;
}else{
	return null;
}
}

function editfield(from,id,fieldname,fieldval){
if(confirm('update '+fieldname+' field')){
var req = sendreq(from+'?id='+id+'&fieldname='+fieldname+'&fieldval='+fieldval);
req.onload = function(){
if(req.responseText==='success'){
alert('all went well');
}else{
alert(req.responseText);
}
};
}
}

function editfield_3(from,id,fieldname,fieldval,still_original){
if(fieldval && !still_original){
    var d = getFormatedDate();
if(confirm('update '+fieldname+' field '+d)){
var f = new FormData();
f.append(fieldname,fieldval);
f.append('date_added',d);
sendform(from+'?id='+id+'&fieldname='+fieldname,f);
}

}
}

function editfield_2(from,id,fieldname,fieldval,flag){
if(flag){
if(confirm('update '+fieldname+' field')){
var req = sendreq(from+'?id='+id+'&fieldname='+fieldname+'&fieldval='+fieldval);
req.onload = function(){
if(req.responseText==='reload'){
location.reload();
}else if(req.responseText==='success'){
alert('all went well');
}else{
alert(req.responseText);
}
};
}
}
}

function setImage(img,update){
e('image_input').click();
e('image_input').onchange = function loadFile(event){
img.src = URL.createObjectURL(event.target.files[0]);

if(update){
	var f = new FormData();
    f.append(e('image_input').name,event.target.files[0]);
    sendform(update,f);
}
};
}

function auto_login(){
xml_response(sendreq('feature/sign/auto_login.php'));
}

function xml_response(res){
res.onload = function(){
alert(res.responseText);
};
}

function openCart(cart_id){
	var res = sendreq('feature/shopping_cart/access_cart.php?cart_id='+cart_id);
	res.onload = function(){
		document.location='https://www.productlists.co.za/feature/shopping_cart/index.php';
	};
	
}


function sendStatus(id,input){
	
if(input.value && confirm('You are about to update status to: '+input.value)){
var res = sendreq('feature/shopping_cart/update_cart_status.php?s='+input.value+'&cart_id='+id);
res.onload = function(){
if(res.responseText=='success'){
e('status').innerHTML = input.value;
input.value='';
alert('successful status update');
}else{
alert('failure');
}
}
}

}

function updateTransactionStatus(ele,id){
        if(confirm('Update Transaction Status')){
        var f = new FormData();
        f.append('id',id);
        f.append('text',ele.value);
        sendform('admin_636/transaction/status.php',f);
        }
}

// group four - sharp two

function forward(url,type){
    sendreq_2(url,e(type));
}

// column slide show

function iterate_slide(target,images){
    
     var ii = (parseInt(target.className)+1);
    
    if(ii<images.length){
        target.src = images[ii].id;
        target.className = ii;
		images[ii].style.background = 'red';
    }else{
        target.src = images[0].id;
        target.className = '0';
		images[0].style.background = 'red';
    }
    
}
