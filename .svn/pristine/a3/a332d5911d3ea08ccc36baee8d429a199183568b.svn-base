<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Categories</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>

<div id="container">

<div style="text-align:right; font-weight:bold;"><a href="<?php echo base_url(); ?>customer/logout"><i class="fa fa-power-off"></i> Log Out</a></div>

	<h1>This is categories page</h1>
	
	 <?php
	 
	 if($no_msg!=''){ ?>
		<b><?php echo $no_msg; ?> </b>
        <?php } ?>
	
	<form name="feedback" action="" method="post" onSubmit="return ValidateForm(this);">
	
Your Category: <br/><input type="checkbox" name="gender[]" id='gender' value="1"> Category 1<br/>
<input type="checkbox" name="gender[]" id='gender' value="2">  Category 2  <br/>

<input type="checkbox" name="gender[]" id='gender' value="3">  Category 3  <br/>

<input type="checkbox" name="gender[]" id='gender' value="4">  Category 4  <br/>

<input type="SUBMIT" value="Submit!">

</form>
	
</div>

</body>
</html>

<script LANGUAGE="JavaScript">
function ValidateForm(form){ 
checkText= "no";

for(i=0;i<form.gender.length;i++)
{

if(form.gender[i].checked == true)
{
checkText= "yes";
break;
}

}
if ( checkText=='no' ) 
{

alert ( "Please choose atleast one" ); 
return false;
}

if (checkText=="yes") { form.submit() }
}
</script>