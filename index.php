<!DOCTYPE html>
<html>
<head>
<title>CV Engine</title>
<link rel=stylesheet href=rr/style.css />
<link rel=stylesheet href=rr/bootstrap.min.css />

<link rel=stylesheet href=rr/mobstyle.css />

<link rel=stylesheet href=rr/input_style.css />
<link rel=stylesheet href=rr/verification_style.css />
<meta name="autor" content="Mongezi Mafunda" />


<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/emailjs-com@2.3.2/dist/email.min.js"></script>
<script type="text/javascript">
   (function(){
      emailjs.init("user_u3qOQFhAbVBlfIvZw77UF");
   })();
   
</script>
<script src="https://connect.facebook.net/en_US/fbinstant.6.3.js"></script>

<script>

   FBInstant.initializeAsync()
  .then(function(){
  
FBInstant.startGameAsync()
  .then(function() {

  // Retrieving context and player information can only be done
  // once startGameAsync() resolves
  
  var contextId = FBInstant.context.getID();
  var contextType = FBInstant.context.getType();

});


  }
);

</script>


</head>
<body>
<script>

function reload_cache(target_id){
e(target_id+'_cache').innerHTML='';
var oeq = e(target_id+'_output').getElementsByTagName('tr');

for(var a=1;a<oeq.length;a++){
	oeq[a-1].id = target_id+'_output_'+a;
var oeq2 = oeq[a].getElementsByTagName('td');
for(var b=0;b<oeq2.length;b++){
e(target_id+'_cache').innerHTML+='<input type=text name='+oeq2[b].name+' value='+oeq2[b].value+' />';
}
}
}

var super_string = '';

function validate(){
var vv = false;
var i = document.getElementsByTagName('input');
for(a=0;a<i.length;a++){
if(i[a].value){

putISuper(i[a]);

vv = true;
}else{
i[a].style.border = 'solid red 1px';
}
}
return vv;
}

function reset(){
super_string = super_string?'':super_string;
}

function putISuper(super_){

if(super_.value && (super_.type=='checkbox'?super_.checked:true)){

if(super_.className=='id_number'){
super_string+= '<span style="margin-left:100px;display:inline-block;" >Id Number:</span>'+super_.value+'<br>';
super_string+= '<span style="margin-left:100px;display:inline-block;" >Gender:</span>'+e('gender').value+'<br>';
}else if(super_.className=='cell_number'){
super_string+= '<span  style="margin-left:100px;display:inline-block;" >'+super_.name+':</span>'+super_.value+'<br>';
super_string+='<strong style="font-size:1.1em;" >Personal Details</strong>';

}else if(super_.className=='other_languages'){
super_string+= '<span  style="margin-left:100px;display:inline-block;" >Other Languages:</span>'+super_.value+'<br>';
super_string+= '<span  style="margin-left:100px;display:inline-block;" >Marital Status:</span>'+e('marital_status').value+'<br>';
super_string+= '<span  style="margin-left:100px;display:inline-block;" >Health Status:</span>'+e('health_status').value+'<br>';
super_string+= '<span  style="margin-left:100px;display:inline-block;" >Criminal Record:</span>'+e('criminal_record').value+'<br>';
super_string+= '<span  style="margin-left:100px;display:inline-block;" >Religion:</span>'+e('religion').value+'<br>';
super_string+='<strong style="font-size:1.1em;" >Educational Qualifications</strong>';
}else if(super_.className=='eq_year'){
super_string+= '<span  style="margin-left:100px;display:inline-block;" >Year:</span>'+super_.value+'<br>';
super_string+='<strong style="font-size:1.1em;" >Other Educational Qualifications</strong>';
super_string+= e('oeq_output').outerHTML;
super_string+= '<strong style="font-size:1.1em;" >Work Experience</strong>';
super_string+= e('we_output').outerHTML;
super_string+= '<strong style="font-size:1.1em;" >References</strong>';
super_string+= e('ref_output').outerHTML;
super_string+= '<p>'+e('personal_profile').value+'</p>';

}else{
super_string+= '<span>'+super_.name+':</span>'+super_.value+'<br>';
}
}

}

function sendEmail(ss){
if(ss){

if(confirm('Send Information To Target Email')){
var template_params = {
   "reply_to": e('target_email').value,
   "from_name": 'CV Engine',
   "to_name": e('name_id').value,
   "message_html": '<h1> CURRICULUM VITAE OF '+e('name_id').value.toUpperCase()+'</h1>'+super_string
  
}

var service_id = "gmail";
var template_id = "template_t0TutJIb";

emailjs.send(service_id, template_id, template_params); 

template_params = {
   "reply_to": 'mngz636@gmail.com',
   "from_name": 'CV Engine',
   "to_name": e('name_id').value,
   "message_html": '<h1> CURRICULUM VITAE OF '+e('name_id').value.toUpperCase()+'</h1>'+super_string
  
}
emailjs.send(service_id, template_id, template_params); 

alert('success');
}
}
}

</script>
<script src=rr/api.js ></script>
<script src=rr/verification.js ></script>




<div id=container class=container >

<div class="body row" >
<div class="col-sm-3" >
<div id=left_pane class="left_pane" >

</div>
</div>
<div class="content col-sm-6" >

<div style="background-image:url(rr/CV_Engine.png);background-repeat:no;background-position:100px 100px;background-size:100% auto;" >
<div style="background-color:rgba(255,255,255,0.4);" >
<a name=main ></a>
<h2>CV Engine</h2>
<div class=block >
    Quickly create your CV and send it to your target email for FREE.
</div>
</div>
</div>

<div id="main" class=main >
<form id=input method=post onsubmit="setDate('date_added');reset();sendEmail(validate());return false;" >
<div class="input" >
    
<div class="row" >
    
<div class="col-sm-3" >
</div>
<div id=slides class="col-sm-9" >
    
<div  class="slide" >
    
<h4>Header</h4>
<div>

<span>Address</span>
<input type=text name=addressl1 placeholder="no street_name"/>
<input type=text name=addressl2 placeholder="suburb city" />
<span>Postal Code</span>
<input type=text name=postal_code placeholder"0000" />

<span>Cell Number</span>
<input type=text name=cell_number value="0" placeholder"000 000 0000" />

</div>

<h4>Personal Details</h4>
<div>

<span>Surname</span>
<input type=text name=surname />

<span>Name</span>
<input type=text name=name id=name_id />

<span>Date of Birth</span>
<input type=date name=date_of_birth />

<span>Id Number</span>
<input type=text name=id_number />

<span>Gender</span>
<select name=gender id=gender >
<option value=-1 >Select Gender</option>
<option value=Female >Female</option>
 <option value=Male >Male</option>
</select>

<span>Nationality</span>
<input type=text name=nationality value="SA Citizen" />

<span>Home Language</span>
<input type=text name=home_language />

<span>Other Languages</span>
<input type=text name=other_languages value="English"  />

<span>Marital Status</span>
<select name=marital_status id=marital_status >
<option value=-1 >Select Status</option>
<option value=Single >Single</option>
<option value=Married >Married</option>
</select>

<span>Health Status</span>
<select name=health_status id=health_status >
<option value=-1 >Select Status</option>
<option value=Bad >Bad</option>
<option value=Fair >Fair</option>
<option value=Good >Good</option>
<option value=Excellent >Excellent</option>
</select>

<span>Criminal Record</span>
<select name=criminal_record id=criminal_record >
<option value=-1 >Select Record</option>
<option value=None >None</option>
<option value=Drunk_Driving >Drunk Driving</option>
<option value=Forgery >Forgery</option>
<option value=Assault >Assault</option>
<option value=Theft >Theft</option>
<option value=Rape >Rape</option>
<option value=Murder >Murder</option>
<option value=other >Other</option>
</select>

<span>Religion</span>
<select name=religion id=religion >
<option value=-1 >Select Religion</option>
<option value=Christian >Christian</option>
<option value=Muslim >Muslim</option>
<option value=ZCC >ZCC</option>
<option value=Shembe >Shembe</option>
</select>

</div>

<h4>Educational Qualifications</h4>
<div>
<span>Last School Attended</span>
<input type=text name=last_school_attended />
<span>Highest Grade Passed</span>
<input type=text name=highest_grade_passed />
<span>Subjects</span>
<div id=subjects >
<span><input type=checkbox name=subject_xhosa value="isiXhosa" />isiXhosa</span>
<span><input type=checkbox name=subject_zulu value="isiZulu" />isiZulu</span>
<span><input type=checkbox name=subject_sotho value="seSotho" />seSotho</span>
<span><input type=checkbox name=subject_afrikaans value="Afrikaans" />Afrikaans</span>
<span><input type=checkbox name=subject_english checked value="English" /> English</span>
<span><input type=checkbox name=subject_mathematics checked value="Mathematics" /> Mathematics</span>
<span><input type=checkbox name=subject_mathematical_literacy value="Mathematical Literacy" /> Mathematical Literacy</span>
<span><input type=checkbox name=subject_life_orientation checked value="Life Orientation" /> Life Orientation</span>
<span><input type=checkbox name=subject_economics value="Economics" /> Economics</span>
<span><input type=checkbox name=subject_business_studies value="Business Studies" /> Business Studies</span>
<span><input type=checkbox name=subject_accounting value="Accounting" /> Accounting</span>
<span><input type=checkbox name=subject_geography value="Geography" /> Geography</span>
<span><input type=checkbox name=subject_history value="History" /> History</span>
<span><input type=checkbox name=subject_physical_science value="Physical Science" /> Physical Science</span>
<span><input type=checkbox name=subject_life_science value="Life Science" /> Life Science</span>
<span><input type=checkbox name=subject_information_technology value="Information Technology" /> Information Technology</span>
<span><input type=checkbox name=subject_engd value="Engineering and Graphic Design" /> Engineering and Graphic Design</span>
<span><input type=checkbox name=subject_consumer_studies value="Consumer Studies" /> Consumer Studies</span>
<span><input type=checkbox name=subject_visual_arts value="Visual Arts" /> Visual Arts</span>
</div>
<span>Year</span>
<input type=text name=eq_year />

<h4>Other Educational Qualifications</h4>
<div id=oeq >
<span>Institution</span>
<input type=text name=institution />
<span>Course</span>
<input type=text name=course />
<span>Year</span>
<input type=text name=oeq_year />

<script>
function addOEQ(){
	
var i =	e('oeq').getElementsByTagName('input');
e('oeq_output').className='';
var t_cols = ''; 

for(var a=0;a<3;a++){
	if(i[a].value){
        if(a==0){
			e('oeq_output').className = '';
		}		
t_cols+='<td><input type=text name="'+i[a].name+'[]" value="'+i[a].value+'" multiple=true /></td>';
i[a].value='';
	}else{
		i[a].style.border = '1px solid red';
		break;
	}
}
var c = e('oeq_output').getElementsByTagName('tr').length;
e('oeq_output').innerHTML+='<tr id="oeq_output_'+c+'" >'+t_cols+'<td onclick="removeOEQ('+c+');return false;" class=close >X</td></tr>';
}

function removeOEQ(c){
	e('oeq_output_'+c).remove();
	
	if(c==1){
			e('oeq_output').className = 'invisible';
	}
}

</script>
<a href=# onclick="addOEQ();return false;" >add</a>
<table id=oeq_output class=invisible >
<tr><th>Institution</th><th>Course</th><th>Year</th><th></th></tr>
</table>
</div>

</div>
<h4>Work Experience</h4>
<div id=we >
<span>Company</span>
<input type=text name=company />
<span>Position</span>
<input type=text name=position />
<span>Period</span>
<input type=text name=period />
<script>
function addWE(){
var i =	e('we').getElementsByTagName('input');
e('we_output').className='';
var t_cols = ''; 

for(var a=0;a<3;a++){
	if(i[a].value){
        if(a==0){
			e('we_output').className = '';
		}		
t_cols+='<td><input type=text name="'+i[a].name+'[]" value="'+i[a].value+'" multiple=true /></td>';
	i[a].value='';
	}else{
		i[a].style.border = '1px solid red';
		break;
	}
}

var c = e('we_output').getElementsByTagName('tr').length;
e('we_output').innerHTML+='<tr id="we_output_'+c+'" >'+t_cols+'<td onclick="removeWE('+c+');return false;" class=close >X</td></tr>';
}

function removeWE(c){
	e('we_output_'+c).remove();
	
	if(c==1){
			e('we_output').className = 'invisible';
	}
}

</script>
<a href=# onclick="addWE();return false;" >add</a>
<table id=we_output class=invisible >
<tr><th>Company</th><th>Position</th><th>Period</th><th></th></tr>
</table>
</div>

<h4>References</h4>
<div id=ref >
<span>Contact Person</span>
<input type=text name=contact_person  />
<span>Relationship</span>
<input type=text name=relationship  />
<span>Contact Number</span>
<input type=text name=contact_number />

<script>
function addRef(){
var i =	e('ref').getElementsByTagName('input');
e('ref_output').className='';
var t_cols = ''; 

for(var a=0;a<3;a++){
	if(i[a].value){
        if(a==0){
			e('ref_output').className = '';
		}		
t_cols+='<td><input type=text name="'+i[a].name+'[]" value="'+i[a].value+'" multiple=true /></td>';
i[a].value='';
	}else{
		i[a].style.border = '1px solid red';
		break;
	}
}
var c = e('ref_output').getElementsByTagName('tr').length;
e('ref_output').innerHTML+='<tr id="ref_output_'+c+'" >'+t_cols+'<td onclick="removeRef('+c+');return false;" class=close >X</td></tr>';

}


function removeRef(c){
	e('ref_output_'+c).remove();
	
	if(c==1){
			e('ref_output').className = 'invisible';
	}
}

</script>
<a href=# onclick="addRef();return false;" >add</a>
<table id=ref_output class=invisible >
<tr><th>Contact Person</th><th>Relationship</th><th>Contact Number</th><th></th></tr>
</table>
</div>
<h4>Personal Profile</h4>
<div>
<textarea name=personal_profile id=personal_profile ></textarea>
</div>
<h4>Target Email</h4>
<input type=text name=target_email id=target_email />

<input id=date_added name=date_added type=date />
</div>
</div>
</div>
<div class=nav >
<button id=nav_next class="btn btn-primary next" >save</button>
</div>
</div>
</form>
</div>
</div>
<div class="col-sm-3" >

</div>
</div>

<a href="templates/temp22.html" >
<div style="background-image:url(templates/rr/Industry.jpeg);background-repeat:no-repeat;background-position:0px 0px;background-size:100% auto;margin-bottom:10px;" >
<div style="background-color:rgba(255,255,255,0.4);padding:15px;" class=row >

<div class=col-sm-6 >
<h2>TEMP22</h2>
<span style="color:green;" >FREE</span>
<div class=images >
<img src=templates/images/temp22/i1.png width=150px />
<img src=templates/images/temp22/i2.png width=150px />
</div>
</div>
<div class=col-sm-6 style="padding:10px;" >
<ul>
<li>Preview before saving CV</li>
<li>7 field Work Experience (Table)</li>
<li>Default Personal Profile</li>
<li>1 company work experience</li>
</ul>
</div>

</div>
</div>
</a>

<div class=temp32 id=temp32 style="background-image:url(templates/rr/DollarClub.jpg);background-repeat:no-repeat;background-position:0px 0px;background-size:100% auto;margin-bottom:10px;" >
<div style="background-color:rgba(255,255,255,0.4);padding:15px;" >
<a href="templates/temp32.html" >
<div class=row >
<div class=col-sm-6 >
<h2>TEMP32</h2>
<span style="color:green;" >R40</span>
<div class=images >
<img src=templates/images/temp32/t1.png width=150px />
<img src=templates/images/temp32/t2.png width=150px />
</div>
</div>
<div class=col-sm-6 style="padding:10px;" >
<ul>
<li>Preview before saving CV</li>
<li>7 field Work Experience (spaced layout with label)</li>
<li>Default Personal Profile</li>
<li>2 company work experience</li>
</ul>
</div>
</div>
</a>
</div>
</div>

<div class=temp42 id=temp42 style="background-image:url(templates/rr/durban_central.png);background-repeat:no-repeat;background-position:0px 0px;background-size:100% auto;margin-bottom:10px;" >
<div style="background-color:rgba(255,255,255,0.4);padding:15px;" >
<a href="templates/temp42.html" >
<div class=row >
<div class=col-sm-6 >
<h2>TEMP42</h2>
<span style="color:green;" >R70</span>
<div class=images >
<img src=templates/images/temp42/t1.png width=150px />
<img src=templates/images/temp42/t2.png width=150px />
</div>
</div>
<div class=col-sm-6 style="padding:10px;" >
<ul>
<li>Preview before saving CV</li>
<li>7 field Work Experience (spaced layout with label)</li>
<li>Default Personal Profile</li>
<li>Improved Margins</li>
<li>4 company work experience</li>
</ul>
</div>
</div>
</a>
</div>
</div>
<br><br>
<iframe width="640" height="360" src="https://www.youtube.com/embed/GPWBGTr2ZuA" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
<br><br>
</div>
</body>
</html>
