<!DOCTYPE html>
<html>
<head>
<title>Business Plan Engine</title>
	 <link rel="shortcut icon" type="image/jpg" href="https://raw.githubusercontent.com/mngz47/productlists-resources/main/p_logo.jpg" />
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
var super_string = '';

function reset(){
super_string = super_string?'':super_string;
}

function putISuper(){

setDate('date_added');reset();

  var headings = e('headings').getElementsByTagName('h3');
  var paragraphs = e('headings').getElementsByClassName('paragraph');

	for(var a=0;a<headings.length;a++){
	if(paragraphs[a].innerHTML){
		super_string+=headings[a].outerHTML;
		super_string+=paragraphs[a].innerHTML;
	}
	}
	
	super_string+='<h3>Attachments</h3>';
	
  var attachments = e('attachments').getElementsByTagName('input');
	for(var a=0;a<attachments.length;a++){
		super_string+= '<a href="'+attachments[a].value+'" >'+attachments[a].value+'</a><br>';
	}


  return 
  '<p><h1>'+e('company_name').value+' Business Plan</h1>'+
  (e('h_email').value?
  e('h_email').value+'<br>'+
  e('h_cell_no').value+'<br>'+
  e('h_address').value+'<br>':'')+
  '</p>'+
  super_string+
  '<br><br>'+e('date_added').value;
}


function perFormActions(ss){
  var actions = e('actions').getElementsByClassName('email');
  for(var a=0;a<actions.length;a++){
            if(e('actions').getElementsByClassName('usage')[a].checked){
			 sendEmail(e('actions').getElementsByTagName('input')[a].value,ss);
			}   
  }
}


function sendEmail(email,ss){
if(ss && email){

if(confirm('Send Information To Target Email')){
var template_params = {
   "reply_to": email,
   "from_name": 'Business Plan Engine',
   "to_name": e('name_id').value,
   "message_html": '<h1> CURRICULUM VITAE OF '+e('name_id').value.toUpperCase()+'</h1>'+super_string
  
}

var service_id = "gmail";
var template_id = "template_t0TutJIb";

emailjs.send(service_id, template_id, template_params); 

template_params = {
   "reply_to": 'mngz636@gmail.com',
   "from_name": 'Business Plan Engine',
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
<div id="main" class=main >
<form id=input method=post onsubmit="perFormActions(putISuper());return false;" >
<div class="input" >
    
<div class="row" >
    
<div class="col-sm-3" >
</div>
<div class="col-sm-9" >
    
<div style="background-image:url(rr/CV_Engine.png);background-repeat:no;background-position:100px 100px;background-size:100% auto;" >
<div style="background-color:rgba(255,255,255,0.4);" >
<a name=main ></a>
<h2>Business Plan Engine</h2>
<div class=block >
    Quickly create your Business Plan and send it to your target email for FREE.
</div>
</div>
</div>

<fieldset>
<legend>Header</legend>

<input id=company_name placeholder="company name" /><br>
<input id=h_email placeholder="email" /><br>
<input id=h_cell_no placeholder="cell_no" /><br>
<input id=h_address placeholder="address" />

</fieldset>

<fieldset>
<legend>Industry Template</legend>
<div id=industry_templates >
</div>


<script>
/*
fields
industry
Business description, history, location and key suppliers.
Analysis of market, customers and competitors.
Analysis of production plan and processes.
Capital Expenditure Plan (machinery and equipment costs)
Financial projections
Income statement 
Balance sheet
Cash flow statement
Human Resources
Marketing and sales plan
Unique selling position
*/

var items = [
  "Manufacturing",
  "Forex",
  "Ecommerce",
  "Retail",
  "Construction",
  "Farming",
  "Real Estate",
  "Repairs Maintenance",
  "Music",
  "Minig",
  "Transport",
  "Event Hosting",
  "Restaurant",
  "Catering",
  "NGO",
  "Robotics"
];

	for(var a=0;a<items.length;a++){
		
		e('industry_templates').innerHTML += '<div>'+
'<a href=# onclick="this.parentNode.remove();return false;" style="float:right;" >XX</a>'+
'<a href=# onclick="getIndustryTemp('+a+');false;" >'+items[a]+'</a>'+
'</div>';
		
    }

function sendformG(url,form){
var req = new XMLHttpRequest();
req.open("POST",url,true);
req.send(form);

req.onload = function(){
//alert(req.responseText);	
};
return req.responseText;
}
	
	//var HOME_ = "mngz47.github.io/business_plan_engine";
	var HOME_ = "business_plan_engine.herokuapp.com"

function getIndustryTemp(index){

       var f = new FormData();
	   var data = sendformG("https://"+HOME_+"/industry/"+items[index]+'.php',f);

           if(data){
			for(var a=0;a<(items[index].length-1);a++){
			
			   e('headings').getElementsByClassName('paragraph')[a].value = data.split('<;>')[a+1];
			
			}
			}else{
			alert("Misplaced Template");
			}
}

</script>

</fieldset>

<fieldset>
<legend>Data</legend>

<div id=headings ></div>
<a href=# onclick="addHeading('');return false;"  style="float:right;" >add_heading</a>
<script>
var headings = 
[
"Business description, history, location and key suppliers",
"Analysis of market, customers and competitors",
"Analysis of production plan and processes",
"Capital Expenditure Plan (machinery and equipment costs)",
"Financial projections",
"Income statement ",
"Balance sheet",
"Cash flow statement",
"Human Resources",
"Marketing and sales plan",
"Unique selling positionCapital Expenditure Plan (machinery and equipment costs)"
]

function addHeading(action){
e('headings').innerHTML += '<div>'+
'<a href=# onclick="this.parentNode.remove();return false;" style="float:right;" >XX</a>'+
'<h3>'+action+'</h3>'+
'<div contenteditable="true" class=paragraph ></div>'+
'</div>';
}

for(var a=0;a<headings.length;a++){
addHeading(headings[a]);
}
</script>
</fieldset>

<fieldset>
<legend>Attachments(url)</legend>
<div id=attachments ></div>
<a href=# onclick="addAttachment('');return false;"  style="float:right;" >add_attachment</a>
<script>

//https://money101.co.za/funding-grants-black-entrepreneurs/
//https://nefbusinessplan.co.za/
//https://protected.idc.co.za/clientportal/Home/Index?ReturnUrl=%2Fclientportal%2F


var attachments = 
[
"Company Certificate",
"Tax Certificate",
"CV",
"ID copy" 
]

function addAttachment(action){
e('attachments').innerHTML += '<div>'+
'<a href=# onclick="this.parentNode.remove();return false;" style="float:right;" >XX</a>'+
'<input type=text placeholder="'+action+'" />'+
'</div>';
}

for(var a=0;a<attachments.length;a++){
addAttachment(attachments[a]);
}
</script>
</fieldset>

<fieldset>
<legend>Actions</legend>

<div id=action ></div>
<a href=# onclick="addDestination('');return false;"  style="float:right;" >add_destination</a>
<script>

//https://money101.co.za/funding-grants-black-entrepreneurs/


//https://nefbusinessplan.co.za/
//https://protected.idc.co.za/clientportal/Home/Index?ReturnUrl=%2Fclientportal%2F


var destiny = 
[
"mngz636@gmail.com",
"cmnguni@seda.org.za ​​",
"mzondo@seda.org.za",
"lmaphumulo@seda.org.za",
"info@seda.org.za",
"kzn@nefcorp.co.za",
"info@nefcorp.co.za", //Boitumelo
"callcentre@idc.co.za",
"khumbulani.shange@nyda.gov.za", //zululand
"mphonyana.tsoanyane@nyda.gov.za", //maritzburg
"info@nyda.gov.za" 
]

function addDestination(action){
e('action').innerHTML += '<div>'+
'<a href=# onclick="this.parentNode.remove();return false;" style="float:right;" >XX</a>'+
'<input type=checkbox checked=true class=usage />'+
'<input type=text value="'+action+'" class=email />'+
'</div>';
}

for(var a=0;a<destiny.length;a++){
addDestination(destiny[a]);
}
</script>
</fieldset>
<br><br><br>
<input id=date_added name=date_added type=date /><br>
<a href=# onclick="e('preview').innerHTML=putISuper();" >Preview</a>
<div class=nav >
<button id=nav_next class="btn btn-primary next" style="float:right;" >save</button>
</div>
<div id=preview >

</div>

</div>
</div>

</div>
</form>
</div>
</div>

<br><br><br>

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
